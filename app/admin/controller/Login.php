<?php
/**
 * Created by PhpStorm.
 * User: wanganqi
 * Date: 2017/2/18
 * Time: 上午9:53
 */

namespace app\admin\controller;


use system\model\User;

class Login
{
    public function index(){
        if (IS_POST){
            $res = (new User())->login();
            if ($res[0]){
                message($res[1],u('admin.index.index'),'success',2);
            }
            message($res[1],'back','error',2);
        }
        return view();
    }
    public function code(){
        Code::num(1)->make();
    }
}