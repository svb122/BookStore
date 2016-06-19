<?php
/**
 * @package BookStore\models
 * @uses Yii, yii\db\ActiveRecord, yii\web\IdentityInterface
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 */
class UserActivRecord extends ActiveRecord implements IdentityInterface
{
    /**
     * @var string ROLE_ADMIN
     */
    const ROLE_ADMIN = 'admin';
    
    /**
     * @var string ROLE_USER
     */
    const ROLE_USER = 'user';
	
    /**
     * Define the name of table in database
     *
     * @return string
     */
    public static function tableName()
    {
        return 'users';
    }
	
    /**
     * Asociate attributes whith labels
     *
     * @return array
     */
    public function attributeLabels()
    {
        return [
            //'id' => '',
            'roleId' => 'Role',
        ];
    }
	
    /**
     * Determines validation rules for UserActivRecord
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['username', 'roleId', 'password'], 'safe'],
            [['username', 'roleId', 'password'], 'required'],
            ['roleId', 'in', 'range' => [self::ROLE_USER, self::ROLE_ADMIN]],
        ];
    }

    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
	
    /**
     * Finds user by username
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token]);
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get auth key
     *
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return 1;//$this->authKey;
    }

    /**
     * Validate auth key
     *
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return 1;//$this->getAuthKey() === $authKey;
    }
	
    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //$hash = Yii::$app->getSecurity()->generatePasswordHash($password);
		
        if (Yii::$app->getSecurity()->validatePassword($password, $this->password)) return true;
        else return false;
    }
	
    /**
     * Validate role admin for current user
     *
     * @param string $username
     * @return boolean if user is admin role true, else false
     */
    public static function isUserAdmin($username)
    {
        if (static::findOne(['username' => $username, 'roleId' => self::ROLE_ADMIN]))
        {
            return true;
        } else {
            return false;
        }
    }
	
     /**
     * Validate role user for current user
     *
     * @param string $username
     * @return boolean if user is user role true, else false. Admin is user role automatic
     */
    public static function isUser($username)
    {
        if (static::findOne(['username' => $username, 'roleId' => self::ROLE_USER]))
        {
            return true;
        } else {
            if(UserActivRecord::isUserAdmin($username)) return true;
            return false;
        }
    }
	
     /**
     * Get role admin value
     *
     * @return string
     */
    public function getAdminRole()
    {
        return self::ROLE_ADMIN;
    }
	
    /**
     * Get role user value
     *
     * @return string
     */
    public function getUserRole()
    {
        return self::ROLE_USER;
    }
}