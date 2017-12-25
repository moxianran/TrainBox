<?php
use yii\helpers\Url;
use frontend\assets\AppAsset;
use yii\helpers\Html;
AppAsset::addScript($this,'@web/js/page/lrc/lyricadd.js');
?>

<div class="clearfix maincontent ">
    <div class="container">
        <div class="mainbody" style="margin-top: 5em;">
            <div class="align-center bg-white radius-5 padding10 max-width-400 min-width-300">
                <form method="POST" accept-charset="UTF-8" role="form" id="addItemForm" style="color: #444;" class="form margin-t20"  enctype="multipart/form-data">
                    <div class="clearfix">
                        <h4>
                            <span class="glyphicon glyphicon-plus"></span> 添加我的最爱
                        </h4>
                        <hr>
                    </div>

                    <span style="color: #999; opacity: 1;">主题</span>
                    <div class="form-group padding-b20">
                        <input id="title" placeholder="暴雨中漫步"
                               class="form-control  input-lg  border-light-1 bg-lyellow grid98 radius-0"
                               name="title" type="text">
                    </div>
                    <input type="hidden" name="pic" id="pic" value="" />
                    <div class="form-group  padding-b20">
                        <button onclick="upload_pic()" type="button" class="btn btn-large btn-gray btn-round ">
                            <span class="glyphicon"></span>
                            上传图片
                        </button>
                    </div>
                    <div class="clearfix hidden" id="searchResult"></div>

                    <div id="preview" class="form-group " >
                        <img id="imghead" border=0 src="/img/head_180.jpg" width="200" height="200" />
                    </div>
                    <div class="form-group">
                        <input id="formSubmit"
                               class="btn btn-hero btn-xlg margin-t10 grid50" value="添加"
                               type="button">
                    </div>
                </form>
            </div>
            <br>
            <br>
        </div>
    </div>
</div>
<form enctype="multipart/form-data" id="formF" name="fileinfo" style="display: none;">
    <input type="file" id="btnUpload" name="UploadForm[imageFile]"/>
</form>