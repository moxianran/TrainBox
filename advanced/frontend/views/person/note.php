<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::addScript($this,'@web/js/page/spacenote.js');
?>
<?= $this->render('_user_info',['user' => $user]) ?>

<div class="clearfix maincontent">
    <div class="container">
        <div class="mainbody padding10" style="margin-top:2em;">

            <div class="clearfix margin-b20">
                <ul class="nav nav-tabs">
                    <li><a href="<?php echo Url::toRoute(['person/index']); ?>">最爱</a></li>
                    <li class="active"><a href="<?php echo Url::toRoute(['person/note']); ?>">碎碎念</a></li>
                    <li><a  href="<?php echo Url::toRoute(['person/fans']); ?>" >Fans</a></li>
                </ul>
            </div>
            <div class="row bg-white margin-t10 margin-b10  ">
                <div class="col-sm-1 avatar">
                    <a href="<?php echo Url::toRoute(['people/index','id'=>base64_encode($user['id'])]); ?>">
                        <?php
                        if(isset($user['head_img']) && $user['head_img']) {
                            ?>
                            <img alt="<?php echo $user['nickname'] ?>" src="<?php echo $user['head_img'] ?>">
                            <?php
                        } else {
                            ?>
                            <span class=" text-4"><?php echo $user['first_charter'] ?></span>
                            <?php
                        }
                        ?>
                    </a>
                </div>
            </div>

            <?php
                if(isset($list) && $list) {
                    foreach ($list as $k=>$v) {
            ?>
            <div class='row bg-white margin-t10 margin-b10' id='notebox_<?php echo $v['id'] ?>'>
                <div class='col-sm-1'>
                    <small class='label label-gray'><?php echo date("Y-m-d",$v['create_time']) ?></small>
                </div>
                <div class='col-sm-11'><?php echo $v['content'] ?></div>
            </div>
            <?php
                }}
            ?>
        </div>

        <div class="row center"></div>
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
