<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = 'http://localhost:85/saccomanager/new/html/';
    public $css = [
        'assets/stylesheets/demo.css',
        'assets/stylesheets/skin.css',
        'assets/stylesheets/theme-libs-plugins.css'
    ];
    public $js = [
        'assets/scripts/lib/modernizr-custom.js',
        'assets/scripts/lib/respond.js',
        'assets/scripts/theme/theme-plugins.js',
        'assets/scripts/theme/main.js',
        'assets/scripts/lib/tether.min.js',
        'assets/scripts/lib/jquery-ui.js',
        'assets/scripts/demo/demo-skin.js',
        'assets/scripts/demo/bar-chart-menublock.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];

}
