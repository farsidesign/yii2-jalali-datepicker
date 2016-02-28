<?php
/**
 * DatepickerAsset.php
 *
 * @copyright Copyright Moslem Mobarakeh, https://github.com/farsidesign, 2016
 * @author Moslem Mobarakeh
 * @package farsidesign/yii2-jalali-datepicker
 * @license MIT
 */

namespace farsidesign\jalalidatepicker;

use yii\web\AssetBundle;

class DatepickerAsset extends AssetBundle
{
    public $sourcePath = '@bower/persian-datepicker/dist';
    public $css = [
    ];
    public $js = [
        'js/persian-datepicker-0.4.5.min.js',
    ];
    public $depends = [
        'farsidesign\jalalidatepicker\DateAsset',
    ];
}
