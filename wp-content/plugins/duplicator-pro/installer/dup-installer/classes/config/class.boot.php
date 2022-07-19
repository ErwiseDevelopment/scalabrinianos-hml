<?php
/**
 * Boot class
 *
 * Standard: PSR-2
 * @link http://www.php-fig.org/psr/psr-2 Full Documentation
 *
 * @package SC\DUPX\Constants
 *
 */
defined('ABSPATH') || defined('DUPXABSPATH') || exit;

/**
 * This class manages all the initialization of the installer by performing security tests, log initialization and global variables.
 * 
 */
class DUPX_Boot
{

    const ARCHIVE_PREFIX      = 'dup-archive__';
    const ARCHIVE_EXTENSION   = '.txt';
    const MINIMUM_PHP_VERSION = '5.3.8';

    /**
     * this variable becomes false after the installer is initialized by skipping the shutdown function defined in the boot class
     * 
     * @var bool  
     */
    private static $shutdownFunctionEnaled = true;

    /**
     *
     * @var int 
     */
    public static $dupInitFolderParentLevel = 1;

    /**
     * inizialize all
     */
    public static function init()
    {
        self::phpVersionCheck();

        $GLOBALS['DUPX_ENFORCE_PHP_INI'] = false;

        // INIT ERROR LOG FILE (called before evrithing)
        if (function_exists('register_shutdown_function')) {
            register_shutdown_function(array(__CLASS__, 'bootShutdown'));
        }
        if (self::initPhpErrorLog(false) === false) {
            // Enable this only for debugging. Generate a log too alarmist.            
            error_log('DUPLICATOR CAN\'T CHANGE THE PATH OF PHP ERROR LOG FILE', E_USER_NOTICE);
        }

        // includes main files
        self::includes();
        // set time for logging time
        DUPX_Log::resetTime();
        // set all PHP.INI settings
        self::phpIni();

        /*
         * INIZIALIZE
         */
        define('DUPX_INIT_URL', DupProSnapLibURLU::getCurrentUrl(false, false, self::$dupInitFolderParentLevel));
        define('DUPX_ROOT_URL', DupProSnapLibURLU::getCurrentUrl(false, false, self::$dupInitFolderParentLevel + 1));

        // init global values
        DUPX_Constants::init();

        self::templatesInit();

        // SECURITY CHECK
        DUPX_Security::getInstance()->check();

        // init ERR defines
        DUPX_Constants::initErrDefines();
        // init error handler after constant
        DUPX_Handler::initErrorHandler();

        self::initArchive();
        // init params
        DUPX_Paramas_Manager::getInstance()->initParams();

        // read params from request and init global value
        self::initInstallerFiles();

        // check custom hosts
        DUPX_Custom_Host_Manager::getInstance()->init();

        $pathInfo = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
        DUPX_Log::info("\n\n"
            ."==============================================\n"
            ."= BOOT INIT OK [".$pathInfo."]\n"
            ."==============================================\n", DUPX_Log::LV_DETAILED);

        if (DUPX_Log::isLevel(DUPX_Log::LV_DEBUG)) {
            DUPX_Log::info('-------------------');
            DUPX_Log::info('PARAMS');
            DUPX_Log::info(DUPX_Paramas_Manager::getInstance()->getParamsToText());
            DUPX_Log::info('-------------------');
        }
    }

