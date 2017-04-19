<?php namespace system\model;

use houdunwang\model\Model;

/**
 * Created by PhpStorm.
 * User: wanganqi
 * Date: 2017/2/18
 * Time: 上午10:10
 */
class User extends Model
{
    protected $table = "user";

    public function login()
    {

        //1.接收数据
        //p(Request::post());die;
        //2.验证是否为空以及验证码
        Validate::make([
            ['username', 'isnull', '用户名不能为空', 3,3],
            ['password', 'isnull', '密码不能为空', 3,3],
            //['code', 'captcha', '验证码不正确', 3,3]
        ]);
        //3.比对数据库
//        p(Request::query('post.username'));
//        p(Crypt::encrypt($_POST['password']));
//        die;
        $res = Db::table('user')->where('username', Request::query('post.username'))->where('password', Crypt::encrypt($_POST['password']))->first();
        if (!$res) {
            return ['false', '您的账号密码不正确'];
        }
        Session::set('uid', $res['uid']);
        Session::set('username', $res['username']);
        return ['true', '登陆成功'];

        //4.存入session
        //5.返回

    }
}