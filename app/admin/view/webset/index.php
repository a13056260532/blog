<extend file='resource/view/master'/>
<block name="content">
    <div class="col-xs-12 col-sm-9 col-lg-10">
        <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
            <li>
                <a href=""><i class="fa fa-cogs"></i>
                    友链管理</a>
            </li>
            <li class="active">
                <a href="">友链展示</a>
            </li>
        </ol>
        <ul class="nav nav-tabs" role="tablist">
            <li class="active"><a href="">友链管理</a></li>
            <li><a href="">添加友链</a></li>
        </ul>
        <form action="" method="post">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th width="80">编号</th>
                            <th>配置名称</th>
                            <th>配置值</th>
                            <th>描述</th>
                        </tr>
                        </thead>
                        <tbody>
                        <foreach from="$oldData" value="$v">
                        <tr>
                            <td>{{$v['wid']}}</td>
                            <td>{{$v['name']}}</td>
                            <td>
                                <input type="text" name="value[{{$v['wid']}}]" value="{{$v['value']}}" >
                            </td>
                            <td>{{$v['title']}}</td>

                        </tr>
                        </foreach>
                        </tbody>
                    </table>
                    <button style="display:block;margin: 0 auto;" type="submit" class="btn btn-success">修改</button>
                </div>
            </div>
        </form>
        <div class="pagination pagination-sm pull-right">
        </div>
    </div>
</block>