    /**
     * init ini_set and default constants
     *
     * @throws Exception
     */
    public static function phpIni()
    {
        /** Absolute path to the Installer directory. - necessary for php protection */
        if (!defined('DUPLICATOR_PRO_INSTALLER_KB_IN_BYTES')) {
            define('DUPLICATOR_PRO_INSTALLER_KB_IN_BYTES', 1024);
        }
        if (!defined('DUPLICATOR_PRO_INSTALLER_MB_IN_BYTES')) {
            define('DUPLICATOR_PRO_INSTALLER_MB_IN_BYTES', 1024 * DUPLICATOR_PRO_INSTALLER_KB_IN_BYTES);
        }
        if (!defined('DUPLICATOR_PRO_GB_IN_BYTES')) {
            define('DUPLICATOR_PRO_GB_IN_BYTES', 1024 * DUPLICATOR_PRO_INSTALLER_MB_IN_BYTES);
        }
        if (!defined('DUPLICATOR_PRO_PHP_MAX_MEMORY')) {
            define('DUPLICATOR_PRO_PHP_MAX_MEMORY', 4096 * DUPLICATOR_PRO_INSTALLER_MB_IN_BYTES);
        }

        date_default_timezone_set('UTC'); // Some machines don’t have this set so just do it here.
        @ignore_user_abort(true);

        @set_time_limit(3600);

        $defaultCharset = ini_get("default_charset");
        if (empty($defaultCharset) && DupProSnapLibUtil::wp_is_ini_value_changeable('default_charset')) {
            @ini_set("default_charset", 'utf-8');
        }
        if (DupProSnapLibUtil::wp_is_ini_value_changeable('memory_limit')) {
            @ini_set('memory_limit', DUPLICATOR_PRO_PHP_MAX_MEMORY);
        }
        if (DupProSnapLibUtil::wp_is_ini_value_changeable('max_input_time')) {
            @ini_set('max_input_time', '-1');
        }
        if (DupProSnapLibUtil::wp_is_ini_value_changeable('pcre.backtrack_limit')) {
            @ini_set('pcre.backtrack_limit', PHP_INT_MAX);
        }

        //PHP INI SETUP: all time in seconds
        if (!isset($GLOBALS['DUPX_ENFORCE_PHP_INI']) || !$GLOBALS['DUPX_ENFORCE_PHP_INI']) {
            if (DupProSnapLibUtil::wp_is_ini_value_changeable('mysql.connect_timeout')) {
                @ini_set('mysql.connect_timeout', '5000');
            }
            if (DupProSnapLibUtil::wp_is_ini_value_changeable('max_execution_time')) {
                @ini_set("max_execution_time", '5000');
            }
            if (DupProSnapLibUtil::wp_is_ini_value_changeable('max_input_time')) {
                @ini_set("max_input_time", '5000');
            }
            if (DupProSnapLibUtil::wp_is_ini_value_changeable('default_socket_timeout')) {
                @ini_set('default_socket_timeout', '5000');
            }
            @set_time_limit(0);
        }
    }

    /**
     * include default utils files and constants
     *
     * @throws Exception
     */
    public static function includes()
    {
        require_once(DUPX_INIT.'/lib/snaplib/snaplib.all.php');
        require_once(DUPX_INIT.'/classes/config/class.conf.wp.php');
        require_once(DUPX_INIT.'/lib/config/class.wp.config.tranformer.php');
        require_once(DUPX_INIT.'/classes/utilities/class.u.exceptions.php');
        require_once(DUPX_INIT.'/classes/utilities/class.ignorant.recursive.iterator.php');
        require_once(DUPX_INIT.'/classes/utilities/class.u.php');
        require_once(DUPX_INIT.'/classes/utilities/class.u.notices.manager.php');
        require_once(DUPX_INIT.'/classes/params/class.u.params.manager.php');
        require_once(DUPX_INIT.'/classes/utilities/template/class.u.template.manager.php');
        require_once(DUPX_INIT.'/classes/utilities/class.u.orig.files.manager.php');
        require_once(DUPX_INIT.'/classes/validation/class.validation.manager.php');
        require_once(DUPX_INIT.'/classes/config/class.security.php');
        require_once(DUPX_INIT.'/classes/plugins/class.plugins.manager.php');
        require_once(DUPX_INIT.'/classes/class.password.php');
        require_once(DUPX_INIT.'/classes/class.db.php');
        require_once(DUPX_INIT.'/classes/class.db.functions.php');
        require_once(DUPX_INIT.'/classes/class.http.php');
        require_once(DUPX_INIT.'/classes/class.crypt.php');
        require_once(DUPX_INIT.'/classes/class.package.php');
        require_once(DUPX_INIT.'/classes/class.server.php');
        require_once(DUPX_INIT.'/classes/config/class.archive.config.php');
        require_once(DUPX_INIT.'/classes/config/class.constants.php');
        require_once(DUPX_INIT.'/classes/config/class.conf.utils.php');
        require_once(DUPX_INIT.'/classes/class.installer.state.php');
        require_once(DUPX_INIT.'/classes/class.logging.php');
        require_once(DUPX_INIT.'/classes/tests/class.test.wordpress.exec.php');
        require_once(DUPX_INIT.'/ctrls/classes/class.ctrl.ajax.php');
        require_once(DUPX_INIT.'/ctrls/classes/class.ctrl.params.php');
        require_once(DUPX_INIT.'/ctrls/ctrl.base.php');
        require_once(DUPX_INIT.'/ctrls/classes/class.ctrl.extraction.php');
        require_once(DUPX_INIT.'/ctrls/classes/class.ctrl.dbinstall.php');
        require_once(DUPX_INIT.'/ctrls/classes/class.ctrl.s3.funcs.php');
        require_once(DUPX_INIT.'/classes/view-helpers/class.u.html.php');
        require_once(DUPX_INIT.'/classes/view-helpers/class.view.php');
        require_once(DUPX_INIT.'/classes/host/class.custom.host.manager.php');
        require_once(DUPX_INIT.'/classes/config/class.conf.srv.php');
        require_once(DUPX_INIT.'/classes/class.engine.php');
    }

