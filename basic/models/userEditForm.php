<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class userEditForm extends Model
{
    public $id;
    public $username;
    public $roleId;

    /**
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
