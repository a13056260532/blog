<?php namespace app\home\controller;

use system\model\Category;

class ListPage extends Common {
    //动作
    public function index($tid=null,$cid=null){
    //此处书写代码...
        View::with('cid',$cid);
        //判断是是分类
        if (!is_null($cid)){

            //头部设置
            $headConf = ['title'=>'hdphp教学博客--分类'];
            View::with('headConf',$headConf);
            //找到自己的自己还有自己
            $cids =(new Category())->getSon(Db::table('category')->get(),$cid);
            $cids[]=$cid;
            $header = [
                'name'=>'分类',
                'value'=>Db::table('category')->where('cid',$cid)->pluck('cname'),
                'count'=>Db::table('article')->whereIn('category_cid',$cids)->count(),
            ];
            //获取所有文章
            $articleData = $this->getArticleData()
                ->whereIn('cid',$cids)->field('aid,title,sendtime,author,digest,thumb,cid,cname')
                ->get();
            //设置文章数据tag字段
            $articleData = $this->setDateTag($articleData);
        }
        /*
         * 判断是否是标签
         */
        if (!is_null($tid)){
            //头部设置
            $headConf = ['title'=>'hdphp教学博客--标签'];
            View::with('headConf',$headConf);
            //设置第一部分的内容
            $header = [
                'name'=>'标签',
                'value'=>Db::table('tag')->where('tid',$tid)->pluck('tname'),
                'count'=>Db::table('article_tag')->where('tag_tid',$tid)->count(),
            ];
            //获取文章内容数据
            $articleData = Db::table('category')
                ->join('article','cid','=','category_cid')
                ->join('article_tag','aid','=','article_aid')
                ->where('tag_tid',$tid)->get();
            //给文章数据添加tag字段
            $articleData = $this->setDateTag($articleData);
        }

        View::with('articleData',$articleData);
        View::with('header',$header);
        return view();
    }
}
