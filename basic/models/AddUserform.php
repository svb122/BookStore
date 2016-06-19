<?php
/**
 * @package BookStore\models
 * @uses Yii, BookStore\models\UserActivRecord, yii\base\Model
 */
namespace app\models;
    
use Yii;
use yii\base\Model;
use app\models\UserActivRecord;
    
/**
 * AddUserform determines form for adding a new user
 */
class AddUserform extends Model {
    /**
     * @var string $username
     */
    public $username;
    
    /**
     * @var string $role The role of user (user|admin)
     */
    public $role;
    
    /**
     * @var string $password
     */
    public $password;
    
    /**
     * @var string $confirmpassword Field for confirm password
     */
    public $confirmpassword;
	
    /**
     * Determine validation rules for this form
     * @return array
     */
    public function rules() {
        return [
            [['username', 'role', 'password', 'confirmpassword'], 'required'],
            ['username','findUsername'],
            ['role', 'in', 'range' => [UserActivRecord::ROLE_ADMIN,UserActivRecord::ROLE_USER]],
            ['confirmpassword', 'compare','compareAttribute' => 'password'],
        ];
    }
		
    /**
     * Find username in database, if found add error whith message
     * @return void
     */  
    public function findUsername($attribute, $params){
        $usercount = UserActivRecord::find()
            ->where(['username' => $this->username])
            ->count();
        if($usercount != 0)
            $this->addError($attribute,'This username  exists');
    }
        
}