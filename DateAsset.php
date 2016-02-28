<?php
/**
 * DateAsset.php
 *
 * @copyright Copyright Moslem Mobarakeh, https://github.com/farsidesign, 2016
 * @author Moslem Mobarakeh
 * @package farsidesign/yii2-jalali-datepicker
 * @license MIT
 */

namespace farsidesign\jalalidatepicker;

use yii\web\AssetBundle;

class DateAsset extends AssetBundle
{
    public $sourcePath = '@bower/persian-datepicker/lib';
    public $js = [
        'persian-date.js',
    ];
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapPluginAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
