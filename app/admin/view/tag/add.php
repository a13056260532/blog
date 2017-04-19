<extend file='resource/view/master'/>
<block name="content">
    <div class="col-xs-12 col-sm-9 col-lg-10">
        <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
            <li>
                <a href="{{u('index')}}"><i class="fa fa-cogs"></i>
                    标签管理</a>
            </li>
            <li class="active">
                <a href="javascript:;">添加标签</a>
            </li>
        </ol>
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="{{u('index')}}">标签管理</a></li>
            <li class="active"><a href="javascript:;">添加标签</a></li>
        </ul>
        <form class="form-horizontal" id="form" onsubmit="return add()" action="" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">标签管理</h3>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">标签</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="tname"  class="form-control" placeholder="请输入标签名多个标签请用|分隔"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">确定</button>
        </form>
    </div>
</block>