<?php
/**
 * DatePicker.php
 *
 * @copyright Copyright Moslem Mobarakeh, https://github.com/farsidesign, 2016
 * @author Moslem Mobarakeh
 * @package farsidesign/yii2-jalali-datepicker
 * @license MIT
 */

namespace farsidesign\jalalidatepicker;

use Yii;
use yii\base\InvalidParamException;
use yii\base\Model;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\widgets\InputWidget;

class DatePicker extends InputWidget
{
    public $clientOptions = [];
    public $inline = false;
    public $containerOptions = [];
    public $dateFormat;
    public $theme = 'default';
    public $attribute;
    public $value;


    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->inline && !isset($this->containerOptions['id'])) {
            $this->containerOptions['id'] = $this->options['id'] . '-container';
        }
        if ($this->dateFormat === null) {
            $this->dateFormat = Yii::$app->formatter->dateFormat;
        }
    }

    /**
     * Renders the widget.
     */
    public function run()
    {
        echo $this->renderWidget() . "\n";

        $containerID = $this->inline ? $this->containerOptions['id'] : $this->options['id'];
        $view = $this->getView();
        $options = Json::htmlEncode($this->clientOptions);
        $view->registerJs("$('#{$containerID}').persianDatepicker($.extend({}, {}, $options));");
            
        $this->clientOptions['theme'] = $this->theme;
        if ($this->theme === 'default') {
            DatepickerThemeAsset::register($view);
        } else {
            $this->{'Datepicker' . ucfirst($this->theme) . 'ThemeAsset'}($view);
        }
        DatepickerAsset::register($view);
    }

    /**
     * Renders the DatePicker widget.
     * @return string the rendering result.
     */
    protected function renderWidget()
    {
        $contents = [];

        // get formatted date value
        if ($this->hasModel()) {
            $value = Html::getAttributeValue($this->model, $this->attribute);
        } else {
            $value = $this->value;
        }
        if ($value !== null && $value !== '') {
            // format value according to dateFormat
            try {
                $value = Yii::$app->formatter->asDate($value, $this->dateFormat);
            } catch(InvalidParamException $e) {
            }
        }
        $this->clientOptions['defaultDate'] = $value;
        $this->clientOptions['altField'] = '#' . $this->options['id'];
        $options = $this->clientOptions;
        
        //$options['value'] = $value;
        

        if ($this->inline === false) {
            // render a text input
            if ($this->hasModel()) {
                $contents[] = Html::activeTextInput($this->model, $this->attribute, $options);
            } else {
                //$contents[] = Html::textInput($this->name, $value, $options);
            }
        } else {
            // render an inline date picker with hidden input
            if ($this->hasModel()) {
                $contents[] = Html::activeHiddenInput($this->model, $this->attribute, $options);
            } else {
                $contents[] = Html::hiddenInput($this->name, $value, $options);
            }
            
            $contents[] = Html::tag('div', null, $this->containerOptions);
        }

        return implode("\n", $contents);
    }
    
    protected function DatepickerBlueThemeAsset($view)
    {
        DatepickerBlueThemeAsset::register($view);
    }
    protected function DatepickerRedblackThemeAsset($view)
    {
        DatepickerRedblackThemeAsset::register($view);
    }
    protected function DatepickerDarkThemeAsset($view)
    {
        DatepickerDarkThemeAsset::register($view);
    }
    protected function DatepickerCheerupThemeAsset($view)
    {
        DatepickerCheerupThemeAsset::register($view);
    }
}
