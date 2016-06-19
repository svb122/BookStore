<?php
/**
 * @package BookStore\models
 * @uses Yii, yii\base\Model
 */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class LoginForm extends Model
{
    /**
     *@var string $username
     */
    public $username;
    
    /**
     *@var string $password
     */
    public $password;
    
    /**
     *@var bool $rememberMe
     */
    public $rememberMe = true;
    
    /**
     *@var bool $rememberMe
     */
    private $_user = false;


   /**
     * Determines validation rules for Item
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        $query = UserActivRecord::find();
        $user = $query->where(['username' => $this->username])->one();
        if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Incorrect username or password.');
        }
    }

    /**
     * Logs in a user using the provided username and password.
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        }
        return false;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = UserActivRecord::findByUsername($this->username);
        }

        return $this->_user;
    }
	
}
