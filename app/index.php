<?php
/**
 * 示例入口文件
 *
 * @author hawklim <www.hawklim.com>
 * @version $id$
 * @copyright hawklim <www.hawklim.com>, 21 八月, 2013
 * @package application
 */
define('APP_PATH', dirname(__FILE__));

require '../framework/open.php';

openphp\system\Open::run();
