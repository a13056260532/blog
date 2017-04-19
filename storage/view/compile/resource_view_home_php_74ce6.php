<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title><?php echo $headConf['title']?></title>
    <!--描述和摘要-->
    <meta name="Description" content=""/>
    <meta name="Keywords" content=""/>
    <!--载入公共模板-->
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <link rel="stylesheet" type="text/css" href="./resource/home/org/bootstrap-3.3.5-dist/css/bootstrap.min.css" />
    <script src="./resource/home/js/jquery-1.11.3.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="./resource/home/org/bootstrap-3.3.5-dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="./resource/home/css/index.css" />
    <link rel="stylesheet" type="text/css" href="./resource/home/css/backTop.css"/>
</head>
<body>
<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php echo $webset['webname']?></h1>
            </div>
        </div>
    </div>
</header>
<nav role="navigation" class="navbar navbar-default">
    <div class="container">
        <div class="row">
            <div class="col-sm-12" >

                <div class="navbar-header">

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#example-navbar-collapse">

                        <span class="sr-only">切换导航</span>

                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>


                <div class="collapse navbar-collapse" id="example-navbar-collapse">
                    <ul class="_menu" >
                        <li <?php if ($cid==null){ ?> class="_active" <?php }?> ><a href="index.html">首页</a></li>
                        <?php if(is_array($cateDataTop) || is_object($cateDataTop)){foreach ($cateDataTop as $k=>$v){?>
                            <li <?php if ($cid==$v['cid']){ ?> class="_active" <?php } ?>   ><a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?></a></li>
                        <?php }}?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
<section>
    <div class="container">
        <div class="row">
            <!--标签规定文档的主要内容main-->
            <main class="col-md-8">
                <!--blade_content-->

            </main>
            <aside class="col-md-4 hidden-sm hidden-xs">
                <div class="_widget">
                    <h4>关于自己</h4>
                    <div class="_info">
                        <p>多年一线开发经验与讲师经验。擅长引导思维，而不是一味灌输，新生代优秀青年讲师的代表...</p>
                        <p>
                            <i class="glyphicon glyphicon-volume-down"></i>
                            目前就职于
                            <a href="http://www.houdunwang.com" target="_blank">北京后盾网</a>
                        </p>
                    </div>
                </div>
                <div class="_widget">
                    <h4>分类列表</h4>
                    <div>
                        <?php if(is_array($cateData) || is_object($cateData)){foreach ($cateData as $k=>$v){?>
                        <a href="l_<?php echo $v['cid']?>.html"><?php echo $v['cname']?> (<?php echo $v['total']?>)</a>
                        <?php }}?>
                    </div>
                </div>
                <div class="_widget">
                    <h4>标签云</h4>
                    <div class="_tag">
                        <?php if(is_array($tagData) || is_object($tagData)){foreach ($tagData as $k=>$v){?>
                        <a href="t_<?php echo $v['tid']?>.html"><?php echo $v['tname']?></a>
                        <?php }}?>
                    </div>
                </div>

            </aside>
        </div>
    </div>
</section>
<footer class="hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <h4 class="_title">最新文章</h4>
                <div id="" class="_single">
                    <p><a href="">标题</a></p>
                    <time>2010年11月06日11:24:16</time>
                </div>
                <div id="" class="_single">
                    <p><a href="">标题</a></p>
                    <time>2010年11月06日11:24:16</time>
                </div>
            </div>
            <div class="col-sm-4 footer_tag">
                <div id="">
                    <h4 class="_title">标签云</h4>
                    <?php if(is_array($tagData) || is_object($tagData)){foreach ($tagData as $k=>$v){?>
                        <a href="t_<?php echo $v['tid']?>.html"><?php echo $v['tname']?></a>
                    <?php }}?>
                </div>
            </div>
            <div class="col-sm-4">
                <h4 class="_title">友情链接</h4>
                <div id="" class="_single">
                    <?php if(is_array($linkData) || is_object($linkData)){foreach ($linkData as $k=>$v){?>
                    <p><a href="<?php echo $v?>" target="_blank"><?php echo $k?></a></p>
                    <?php }}?>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href=""><?php echo $webset['webname']?></a>
                |
                <a href=""><?php echo $webset['admin']?></a>
                |
                <a href=""><?php echo $webset['adminemail']?></a>
            </div>
        </div>
    </div>
</div>
<!--返回顶部自己写的插件-->
<script src="./resource/home/js/backTop.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
    $(function(){
        //插件使用
        $('.back_top').backTop({right:30});
    })
</script>
<div class="back_top hidden-xs hidden-md">
    <i class="glyphicon glyphicon-menu-up"></i>
</div>
</body>
</html>