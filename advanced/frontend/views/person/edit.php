<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::addScript($this,'@web/js/bootstrap-datepicker.js');
AppAsset::addScript($this,'@web/js/page/editinfo.js');
?>
<div class="clearfix maincontent" >
    <div class="container">
        <div class="mainbody padding-t20" id="J_maincontent" style="margin-top:70px;">

            <input type="hidden" id="J_tail_slug" value="" />
            <div class="col-lg-6 col-lg-offset-3 bg-white radius-5  min-width-300">
                <form method="POST" enctype="multipart/form-data"
                      accept-charset="UTF-8" role="form" style="color:#444;" id="f1" class="form-horizontal margin-t20">
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3 text-left">
                            <h3>编辑我的档案</h3>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="email" class="col-md-3 control-label input-lg">
                            注册邮箱：
                        </label>
                        <div class="col-md-9 text-left">
                            <p id="email" class="input-lg padding0 control-label text-left">
                                <?php echo $user['email'] ?>
                            </p>
                            <p class="help-block">
                                修改邮箱，请
                                <a href="javascript:void(0)">
                                    联系我们
                                </a>
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group ">
                        <label for="username" class="col-md-3 control-label input-lg">
                            昵称：
                        </label>
                        <div class="col-md-9 text-left">
                            <input id="nickname" placeholder="全世界我最帅"
                                   class="form-control border-light-1 input-lg bg-lyellow padding10 grid70 radius-0"
                                   name="User[nickname]" type="text" value="<?php echo $user['nickname'] ?>">
                            <p class="help-block">可以包含中文、英文、字母</p>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group ">
                        <label for="user_avatar" class="col-md-3 control-label input-lg">
                            头像：
                        </label>
                        <div class="col-md-9 text-left">
                            <div class="row">
                                <div class="col-xs-3" id="preview">

                                    <input type="hidden" name="User[head_img]" id="head_img" value="<?php echo $user['head_img'] ?>" />
                                    <?php
                                        if(isset($user['head_img']) && $user['head_img']) {
                                    ?>
                                        <img id="imghead" src="<?php echo $user['head_img'] ?>" class="img-responsive">
                                    <?php
                                        } else {
                                    ?>
                                        <img id="imghead" src="/img/davatar.jpg" class="img-responsive">
                                    <?php
                                        }
                                    ?>
                                </div>
                                <div class="col-xs-9">
                                    <div id="plupload_box_uploadavatar50777" style="position: relative;">
                                        <div class="clearfix " style="height:10px;"></div>
                                        <div class="clearfix">
                                            <button onclick="upload_pic()" type="button" class="btn btn-large btn-gray btn-round ">
                                                <span class="glyphicon"></span>
                                                修改头像
                                            </button>
                                        </div>
                                    </div>
                                    <div class="clearfix " style="height:10px;"></div>
                                    <p class="help-block">JPG或者PNG格式</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
<!--                    <div class="form-group ">-->
<!--                        <label for="tail_slug" class="col-md-3 control-label input-lg ">-->
<!--                            域名代号：-->
<!--                        </label>-->
<!--                        <div class="col-md-9 text-left ">-->
<!--                            <div class="clearfix">-->
<!--                                <p class="">-->
<!--                                    <b style="font-size:1.6em">-->
<!--                                        <input id="tail_slug" placeholder="vivian1987" required class="input-lg grid33 border-light-1 bg-lyellow radius-0"-->
<!--                                               name="tail_slug" type="text" value="">-->
<!--                                    </b>-->
<!--                                </p>-->
<!--                            </div>-->
<!--                            <div class="clearfix">-->
<!--                                <p class="help-block">-->
<!--                                    可以用2~20位的英文或者数字组成-->
<!--                                </p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <hr>-->
                    <div class="form-group ">
                        <label for="user_birth" class="col-md-3 control-label input-lg">
                            生日：
                        </label>
                        <div class="col-md-9 text-left">
                            <div class="row">
                                <input id="user_nick" placeholder="1991-12-31" class="form_date form-control border-light-1 input-lg bg-lyellow padding10 grid70 radius-0"
                                       name="User[birthday]" type="text" value="<?php echo date("Y-m-d",$user['birthday']) ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group ">
                        <label for="courseware" class="col-md-3 control-label input-lg">
                            博客/网站：
                        </label>
                        <div class="col-md-9 text-left">
                            <div class="row">
                                <input id="User[website]" placeholder="http://weibo.com" class="form-control border-light-1 input-lg bg-lyellow padding10 grid70 radius-0"
                                       name="User[website]" type="text" value="<?php echo $user['website'] ?>">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group ">
                        <label for="passwordBtn" class="col-md-3 control-label input-lg">
                            密码：
                        </label>
                        <div class="col-md-9 text-left">
                            <p class="input-lg padding0" id="passwordBtn">
                                <button type="button" class="btn btn-gray btn-lg click2show" data-dismiss="#passwordBtn"
                                        data-target="#passwordBox">
                                    修改密码
                                </button>
                            </p>
                            <div class="row hidden" id="passwordBox">
                                <div class="col-sm-6">
                                    <p>
                                        新密码：
                                        <input id="new_password" class="form-control  input-md  border-light-1 bg-lyellow  grid98 radius-0"
                                               name="new_password" type="password" value="">
                                    </p>
                                </div>
                                <div class="col-sm-6">
                                    <p>
                                        重复一次：
                                        <input id="new_password_confirmation" class="form-control  input-md  border-light-1 bg-lyellow  grid98 radius-0"
                                               name="new_password_confirmation" type="password" value="">
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-md-9  text-left">
                            <input id="formSubmit" class="btn btn-hero btn-lg margin-t10 " type="button" onclick="saves()"
                                   value="更新档案">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<form enctype="multipart/form-data" id="formF" name="fileinfo" style="display: none;">
    <input type="file" id="btnUpload" name="UploadForm[imageFile]"/>
</form>
