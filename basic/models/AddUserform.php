<?php 
    namespace app\models;
    
    use Yii;
    use yii\base\Model;
    use app\models\UserActivRecord;
    
    class AddUserform extends Model{
        public $username;
        public $role;
        public $password;
        public $confirmpassword;
		
        public function rules(){
            return [
                [['username', 'role', 'password', 'confirmpassword'], 'required'],
                ['username','findUsername'],
                ['role', 'in', 'range' => [UserActivRecord::ROLE_ADMIN,UserActivRecord::ROLE_USER]],
                ['confirmpassword', 'compare','compareAttribute' => 'password'],
            ];
        }
		
        
        public function findUsername($attribute, $params){
            $usercount = UserActivRecord::find()
                ->where(['username' => $this->username])
                ->count();
            if($usercount != 0)
                $this->addError($attribute,'This username  exists');
        }
        
    }