    /**
     * init archive config
     * 
     * @throws Exception
     */
    public static function initArchive()
    {
        $GLOBALS['DUPX_AC'] = DUPX_ArchiveConfig::getInstance();
        if (empty($GLOBALS['DUPX_AC'])) {
            throw new Exception("Can't initialize config globals");
        }
    }

    /**
     * This function moves the error_log.php into the dup-installer directory.
     * It is called before including any other file so it uses only native PHP functions.
     * 
     * !!! Don't use any Duplicator function within this function. !!!
     * 
     * @param bool $reset
     * @return boolean
     */
    public static function initPhpErrorLog($reset = false)
    {
        if (!function_exists('ini_set')) {
            return false;
        }

        $logFile = DUPX_INIT.'/php_error__'.self::getPackageHash().'.log';

        if (file_exists($logFile) && !is_writable($logFile)) {
            if (!is_writable($logFile)) {
                return false;
            } else if ($reset && function_exists('unlink')) {
                @unlink($logFile);
            }
        }

        if (function_exists('error_reporting')) {
            error_reporting(E_ALL | E_STRICT);  // E_STRICT for PHP 5.3
        }

        @ini_set("log_errors", 1);
        if (@ini_set("error_log", $logFile) === false) {
            return false;
        }

        if (!file_exists($logFile)) {
            error_log("PHP ERROR LOG INIT");
        }

        return true;
    }

    /**
     * It is called before including any other file so it uses only native PHP functions.
     * 
     * !!! Don't use any Duplicator function within this function. !!!
     * 
     * @staticvar bool|string $packageHash
     * @return bool|string      // package hash or false if fail
     */
    public static function getPackageHash()
    {
        static $packageHash = null;
        if (is_null($packageHash)) {
            $searchStr    = DUPX_INIT.'/'.self::ARCHIVE_PREFIX.'*'.self::ARCHIVE_EXTENSION;
            $config_files = glob($searchStr);
            if (empty($config_files)) {
                $packageHash = false;
            } else {
                $config_file_absolute_path = array_pop($config_files);
                $config_file_name          = basename($config_file_absolute_path, self::ARCHIVE_EXTENSION);
                $packageHash               = substr($config_file_name, strlen(self::ARCHIVE_PREFIX));
            }
        }
        return $packageHash;
    }

    /**
     *  This function init all params before read from request
     * 
     */
    protected static function initParamsBase()
    {
        // GET PARAMS FROM REQUEST
        DUPX_Ctrl_Params::setParamsBase();

        // set log level from params
        DUPX_Log::setLogLevel();
        DUPX_Log::setPostProcessCallabck(array('DUPX_CTRL', 'renderPostProcessings'));

        $paramsManager         = DUPX_Paramas_Manager::getInstance();
        $GLOBALS['DUPX_DEBUG'] = $paramsManager->getValue(DUPX_Paramas_Manager::PARAM_DEBUG);
    }

