<?php namespace app\admin\controller;

use houdunwang\view\View;

class Article extends Common
{
    protected $db;

    /**
     * 自动执行的函数
     */
    public function __init()
    {
        $this->db = new \system\model\Article();
    }

    //动作
    public function index()
    {
        //此处书写代码...
        //获取所有数据
        $getAllData = $this->db->getAllData(2,0);
        //p($getAllData);die;
        View::with('getAllData', $getAllData);
        //获取
        return view();
    }

    /**
     * 文章添加
     */
    public function add()
    {
        if (IS_POST) {
            $res = $this->db->add();
            if ($res['valid']) {
                message($res['message'], u('index'), 'success');
            }
            message($res['message'], 'back', 'error');
        }
        //获取分类
        $cateData = $this->db->cateData();
        View::with('cateData', $cateData);
        //获取标签
        $tagData = $this->db->tagData();
        View::with('tagData', $tagData);
        return view();
    }

    /**
     * 文章修改
     */
    public function edit()
    {
        $aid = q('get.aid');
        if (IS_POST) {
            $res = $this->db->edit();
            if ($res['valid']) {
                message($res['message'], u('index'), 'success');
            }
            message($res['message'], 'back', 'error');
        }
        //获取分类
        $cateData = $this->db->cateData();
        View::with('cateData', $cateData);
        //获取标签
        $tagData = $this->db->tagData();
        View::with('tagData', $tagData);
        //获取旧数据
        $getOldData = $this->db->getOldData($aid);
        View::with('getOldData', $getOldData);
        //获取标签
        $oldTag = Db::table('article_tag')->where('article_aid', $aid)->lists('tag_tid');
        View::with('oldTag', $oldTag);
        return view();
    }

    /**
     *移除图片
     */
    public function moveImg()
    {
        if (IS_AJAX) {
            if (is_file($_POST['path'])) {
                unlink($_POST['path']);
                echo 1;
            }
            echo 0;
        }
    }
    /**
     * 删除到回收站
     */
    public function delRecycle(){
        $aid = q('get.aid');
        Db::table('article')->where('aid',$aid)->update(['is_recycle'=>1]);
        message('删除成功', u('recycle'), 'success');
    }
    /**
     * 回收站
     */
    public function recycle(){
        //获取所有数据
        $getAllData = $this->db->getAllData(2,1);
        //p($getAllData);die;
        View::with('getAllData', $getAllData);
        return view();
    }

    /**
     * 恢复数据
     */
    public function outRecycle(){
        $aid = q('get.aid');
        Db::table('article')->where('aid',$aid)->update(['is_recycle'=>0]);
        message('恢复成功', u('index'), 'success');
    }

    /**
     * 彻底删除
     */
    public function thoroughDel(){
        $aid = q('get.aid');
        $res = $this->db->thoroughDel($aid);
            if ($res) {
                message('删除成功', u('recycle'), 'success');
            }
            message('删除失败', 'back', 'error');
    }

//    /**
//     * 上传图片
//     */
//    public function upload(){
//
//            $files = File::upload();
//            $path = $files[0]['path'];
//            echo $path;
//    }
//
//    /**
//     * 移除IMG
//     */
//    public function delImg(){
//
//        if (IS_AJXA){
//
//            if (is_file($_POST['path']))
//            {
//                unlink($_POST['path']);
//            }
//            echo 1;
//        }
//    }


}
