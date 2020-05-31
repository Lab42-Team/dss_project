<?php

namespace app\modules\main\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%criteria_value}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $priority
 * @property string $value
 * @property int $criteria_id
 *
 * @property Criteria $criteria
 */
class CriteriaValue extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%criteria_value}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['priority', 'value', 'criteria_id'], 'required'],
            [['priority', 'criteria_id'], 'default', 'value' => null],
            [['priority', 'criteria_id'], 'integer'],
            [['value'], 'string'],
            [['criteria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Criteria::className(),
                'targetAttribute' => ['criteria_id' => 'id']],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'CRITERIA_VALUE_MODEL_ID'),
            'created_at' => Yii::t('app', 'CRITERIA_VALUE_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'CRITERIA_VALUE_MODEL_UPDATED_AT'),
            'priority' => Yii::t('app', 'CRITERIA_VALUE_MODEL_PRIORITY'),
            'value' => Yii::t('app', 'CRITERIA_VALUE_MODEL_VALUE'),
            'criteria_id' => Yii::t('app', 'CRITERIA_VALUE_MODEL_CRITERIA'),
        ];
    }

    /**
     * Gets query for [[Criteria]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCriteria()
    {
        return $this->hasOne(Criteria::className(), ['id' => 'criteria_id']);
    }
}