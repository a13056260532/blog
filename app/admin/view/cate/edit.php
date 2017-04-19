<extend file='resource/view/master'/>
<block name="content">
    <div class="col-xs-12 col-sm-9 col-lg-10">
        <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
            <li>
                <a href=""><i class="fa fa-cogs"></i>
                    分类管理</a>
            </li>
            <li class="active">
                <a href="">添加分类</a>
            </li>

        </ol>
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="{{u('index')}}">分类首页</a></li>
            <li class="active"><a href="">编辑子类</a></li>
        </ul>
        <form class="form-horizontal" id="form" action="" method="post" onsubmit="return add()">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">分类管理</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">分类名称</label>
                        <div class="col-sm-9">
                            <input type="text" name="cname" value="{{$oldDate['cname']}}"  class="form-control" placeholder="请填写分类名称">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">所属分类</label>
                        <div class="col-sm-9">
                            <select class="js-example-basic-single form-control" name="pid">
                                <option value="0">顶级分类</option>
                                <foreach from="$flDate"  key="$k" value="$v">
                                <option value="{{$v['cid']}}" <if  value="$v['cid'] eq  $oldDate['pid']  ">selected</if> >{{$v['_cname']}}</option>
                                </foreach>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">分类标题</label>
                        <div class="col-sm-9">
                            <input type="text" name="ctitle"  value="{{$oldDate['ctitle']}}"  class="form-control" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">分类描述</label>
                        <div class="col-sm-9">
                            <textarea  class="form-control" name="cdes" >{{$oldDate['cdes']}} </textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">分类关键字</label>
                        <div class="col-sm-9">
                            <textarea  class="form-control" name="ckeywords" >{{$oldDate['ckeywords']}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">分类排序</label>
                        <div class="col-sm-9">
                            <input type="number" name="csort"  value="{{$oldDate['csort']}}"  class="form-control" placeholder="请填写分类名称">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">确定</button>
        </form>
    </div>
</block>