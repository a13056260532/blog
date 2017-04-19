<?php
/**
 * Created by PhpStorm.
 * User: wanganqi
 * Date: 2017/2/18
 * Time: 上午11:07
 */

namespace system\model;


use houdunwang\model\Model;

class Category extends Model
{
    protected $table='category';

    //允许填充的字段
    protected $allowFill = ['*'];
    //自动判断
    protected $validate=[
        ['cname','isnull','分类名称不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['ctitle','isnull','分类标题不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['cdes','isnull','分类描述不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['ckeywords','isnull','分类关键字不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['csort','isnull','分类排序不能为空',self::MUST_VALIDATE,self::MODEL_BOTH],
    ];
    //添加数据库
    public function add(){
        //p($_POST);die;
        return (new Category)->save($_POST);
    }

    /**
     * 添加子类
     */
    public function gain(){
        //保存数据，并返回值
       return $this->save($_POST);
    }
    /**
     * 编辑
     */
    public function edit($cid){
        $data = $_POST;
        //更新数据
        $model = Category::find($cid);
        $model->cname = $data['cname'];
        $model->ctitle = $data['ctitle'];
        $model->cdes = $data['cdes'];
        $model->ckeywords = $data['ckeywords'];
        $model->csort = $data['csort'];
        $model->pid = $data['pid'];
        return  $model->save();

    }
    /**
     * 找子集
     */
    public function findson($cid){
        $res = $this->findme($cid);
        $res[]= $cid;
        $arr =$this::table('category')->whereNotIn('cid',$res)->get()->toArray();
        return $arr;
    }
    /**
     * 找自己
     * @param $data	数组数据
     * @param $cid	寻找哪一个分类的自己，当前分类cid
     */
    public function getSon($data,$cid)
    {
        static $temp = [];
        foreach($data as $k=>$v)
        {
            if($v['pid']==$cid){
                $temp[] = $v['cid'];
                $this->getSon($data,$v['cid']);
            }
        }
        return $temp;
    }
    /**
     * 找自己
     */
    public function findme($cid){
        //定义静态数组
        static $arr=[];
        //查询pid等于cid的数组
        $res = Category::where('pid',$cid)->get();
        //如果查询有结果就进行遍历直到没有结果就返回
        if ($res){
            $res = $res->toArray();
            //遍历数组
            foreach ($res as $k=>$v){
                $arr[]= $v['cid'];
                $this->findme($v['cid']);
            }
        }
        return $arr;
    }

    /**
     * 删除
     * @param $cid
     * @return mixed
     */
    public function del($cid){
        //获取当前分类的pid
        $pid = $this->where('cid',$cid)->first()['pid'];
        //提升他子集的等级
        $this->where('pid',$cid)->update(['pid'=>$pid]);
        //执行删除
        $res = $this::delete($cid);
        return $res;

    }
    /**
     * 提升自己等级
     */
    public function upgrade($cid,$pid){
        //查询pid等于cid的数组
        $res = Category::where('pid',$cid)->get()->toArray();
            //遍历数组
            foreach ($res as $v){
            }
    }
}