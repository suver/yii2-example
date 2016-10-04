<?php

namespace backend\modules\books;

/**
 * bookshop module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'backend\modules\books\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();

        if (\Yii::$app instanceof \yii\console\Application) {
            $this->controllerNamespace = 'backend\modules\books\commands';
        }

        // инициализация модуля с помощью конфигурации, загруженной из config.php
        \Yii::configure($this, require(__DIR__ . '/config.php'));

        // custom initialization code goes here
    }
}
