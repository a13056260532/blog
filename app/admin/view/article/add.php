<extend file='resource/view/master'/>
{{$data}}
<block name="content">
    <div class="col-xs-12 col-sm-9 col-lg-10">
        <ol class="breadcrumb" style="background-color: #f9f9f9;padding:8px 0;margin-bottom:10px;">
            <li>
                <a href="{{u('admin.article.index')}}"><i class="fa fa-cogs"></i>
                    文章管理</a>
            </li>
            <li class="active">
                <a href="">文章添加</a>
            </li>
        </ol>
        <ul class="nav nav-tabs" role="tablist">
            <li><a href="{{u('admin.article.index')}}">文章管理</a></li>
            <li class="active"><a href="">文章添加</a></li>
        </ul>
        <form class="form-horizontal" id="form" onsubmit="return add(this)" action="" method="post">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">文章管理</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">文章标题</label>
                        <div class="col-sm-9">
                            <input type="text" name="title" class="form-control" placeholder="文章标题">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">文章作者</label>
                        <div class="col-sm-9">
                            <input type="text" name="author" class="form-control" placeholder="文章作者">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">所属分类</label>
                        <div class="col-sm-9">
                            <select class="js-example-basic-single form-control" name="category_cid">
                                <option value="">请选择分类</option>
                                <foreach from="$cateData" key="$k" value="$v">
                                    <option value="{{$v['cid']}}">{{$v['_cname']}}</option>
                                </foreach>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">标签</label>
                        <div class="col-sm-9">
                            <foreach from="$tagData" key="$k" value="$v">
                                <label class="checkbox-inline">
                                    <input type="checkbox" name="tag_tid[]" value="{{$v['tid']}}"> {{$v['tname']}}
                                </label>
                            </foreach>
                        </div>
                    </div>
                    <script SRC="resource/uploadify/jquery.uploadify.min.js"></script>
<!--                    <link rel="stylesheet" href="resource/uploadify/uploadify.css">-->
<!--                    <style>-->
<!--                        .img_up {-->
<!--                            list-style: none;-->
<!--                            float: left;-->
<!--                            position: relative;-->
<!--                        }-->
<!---->
<!--                        .delImg {-->
<!--                            display: block;-->
<!--                            position: absolute;-->
<!--                            right: 0;-->
<!--                            top: 0;-->
<!--                            color: red;-->
<!--                            font-weight: 900;-->
<!--                            font-size: 30px;-->
<!--                            cursor: pointer;-->
<!--                        }-->
<!---->
<!--                    </style>-->
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">缩略图</label>
                        <div class="col-sm-9">
<!--                            <input type="file" name="file_upload" id="file_upload"/>-->
<!--                            <span class="help-block leftb">建议大小(宽100高100)</span>-->
<!--                            <div id="upload">-->
<!---->
<!---->
<!--                            </div>-->
                            <div class="input-group">
                                <input type="text" class="form-control" name="thumb" readonly="" value="">
                                <div class="input-group-btn">
                                    <button onclick="upImage(this)" class="btn btn-default" type="button">选择图片</button>
                                </div>
                            </div>
                            <div class="input-group" style="margin-top:5px;">
                                <img src="resource/images/nopic.jpg" class="img-responsive img-thumbnail" width="150">
                                <em class="close" style="position:absolute; top: 0px; right: -14px;" title="删除这张图片" onclick="removeImg(this)">×</em>
                            </div>
                        </div>
                    </div>
                    <script>
                        //上传图片
                        function upImage(obj) {
                            require(['util'], function (util) {
                                options = {
                                    multiple: false,//是否允许多图上传
                                    //data是向后台服务器提交的POST数据
                                    data:{name:'后盾人',year:2099},
                                };
                                util.image(function (images) {          //上传成功的图片，数组类型 
                                    $("[name='thumb']").val(images[0]);
                                    $(".img-thumbnail").attr('src', images[0]);
                                }, options)
                            });
                        }

                        //移除图片
                        function removeImg(obj) {
                            //alert($(obj).prev('img').attr('src'));
                            var imgSrc = $(obj).prev('img').attr('src');
                            $.post("{{u('admin.article.moveImg')}}",{path:imgSrc},function (res) {
                                if (res){
                                    $(obj).prev('img').attr('src', 'resource/images/nopic.jpg');
                                    $(obj).parent().prev().find('input').val('');
                                }else{
                                    alert('请先上传文件图片');
                                }
                            },'json')

                        }
                    </script>
