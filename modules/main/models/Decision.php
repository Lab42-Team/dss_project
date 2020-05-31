<?php

namespace app\modules\main\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%decision}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property int $task_id
 * @property int $user_id
 *
 * @property Task $task
 * @property User $user
 * @property Evaluation[] $evaluations
 */
class Decision extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%decision}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['task_id', 'user_id'], 'required'],
            [['task_id', 'user_id'], 'default', 'value' => null],
            [['task_id', 'user_id'], 'integer'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(),
                'targetAttribute' => ['task_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(),
                'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'DECISION_MODEL_ID'),
            'created_at' => Yii::t('app', 'DECISION_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'DECISION_MODEL_UPDATED_AT'),
            'task_id' => Yii::t('app', 'DECISION_MODEL_TASK'),
            'user_id' => Yii::t('app', 'DECISION_MODEL_USER'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Gets query for [[Task]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTask()
    {
        return $this->hasOne(Task::className(), ['id' => 'task_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Evaluations]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEvaluations()
    {
        return $this->hasMany(Evaluation::className(), ['decision_id' => 'id']);
    }
}