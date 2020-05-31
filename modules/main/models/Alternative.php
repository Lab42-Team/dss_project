<?php

namespace app\modules\main\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%alternative}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $name
 * @property string|null $description
 * @property int $task_id
 *
 * @property Task $task
 * @property SpecificAlternative[] $specificAlternatives
 */
class Alternative extends \yii\db\ActiveRecord
{
    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%alternative}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['name', 'task_id'], 'required'],
            [['task_id'], 'default', 'value' => null],
            [['task_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['description'], 'string'],
            [['task_id'], 'exist', 'skipOnError' => true, 'targetClass' => Task::className(),
                'targetAttribute' => ['task_id' => 'id']],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ALTERNATIVE_MODEL_ID'),
            'created_at' => Yii::t('app', 'ALTERNATIVE_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'ALTERNATIVE_MODEL_UPDATED_AT'),
            'name' => Yii::t('app', 'ALTERNATIVE_MODEL_NAME'),
            'description' => Yii::t('app', 'ALTERNATIVE_MODEL_DESCRIPTION'),
            'task_id' => Yii::t('app', 'ALTERNATIVE_MODEL_TASK'),
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
     * Gets query for [[SpecificAlternatives]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSpecificAlternatives()
    {
        return $this->hasMany(SpecificAlternative::className(), ['alternative_id' => 'id']);
    }
}