<?php
/**
 * @package BookStore\models
 * @uses Yii, yii\db\ActiveRecord yii\base\Model
 */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class userEditForm extends Model
{
    /**
     * @var string $id
     */
    public $id;
    
    /**
     * @var string $username
     */
    public $username;
    
    /**
     * @var string $roleId
     */
    public $roleId;

    /**
     * Determines validation rules for userEditForm
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username are required
            [['username'], 'required'],
            // roleId in range
            ['roleId', 'in', 'range' => [1,2]]
        ];
    }
}
