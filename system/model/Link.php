<?php namespace system\model;
use houdunwang\model\Model;
class Link extends Model{
	//数据表
	protected $table = "link";

	//允许填充字段
	protected $allowFill = ['*'];


	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
        ['lname','isnull','请填写友联名称',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['logo','isnull','请选择logo',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['url','http','请输入正确的网址',self::MUST_VALIDATE,self::MODEL_BOTH],
        ['sort','num:1,99999','排序必须是数字',self::MUST_VALIDATE,self::MODEL_BOTH],

	];

	//自动完成
	protected $auto=[
		//['字段名','处理方法','方法类型',验证条件,验证时机]
        ['addtime','time','function',3,3]
	];

	//自动过滤
    protected $filter=[
        //[表单字段名,过滤条件,处理时间]
    ];

	//时间操作,需要表中存在created_at,updated_at字段
	protected $timestamps=false;
//[lname] =>
//[logo] =>
//[url] =>
//[sort] =>
    /**
     * 添加友链
     */
    public function add(){
	    //p($_POST);die;
        return $this->save($_POST);

    }

    /**
     * 获取旧数据
     */
    public function getoldData(){
        return Db::table('link')->get();
    }
    /**
     * 编辑
     */
    public function edit(){
        $model = $this::find($_POST['lid']); // 查找主键为1的数据
        $model->lname = $_POST['lname'];
        $model->logo = $_POST['logo'];
        $model->url = $_POST['url'];
        $model->sort = $_POST['sort'];
        return $model->save(); // 保存当前数据对象
    }
}