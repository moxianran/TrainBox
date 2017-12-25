<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::addScript($this,'@web/js/page/welcome.js');
?>
<div class="clearfix maincontent grayback" id="J_maincontent">
    <div class="container grayback" id="J_container">
        <div class="mainbody padding-t20" style="margin-top:70px;">
            <div id="J_progress" class="center padding-t20">
                <div class="row">
                    <?php
                        if(isset($list) && $list) {
                        foreach ($list as $k=>$v) {
                    ?>
                    <div class="col-xs-6 col-sm-3 margin-b20 ">
                        <div class="blog-post">
                            <div class="blog-thumb">
                                <a href="<?php echo Url::toRoute(['love/detail','id'=>$v['id']]); ?>" >
                                    <img class="imgbreath" width="257" height="193"
                                         src="<?php echo $v['pic'] ?>" alt="<?php echo $v['title'] ?>">
                                </a>

                            </div>
                            <div class="blog-content">
                                <div class="content-show">
                                    <h4>
                                        <a href="<?php echo Url::toRoute(['love/detail','id'=>$v['id']]); ?>" >
                                            <?php echo $v['title'] ?>
                                        </a>
                                    </h4>
                                    <span><?php echo date("Y-m-d",$v['create_time']) ?></span>
                                </div>
                                <div class="content-hide" style="display: none;">
                                    <p><br></p>
                                </div>
                            </div>
                        </div>

                        <!-- pl和点赞的div -->
                        <div class="row margin-t0 iteminfo" style="margin-top: -1.5em;">
                            <div class="col-xs-7 text-left"></div>
                            <div class="col-xs-5 text-right">
                                <span class="glyphicon glyphicon-heart"></span> <?php echo $v['count_remember'] ?>
                                <span class="hidden-sm hidden-xs"> &nbsp;
                                    <span class="glyphicon glyphicon-comment"></span> <?php echo $v['count_comment'] ?> 						</span>
                            </div>
                        </div>

                    </div>
                    <?php
                        }}
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row center grayback">
    <ul class="qinco-pagination pagination-lg">
        <?php
        echo yii\widgets\LinkPager::widget([
            'pagination' => $pagination,
        ]);
        ?>
    </ul>
</div>
