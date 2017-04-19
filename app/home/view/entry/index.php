<extend file='resource/view/home'/>
<block name="content">
    <article class="_carousel">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="./resource/home/images/1.jpg">
                </div>
                <div class="item">
                    <img src="./resource/home/images/2.jpg">
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            </a>
        </div>
    </article>


    <foreach from="$articleData" key="$k" value="$v">
        <article>
            <div class="_head">
                <h1>{{$v['title']}}</h1>
                <span>
								作者：
								{{$v['author']}}
								</span>
                •
                <!--pubdate表⽰示发布⽇日期-->
                <time pubdate="pubdate" datetime="{{date('Y-m-d',$v['sendtime'])}}">{{date('Y-m-d',$v['sendtime'])}}</time>
                •
                分类：
                <a href="l_{{$v['cid']}}.html">{{$v['cname']}}</a>
            </div>
            <div class="_digest">
                <img src="{{$v['thumb']}}"  class="img-responsive"/>
                <p>
                    {{$v['digest']}}
                </p>
            </div>
            <div class="_more">
                <a href="con_{{$v['aid']}}.html" class="btn btn-default">阅读全文</a>
            </div>
            <div class="_footer">
                <i class="glyphicon glyphicon-tags"></i>
                <foreach from="$v['tag']" key="$kk" value="$vv">
                    <a href="t_{{$kk}}.html">{{$vv}}</a>、
                </foreach>
            </div>
        </article>
    </foreach>
</block>