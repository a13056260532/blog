<?php
/**
 * Created by PhpStorm.
 * User: wanganqi
 * Date: 2017/2/18
 * Time: 上午10:49
 */

namespace app\admin\controller;


use system\model\Category;

class cate extends Common
{
    protected $db;

    public function out(){
        Session::flush();
        Session::del('name');
        message('退出成功',u('admin.index.index'),'success');
    }
    public function __init(){
        $this->db = new Category();
    }
    /**
     * 首页操作
     * @return mixed
     */

    public function index(){
        $data = Db::table('category')->orderBy('cid','asc')->get();
        $data = Arr::tree($data, 'cname', $fieldPri = 'cid', $fieldPid = 'pid');
        View::with('data',$data);
        return view();
    }

    /**
     * 添加顶级分类
     * @return mixed
     */
    public function addCate(){
        if (IS_POST){
            //去模型操作
            $res = $this->db->add();
            if ($res){
                message('添加顶级分类成功',u('admin.cate.index'),'success',2);
            }
            message('添加顶级分类失败','back','error',2);
        }
        return view();
    }
    /**
     * 添加子类
     */
    public  function addson(){


        if (IS_POST){
            //执行添加子类
            $res = $this->db->gain();
            if ($res){
                message('添加子集分类成功',u('admin.cate.index'),'success',2);
            }
            message('添加子集分类失败','back','error',2);
        }
        //获取点击的分类所属
        $res = Category::where('cid',$_GET['cid'])->first()->toArray();
        View::with('oldData',$res);
        return view();
    }
    /**
     * 编辑类
     */
    public  function edit(){
        if (IS_POST){

            //使用模型操作
            $res = $this->db->edit(q('get.cid'));
            if ($res){
                message('编辑分类成功',u('admin.cate.index'),'success',2);
            }
            message('编辑分类失败','back','error',2);
        }
        //获取旧数据
        $oldDate = Category::where('cid',$_GET['cid'])->first()->toArray();
        View::with('oldDate',$oldDate);
        //所属分类(除去自己和自己的子集)
        $allDate = Category::get()->toArray();
        View::with('allDate',$allDate);
        $flDate = $this->db->findson(q('get.cid'));
        $flDate = Arr::tree($flDate, 'cname', $fieldPri = 'cid', $fieldPid = 'pid');
//        p($oldDate);
//        p($flDate);die;
        View::with('flDate',$flDate);
        //p($oldDate);die;
        return view();
    }
    public function del(){
        //echo q('get.cid');
        //获取删除哪一条
        $cid = q('get.cid');
        //去模型操作
        $res = $this->db->del($cid);
        if ($res){
            message('删除分类成功',u('admin.cate.index'),'success',2);
        }
        message('删除分类失败','back','error',2);
    }
}
