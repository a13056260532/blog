<?php namespace app\admin\controller;

class Link extends Common {
    protected $db;
    public function __init(){
        $this->db = new \system\model\Link();
    }
    //动作
    public function index(){
    //此处书写代码...
        //获取旧数据
        $oldData = $this->db->getoldData();
        View::with('oldData',$oldData);
        return view();
    }

    /**
     * 添加友联
     */
    public function add(){
        if (IS_POST){
            $res = $this->db->add();
            if ($res){
                message('添加成功',u('index'),'success');
            }
            message('添加失败',"back",'error');
        }
        return view();
    }

    /**
     * 编辑友链
     */
    public function edit(){
        //编辑
        if (IS_POST){
            if ($this->db->edit()){
                message('编辑成功',u('index'),'success');
            }
            message('编辑失败',"back",'error');
        }
        $lid = q('get.lid');
        //获取旧数据
        $oldData = Db::table('link')->where('lid',$lid)->first();
        View::with('oldData',$oldData);
        //p($oldData);die;
        return view();
    }

    /**
     * 删除友链
     */
    public function del(){
        $lid = q('get.lid');
        Db::table('link')->where('lid',$lid)->delete();
        message('添加成功',u('index'),'success');
    }
}