<!--                    <script>-->
<!--                        $(function () {-->
<!--                            $('#file_upload').uploadify({-->
<!--                                "height": 30,-->
<!--                                "swf": 'resource/uploadify/uploadify.swf',-->
<!--                                "uploader": "{{u('upload')}}",-->
<!--                                "width": 120,-->
<!--                                'buttonText': '请选择文件...',-->
<!--                                'removeTimeout': 0.1,-->
<!--                                //'upload':"{{u('admin.article.upImg')}}",-->
<!--                                'onUploadSuccess': function (file, data, response) {-->
<!--                                    var src = ' <li class="img_up"><img style="width:70px;height: 70px;"  src="' + data + '" alt=""> <div class="delImg" path="'+data+'">X</div></li>'-->
<!--                                    $('#upload').append(src);-->
<!--                                }-->
<!---->
<!--                                // Put your options here-->
<!--                            });-->
<!--                        });-->
<!--                    </script>-->
<!--                    <script>-->
<!--                        $('#upload').on('click','.delImg',function(){-->
<!--                            var path = $(this).attr('path');-->
<!--                            var _this = $(this);-->
<!--                            //alert(path);-->
<!--                            $.post("{{u('delImg')}}",{path:path},function(res){-->
<!--                                // alert(1);-->
<!--                                //移除图片-->
<!--                                _this.parent('li').remove();-->
<!--                            },'json')-->
<!--                        })-->
<!--                    </script>-->
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">文章摘要</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="digest" class="form-control" placeholder="文章摘要"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">关键字</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="keywords" class="form-control" placeholder="文章摘要"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">文章描述</label>
                        <div class="col-sm-9">
                            <textarea type="text" name="des" class="form-control" placeholder="文章摘要"></textarea>
                        </div>
                    </div>
                    <!--百度编辑器引入-->
                    <div class="form-group">
                        <label for="" class="col-sm-2 control-label">文章内容</label>
                        <div class="col-sm-9">
                            <textarea id="container" name="content" style="height:300px;width:100%;"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">确定</button>
        </form>

    </div>
</block>
<script>
    util.ueditor('container', {hash:2,data:'hd'}, function (editor) {
        //这是回调函数 editor是百度编辑器实例
    });
</script>
<!--<script>-->
<!--    util.ueditor('container', {}, function (editor) {-->
<!--        editor.addListener('contentChange', function () {-->
<!--            $scope.field.detail = editor.getContent();-->
<!--        });-->
<!--        editor.addListener('ready', function () {-->
<!--            if (editor && editor.getContent() != $scope.field.detail) {-->
<!--                editor.setContent($scope.field.detail);-->
<!--            }-->
<!--            $scope.$watch('field', function (item) {-->
<!--                if (editor && editor.getContent() != item.detail) {-->
<!--                    editor.setContent(item.detail ? item.detail : '');-->
<!--                }-->
<!--            },true);-->
<!--        });-->
<!--        editor.addListener('clearRange', function () {-->
<!--            $scope.field.detail = editor.getContent();-->
<!--            $scope.$apply();-->
<!--        });-->
<!--    });-->
<!--</script>-->
<script>
    function add(obj)
    {
        //序列化获取表单数据
        var data=$(obj).serialize();
        $.post("{{u('add')}}",data,function(res){
            //res:{valid:1,message:'响应信息'}
            if(res.valid){
                //成功
                //提示框在hdjs手册中搜索消息框
                util.message(res.message,"{{u('index')}}",'success');
            }else{
                //失败
                util.message(res.message,"back",'error');
            }
        },'json')
        //组织表单提交
        return false;
    }
</script>