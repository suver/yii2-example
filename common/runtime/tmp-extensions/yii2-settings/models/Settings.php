<?php

namespace suver\settings\models;

use Yii;
use yii\db\Expression;

/**
 * This is the model class for table "{{%suver-settings}}".
 *
 * @property string $key
 * @property integer $user_id
 * @property string $params
 * @property string $value
 * @property integer $type
 */
class Settings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%suver_settings}}';
    }

    public function behaviors()
    {
        return [];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['key'], 'required'],
            [['user_id', 'type'], 'integer'],
            [['value', 'params'], 'safe'],
            [['key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'type' => Yii::t('common', 'Тип'),
            'key' => Yii::t('common', 'Ключь'),
            'value' => Yii::t('common', 'Значение'),
            'user_id' => Yii::t('common', 'Пользователь'),
            'params' => Yii::t('common', 'Параметры'),
        ];
    }
    /**
     * @inheritdoc
     * @return SettingsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SettingsQuery(get_called_class());
    }


}
