<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::addScript($this,'@web/wangEditor/release/wangEditor.js');
AppAsset::addScript($this,'@web/js/page/zancmt.js');
AppAsset::addScript($this,'@web/js/template-web.js');

?>
<input type="hidden" name="love_id" id="love_id" value="<?php echo $detail['id'] ?>" />
<input type="hidden" name="page_id" id="page_id" value="1" />

<div  class="clearfix maincontent">
    <div  class="container">
        <div  class="mainbody padding10"  style="margin-top:5em;">
            <div  class="row">
                <div  class="col-md-8">
                    <h2  class="margin0"><?php echo $detail['title'] ?> &nbsp;
                        <small><span  class="glyphicon glyphicon-user"></span> 由
                            <a href="/cm/detail/510023"><?php echo $detail['nickname'] ?></a>创建
                        </small>
                    </h2>
                    <hr>

                    <div  class="row">
                        <div  class="col-sm-7 ">

                            <div  class="clearfix"  style="position:relative">
                                <div  class="clearfix"  id="mainThumb">
                                    <img  class="img-responsive img-full" src="<?php echo $detail['pic'] ?>" alt="<?php echo $detail['title'] ?>">
                                </div>
                            </div>

                        </div>
                        <div  class="col-sm-5">

                            <div  class="clearfix">
                                <h7><label class="control-label iteminfo "><?php echo date("Y-m-d H:i:s",$detail['create_time']) ?></label> </h7>
                                <h4><span  class="glyphicon glyphicon-heart"></span> <?php echo $detail['count_remember'] ?>人最爱</h4>
                                <p  class="pline">

                                <div id="J_zan_div" class="pline">

                                </div>
                                <!-- >10个喜欢才有查看更多按钮 -->
                                </p>
                            </div>

                            <h2>
                                <a class="btn btn-warning btn-xlg" id="J_gz_btn">
                                    <span class="glyphicon glyphicon-heart"></span>
                                    加入我的最爱
                                </a>
                            </h2>
                        </div>
                    </div>
                    <a  name="comments"></a>
                    <div  class="clearfix margin-t20">

                        <h4><span  class="glyphicon glyphicon-comment"></span> 1条回忆</h4>
                        <hr>

                        <div class="row">
                            <div class="col-xs-3 col-sm-2">

                                <a href="/cm/detail/510054">

                                    <?php
                                    if(isset($detail['head_img']) && $detail['head_img']) {
                                        ?>
                                        <img src="<?php echo $detail['head_img'] ?>" class="img-responsive  img-circle max-width-60">
                                        <?php
                                    } else {
                                        ?>
                                        <img src="/img/davatar.jpg" class="img-responsive  img-circle max-width-60">
                                        <?php
                                    }
                                    ?>

                                </a>
                            </div>
                            <div class="col-xs-9 col-sm-10">
                            <div class="form-group">
                                <div id="editor">
                                    <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p>
                                </div>
                            </div>
                                <div class="form-group text-right">
                                    <input class="btn btn-info btn-md" type="button" id="J_commentBtn" value="+ 发布">
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div  class="clearfix"  id="stuffCommentBox"></div>
                        <div  class="row center">
                            <div  class="row margin-b20"  id="loadingAnimation" >
                                <img  src="/img/loading.gif" width="30"  height="30">
                            </div>
                            <button  class="btn btn-default btn-lg margin-b20"  id="loadStuffCommentBtn"  data-htmlboxid="stuffCommentBox"  rel="938" >加载更多
                                <span  class="glyphicon glyphicon-chevron-down"></span>
                            </button>
                        </div>
                    </div>
                </div>

                <div  class="col-md-4">
                    <div  class="clearfix sidebar radius-5">
                        <div  class="clearfix border-bottom">
                            <h4>
                                <span  class=" glyphicon glyphicon-th-large margin-b20"></span> 随便看看
                            </h4>
                        </div>

                        <div  class="row padding10">
                            <div  class="col-xs-2 avatar">

                                <span class="text-m">M</span>



                            </div>
                            <div  class="col-xs-10"  style="line-height:30px;">
                                <a




                                    href="/people/memeda"



                                    title="么么哒的最爱">么么哒</a> 爱上了 <a style="color: #45d0c6" title="Death With Dignity"  href="/lyrics/comment/504220.html">Death With Dignity</a>
                            </div>
                        </div>

                        <div  class="row padding10">
                            <div  class="col-xs-2 avatar">

                                <span class="text-d">D</span>



                            </div>
                            <div  class="col-xs-10"  style="line-height:30px;">
                                <a




                                    href="/people/doni"



                                    title="Doni的最爱">Doni</a> 爱上了 <a style="color: #45d0c6" title="N"  href="/lyrics/comment/509129.html">N</a>
                            </div>
                        </div>

                        <p class="white-line margin0"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script id="test" type="text/html">
    {{each list}}
    <div class="row" id="commentbox_{{$value.id}}">
        <div class="col-xs-3 col-sm-2 avatar">
            <a href="/people/jeyy">
                {{if $value.head_img}}
                <img src="{{$value.head_img}}">
                {{else}}
                <span class="text-3">{{$value.first_charter}}</span>
                {{/if}}
            </a>
        </div>
        <div class="col-xs-9 col-sm-10">
            <p>
                <a href="/people/jeyy" >{{$value.nickname}}</a>：
            </p>
            <p>{{#$value.content}}</p>
            <p></p>
            <p>
                <small class="label label-gray">{{$value.create_date}}</small>
            </p>
            <hr>
        </div>
    </div>
    {{/each}}
</script>