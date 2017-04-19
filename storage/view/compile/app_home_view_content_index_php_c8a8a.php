<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>赖哈蚂的单相思</title>
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
                <h1>王安琪的微博</h1>
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
                        <li  class="_active"  ><a href="index.html">首页</a></li>
                                                    <li    ><a href="l_25.html">娱乐</a></li>
                                                    <li    ><a href="l_26.html">搞笑</a></li>
                                                    <li    ><a href="l_24.html">新闻</a></li>
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
                
    <article>
        <div class="_head">
            <h1><?php echo $articleData['title']?></h1>
            <span>
								作者：
								<a href=""><?php echo $articleData['author']?></a>
								</span>
            •
            <!--pubdate表⽰示发布⽇日期-->
            <time pubdate="pubdate" datetime="2015年8月31日星期一晚上9点44"><?php echo date('Y年m月D日,H:i:s',$articleData['sendtime'])?></time>
        </div>
        <div class="_digest">
            <?php echo $articleData['content']?>
        </div>
        <div class="_footer">
            <i class="glyphicon glyphicon-tags"></i>
            <?php if(is_array($articleData['tag']) || is_object($articleData['tag'])){foreach ($articleData['tag'] as $kk=>$vv){?>
            <a href="t_<?php echo $kk?>.html"><?php echo $vv?></a>、
            <?php }}?>
        </div>
    </article>


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
                                                <a href="l_25.html">娱乐 (0)</a>
                                                <a href="l_26.html">搞笑 (1)</a>
                                                <a href="l_24.html">新闻 (1)</a>
                                                <a href="l_27.html">体育新闻 (0)</a>
                                                <a href="l_28.html">八卦娱乐 (1)</a>
                                                <a href="l_29.html">搞笑娱乐 (0)</a>
                                                <a href="l_30.html">动态搞笑图 (0)</a>
                                                <a href="l_31.html">美文 (2)</a>
                                            </div>
                </div>
                <div class="_widget">
                    <h4>标签云</h4>
                    <div class="_tag">
                                                <a href="t_21.html">娱乐</a>
                                                <a href="t_20.html">php
</a>
                                                <a href="t_22.html">搞笑</a>
                                                <a href="t_23.html">新闻</a>
                                                <a href="t_24.html">美文</a>
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
                                            <a href="t_21.html">娱乐</a>
                                            <a href="t_20.html">php
</a>
                                            <a href="t_22.html">搞笑</a>
                                            <a href="t_23.html">新闻</a>
                                            <a href="t_24.html">美文</a>
                                    </div>
            </div>
            <div class="col-sm-4">
                <h4 class="_title">友情链接</h4>
                <div id="" class="_single">
                                        <p><a href="http://www.baidu.com" target="_blank">百度</a></p>
                                        <p><a href="http://www.sohu.com" target="_blank">搜狗</a></p>
                                    </div>
            </div>
        </div>
    </div>
</footer>
<div class="footer_bottom">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="">王安琪的微博</a>
                |
                <a href="">王安琪</a>
                |
                <a href="">8453629@qq.com</a>
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
