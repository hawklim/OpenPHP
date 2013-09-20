<?php
/**
 * 包含系统引导文件类
 *
 * @author hawklim <www.hawklim.com>
 * @version $Id$
 * @copyright hawklim <www.hawklim.com>, 21 八月, 2013
 * @package system
 * @filesource
 */

namespace openphp\system;
use openphp\system\route\Route;
use openphp\system\System;
use openphp\system\exception\OpenException;

defined('OPEN_PATH') || define('OPEN_PATH', dirname(__FILE__));
defined('APP_PATH') || define('APP_PATH', dirname(__FILE__) . '/../application');

require OPEN_PATH . '/base/System.php';
require OPEN_PATH . '/base/common.php';

/**
 * 系统引导文件
 *
 * @package system
 * @author hawklim <www.hawklim.com>
 */

class Open extends System
{
    /**
     * 框架核心类名位置映射
     *
     * @var array
     */
    private static $coreClassMap = array(
        'openphp\system\route\Route' => '/base/Route.php',
        'openphp\system\System' => '/base/System.php',
        'openphp\system\controller\Controller' => '/base/Controller.php',
        'openphp\system\exception\OpenException' => '/base/Exception.php'
    );

    /**
     * 运行值
     *
     * @var array
     */
    public static $runs = array();

    /**
     * 系统初始化
     *
     * @return void
     */
    public static function init ()
    {
        set_error_handler(array(__CLASS__, '_errorHandler'));
        set_exception_handler(array(__CLASS__, '_exceptionHandler'));
        spl_autoload_register(array(__CLASS__, '_autoload'));
        register_shutdown_function(array(__CLASS__, '_shutdownHandler'));
    }

    /**
     * 控制器引导方法
     *
     * @return void
     */
    public static function run()
    {
        self::init();
        $_GET = Route::dispatch();
        $c = isset($_GET['c']) ? $_GET['c'] : getConfig('defaultController');
        $a = isset($_GET['a']) ? $_GET['a'] : getConfig('defaultAction');

        self::$runs = array(
            'currentController' => $c,
            'currentAction' => $a
        );

        $controller = ucfirst($c) . 'Controller';

        $app = new $controller();
        $app -> $a();
    }

    /**
     * 类自动加载
     *
     * @param string $class 类名
     * @return void
     */
    private static function _autoload($class)
    {
        if(isset(self::$coreClassMap[$class])) {
            // 核心类库无需使用requireOnce，全部new时一次性在此加载
            require(OPEN_PATH . self::$coreClassMap[$class]);
        }elseif(substr($class, -10) == 'Controller') {
            requireOnce(APP_PATH . '/controllers/' . $class . '.php', $class);
        }elseif(substr($class, -5) == 'Model'){
            requireOnce(APP_PATH . '/models/' . $class . '.php', $class);
        }
    }

    /**
     * 捕获未处理异常
     *
     * @param object $e exception实例对象
     * @return void
     */
    public static function _exceptionHandler($e)
    {
        if(getConfig('displayException')) {
            $exception = '<strong>[异常]</strong>' . '<br/>';
            $exception .= '代码：' . $e->getCode() . '<br/>';
            $exception .= '信息：' . $e->getMessage() . '<br/>';
            $exception .= '文件：' . $e->getFile() . '<br/>';
            $exception .= '行号：' . $e->getLine() . '<br/><br/>';

            echo $exception;
        }
    }

    /**
     * 处理notice等一般错误
     *
     * @return void
     */
    public static function _errorHandler($errno, $errstr, $errfile, $errline)
    {
        if(getConfig('debug')) {
            $error = '<strong>[错误]</strong>' . '<br/>';
            $error .= '级别: ' . $errno . '<br/>';
            $error .= '信息：' . $errstr . '<br/>';
            $error .= '文件：' . $errfile . '<br/>';
            $error .= '行号：' . $errline . '<br/><br/>';

            echo $error;
        }
    }

    /**
     * 处理Fatal error等错误
     *
     * @return void
     */
    public static function _shutdownHandler()
    {
        if(getConfig('debug') && $error = error_get_last())
            var_dump($error);
    }
    /**
     * 错误显示
     *
     * @return void
     */
    private static function _error()
    {
        // var_dump(debug_backtrace());
    }
} // END class Open
