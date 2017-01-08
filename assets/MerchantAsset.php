<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class MerchantAsset extends AssetBundle
{
    public $basePath = '@webroot/';
    public $baseUrl = '@web/themes/searchview';
    public $css = [ 
       
        'css/social.core.css',
        'css/social.admin.css',
        'css/font-awesome.min.css',
         'css/glyphicons.css',
         'css/glyphicons.halflings.css',
         'css/facebook.css',
        
        
    ];
    public $js = [
      
         'js/jquery.slimscroll/jquery.slimscroll.min.js',        
          'js/sidebar.js',
        'js/panels.js',
         'js/backend.js',
        
       
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
