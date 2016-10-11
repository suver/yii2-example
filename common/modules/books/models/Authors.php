<?php

namespace common\modules\books\models;

use suver\behavior\upload\UploadBehavior;
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
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'photo',
                'thumbnail' => [
                    'admin_preview' => ['size' => '200x200', 'prefix' => 'v1'],
                    'admin_preview_without_animate' => ['size' => '100x100', 'prefix' => 'v2', 'option' => ['jpeg_quality' => 10], 'animate' => false],
                    'medium2' => ['size' => 'x100'],
                    'medium3' => ['size' => '100'],
                ],
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
            ['photo', 'file', 'extensions' => ['jpg','png','gif'], 'maxSize' => 100*1024*1024, 'maxFiles' => 1, /*'tooBig' => 'Лимит 10Мб', 'tooMany' => '', 'wrongExtension', 'wrongMimeType'*/]
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
            'photo' => Yii::t('common', 'Фото'),
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
