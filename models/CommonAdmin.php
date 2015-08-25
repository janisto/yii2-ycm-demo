<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * Add only admin related methods and properties here.
 */
class CommonAdmin extends Common
{
    public $adminNames = ['Common models', 'common model', 'common models']; // admin interface, singular, plural
    //public $hideCreateAction = true;
    //public $hideUpdateAction = true;
    //public $hideDeleteAction = true;
    public $downloadCsv = true;
    public $downloadMsCsv = true;
    public $downloadExcel = true;
    public $excludeDownloadFields = ['created_at', 'updated_at'];

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class if you have any
        return Model::scenarios();
    }

    /**
     * Config for attribute widgets (ycm)
     *
     * @return array
     */
    public function attributeWidgets()
    {
        return [
            ['slug', 'text', 'hint' => 'URL will change if you rename this!'],
            ['status', 'dropdown'],
            ['content', 'wysiwyg'],
            ['picture', 'image'],
            ['created_at', 'disabled'],
            ['updated_at', 'disabled'],
        ];
    }

    /**
     * Select choices for status (ycm)
     *
     * @return array
     */
    public function statusChoices()
    {
        return [
            self::STATUS_VISIBLE => 'Visible',
            self::STATUS_ARCHIVED => 'Archived',
        ];
    }

    /**
     * Grid view columns for ActiveDataProvider (ycm)
     *
     * @return array
     */
    public function gridViewColumns()
    {
        return [
            'id',
            [
                'attribute' => 'status',
                'value' => function ($model) {
                    return $this->statusChoices()[$model->status];
                },
            ],
            'title',
            'content:html',
            [
                'attribute' => 'picture',
                'format' => ['image', ['width' => '100', 'height' => '100']],
                'value' => function($model) {
                    return $model->getFileUrl('picture');
                },
                'contentOptions' => ['class' => 'image-class'],
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:d.m.Y H:i:s']
            ],
        ];
    }

    /**
     * Grid view sort for ActiveDataProvider (ycm)
     *
     * @return array
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
