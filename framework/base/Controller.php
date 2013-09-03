<?php
/**
 * 控制器基类
 *
 * @author hawklim <www.hawklim.com>
 * @version $Id$
 * @copyright hawklim <www.hawklim.com>, 22 八月, 2013
 * @package system.base
 * @filesource
 */
namespace openphp\system\controller;
use openphp\system\exception\OpenException;

/**
 * 控制器基类
 *
 * @package system.base
 * @author hawklim <www.hawklim.com>
 */
class Controller extends \openphp\system\System 
{
    public function __call($method, $params) 
    {
        throw new OpenException('操作 <strong>' . $method . "</strong> 不存在");
    }
}
