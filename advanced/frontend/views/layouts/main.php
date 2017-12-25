<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;

use frontend\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="Content-Language" content="<?= Yii::$app->language ?>">
    <?= Html::csrfMetaTags() ?>
    <link rel="shortcut icon" href="/img/favicon.ico">
    <title><?= Html::encode($this->title) ?></title>
    <meta name="description" content="NorthPark,文艺,小清新,Mac软件,影视窝,碎碎念,图册,情圣,情商提升">
    <meta name="keywords" content="NorthPark是一个很小清新的互动公园。NorthPark包含了丰富的Mac软件资源、最新的影视剧资源、大量提升男生情商的文章、大家吐槽的，喜爱的，心情日记的精神角落、图册互动等版块。它富有交互性和趣味性，文艺范和小清新，并且可以和你的朋友们为某个兴趣互动。">
    <style type="text/css"></style>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="navbar navbar-default navbar-fixed-top mainhead-navbox" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle mainhead-navbtn" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">菜单导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="navbar-brand">
                <a href="/" title="首页" class="mainhead-avatar">
                    <img src="img/davatar.jpg" class="img-circle max-width-50" height="40" width="40">
                </a>
                &nbsp; &nbsp;
                <a href="<?php  echo Url::toRoute('person/addlove');?>" title="添加图册"  class="btn btn-hero">
                    <span class="glyphicon glyphicon-plus"></span> 添加
                </a>
                &nbsp; &nbsp;
                <?php
                    $user_id = Yii::$app->session->get('user_id');
                    if (isset($user_id) && $user_id) {
                ?>
                    <a href="<?php echo Url::toRoute(['member/logout']); ?>" title="退出" id="J_log_info_l">
                        <span class="glyphicon glyphicon-off"></span>退出
                    </a>
                <?php
                    } else {
                ?>
                    <a href="<?php echo Url::toRoute(['member/login']); ?>" title="登录" id="J_log_info_l">
                        <span class="glyphicon glyphicon-on"></span>登陆
                    </a>
                <?php
                    }
                ?>
            </div>
        </div>
        <div class="navbar-collapse collapse mainhead-collapse">
            <ul class="nav mainhead-nav" id="J_tabs">

                <li cname="movies"><a href="/movies" title="丰富的网盘资源，最新的热剧尽在我的小窝">影视窝</a></li>
                <li cname="soft"><a href="/soft/mac" title="丰富的mac软件资源">Mac软件</a></li>
                <li cname="love" <?php if($this->context->id == 'love') { echo ' class="active"';} ;?>><a href="<?php echo Url::toRoute(['love/index']); ?>" title="一张图片，爱满满的">最爱</a></li>
                <li cname="note" <?php if($this->context->id == 'note') { echo ' class="active"';} ;?>><a href="<?php echo Url::toRoute(['note/index']); ?>" title="一段歌词，一段回忆">碎碎念</a></li>

                <?php
                    $user_id = Yii::$app->session->get('user_id');
                    if (isset($user_id) && $user_id) {
                ?>
                    <li cname="pcenter" <?php if($this->context->id == 'person') { echo ' class="active"';} ;?>>
                        <a id="J_log_info_r" title="登录-个人中心" href="<?php echo Url::toRoute(['person/index']); ?>">我自己</a>
                    </li>
                <?php
                    } else {
                ?>
                    <li cname="pcenter" <?php if($this->context->id == 'member') { echo ' class="active"';} ;?>>
                        <a id="J_log_info_r" title="登录-个人中心" href="<?php echo Url::toRoute(['member/login']); ?>">登陆</a>
                    </li>
                <?php
                    }
                ?>
            </ul>
        </div>
    </div>
</div>

<?= $content ?>

<footer class="mainfoot center ">
    <div class="row">
        <div class="col-md-12">
            <p1>
                2014 © <span class="glyphicon glyphicon-heart"></span> NorthPark. ALL Rights Reserved.
            </p1>
            <p2>
                <a target="_blank"  href="http://blog.NorthPark.cn" rel="nofollow" title="NorthPark博客">NorthPark博客</a>
                <a target="_blank"  href="http://shop.NorthPark.cn" rel="nofollow" title="NorthPark商城">NorthPark商城</a>
                <a target="_blank"  href="/poem/index.html" title="诗词秀" >诗词秀<span class="badge green-badge">new</span></a>
                <a target="_blank"  href="/romeo" title="情圣日记">情圣日记</a>
                <a target="_blank"  href="/cm/xbjt" title="原创音乐播放器" >小布静听</a>
                <a target="_blank"  href="/about.html" title="关于NorthPark" class="aend">关于NorthPark</a>
                <!-- <a target="_blank"  href="/wx/astro" title="星座运势、人性化的美少女塔罗牌消息私人订制"  class="aend" >星座美少女</a> -->

            </p2>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
