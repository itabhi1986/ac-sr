<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitb2d46438c29c20fc443b15af8e6e7104
{
    public static $files = array (
        '2cffec82183ee1cea088009cef9a6fc3' => __DIR__ . '/..' . '/ezyang/htmlpurifier/library/HTMLPurifier.composer.php',
        '2c102faa651ef8ea5874edb585946bce' => __DIR__ . '/..' . '/swiftmailer/swiftmailer/lib/swift_required.php',
    );

    public static $prefixLengthsPsr4 = array (
        'y' => 
        array (
            'yii\\swiftmailer\\' => 16,
            'yii\\redactor\\' => 13,
            'yii\\imagine\\' => 12,
            'yii\\httpclient\\' => 15,
            'yii\\gii\\' => 8,
            'yii\\faker\\' => 10,
            'yii\\debug\\' => 10,
            'yii\\composer\\' => 13,
            'yii\\codeception\\' => 16,
            'yii\\bootstrap\\' => 14,
            'yii\\authclient\\' => 15,
            'yii\\' => 4,
        ),
        'n' => 
        array (
            'nickcv\\mandrill\\' => 16,
        ),
        'k' => 
        array (
            'kartik\\sidenav\\' => 15,
            'kartik\\select2\\' => 15,
            'kartik\\plugins\\fileinput\\' => 25,
            'kartik\\file\\' => 12,
            'kartik\\base\\' => 12,
        ),
        'd' => 
        array (
            'dektrium\\user\\' => 14,
            'dektrium\\rbac\\' => 14,
        ),
        'c' => 
        array (
            'cebe\\markdown\\' => 14,
        ),
        'b' => 
        array (
            'bupy7\\cropbox\\' => 14,
        ),
        'F' => 
        array (
            'Faker\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'yii\\swiftmailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-swiftmailer',
        ),
        'yii\\redactor\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiidoc/yii2-redactor',
        ),
        'yii\\imagine\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-imagine',
        ),
        'yii\\httpclient\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-httpclient',
        ),
        'yii\\gii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-gii',
        ),
        'yii\\faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-faker',
        ),
        'yii\\debug\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-debug',
        ),
        'yii\\composer\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-composer',
        ),
        'yii\\codeception\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-codeception',
        ),
        'yii\\bootstrap\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-bootstrap',
        ),
        'yii\\authclient\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2-authclient',
        ),
        'yii\\' => 
        array (
            0 => __DIR__ . '/..' . '/yiisoft/yii2',
        ),
        'nickcv\\mandrill\\' => 
        array (
            0 => __DIR__ . '/..' . '/nickcv/yii2-mandrill/src',
        ),
        'kartik\\sidenav\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-sidenav',
        ),
        'kartik\\select2\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-select2',
        ),
        'kartik\\plugins\\fileinput\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/bootstrap-fileinput',
        ),
        'kartik\\file\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-widget-fileinput',
        ),
        'kartik\\base\\' => 
        array (
            0 => __DIR__ . '/..' . '/kartik-v/yii2-krajee-base',
        ),
        'dektrium\\user\\' => 
        array (
            0 => __DIR__ . '/..' . '/dektrium/yii2-user',
        ),
        'dektrium\\rbac\\' => 
        array (
            0 => __DIR__ . '/..' . '/dektrium/yii2-rbac',
        ),
        'cebe\\markdown\\' => 
        array (
            0 => __DIR__ . '/..' . '/cebe/markdown',
        ),
        'bupy7\\cropbox\\' => 
        array (
            0 => __DIR__ . '/..' . '/bupy7/yii2-widget-cropbox',
        ),
        'Faker\\' => 
        array (
            0 => __DIR__ . '/..' . '/fzaninotto/faker/src/Faker',
        ),
    );

    public static $prefixesPsr0 = array (
        'M' => 
        array (
            'Mandrill' => 
            array (
                0 => __DIR__ . '/..' . '/mandrill/mandrill/src',
            ),
        ),
        'I' => 
        array (
            'Imagine' => 
            array (
                0 => __DIR__ . '/..' . '/imagine/imagine/lib',
            ),
        ),
        'H' => 
        array (
            'HTMLPurifier' => 
            array (
                0 => __DIR__ . '/..' . '/ezyang/htmlpurifier/library',
            ),
        ),
        'D' => 
        array (
            'Diff' => 
            array (
                0 => __DIR__ . '/..' . '/phpspec/php-diff/lib',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitb2d46438c29c20fc443b15af8e6e7104::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitb2d46438c29c20fc443b15af8e6e7104::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitb2d46438c29c20fc443b15af8e6e7104::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}
