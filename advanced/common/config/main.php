<?php
return [
    'name' => 'TrainBox',
    'language'=>'zh-CN',
    'timeZone'=>'Asia/Shanghai',
    //'runtimePath'=>'@common/runtime',

    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
];
