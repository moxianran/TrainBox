<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
AppAsset::addCss($this,'@web/css/login/owl-login.css');
AppAsset::addScript($this,'@web/js/page/reg2.js');
?>
<div class="clearfix maincontent ">
    <div class="container">

        <!-- begin -->
        <div id="login">
            <div class="wrapper">
                <div class="login">
                    <form id="signupForm" method="post" class="container offset1 loginform">
                        <input name="_csrf-frontend" type="hidden" id="_csrf-frontend" value="<?= Yii::$app->request->csrfToken ?>">

                        <div id="owl-login">
                            <div class="hand"></div>
                            <div class="hand hand-r"></div>
                            <div class="arms">
                                <div class="arm"></div>
                                <div class="arm arm-r"></div>
                            </div>
                        </div>
                        <div class="pad">
                            <div class="control-group">
                                <div class="controls">
                                    <label for="newAccount" class="control-label fa fa-envelope"></label>
                                    <input id="newAccount" type="email" name="User[email]" placeholder="Email" tabindex="1" autofocus="autofocus" class="form-control input-medium">
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <label for="newPassword" class="control-label fa fa-asterisk"></label>
                                    <input id="newPassword" type="password" name="User[password]" placeholder="Password" tabindex="2" class="form-control input-medium">
                                </div>
                            </div>
                            <input id="redirectURI" name="redirectURI" type="hidden" value=" ">
                            <div id="showResult" class="control-group center margen-b10"></div>
                        </div>
                        <div class="form-actions">
                            <a href="<?php echo Url::toRoute(['member/login']); ?>" tabindex="6" class="btn btn-link text-muted">Login</a>
                            <button id="formSubmit" type="button" tabindex="4" class="btn btn-primary">Join</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!-- end -->

    </div>
</div>