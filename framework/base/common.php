<?php
/**
 * 公有方法
 *
 * @author hawklim <www.hawklim.com>
 * @version $Id$
 * @copyright hawklim <www.hawklim.com>, 24 八月, 2013
 * @package system.helper
 * @filesource
 */
use openphp\system\exception\OpenException;

/**
 * 配置
 *
 * @var array
 */
$config = require(APP_PATH . '/config/config.php');

/**
 * 输出错误信息
 *
 * @param string $msg 消息
 * @return void
 */
function error($msg)
{
    echo $msg;
}

/**
 * 获取配置项
 *
 * @param string $key 配置项键值 只能 defaultcontroller 或 Db/port
 * @return mixed
 */
function getConfig($key) {
    global $config;
    $item = explode('/', $key);

    if(count($item) > 1)
        $value = $config[$item[0]][$item[1]];
    else $value = $config[$item[0]];

    if(isset($value)){
        return $value;
    } else{
        throw new OpenException("配置项 <strong> $key </strong> 不存在");
        return false;
    }
}

/**
 * 加载文件 只在首次使用时加载
 *
 * @param string $filePath 文件路径
 * @param string $fileName 文件名 一般为类名， 视图则为 public/header 格式
 * @param mixed $extra 额外数据，一般可为视图数据
 * @return void
 */
function requireOnce($filePath, $fileName, $extra = '')
{
    static $loaded = array();

    if(isset($loaded[$fileName])
        && $loaded[$fileName] === true
    ) {
        return;
    }

    $filePath = str_replace('\\', '/', $filePath);

    !empty($extra) && is_array($extra) && extract($extra);

    if(substr($fileName, -10) == 'Controller')
        $type = '控制器';
    elseif(substr($fileName, -5) == 'Model')
        $type = '模型';
    elseif(strpos($filePath, '/views/'))
        $type = '视图';
    else $type = '';

    if(file_exists($filePath)) {
        $loaded[$filePath] = true;
        require $filePath;
    } else {
        throw new OpenException("$type <strong> $fileName </strong> 不存在");
    }
}
