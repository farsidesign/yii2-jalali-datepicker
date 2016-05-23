yii2 jalali datepicker
======================
This extension is Jalali Bootstrap DatePicker

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist farsidesign/yii2-jalali-datepicker "dev-master"
```

or add

```
"farsidesign/yii2-jalali-datepicker": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= $form->field($model, 'time')->widget(\farsidesign\jalalidatepicker\DatePicker::classname(), [
    //'theme' => 'blue',
    'clientOptions' => [
            'format' => 'YYYY/MM/DD',
            'class' => 'form-control',
        ]
]) ?>```