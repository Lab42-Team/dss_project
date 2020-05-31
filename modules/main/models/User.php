<?php

namespace app\modules\main\models;

use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\web\IdentityInterface;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property int $id
 * @property int $created_at
 * @property int $updated_at
 * @property string $username
 * @property string $auth_key
 * @property string $email_confirm_token
 * @property string $password_hash
 * @property string $password_reset_token
 * @property int $type
 * @property int $status
 * @property string $full_name
 * @property string $email
 * @property string $discipline
 * @property string $competence
 *
 * @property Decision[] $decisions
 */
class User extends ActiveRecord implements IdentityInterface
{
    const TYPE_ADMIN  = 0; // Тип пользователя - администратор
    const TYPE_EXPERT = 1; // Тип пользователя - эксперт

    const STATUS_ACTIVE  = 0; // Активный пользователь
    const STATUS_BLOCKED = 1; // Заблокированный пользователь
    const STATUS_WAIT    = 2; // Неактивный пользователь (статус ожидания активации)

    public $password; // Пароль

    /**
     * @return string table name
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @return array the validation rules
     */
    public function rules()
    {
        return [
            [['username', 'full_name'], 'required'],
            ['username', 'match', 'pattern' => '#^[\w_-]+$#i'],
            ['username', 'string', 'min' => 5, 'max' => 100],
            ['username', 'unique', 'targetClass' => self::className(),
                'message' => Yii::t('app', 'USER_MODEL_MESSAGE_USERNAME')],
            ['password', 'required', 'on' => 'create_and_update_password_hash'],
            ['password', 'string', 'min' => 5, 'on' => 'create_and_update_password_hash'],
            ['full_name', 'match', 'pattern' => '/^[ А-Яа-яs,]+$/u',
                'message' => Yii::t('app', 'USER_MODEL_MESSAGE_FULL_NAME')],
            [['full_name'], 'string', 'min' => 5, 'max' => 255],
            [['email'], 'string', 'max' => 255],
            [['type', 'status'], 'default', 'value' => null],
            [['type', 'status'], 'integer'],
            [['discipline', 'competence'], 'string'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'USER_MODEL_ID'),
            'created_at' => Yii::t('app', 'USER_MODEL_CREATED_AT'),
            'updated_at' => Yii::t('app', 'USER_MODEL_UPDATED_AT'),
            'username' => Yii::t('app', 'USER_MODEL_USERNAME'),
            'password' => Yii::t('app', 'USER_MODEL_PASSWORD'),
            'auth_key' => Yii::t('app', 'USER_MODEL_AUTH_KEY'),
            'email_confirm_token' => Yii::t('app', 'USER_MODEL_EMAIL_CONFIRM_TOKEN'),
            'password_hash' => Yii::t('app', 'USER_MODEL_PASSWORD_HASH'),
            'password_reset_token' => Yii::t('app', 'USER_MODEL_PASSWORD_RESET_TOKEN'),
            'type' => Yii::t('app', 'USER_MODEL_TYPE'),
            'status' => Yii::t('app', 'USER_MODEL_STATUS'),
            'full_name' => Yii::t('app', 'USER_MODEL_FULL_NAME'),
            'email' => Yii::t('app', 'USER_MODEL_EMAIL'),
            'discipline' => Yii::t('app', 'USER_MODEL_DISCIPLINE'),
            'competence' => Yii::t('app', 'USER_MODEL_COMPETENCE'),
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Поиск пользователя по идентификатору.
     *
     * @param int|string $id
     * @return null|static
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('findIdentityByAccessToken is not implemented.');
    }

    /**
     * Поиск пользователя по имени.
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Получить id пользователя.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * Получить ключ аутентификации.
     *
     * @return string
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * Проверка ключа аутентификации.
     *
     * @param string $authKey
     * @return bool
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Генерирование ключа аутентификации при активации "запомнить меня".
     *
     * @throws \yii\base\Exception
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Проверка пароля.
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Установка пароля.
     *
     * @param $password
     * @throws \yii\base\Exception
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Finds out if password reset token is valid.
     *
     * @param string $token password reset token
     * @return boolean
     */
    public static function isPasswordResetTokenValid($token)
    {
        if(empty($token))
            return false;

        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        $parts = explode('_', $token);
        $timestamp = (int) end($parts);

        return $timestamp + $expire >= time();
    }

    /**
     * Finds user by password reset token.
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }
        return static::findOne([
            'password_reset_token' => $token,
        ]);
    }

    /**
     * Generates new password reset token.
     *
     * @throws \yii\base\Exception
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token.
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    /**
     * @param string $email_confirm_token
     * @return static|null
     */
    public static function findByEmailConfirmToken($email_confirm_token)
    {
        return static::findOne(['email_confirm_token' => $email_confirm_token]);
    }

    /**
     * Generates email confirmation token.
     *
     * @throws \yii\base\Exception
     */
    public function generateEmailConfirmToken()
    {
        $this->email_confirm_token = Yii::$app->security->generateRandomString();
    }

    /**
     * Removes email confirmation token.
     */
    public function removeEmailConfirmToken()
    {
        $this->email_confirm_token = null;
    }

    /**
     * Генерация ключа автоматической аутентификации перед записью в БД.
     *
     * @param bool $insert
     * @return bool
     * @throws \yii\base\Exception
     */
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert)
                $this->generateAuthKey();

            return true;
        }

        return false;
    }

    /**
     * Получение списка всех пользователей.
     *
     * @return array - массив всех записей из таблицы user
     */
    public static function getAllUsersArray()
    {
        return ArrayHelper::map(self::find()->all(), 'id', 'username');
    }

    /**
     * Gets query for [[Decisions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDecisions()
    {
        return $this->hasMany(Decision::className(), ['decision_id' => 'id']);
    }

    /**
     * Получение списка типов пользователей.
     *
     * @return array - массив всех возможных типов пользователей
     */
    public static function getTypes()
    {
        return [
            self::TYPE_ADMIN => Yii::t('app', 'USER_MODEL_ADMIN_TYPE'),
            self::TYPE_EXPERT => Yii::t('app', 'USER_MODEL_EXPERT_TYPE'),
        ];
    }

    /**
     * Получение названия типа пользователя.
     *
     * @return mixed
     */
    public function getTypeName()
    {
        return ArrayHelper::getValue(self::getTypes(), $this->type);
    }

    /**
     * Получение списка статусов пользователей.
     *
     * @return array - массив всех возможных статусов пользователей
     */
    public static function getStatuses()
    {
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'USER_MODEL_ACTIVE_STATUS'),
            self::STATUS_BLOCKED => Yii::t('app', 'USER_MODEL_BLOCKED_STATUS'),
            self::STATUS_WAIT => Yii::t('app', 'USER_MODEL_WAIT_STATUS'),
        ];
    }

    /**
     * Получение названия статуса пользователя.
     *
     * @return mixed
     */
    public function getStatusName()
    {
        return ArrayHelper::getValue(self::getStatuses(), $this->status);
    }
}