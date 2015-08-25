<?php

namespace app\models;

use Yii;
use janisto\ycm\behaviors\FileBehavior;

/**
 * This is the model class for table "{{%example}}".
 *
 * @property integer $id
 * @property string $field_widget
 * @property string $field_wysiwyg
 * @property string $field_date
 * @property string $field_time
 * @property string $field_datetime
 * @property string $field_select
 * @property string $field_selectMultiple
 * @property string $field_image
 * @property string $field_file
 * @property string $field_text
 * @property string $field_hidden
 * @property string $field_password
 * @property string $field_textarea
 * @property string $field_radio
 * @property integer $field_boolean
 * @property integer $field_checkbox
 * @property string $field_dropdown
 * @property string $field_listbox
 * @property string $field_checkboxList
 * @property string $field_radioList
 * @property string $field_disabled
 * @property string $field_hide
 * @property string $field_html5
 */
class Example extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => FileBehavior::className(),
                'folderName' => 'example',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%example}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['field_wysiwyg', 'field_textarea'], 'string'],
            [['field_date', 'field_time', 'field_datetime', 'field_selectMultiple'], 'safe'],
            [['field_boolean', 'field_checkbox'], 'integer'],
            [['field_widget', 'field_select', 'field_text', 'field_hidden', 'field_password', 'field_radio', 'field_dropdown', 'field_listbox', 'field_checkboxList', 'field_radioList', 'field_disabled', 'field_hide', 'field_html5'], 'string', 'max' => 255],
            [['field_image'], 'image', 'maxSize' => 1024 * 1024 * 1, 'maxWidth' => 2560, 'maxHeight' => 2560],
            [['field_file'], 'file', 'maxSize' => 1024 * 1024 * 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'field_widget' => 'Field Widget',
            'field_wysiwyg' => 'Field Wysiwyg',
            'field_date' => 'Field Date',
            'field_time' => 'Field Time',
            'field_datetime' => 'Field Datetime',
            'field_select' => 'Field Select',
            'field_selectMultiple' => 'Field Select Multiple',
            'field_image' => 'Field Image',
            'field_file' => 'Field File',
            'field_text' => 'Field Text',
            'field_hidden' => 'Field Hidden',
            'field_password' => 'Field Password',
            'field_textarea' => 'Field Textarea',
            'field_radio' => 'Field Radio',
            'field_boolean' => 'Field Boolean',
            'field_checkbox' => 'Field Checkbox',
            'field_dropdown' => 'Field Dropdown',
            'field_listbox' => 'Field Listbox',
            'field_checkboxList' => 'Field Checkbox List',
            'field_radioList' => 'Field Radio List',
            'field_disabled' => 'Field Disabled',
            'field_hide' => 'Field Hide',
            'field_html5' => 'Field HTML5',
        ];
    }

    /**
     * Config for attribute widgets (ycm)
     *
     * @return array
     */
    public function attributeWidgets()
    {
        /**
         * You should configure attribute widget as: ['field', 'widget'].
         *
         * If you need to pass additional configuration to the widget, add them as: ['field', 'widget', 'key' => 'value'].
         * The first two items are sliced from the array, and then it's passed to the widget as: ['key' => 'value'].
         *
         * There are couple of exceptions to this slicing:
         * If you use 'hint', 'hintOptions', 'label' or 'labelOptions' the widget will render hint and/or label and
         * then it will unset those keys and pass the array to the widget.
         *
         * If you use 'widget', you must also set 'widgetClass'.
         *
         * Check each widget to see what options you can override/set.
         */

        // example data
        $data = [
            'One',
            'Two',
            'Three',
            'Four',
            'Five',
            'Six',
            'Seven',
            'Eight',
            'Nine',
            'Ten',
        ];

        return [
            //['field_widget', 'widget', 'widgetClass' => \yii\jui\DatePicker::classname()],
            //['field_widget', 'widget', 'widgetClass' => \yii\jui\DatePicker::classname(), 'options' => ['class' => 'form-control'], 'hint' => 'This is a hint', 'hintOptions' => ['class' => 'hint-block extra-class'], 'label' => 'DatePicker', 'labelOptions' => ['class' => 'control-label extra-class']],
            ['field_widget', 'widget', 'widgetClass' => \yii\jui\AutoComplete::classname(), 'options' => ['class' => 'form-control'], 'clientOptions' => ['source' => $data], 'hint' => 'Type: t', 'label' => 'Autocomplete'],

            ['field_wysiwyg', 'wysiwyg'],
            //['field_wysiwyg', 'wysiwyg', 'options' => ['class' => 'extra-class'], 'settings' => ['minHeight' => 80, 'plugins' => null, 'buttons' => ['formatting', 'bold', 'italic']]],

            ['field_date', 'date'],
            //['field_date', 'date', 'options' => ['class' => 'extra-class'], 'clientOptions' => ['changeMonth' => true, 'changeYear' => true, 'yearRange' => '1900:2000', 'dateFormat' => 'yy-mm-dd']],

            ['field_time', 'time'],
            //['field_time', 'time', 'options' => ['class' => 'extra-class'], 'clientOptions' => ['showSecond' => false, 'timeFormat' => 'HH:mm:ss'], 'addon' => '<i class="glyphicon glyphicon-time"></i>'],

            ['field_datetime', 'datetime'],
            //['field_datetime', 'datetime', 'options' => ['class' => 'extra-class'], 'clientOptions' => ['changeYear' => true, 'showSecond' => false]],

            ['field_select', 'select'],
            //['field_select', 'select', 'options' => ['class' => 'extra-class', 'placeholder' => 'Other text'], 'settings' => ['allowClear' => false]],

            ['field_selectMultiple', 'selectMultiple'],
            //['field_selectMultiple', 'selectMultiple', 'options' => ['class' => 'extra-class', 'placeholder' => 'Other text'], 'settings' => ['allowClear' => false]],

            // Don't use 'hint' with image or file widget, it's reserved for preview / delete checkbox.
            ['field_image', 'image'],
            //['field_image', 'image', 'class' => 'extra-class', 'label' => 'Image upload'],

            ['field_file', 'file'],
            //['field_image', 'image', 'class' => 'extra-class', 'label' => 'File upload'],

            ['field_text', 'text'],
            //['field_text', 'text', 'class' => 'form-control extra-class', 'placeholder' => 'Placeholder text', 'hint' => 'Hint text', 'label' => 'Label text'],

            ['field_hidden', 'hidden'],

            ['field_password', 'password'],
            //['field_password', 'password', 'class' => 'form-control extra-class', 'placeholder' => 'Placeholder password', 'autocomplete' => 'off'],

            ['field_textarea', 'textarea'],
            //['field_textarea', 'textarea', 'class' => 'form-control extra-class', 'placeholder' => 'Placeholder textarea', 'rows' => 4],

            ['field_radio', 'radio'],
            //['field_radio', 'radio', 'class' => 'extra-class', 'hint' => 'Hint radio'],

            // Boolean and checkbox use the same code.
            ['field_boolean', 'boolean'],
            ['field_checkbox', 'checkbox'],
            //['field_checkbox', 'checkbox', 'class' => 'extra-class', 'hint' => 'Hint radio'],

            ['field_dropdown', 'dropdown'],
            //['field_dropdown', 'dropdown', 'class' => 'form-control extra-class', 'hint' => 'Hint dropdown'],
            //['field_dropdown', 'dropdown', 'disabled' => 'disabled', 'prompt' => ''],

            ['field_listbox', 'listbox'],
            //['field_listbox', 'listbox', 'class' => 'form-control extra-class', 'hint' => 'Hint listbox'],

            ['field_checkboxList', 'checkboxList'],
            //['field_checkboxList', 'checkboxList', 'class' => 'extra-class', 'hint' => 'Hint checkboxList'],

            ['field_radioList', 'radioList'],
            //['field_radioList', 'radioList', 'class' => 'extra-class', 'hint' => 'Hint radioList'],

            ['field_disabled', 'disabled'],

            ['field_hide', 'hide'],

            //['field_html5', 'text', 'input' => 'color'],
            //['field_html5', 'text', 'input' => 'date'],
            //['field_html5', 'text', 'input' => 'datetime'],
            //['field_html5', 'text', 'input' => 'datetime-local'],
            //['field_html5', 'text', 'input' => 'email'],
            //['field_html5', 'text', 'input' => 'month'],
            //['field_html5', 'text', 'input' => 'number'],
            //['field_html5', 'text', 'input' => 'range'],
            //['field_html5', 'text', 'input' => 'search'],
            //['field_html5', 'text', 'input' => 'tel'],
            //['field_html5', 'text', 'input' => 'time'],
            //['field_html5', 'text', 'input' => 'url'],
            //['field_html5', 'text', 'input' => 'week'],
            ['field_html5', 'text', 'input' => 'number', 'min' => 1, 'max' => 5, 'hint' => 'Number between 1 - 5.']

        ];
    }

    /**
     * Select choices for field_select (ycm)
     *
     * @return array
     */
    public static function field_selectChoices()
    {
        return [
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
        ];
    }

    /**
     * Select choices for field_selectMultiple (ycm)
     *
     * @return array
     */
    public static function field_selectMultipleChoices()
    {
        return [
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
        ];
    }

    /**
     * Select choices for field_dropdown (ycm)
     *
     * @return array
     */
    public static function field_dropdownChoices()
    {
        return [
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
        ];
    }

    /**
     * Select choices for field_listbox (ycm)
     *
     * @return array
     */
    public static function field_listboxChoices()
    {
        return [
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
        ];
    }

    /**
     * Select choices for field_checkboxList (ycm)
     *
     * @return array
     */
    public static function field_checkboxListChoices()
    {
        return [
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
        ];
    }

    /**
     * Select choices for field_radioList (ycm)
     *
     * @return array
     */
    public static function field_radioListChoices()
    {
        return [
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
        ];
    }

    /**
     * Grid view columns for ActiveDataProvider (ycm)
     *
     * @return array
     *
     * @see http://www.yiiframework.com/doc-2.0/guide-output-data-widgets.html#column-classes
     * @see http://www.yiiframework.com/doc-2.0/guide-output-formatter.html#other-formatters
     * @see http://www.bsourcecode.com/yiiframework2/gridview-in-yiiframework-2-0/#GridView-Column-Content-Options
     */
    public function gridViewColumns()
    {
        return [
            'id',
            'field_widget',

            //'field_wysiwyg',
            'field_wysiwyg:html',

            //'field_date',
            'field_date:date',

            //'field_time',
            'field_time:time',

            //'field_datetime',
            //'field_datetime:datetime',
            [
                'attribute' => 'field_datetime',
                'format' => ['date', 'php:d.m.Y H:i:s']
            ],

            //'field_select',
            [
                'label'=>'Field Select Value',
                'attribute' => 'field_select',
                'value' => function ($model) {
                    if (isset($this->field_selectChoices()[$model->field_select])) {
                        return $this->field_selectChoices()[$model->field_select];
                    }
                    return null;
                },
            ],

            //'field_image',
            [
                'attribute' => 'field_image',
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function($model) {
                    return $model->getFileUrl('field_image');
                },
                'contentOptions' => ['class' => 'image-class'],
            ],
        ];
    }

    /**
     * Grid view sort for ActiveDataProvider (ycm)
     *
     * @return array
     *
     * @see http://www.yiiframework.com/doc-2.0/guide-output-data-widgets.html#sorting-data
     */
    public function gridViewSort()
    {
        return [
            'defaultOrder' => [
                'id' => SORT_DESC,
            ]
        ];
    }
}
