<?php
/**
 * 配置文件 配置项不可删
 *
 * @author hawklim <www.hawklim.com>
 * @version $Id$
 * @copyright hawklim <www.hawklim.com>, 22 八月, 2013
 * @package application
 */

return array(
    'defaultController' => 'index',
    'defaultAction' => 'index',

    // 调试
    'debug' => true,
    'displayException' => 'true',

    // 路由模式 默认为pathinfo:index.php/index/index;
    // standard:index.php?c=index&a=inedx; rewrite:index/index
    'routeMode' => 'rewrite',
);
