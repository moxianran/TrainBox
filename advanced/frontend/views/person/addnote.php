<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;
AppAsset::addScript($this,'@web/wangEditor/release/wangEditor.js');
AppAsset::addScript($this,'@web/js/page/note.js');
?>
<?= $this->render('_user_info',['user' => $user]) ?>
<script type="text/javascript">

</script>
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
                <div class="col-sm-1">
                    <a href="/cm/pcentral" title="453104950的最爱">
                        <img src="/img/davatar.jpg" class="img-responsive  img-circle max-width-50" alt="654714226的最爱">
                    </a>

                </div>
                <div class="col-sm-11">
                    <form method="POST" accept-charset="UTF-8" role="form" class="form">
                        <div class="form-group">
                            <div id="editor">
                                <p>欢迎使用 <b>wangEditor</b> 富文本编辑器</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <button id="formSubmit" type="button" class="btn btn-inverse btn-md">
                                <span class="glyphicon glyphicon-music"></span> 添加碎碎念
                            </button>
<!--                            &nbsp; &nbsp;-->
<!--                            <span class="bg-lyellow">-->
<!--                                <input name="opened" type="checkbox" value="no">-->
<!--                                <small>仅供自己看到，不对外公布</small>-->
<!--                            </span>-->
                        </div>
                    </form>
                </div>
            </div>

            <div class="row bg-white margin-t10 margin-b10 center">
                <div id="showResult" class="form-group"></div>
            </div>

        </div>

        <div class="row center"></div>
        <br>
        <br>
    </div>
</div>