    /**
     * init all installer files
     *
     * @throws Exception
     */
    protected static function initInstallerFiles()
    {
        if (!chdir(DUPX_INIT)) {
            // RSR TODO: Can't change directories
            throw new Exception("Can't change to directory ".DUPX_INIT);
        }

        //Restart log if user starts from step 0
        if (self::isInit()) {
            self::initLogHeader();

            // LOAD PARAMS AFTER LOG RESET
            $paramManager = DUPX_Paramas_Manager::getInstance();
            $paramManager->load(true);
            DUPX_Orig_File_Manager::getInstance()->init(false);
            DUPX_Orig_File_Manager::getInstance()->restoreAll(array(
                DUPX_ServerConfig::CONFIG_ORIG_FILE_USERINI_ID,
                DUPX_ServerConfig::CONFIG_ORIG_FILE_PHPINI_ID,
                DUPX_ServerConfig::CONFIG_ORIG_FILE_WEBCONFIG_ID,
                DUPX_ServerConfig::CONFIG_ORIG_FILE_HTACCESS_ID,
                DUPX_ServerConfig::CONFIG_ORIG_FILE_WPCONFIG_ID
            ));

            self::initParamsBase();

            DUPX_NOTICE_MANAGER::getInstance()->resetNotices();
            DUPX_Boot::initPhpErrorLog(true);
            DUP_PRO_Extraction::resetData();
            DUPX_DBInstall::resetData();
            DUPX_S3_Funcs::resetData();

            // update state only if isn't set by param overwrite
            DUPX_InstallerState::getInstance()->checkState(true, false);
        } else {
            // INIT PARAMS
            $paramManager = DUPX_Paramas_Manager::getInstance();
            $paramManager->load();
            DUPX_Orig_File_Manager::getInstance()->init(false);

            self::initParamsBase();
        }

        $paramManager->save();
    }

    protected static function initLogHeader()
    {
        if ($GLOBALS['LOG_FILE_HANDLE']) {
            @fclose($GLOBALS['LOG_FILE_HANDLE']);
        }
        $GLOBALS['LOG_FILE_HANDLE'] = @fopen($GLOBALS['LOG_FILE_PATH'], "w+");

        $archiveConfig = DUPX_ArchiveConfig::getInstance();
        $colSize       = 60;
        $labelPadSize  = 20;
        $os            = defined('PHP_OS') ? PHP_OS : 'unknown';

        DUPX_Log::info("********************************************************************************");
        DUPX_Log::info('* DUPLICATOR-PRO: Install-Log');
        DUPX_Log::info('* STEP-0 START @ '.@date('h:i:s'));
        DUPX_Log::info("* VERSION: {$archiveConfig->version_dup}");
        DUPX_Log::info('* NOTICE: Do NOT post to public sites or forums!!');
        DUPX_Log::info("********************************************************************************");


        $log = str_pad(str_pad('PACKAGE INFO', $labelPadSize, '_', STR_PAD_RIGHT).' '.'ORIGINAL SERVER', $colSize, ' ', STR_PAD_RIGHT).'|'.'CURRENT SERVER'."\n".
            str_pad(str_pad('OS', $labelPadSize, '_', STR_PAD_RIGHT).': '.$archiveConfig->version_os, $colSize, ' ', STR_PAD_RIGHT).'|'.$os."\n".
            str_pad(str_pad('PHP VERSION', $labelPadSize, '_', STR_PAD_RIGHT).': '.$archiveConfig->version_php, $colSize, ' ', STR_PAD_RIGHT).'|'.phpversion()."\n".
            "********************************************************************************";
        DUPX_Log::info($log, DUPX_Log::LV_DEFAULT);

        DUPX_Log::info("CURRENT SERVER INFO");
        DUPX_Log::info(str_pad('PHP', $labelPadSize, '_', STR_PAD_RIGHT).': '.phpversion().' | SAPI: '.php_sapi_name());
        DUPX_Log::info(str_pad('PHP MEMORY', $labelPadSize, '_', STR_PAD_RIGHT).': '.$GLOBALS['PHP_MEMORY_LIMIT'].' | SUHOSIN: '.$GLOBALS['PHP_SUHOSIN_ON']);
        DUPX_Log::info(str_pad('SERVER', $labelPadSize, '_', STR_PAD_RIGHT).': '.$_SERVER['SERVER_SOFTWARE']);
        DUPX_Log::info(str_pad('DOC ROOT', $labelPadSize, '_', STR_PAD_RIGHT).': '.DUPX_Log::varToString(DUPX_ROOT));
        DUPX_Log::info(str_pad('LOG FILE 644', $labelPadSize, '_', STR_PAD_RIGHT).': '.var_export($GLOBALS['CHOWN_LOG_PATH'], true));
        DUPX_Log::info(str_pad('REQUEST URL', $labelPadSize, '_', STR_PAD_RIGHT).': '.DUPX_Log::varToString($GLOBALS['URL_PATH']));
        DUPX_Log::info("********************************************************************************");
    }

