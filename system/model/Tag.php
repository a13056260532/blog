<?php namespace system\model;
use houdunwang\model\Model;
class Tag extends Model{
	//数据表
	protected $table = "tag";

	//允许填充字段
	protected $allowFill = ['*'];

	//自动验证
	protected $validate=[
		//['字段名','验证方法','提示信息',验证条件,验证时间]
        ['tname','isnull','标签名不能为空',self::MUST_VALIDATE,self::MODEL_BOTH]
	];

    /**
     * 添加标签
     */
    public function add(){
        //$this['tname']=$_POST['tname'];
        //将收到的字符串处理为数组
        $tnames = explode('|',$_POST['tname']);
        foreach ($tnames as $k=>$v){
            $this-> insertGetId(['tname'=>$v]);
        }
        //p($tname);die;
        return 1;
    }
    /**
     * 编辑标签
     */
    public function edit(){
        $model = $this::find($_GET['tid']); // 查找主键为1的数据
        $model->tname = $_POST['tname']; // 修改数据对象
        return $model->save(); // 保存当前数据对象
    }
    /**
     * 删除标签
     */
    public function del(){
        //执行删除
        return $this::delete($_GET['tid']);
    }
}