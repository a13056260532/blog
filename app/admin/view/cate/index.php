<extend file='resource/view/master'/>
<block name="content">
    <div class="col-xs-12 col-sm-9 col-lg-10">
        <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
            <li>
                <a href=""><i class="fa fa-cogs"></i>
                    分类管理</a>
            </li>
            <li class="active">
                <a href="">分类展示</a>
            </li>
        </ol>
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="">分类管理</a></li>
            <li><a href="{{u('addCate')}}">添加分类</a></li>
        </ul>
        <form action="" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="80">编号</th>
                            <th>分类名称</th>
                            <th width="200">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        <foreach from="$data" key="$k" value="$v">
                        <tr>
                            <td>{{$v['cid']}}</td>
                            <td>{{$v['_cname']}}</td>
                            <td>
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-primary btn-xs dropdown-toggle">操作 <span class="caret"></span></button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="{{u('admin.cate.addson',['cid'=>$v['cid']])}}">添加子类</a></li>
                                        <li><a href="{{u('edit',[cid=>$v['cid']])}}">编辑</a></li>
                                        <li class="divider"></li>
                                        <li><a href="javascript:;" onclick="del({{$v['cid']}})">删除</a></li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        </foreach>
                        <script>
                            function del(cid) {
                                if (confirm("你确定删除吗？")) {
                                    location.href= "index.php?s=admin/cate/del&cid="+cid;
                                }
                            }
                        </script>
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
        <div class="pagination pagination-sm pull-right">
        </div>
    </div>
</block>