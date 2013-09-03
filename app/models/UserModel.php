<?php
/**
 * 示例模型类
 *
 * @package application.models
 * @author hawklim <www.hawklim.com>
 */
class UserModel
{
    /**
     * 示例方法
     *
     * @return string
     * @author hawklim <www.hawklim.com>
     */
    public function getUserName($nickname)
    {
        $a = array('hawk'=>'zhihang');
        return $a[$nickname];
    }
} // END class UserModel
