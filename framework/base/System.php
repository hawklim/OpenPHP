<?php
/**
 * 包含系统基类
 *
 * @author hawklim <www.hawklim.com>
 * @version $Id$
 * @copyright hawklim <www.hawklim.com>, 22 八月, 2013
 * @package system
 * @filesource
 */

namespace openphp\system;
use openphp\system\Open;
use openphp\system\exception\OpenException;
/**
 * 系统基类
 *
 * @package system
 * @author hawklim <www.hawklim.com>
 */
class System
{
    /*
     * function __construct()
     * {
     *     self::$instance = & $this;
     * }
     * public static function & get_instance() {
     *     return  self::$instance;
     * }
     */

    /**
     * 加载过的类
     *
     * @var array
     */
    // private static $loaded = array();

    /**
     * 判断是否加载过
     *
     * @return void
     */
    // private function isLoaded($class)
    // {
        // if (isset(self::$loaded[$class]))
            // return;
    // }
    /**
     * 加载模型类
     *
     * @param string $model 模型
     * @return object
     */
    public function loadModel($model) 
    {
        $modelName = ucfirst($model).'Model';
        $this->$model= new $modelName;
    }

    /**
     * 加载视图
     *
     * @param mixed $view 视图的字符串或数组表示 用 '/' 分离 如Index/show.
     * 用数组表示可按顺序载入多个视图 array('public/header','index/show')
     * @param array $data 视图数据
     * @return void
     */
    public function loadView($data = array(), $views = '') 
    {
        if(empty($views)) {
            $view = array(
                Open::$runs['currentController'],
                Open::$runs['currentAction']
            );
        }elseif(is_string($views)) {
            $view = explode('/', $views);
        }elseif(is_array($views)) {
            foreach ($views as $value) {
                $view = explode('/', $value);
                requireOnce(APP_PATH . "/views/{$view[0]}/{$view[1]}.php",
                    "{$view[0]}::{$view[1]}", $data);
            }
            return;
        }
        $path = APP_PATH . "/views/{$view[0]}/{$view[1]}.php";
        requireOnce($path, "{$view[0]}::{$view[1]}", $data);
    }

    /**
     * 加载组件
     *
     * @param string $util 组件名称 如 Upload
     * @param array $config
     * @return void
     */
    public function loadUtil($util, $config = array())
    {
        $utilName = ucfirst($util);

        if(empty($config))
            $config = getConfig(lcfirst($util));

        require OPEN_PATH . '/util' . $utilName . '.php';

        $this->$util = new $utilName($config);
    }

} // END class System
