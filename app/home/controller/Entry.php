<?php namespace app\home\controller;



class Entry extends Common {
	public function index() {
	    //头部设置
        $headConf = ['title'=>'hdphp教学博客--首页'];
        View::with('headConf',$headConf);
        //获取article数据
        $articleData = $this->getArticleData()->field('aid,title,sendtime,author,digest,thumb,cid,cname')
            ->get();;
        //将所属标签加入内
        $articleData = $this->setDateTag($articleData);
        //p($articleData);
        View::with('articleData',$articleData);
		return view();
	}
}