<?php

namespace app\modules\main\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%task}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property string|null $description
 *
 * @property Alternative[] $alternatives
 * @property Criteria[] $criterias
 * @property Decision[] $decisions
 */
class Task extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%task}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'TASK_MODEL_ID'),
            'created_at' => Yii::t('app', 'TASK_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'TASK_MODEL_UPDATED_AT'),
            'name' => Yii::t('app', 'TASK_MODEL_NAME'),
            'description' => Yii::t('app', 'TASK_MODEL_DESCRIPTION'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Gets query for [[Alternatives]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAlternatives()
    {
        return $this->hasMany(Alternative::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Criterias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCriterias()
    {
        return $this->hasMany(Criteria::className(), ['task_id' => 'id']);
    }

    /**
     * Gets query for [[Decisions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDecisions()
    {
        return $this->hasMany(Decision::className(), ['task_id' => 'id']);
    }
}