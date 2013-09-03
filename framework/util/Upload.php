<?php
/**
 * 包含文件上传类
 *
 * @author hawklim <www.hawklim.com>
 * @version $Id$
 * @copyright hawklim <www.hawklim.com>, 18 八月, 2013
 * @package util.upload
 * @filesource
 */

require_once('Thumbnail.php');

/**
 * 文件上传类
 *
 * @package util.upload
 * @author hawklim <www.hawklim.com>
 */

class Upload
{

    /**
     * 默认配置
     *
     * @var array
     */
    private $config = array(
        'fileField' => '',          //表单FILE控件名称
        'destPath' => '',           //存储路径
        'isThumb' => 0,             //是否生成缩略图，0或1
        'fileExts' => '',           //允许上传的扩展名，如 jpg|txt|doc, 留空则默认允许全部类型
        'maxSize' => 0,              //允许上传的最大尺寸，单位为字节
        'maxThumbWidth' => 200,      //缩略图最大宽度
        'maxThumbHeight' => 200,     //缩略图最大高度
        'scale' => 0,
        'inflate' => 0,
        'destNameType' => 0             // 目标文件的命名方式 0:date, 1:原名 2:md5
    );

    /**
     * $_FILES[]数组
     *
     * @var array
     */
    private $file = array();

    /**
     * 上传文件信息
     *
     * @var array
     */
    private $fileInfo = array();

    /**
     * 错误信息
     *
     * @var array
     */
    private $error = array();

    /**
     * 构造函数
     *
     * @param array $set 上传配置
     * @return void
     */
    public function __construct($set)
    {
        foreach ($set as $key => $value) {
            if (isset($this->config[$key])) {
                $this->config[$key] = $value;
            }
        }
    }

    /**
     * $_FILES赋值
     *
     * @return void
     */
    private function _setFile()
    {
        $this->file = @$_FILES[$this->config['fileField']];
    }

    /**
     * 设置目标文件路径
     *
     * @return void
     */
    private function _setDestFile()
    {
        $this->fileInfo['destFile'] = $this->config['destPath'] . '/'
            . $this->fileInfo['destName'] . '.' . $this->fileInfo['ext'];
    }

    /**
     * 获取扩展名
     *
     * @return void
     */
    private function _getExt()
    {
        $this->fileInfo['ext'] = pathinfo($this->file['name'], PATHINFO_EXTENSION);
    }

    /**
     * 设置目标文件名
     *
     * @return void
     */
    private function _setDestName()
    {
        switch ($this->config['destNameType']) {
            case 0:
                $this->fileInfo['destName'] = date('YmdHis', time());
                break;
            case 1:
                $this->fileInfo['destName'] = $this->_switchCharset(
                    $this->fileInfo['name'], 'utf-8', 'gbk');
                break;
            case 2:
                $this->fileInfo['destName'] = md5($this->fileInfo['name']);
                break;
            default:
                $this->fileInfo['destName'] = date('YmdHis', time());
                break;
        }
    }

    /**
     * 检查文件是否超出规定大小
     *
     * @return boolean
     */
    private function _isAllowedSize()
    {
        $maxSize = (int)$this->config['maxSize'];
        if($maxSize > 0 && $this->file['size'] > $maxSize) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * 检查是否规定文件
     *
     * @return boolean
     */
    private function _isAllowedExt()
    {
        $this->_getExt();
        $fileExts = !empty($this->config['fileExts']) ? explode('|', $this->config['fileExts']) : array();
        if(count($fileExts) == 0 || in_array($this->fileInfo['ext'], $fileExts)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * 设置给用户看的文件信息
     *
     * @return void
     */
    private function _setFileInfo()
    {
        $this->fileInfo['type'] = $this->file['type'];
        // $this->fileInfo['name'] = pathinfo($this->file['name'], PATHINFO_FILENAME);
        $this->fileInfo['name'] = substr($this->file['name'], 0, strrpos($this->file['name'], '.'));
        // $this->fileInfo['name'] = reset(explode('.', $this->file['name']));
    }

    /**
     * 转换文件编码 提供给windows服务器用户使用
     *
     * @return void
     */
    private function _switchCharset($str, $from='gbk', $to='utf-8')
    {
        $from   = strtoupper($from) == 'UTF8' ? 'utf-8' : $from;
        $to     = strtoupper($to) == 'UTF8' ? 'utf-8' : $to;
        if (strtoupper($from) === strtoupper($to)
            || empty($str)
            || (is_scalar($str)
            && !is_string($str))
        ) {
            return $str;
        }
        if (function_exists('mb_convert_encoding')) {
            return mb_convert_encoding($str, $to, $from);
        } elseif (function_exists('iconv')) {
            return iconv($from, $to, $str);
        } else {
            return $str;
        }
    }

    /**
     * 检查错误
     *
     * @return boolean
     */
    private function _check($file)
    {
        if(empty($file)) {
            $this->error[] = '文件为空或上传超出服务器规定大小';
            return false;
        }
        if($file['error'] != 0) {
            switch ($file['error']) {
            case 1:
                $this->error[] = '上传大小超出upload_max_filesize';
                break;
            case 2:
                $this->error[] = '上传大小超出max_file_size';
                break;
            case 3:
                $this->error[] = '没上传完全';
                break;
            case 4:
                $this->error[] = '没指定上传文件';
                break;
            case 6:
                $this->error[] = '临时目录不存在';
                break;
            case 7:
                $this->error[] = '文件无法写入磁盘';
                break;
            case 8:
                $this->error[] = 'php扩展导致上传失败';
                break;
            default:
                $this->error[] = '未知错误';
                break;
            }
            return false;
        }
        if( !is_uploaded_file($file['tmp_name'])) {
            $this->error[] = '非法操作';
            return false;
        }
        if( !$this->_isAllowedSize() ) {
            $this->error[] = '文件超出系统规定大小';
            return false;
        }
        if ( !$this->_isAllowedExt() ) {
            $this->error[] = '文件格式不正确';
            return false;
        }

        $this->_setFileInfo();
        return true;
    }

    /**
     * 缩放
     *
     * @return void
     */
    private function _resize()
    {
        $thumb = new Thumbnail($this->config['maxThumbWidth'], $this->config['maxThumbHeight']);
        $thumb->loadFile($this->fileInfo['destFile']);
        $thumb->buildThumb($this->config['destPath'] .'/thumb_'. $this->fileInfo['destName']. '.'. $this->fileInfo['ext'] );
    }

    /**
     * 获取文件信息
     *
     * @return array
     */
    public function data()
    {
        return $this->fileInfo;
    }

    /**
     * 获取错误信息
     *
     * @return array
     */
    public function error()
    {
        return $this->error;
    }

    /**
     * 执行上传操作
     *
     * @return boolean
     */
    public function upload()
    {
        $this->_setFile();
        $file = $this->file;
        if($this->_check($file)) {
            $this->_setDestName();
            $this->_setDestFile();
            if(!move_uploaded_file($file['tmp_name'], $this->fileInfo['destFile'])) {
                if(!copy($file['tmp_name'], $this->fileInfo['destFile'])) {
                    return false;
                }
            }
            if( $this->config['isThumb'] == 1) {
                if( in_array($this->fileInfo['type'], array('image/jpeg', 'image/png', 'image/gif' ))) {
                    $this->_resize();
                } else {
                    $this->error[] = '文件格式非本系统压缩格式';
                    return false;
                }

            }
        } else {
            return false;
        }

        return true;
    }
} // END class Upload
