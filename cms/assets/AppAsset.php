<?php

namespace cms\assets;

use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
      'css/site.css',
      'login/fonts/material-icon/css/material-design-iconic-font.min.css',
      'login/css/style.css',

    ];
    public $js = [
      'login/vendor/jquery/jquery.min.js',
      'login/js/main.js',
    
        
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
