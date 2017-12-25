<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.min.css',
        'css/qinco.css',
        'css/bootstrapValidator.min.css',
        'css/main2.css',
        //'css/player.css',

    ];
    public $js = [
        'js/jquery-1.7.2.js',
        'js/bootstrap.min.js',
        'js/artDialog/artDialog.js?skin=default',
        'js/artDialog/jquery.artDialog.js?skin=default',
        'js/artDialog/plugins/iframeTools.js',
        'js/main2.js',
        'js/page/seltab.js',
        'js/page/common.js',
//        'js/page/playlist.js',
//        'js/page/player.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    //定义按需加载JS方法，注意加载顺序在最后
    public static function addScript($view, $jsfile) {
        $view->registerJsFile($jsfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);
    }

    //定义按需加载css方法，注意加载顺序在最后
    public static function addCss($view, $cssfile) {
        $view->registerCssFile($cssfile, [AppAsset::className(), 'depends' => 'frontend\assets\AppAsset']);
    }

}
