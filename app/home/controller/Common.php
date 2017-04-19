<?php namespace app\home\controller;

class Common{
    //动作
    public function __construct()
    {
        //此处书写代码...
        //获取设置项
        $webset = $this->getWebset();
        View::with('webset',$webset);
        //获取分类列表
        $cateData = $this->getCateData();
        View::with('cateData',$cateData);
        $cateDataTop =$this->getCateDataTop();
        View::with('cateDataTop',$cateDataTop);
        //获取标签数据
        $tagData = $this->getTagData();
        View::with('tagData',$tagData);
        //获取友情链接
        $linkData = $this->getLinkData();
        View::with('linkData',$linkData);
        //获取2片最新文章
//        $newArticleData =

    }

    /**
     * 获取配置项数据
     */
    public function getWebset(){
        return Db::table('webset')->lists('name,value');
    }

    /**
     * 获取分类列表数据
     */
    public function getCateData(){
        $cataAllData = Db::table('category')->get();
        foreach ($cataAllData as $k=>$v){
            $cataAllData[$k]['total']=Db::table('article')->where('category_cid',$v['cid'])->where('is_recycle',0)->count();
        }
        return $cataAllData;
    }
    /**
     * 获取分类列表数据
     */
    public function getCateDataTop(){
        $cataAllData = Db::table('category')->limit(3)->get();

        return $cataAllData;
    }
    /**
     * 获取标签数据
     */
    public function getTagData(){
        return Db::table('tag')->get();
    }



    /**
     * 获取友情链接数据
     */
    public function getLinkData(){
        return Db::table('link')->lists('lname,url');
    }

    /**
     *  获取文章数据
     */
    public function getArticleData(){
       return Db::table('article')
            ->join('category','category_cid','=','cid')
            ->where('is_recycle',0);
    }
    /**
     *给数据添加tag数据组
     */
    public function setDateTag($articleData){
        foreach ($articleData as $k=>$v){
            $articleData[$k]['tag'] = Db::table('tag')
                ->join('article_tag','tid','=','tag_tid')
                ->where('article_aid',$v['aid'])->lists('tid,tname');
        }
        return $articleData;
    }
}
