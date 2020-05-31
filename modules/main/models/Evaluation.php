<?php

namespace app\modules\main\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%evaluation}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $evaluation
 * @property int $decision_id
 * @property int $specific_alternative_id
 *
 * @property Decision $decision
 * @property SpecificAlternative $specificAlternative
 */
class Evaluation extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%evaluation}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['evaluation', 'decision_id', 'specific_alternative_id'], 'required'],
            [['decision_id', 'specific_alternative_id'], 'default', 'value' => null],
            [['decision_id', 'specific_alternative_id'], 'integer'],
            [['evaluation'], 'string'],
            [['decision_id'], 'exist', 'skipOnError' => true, 'targetClass' => Decision::className(),
                'targetAttribute' => ['decision_id' => 'id']],
            [['specific_alternative_id'], 'exist', 'skipOnError' => true,
                'targetClass' => SpecificAlternative::className(),
                'targetAttribute' => ['specific_alternative_id' => 'id']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'EVALUATION_MODEL_ID'),
            'created_at' => Yii::t('app', 'EVALUATION_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'EVALUATION_MODEL_UPDATED_AT'),
            'evaluation' => Yii::t('app', 'EVALUATION_MODEL_EVALUATION'),
            'decision_id' => Yii::t('app', 'EVALUATION_MODEL_DECISION'),
            'specific_alternative_id' => Yii::t('app', 'EVALUATION_MODEL_ALTERNATIVE'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Gets query for [[Decision]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDecision()
    {
        return $this->hasOne(Decision::className(), ['id' => 'decision_id']);
    }

    /**
     * Gets query for [[SpecificAlternative]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecificAlternative()
    {
        return $this->hasOne(SpecificAlternative::className(), ['id' => 'specific_alternative_id']);
    }
}