    /**
     * return true if is the first installer call from installer.php
     * 
     * @return bool
     */
    public static function isInit()
    {
        // don't use param manager because isn't initialized
        $isFirstStep   = isset($_REQUEST[DUPX_Paramas_Manager::PARAM_CTRL_ACTION]) && $_REQUEST[DUPX_Paramas_Manager::PARAM_CTRL_ACTION] === "ctrl-step1";
        $isInitialized = isset($_REQUEST[DUPX_Paramas_Manager::PARAM_STEP_ACTION]) && !empty($_REQUEST[DUPX_Paramas_Manager::PARAM_STEP_ACTION]);
        return $isFirstStep && !$isInitialized;
    }

    /**
     * this function disables the shutdown function defined in the boot class
     */
    public static function disableBootShutdownFunction()
    {
        self::$shutdownFunctionEnaled = false;
    }

    /**
     * This function sets the shutdown function before the installer is initialized.
     * Prevents blank pages.
     * 
     * After the plugin is initialized it will be set as a shudwon ​​function DUPX_Handler::shutdown
     * 
     * !!! Don't use any Duplicator function within this function. !!!
     * 
     */
    public static function bootShutdown()
    {
        if (!self::$shutdownFunctionEnaled) {
            return;
        }

        if (($error = error_get_last())) {
            ?>
            <h1>BOOT SHUTDOWN FATAL ERROR</H1>
            <pre><?php
                echo 'Error: '.htmlspecialchars($error['message'])."\n\n\n".
                'Type: '.htmlspecialchars($error['type'])."\n".
                'File: '.htmlspecialchars($error['file'])."\n".
                'Line: '.htmlspecialchars($error['line'])."\n";
                ?></pre>
            <?php
        }
    }

    /**
     * this function is called before anything else. do not use duplicator functions because nothing is included at this level.
     * 
     * @return boolean
     */
    public static function phpVersionCheck()
    {
        if (version_compare(PHP_VERSION, self::MINIMUM_PHP_VERSION, '>=')) {
            return true;
        }
        $match = null;
        if (preg_match("#^\d+(\.\d+)*#", PHP_VERSION, $match)) {
            $phpVersion = $match[0];
        } else {
            $phpVersion = PHP_VERSION;
        }
        // no html
        echo 'This server is running PHP: '.$phpVersion.'. A minimum of PHP '.self::MINIMUM_PHP_VERSION.' is required to run the installer.'
        .' Contact your hosting provider or server administrator and let them know you would like to upgrade your PHP version.';
        die();
    }

    protected static function templatesInit()
    {
        $tpl = DUPX_Template::getInstance();
        $tpl->addTemplate(DUPX_Template::TEMPLATE_ADVANCED, DUPX_INIT.'/templates/default');
        $tpl->addTemplate(DUPX_Template::TEMPLATE_BASE, DUPX_INIT.'/templates/base', DUPX_Template::TEMPLATE_ADVANCED);
        $tpl->addTemplate(DUPX_Template::TEMPLATE_IMPORT_BASE, DUPX_INIT.'/templates/import-base', DUPX_Template::TEMPLATE_BASE);
        $tpl->addTemplate(DUPX_Template::TEMPLATE_RECOVERY, DUPX_INIT.'/templates/recovery', DUPX_Template::TEMPLATE_BASE);
        $tpl->setTemplate(DUPX_Template::TEMPLATE_ADVANCED);
    }
}