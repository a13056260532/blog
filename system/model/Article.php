<?php namespace system\model;
use houdunwang\db\Db;
use houdunwang\model\Model;
class Article extends Model{
	//数据表
	protected $table = "article";

	//允许填充字段
	protected $allowFill = ['*'];



	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
        ['title','isnull','请填写标题',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['thumb','isnull','请上传缩略图',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['digest','isnull','请填写文章摘要',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['author','isnull','请填写文章作者',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['keywords','isnull','请填写关键字',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['category_cid','isnull','请选择文章分类',3,3],
	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
        ['sendtime','time','function',self::MUST_AUTO,self::MODEL_INSERT],
        ['user_uid','getUid','method',self::MUST_AUTO,self::MODEL_BOTH],
	];
    public function getUid($val,$data)
    {
//        p($data);
//        p($val);
//        die;
        return 1;
    }

    /**
     * 获取分类数据
     * @return mixed 返回分类数据
     */
	public function cateData(){
        //return Page::desc(['pre'=>'上楼', 'next'=>'下楼','first'=>'首页','end'=>'尾页','unit'=>'个'])->make(2,1);

	    $data = Db::table('category')->get();
        $data = Arr::tree($data, 'cname', $fieldPri = 'cid', $fieldPid = 'pid');
	    return $data;
    }

    /**
     * 获取标签数据
     * @return mixed  返回标签数据
     */
    public function tagData(){
        $data = Db::table('tag')->get();
        return $data;
    }
    /**
     * 添加数据
     */
    public function add(){
        //p($_POST);die;
        if (!isset($_POST['tag_tid'])){
            return ['valid'=>0,'message'=>'请选择标签'];
        }
        //1.先添加article表
        //title、sendtime、thumb、digest、author、keywords、user_uid、category_cid
        //然后直接给数据对象赋值
        $this->title = $_POST['title'];
        $this->author = $_POST['author'];
        $this->category_cid = $_POST['category_cid'];
        $this->thumb = $_POST['thumb'];
        $this->digest = $_POST['digest'];
        $this->keywords = $_POST['keywords'];
        //把数据对象添加到数据库
        $aid = $this->save();
        //2.添加article_data表 article_aid、content、des
        $adModel = new ArticleData();
        $adModel->des = $_POST['des'];
        $adModel->content = $_POST['content'];
        $adModel->article_aid = $aid;
        $adModel->save();
        //3.添加article_tag表
        $atModel = new ArticleTag();
        //循环数据存入数据库
        foreach ($_POST['tag_tid'] as $v){
            $atModel->article_aid = $aid;
            $atModel->tag_tid = $v;
            $atModel->save();
        }
        return ['valid'=>1,'message'=>'操作成功'];
    }
    /**
     * 获取所有信息
     */
    public function getAllData($num,$recycle){
        //分页
        //获取所有文章不在垃圾箱内的数据
        $count = Db::table('article')->where('is_recycle',$recycle)->count();
        //p($count);die;
        //获取分页
         Page::row($num)->make($count);
         $page = Page::desc(['pre'=>'上楼', 'next'=>'下楼','first'=>'首页','end'=>'尾页','unit'=>'个'])->make($count,$num);
         $data =Db::table('article')
             ->join('category','article.category_cid','=','category.cid')
             ->where('is_recycle',$recycle)->limit(Page::limit())->get();

//         if ($data){
//             $data=$data->toArray();
//         }
        //p($data);die;
         return ['page'=>$page,'data'=>$data];
    }

    /**
     * 获取旧数据
     */
    public function getOldData($aid){
        //获取所有旧数据
        $data = Db::table('article')
            ->join('article_data','article.aid','=','article_data.article_aid')
            ->where('article.is_recycle',0)->where('article.aid','=',$aid)->first();
//        if ($data){
//            $data = $data->toArray();
//        }
        return $data;
    }

    /**
     *编辑
     */
    public function edit(){
        //p($_POST);die;

        if (!isset($_POST['tag_tid'])){
            return ['valid'=>0,'message'=>'请选择标签'];
        }
        if (strlen($_POST['des'])==0){
            return ['valid'=>0,'message'=>'请填写文章描述'];
        }
        if (strlen($_POST['content'])==0){
            return ['valid'=>0,'message'=>'请填写文章内容'];
        }
        //1.先添加article表
        //title、sendtime、thumb、digest、author、keywords、user_uid、category_cid
        //然后直接给数据对象赋值
        $aid = $_POST['aid'];
        //var_dump($aid);die;
        $arData =Article::find($aid);
        //var_dump($arData);die;
        $arData->title = $_POST['title'];
        $arData->author = $_POST['author'];
        $arData->category_cid = $_POST['category_cid'];
        $arData->thumb = $_POST['thumb'];
        $arData->digest = $_POST['digest'];
        $arData->keywords = $_POST['keywords'];
        //把数据对象添加到数据库
        $arData->save();
        //2.添加article_data表 article_aid、content、des
        $ad_id = Db::table('article_data')->where('article_aid',$aid)->pluck('ad_id');
        $articleDateModel = ArticleData::find($ad_id);
        $articleDateModel->des=$_POST['des'];
        $articleDateModel->content=$_POST['content'];
        $articleDateModel->article_aid=$aid;
        $articleDateModel->save();

        //$adModel = new ArticleData();
        //$adModel->where('article_aid', '=', $aid)->update(['des' => $_POST['des'],'content'=>$_POST['content'],'article_aid'=>$aid]);
        //3.删除article_tag表内article_aid =$aid 的数据
        Db::table('article_tag')->where('article_aid',$aid)->delete();
        //3.添加article_tag表
        $atModel = new ArticleTag();
        //循环数据存入数据库
        foreach ($_POST['tag_tid'] as $v){
            $atModel->article_aid = $aid;
            $atModel->tag_tid = $v;
            $atModel->save();
        }
        return ['valid'=>1,'message'=>'操作成功'];
    }

    /**
     * 彻底删除
     */
    public function thoroughDel($aid){
        //1.删除article表
        Db::table('article')->where('aid',$aid)->delete();
        //2.删除article_data表数据
        Db::table('article_data')->where('article_aid',$aid)->delete();
        //3.删除article_tag表数据
        Db::table('article_tag')->where('article_aid',$aid)->delete();
        return true;
    }
}