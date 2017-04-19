<?php namespace app\admin\controller;
/**
 * Created by PhpStorm.
 * User: wanganqi
 * Date: 2017/2/18
 * Time: 上午9:55
 */




class Common
{
    public function __construct()
    {
        if (!Session::get('uid')){
            $url = u('admin.login.index');
            header("location:{$url}");
        }
        if (method_exists($this,'__init')){
            $this->__init();
        }
    }
}