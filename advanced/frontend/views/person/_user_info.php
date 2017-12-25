<?php
use yii\helpers\Url;
?>
<div class="clearfix mainhead grayback" >
    <div class="container">
        <div class="row margin-b20 margin-t20">
            <div class="col-sm-6 col-sm-offset-3 margin-b20 margin-t20">
                <div class="row margin-b20 margin-t20">
                    <div class="col-xs-4 center">
                        <div class="thumbnail bg-no margin-t5 border-0">
                            <div class="avatar centre">
                                <?php
                                if(isset($user['head_img']) && $user['head_img']) {
                                    ?>
                                    <img class="img-circle img-responsive " src="<?php echo $user['head_img'] ?>">
                                    <?php
                                } else {
                                    ?>
                                    <span class=" text-4"><?php echo $user['first_charter'] ?></span>
                                    <?php
                                }
                                ?>
                                <br>
                            </div>
                            <a href="<?php echo Url::toRoute(['person/edit']); ?>" class="btn btn-gray btn-sm margin-t20">
                                <span class="glyphicon glyphicon-pencil"></span> 编辑档案
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-8">
                        <h1 class="margin0"><?php echo $user['nickname'] ?></h1>
                        <h4 class="margin0"><small>http://NorthPark.cn/people/</small></h4>
                        <p class="white-line"></p>
                        <h3 class="margin0"><small><?php echo $user['email'] ?></small></h3>
                        <h3 class="margin0"><small>加入时间：<?php echo date("Y-m-d H:i:s",$user['create_time']) ?></small></h3>
                        <h2><a href="<?php echo Url::toRoute(['person/addnote']); ?>" class="btn btn-hero btn-lg">+ 添加碎碎念</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>