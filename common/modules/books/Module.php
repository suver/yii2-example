<?php

namespace common\modules\books;

/**
 * bookshop module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'common\modules\books\controllers';
    public $defaultAuthorPerPage = 25;
    public $defaultCatalogPerPage = 25;

    public $menu = [];

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        $this->menu = [
            [
                'label' => 'Каталог книг',
                'icon' => 'fa fa-book',
                'url' => ['/books'],
                'alias' => ['books'],
                'items' => [
                    [
                        'label' => 'Каталог книг',
                        'url' => ['/books/catalog'],
                        'alias' => ['books/catalog'],
                    ],
                    [
                        'label' => 'Авторы',
                        'url' => ['/books/authors'],
                        'alias' => ['books/authors'],
                        //'visible' => \Yii::$app->getUser()->can('catalog.index'),
                    ],
                ],
            ],
        ];

        if (\Yii::$app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'common\modules\books\commands';
        }

        // инициализация модуля с помощью конфигурации, загруженной из config.php
        \Yii::configure($this, require(__DIR__ . '/config.php'));

        // custom initialization code goes here
    }
}
