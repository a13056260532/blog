<extend file='resource/view/home'/>
<block name="content">
    <article>
        <div class="_head">
            <h1>{{$articleData['title']}}</h1>
            <span>
								作者：
								<a href="">{{$articleData['author']}}</a>
								</span>
            •
            <!--pubdate表⽰示发布⽇日期-->
            <time pubdate="pubdate" datetime="2015年8月31日星期一晚上9点44">{{date('Y年m月D日,H:i:s',$articleData['sendtime'])}}</time>
        </div>
        <div class="_digest">
            {{$articleData['content']}}
        </div>
        <div class="_footer">
            <i class="glyphicon glyphicon-tags"></i>
            <foreach from="$articleData['tag']" key="$kk" value="$vv">
            <a href="t_{{$kk}}.html">{{$vv}}</a>、
            </foreach>
        </div>
    </article>
</block>