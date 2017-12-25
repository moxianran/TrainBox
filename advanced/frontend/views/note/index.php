<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::addScript($this,'@web/js/page/story.js');
?>
<div class="clearfix maincontent grayback" >
    <div class="container">
        <div class="mainbody padding-t20" id="J_maincontent" style="margin-top:70px;">
            <div id="J_progress" class="center padding-t20">

                <!-- 开始 -->
                <div class="row">
                    <?php
                    if(isset($list) && $list) {
                        foreach ($list as $k=>$v) {
                    ?>
                    <div class="col-sm-6 ">
                        <div class="clearfix bg-white margin-t10 margin-b10 padding20" >
                            <div class="row">
                                <div class="col-sm-3">
                                    <div class="thumbnail border-0 center ">
                                        <div class="avatar">
                                            <a href="<?php echo Url::toRoute(['people/index','id'=>base64_encode($v['id'])]); ?>" title="<?php echo $v['nickname'] ?>:碎碎念">
                                                <?php
                                                    if(isset($v['head_img']) && $v['head_img']) {
                                                ?>
                                                    <img class="imgbreath" src="<?php echo $v['head_img'] ?>" alt="<?php echo $v['nickname'] ?>">
                                                <?php
                                                    } else {
                                                ?>
                                                    <span class="imgbreath text-7"><?php echo $v['first_charter'] ?></span>
                                                <?php
                                                    }
                                                ?>
                                            </a>
                                            <p><small class="gray-text"><?php echo $v['nickname'] ?></small></p>
                                            <div class="clearfix visible-xs"><hr></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-9">
                                    <p>
                                        <small class="label label-gray"><?php echo date("Y-m-d",$v['create_time']) ?></small> &nbsp;
                                        <a href="<?php echo Url::toRoute(['people/index','id'=>base64_encode($v['id'])]); ?>" title="<?php echo $v['nickname'] ?>"><?php echo $v['nickname'] ?></a> 写到：
                                    </p>
                                    <p id="brief_0">
                                        <?php echo $v['content'] ?>
                                        <button class="clearfix btn btn-gray btn-xs click2show"  data-dismiss="#brief_0" data-target="#text_0"> &nbsp;
                                            <span class="glyphicon glyphicon-chevron-down"></span> &nbsp;
                                        </button>
                                    </p>
                                    <div class="clearfix hidden" id="text_0">
                                        <?php echo $v['content'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                        }}
                    ?>
                </div>
                <!-- 结束 -->
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