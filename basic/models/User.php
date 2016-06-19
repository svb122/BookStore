<?php
/**
 * @package BookStore\models
 */

namespace app\models;

/**
 * User is the model behind the authorize imitation for basic application.
 */
class User extends \yii\base\Object implements \yii\web\IdentityInterface
{
    /**
     * @var string $id Identity
     */
    public $id;
    
     /**
     * @var string $username
     */
    public $username;
    
    /**
     * @var string $password
     */
    public $password;
    
    /**
     * @var string $authKey
     */
    public $authKey;
    
    /**
     * @var string $accessToken
     */
    public $accessToken;

    /**
     * @var array $users
     */
    private static $users = [
        '100' => [
            'id' => '100',
            'username' => 'admin',
            'password' => 'admin',
            'authKey' => 'test100key',
            'accessToken' => '100-token',
        ],
        '101' => [
            'id' => '101',
            'username' => 'demo',
            'password' => 'demo',
            'authKey' => 'test101key',
            'accessToken' => '101-token',
        ],
    ];

    /**
     * Get identity
     *
     * @param string $id identity
     * @return static|null
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * Find by Access Token
     *
     * @param string $token
     * @param string $type
     * @return static|null
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param  string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Get id
     *
     * @return string current user auth key
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get auth key
     *
     * @return string
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * Validate auth key
     *
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param  string  $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
