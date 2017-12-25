<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::addScript($this,'@web/js/page/spacefans.js');
?>
<?= $this->render('_user_info',['user' => $user]) ?>

<div class="clearfix maincontent">
    <div class="container">
        <div class="mainbody padding10" style="margin-top:2em;">

            <div class="clearfix margin-b20">
                <ul class="nav nav-tabs">
                    <li><a href="<?php echo Url::toRoute(['person/index']); ?>">最爱</a></li>
                    <li><a href="<?php echo Url::toRoute(['person/note']); ?>">碎碎念</a></li>
                    <li class="active"><a  href="<?php echo Url::toRoute(['person/fans']); ?>" >Fans</a></li>
                </ul>
            </div>

            <?php
                if(isset($list) && $list) {
                    foreach ($list as $k=>$v) {
            ?>
            <div class="row">
                <div class="col-md-2">
                    <h3 class="label label-gray"><?php echo date("Y-m-d",$v['create_time']) ?>：</h3>
                </div>

                <div class="col-md-10">
                    <div class="row">
                        <div class="col-xs-4 col-sm-2 center avatar" >
                            <a href="<?php echo Url::toRoute(['people/index','id'=>base64_encode($v['id'])]); ?>" title="<?php echo $v['nickname'] ?>" class="thumbnail border-0 ">

                                <?php
                                if(isset($v['head_img']) && $v['head_img']) {
                                    ?>
                                    <img alt="<?php echo $v['nickname'] ?>" src="<?php echo $v['head_img'] ?>">
                                    <?php
                                } else {
                                    ?>
                                    <span class=" text-4"><?php echo $v['first_charter'] ?></span>
                                    <?php
                                }
                                ?>
                                <p><?php echo $v['nickname'] ?></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <?php
                }}
            ?>
        </div>
        <br>
        <br>
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

</div>