<?php 
    namespace app\models;
    
    use Yii;
    use yii\base\Model;
    use app\models\UserActivRecord;
    
    class PasswordForm extends Model{
        public $oldpass;
        public $newpass;
        public $repeatnewpass;
		
        public $id;
        
        public function __construct($id)
        {
            parent::__construct();
            $this->id = $id;
        }
        public function rules(){
            return [
                [['oldpass','newpass','repeatnewpass'],'required'],
                ['oldpass','findPasswords'],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }
		
        public function scenarios()
        {
            return [
                'default' => ['oldpass', 'newpass', 'repeatnewpass']
            ];
        }
        
        public function findPasswords($attribute, $params){
            $user = UserActivRecord::findOne($this->id);
            $password = $user->password;
            if(!Yii::$app->getSecurity()->validatePassword($this->oldpass, $password))
                $this->addError($attribute,'Old password is incorrect');
        }
        
        public function attributeLabels(){
            return [
                'oldpass'=>'Old Password',
                'newpass'=>'New Password',
                'repeatnewpass'=>'Repeat New Password',
            ];
        }
    }