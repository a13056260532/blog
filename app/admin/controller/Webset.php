<?php namespace app\admin\controller;

class Webset extends Common {
    //动作
    public function index(){
    //此处书写代码...
        if (IS_POST){
            //p($_POST);
            $res = (new \system\model\Webset())->updateValue();
            if ($res){
                message('修改成功',u('index'),'success');
            }
            message('配置值不能为空',u('index'),'success');
        }
        //获取旧数据
        $oldData = Db::table('webset')->get();
        //p($oldData);
        View::with('oldData',$oldData);
        return view();
    }
}
