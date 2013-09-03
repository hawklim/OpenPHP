<?php
/**
 * 包含示例控制器
 *
 * @author hawklim <www.hawklim.com>
 * @version $Id$
 * @copyright hawklim <www.hawklim.com>, 21 八月, 2013
 * @package application.controllers
 */
use openphp\system\controller\Controller;
/**
 *  Index控制器
 *
 * @package application.controllers
 * @author hawklim <www.hawklim.com>
 */

class IndexController extends Controller
{
    /**
     * 构造函数
     *
     * @return void
     */
    function __construct()
    {
        $this->loadModel('User');
    }

    /**
     * 示例函数index
     *
     * @return void
     */
    public function index()
    {
        var_dump($this->User);
        echo 'OK this is index, you can try Index/show to test the view';
    }

    /**
     * 示例函数show
     *
     * @return void
     */
    public function show()
    {
        $name = $this->User->getUserName('hawk');

        $this->loadView(array('name'=>$name), 'index/show');
    }
} // END class IndexController
