<?php namespace app\home\controller;

class Content extends Common
{
    //动作
    public function index($aid)
    {


        //此处书写代码...
        //获得文章数据
        $articleData = Db::table('article')
            ->join('article_data', 'article_aid', '=', 'aid')
            ->where('aid', $aid)->get();
        //给文章数据添加tag数组
        $articleData = $this->setDateTag($articleData);
        //将数组换为一维数组
        $articleData = current($articleData);
        View::with('articleData',$articleData);
        //头部设置
        $headConf = ['title'=>$articleData['title']];
        View::with('headConf',$headConf);
        return view();
    }
}
