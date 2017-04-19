<?php namespace app\admin\controller;


class Tag extends Common
{
    protected $db;

    //自动加载函数
    public function __init()
    {
        $this->db = new \system\model\Tag();
    }

    //动作
    public function index()
    {
        //此处书写代码...
        //获取数据
        $data = Db::table('tag')->orderBy('tid','asc')->get();
        View::with('data', $data);
        return view();
    }

    /**
     * 添加标签
     * @return mixed
     */
    public function add()
    {
        //表单提交
        if (IS_POST) {
            //执行模型添加方法
            $res = $this->db->add();
            if ($res) {
                message('添加标签成功', u('admin.tag.index'), 'success', 2);
            }
            message('添加标签失败', 'back', 'error', 2);
        }
        return view();
    }

    /**
     * 编辑标签
     */
    public function edit()
    {
        if (IS_POST){
            $res = $this->db->edit();
            if ($res) {
                message('编辑标签成功', u('admin.tag.index'), 'success', 2);
            }
            message('编辑标签失败', 'back', 'error', 2);
        }
        //获取旧数据
        $tid = $_GET['tid'];
        $oldData = Db::table('tag')->where('tid', $tid)->first();
        //提取数据
        View::with('oldData', $oldData);
        //加载模板
        return view();
    }
    /**
     * 标签删除
     */
    public function del(){
        $res = $this->db->del();
        if ($res) {
            message('删除标签成功', u('admin.tag.index'), 'success', 2);
        }
        message('删除标签失败', 'back', 'error', 2);

    }
}
