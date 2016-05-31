<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class UserActivRecord extends ActiveRecord implements IdentityInterface
{
    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
	
    public static function tableName()
    {
        return 'users';
    }
	
    public function attributeLabels()
    {
        return [
            //'id' => '',
            'roleId' => 'Role',
        ];
    }
	
    /**
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
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return 1;//$this->authKey;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return 1;//$this->getAuthKey() === $authKey;
    }
	
    /**
     * Validates password
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        //$hash = Yii::$app->getSecurity()->generatePasswordHash($password);
		
        if (Yii::$app->getSecurity()->validatePassword($password, $this->password)) return true;
        else return false;
    }
	
    public static function isUserAdmin($username)
    {
        if (static::findOne(['username' => $username, 'roleId' => self::ROLE_ADMIN]))
        {
            return true;
        } else {
            return false;
        }
    }
	
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
	
    public function getAdminRole()
    {
        return self::ROLE_ADMIN;
    }
	
    public function getUserRole()
    {
        return self::ROLE_USER;
    }
}