<?php

namespace common\modules\books\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "{{%books_authors}}".
 *
 * @property integer $id
 * @property string $full_name
 * @property string $created_at
 * @property string $updated_at
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%books_authors}}';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['full_name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['full_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('common', 'ID'),
            'full_name' => Yii::t('common', 'ФИО'),
            'created_at' => Yii::t('common', 'Дата добавления'),
            'updated_at' => Yii::t('common', 'Дата обновления'),
        ];
    }

    /**
     * @inheritdoc
     * @return \common\modules\books\models\query\AuthorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\modules\books\models\query\AuthorsQuery(get_called_class());
    }

    /**
     * Relation with News
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(self::className(), ['id' => 'author_id'])->viaTable('books_catalog_authors', ['catalog_id' => 'id']);
    }
}
