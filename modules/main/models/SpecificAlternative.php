<?php

namespace app\modules\main\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%specific_alternative}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $alternative_id
 * @property int $criteria_id
 *
 * @property Evaluation[] $evaluations
 * @property Alternative $alternative
 * @property Criteria $criteria
 */
class SpecificAlternative extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%specific_alternative}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['alternative_id', 'criteria_id'], 'required'],
            [['alternative_id', 'criteria_id'], 'default', 'value' => null],
            [['alternative_id', 'criteria_id'], 'integer'],
            [['alternative_id'], 'exist', 'skipOnError' => true, 'targetClass' => Alternative::className(),
                'targetAttribute' => ['alternative_id' => 'id']],
            [['criteria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Criteria::className(),
                'targetAttribute' => ['criteria_id' => 'id']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'SPECIFIC_ALTERNATIVE_MODEL_ID'),
            'created_at' => Yii::t('app', 'SPECIFIC_ALTERNATIVE_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'SPECIFIC_ALTERNATIVE_MODEL_UPDATED_AT'),
            'alternative_id' => Yii::t('app', 'SPECIFIC_ALTERNATIVE_MODEL_ALTERNATIVE'),
            'criteria_id' => Yii::t('app', 'SPECIFIC_ALTERNATIVE_MODEL_CRITERIA'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Gets query for [[Evaluations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluations()
    {
        return $this->hasMany(Evaluation::className(), ['specific_alternative_id' => 'id']);
    }

    /**
     * Gets query for [[Alternative]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlternative()
    {
        return $this->hasOne(Alternative::className(), ['id' => 'alternative_id']);
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