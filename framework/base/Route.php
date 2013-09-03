<?php
/**
 * 包含路由类
 *
 * @author hawklim <www.hawklim.com>
 * @version $Id$
 * @copyright hawklim <www.hawklim.com>, 21 八月, 2013
 * @package system.route
 * @filesource
 */

namespace openphp\system\route;

/**
 * 路由类
 *
 * @package system.route
 * @author hawklim <www.hawklim.com>
 */
class Route
{
    /**
     * 构造函数
     *
     * @return void
     */
    function __construct()
    {

    }

    /**
     * 路由调度
     *
     * @return array $params URL参数
     */
    public static function dispatch()
    {
        $routeMode = getConfig('routeMode');
        $params = array();

        switch ($routeMode) {
        case 'standard':
            // $pathinfo = $_SERVER['QUERY_STRING'];
            // $querys = explode('&', $pathinfo);
            // foreach ($querys as $value) {
            // $query = explode('=', $value);
            // isset($query[0]) && isset($query[1]) && $params[$query[0]] = $query[1];
            // }
            break;
        case 'rewrite':
        default:
            if(isset($_SERVER['PATH_INFO'])
                && ($pathinfo = trim($_SERVER['PATH_INFO'],'/'))
                && !empty($pathinfo)
            ) {

                $pathParams = explode('/', $pathinfo);
                $params['c'] = array_shift($pathParams);
                $params['a'] = array_shift($pathParams);
                $count = count($pathParams);
                for ($i = 0; $i < $count; $i+=2) {
                    isset($pathParams[$i])
                        && isset($pathParams[$i+1])
                        && $params[$pathParams[$i]] = $pathParams[$i+1];
                }
            }
            break;
        }
        return array_merge($params, $_GET);
    }

    /**
     * 获取路径参数
     *
     * @return array $pathParams
     */
    public static function getPathParams()
    {
        $pathinfo = $_SERVER['PATH_INFO'];
        if (isset($pathinfo)) {

        } else {

        }

    }

} // END class Route
