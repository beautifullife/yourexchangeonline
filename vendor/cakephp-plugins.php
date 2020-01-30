<?php
$baseDir = dirname(dirname(__FILE__));
return [
    'plugins' => [
        'AjaxMultiUpload' => $baseDir . '/plugins/AjaxMultiUpload/',
        'Bake' => $baseDir . '/vendor/cakephp/bake/',
        'DebugKit' => $baseDir . '/vendor/cakephp/debug_kit/',
        'FacebookOAuth' => $baseDir . '/plugins/FacebookOAuth/',
        'GoogleLogin' => $baseDir . '/plugins/GoogleLogin/',
        'GooglePlus' => $baseDir . '/plugins/GooglePlus/',
        'Gourmet' => $baseDir . '/plugins/Gourmet/',
        'Migrations' => $baseDir . '/vendor/cakephp/migrations/',
        'ReCaptcha' => $baseDir . '/plugins/ReCaptcha/',
        'YahooAPI' => $baseDir . '/plugins/YahooAPI/'
    ]
];
