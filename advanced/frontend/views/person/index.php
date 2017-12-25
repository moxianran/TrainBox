<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::addScript($this,'@web/js/page/myself.js');
?>
<?= $this->render('_user_info',['user' => $user]) ?>

<div class="clearfix maincontent">
    <div class="container">
        <div class="mainbody padding10" style="margin-top:2em;">

            <div class="clearfix margin-b20">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="<?php echo Url::toRoute(['person/index']); ?>">最爱</a></li>
                    <li><a href="<?php echo Url::toRoute(['person/note']); ?>">碎碎念</a></li>
                    <li ><a  href="<?php echo Url::toRoute(['person/fans']); ?>" >Fans</a></li>
                </ul>
            </div>

            <?php
                if(isset($list) && $list) {
                foreach ($list as $k=>$v) {
            ?>
            <div class="row">
                <div class="col-md-2">
                    <h3 class="label label-gray "><?php echo date("Y-m-d",$v['create_time']) ?>：</h3>
                </div>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-xs-4 col-sm-2 center"
                             onmouseover="addSpan('delspan0')" onmouseout="rmSpan('delspan0')">
                            <span id="delspan0" onclick="removes(<?php echo $v['id'] ?>)"></span>
                            <a title="<?php echo $v['title'] ?>" class="thumbnail border-0">
                                <img src="<?php echo $v['pic'] ?>">
                                <p><?php echo $v['title'] ?></p>
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
</div>
