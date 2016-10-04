<?php

namespace common\modules\books\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%books_catalog}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $date_publication
 * @property string $created_at
 * @property string $updated_at
 */
class Catalog extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%books_catalog}}';
    }


    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => '\backend\modules\books\components\Subset',
                'relation' => 'authors',
                'attribute' => 'authors_ids',
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['date_publication', 'created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['authors_ids'], 'each', 'rule' => ['integer']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'title' => Yii::t('common', 'Название'),
            'date_publication' => Yii::t('common', 'Дата издания'),
            'created_at' => Yii::t('common', 'Дата добавлени'),
            'updated_at' => Yii::t('common', 'Дата обновления'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\modules\books\models\query\CatalogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\books\models\query\CatalogQuery(get_called_class());
    }

    /**
     * Relation with News
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::className(), ['id' => 'author_id'])->viaTable('books_catalog_authors', ['book_id' => 'id']);
    }
}
