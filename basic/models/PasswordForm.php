<?php
/**
 * @package BookStore\models
 * @uses Yii,yii\base\Model, BookStore\models\UserActivRecord
 */

    namespace app\models;
    
    use Yii;
    use yii\base\Model;
    use app\models\UserActivRecord;
    
    /**
     * PasswordForm is the model behind the change password form.
     */
    class PasswordForm extends Model{
        
        /**
         * @var string $oldpass
         */
        public $oldpass;
        
        /**
         * @var string $newpass
         */
        public $newpass;
        
        /**
         * @var string $repeatnewpass
         */
        public $repeatnewpass;
		
        /**
         * Id property of UserActivRecord object
         *
         * @var string $id
         */
        public $id;
        
        /**
         * Initialize id property of UserActivRecord object in construct
         *
         * @param string $id
         * @return void
         */
        public function __construct($id)
        {
            parent::__construct();
            $this->id = $id;
        }
        
        /**
         * Determines validation rules for Item
         *
         * @return array the validation rules.
         */
        public function rules(){
            return [
                [['oldpass','newpass','repeatnewpass'],'required'],
                ['oldpass','findPasswords'],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],
            ];
        }
		
        /**
         * Get model scenarios
         *
         * @return array Array of scenarios base class Model
         */
        public function scenarios()
        {
            return [
                'default' => ['oldpass', 'newpass', 'repeatnewpass']
            ];
        }
        
        /**
         * Validates the password.
         * This method serves as the inline validation for password.
         *
         * @param string $attribute the attribute currently being validated
         * @param array $params the additional name-value pairs given in the rule
         * @throws \yii\base\InvalidConfigException Old password is incorrect
         * @return void
         */
        public function findPasswords($attribute, $params){
            $user = UserActivRecord::findOne($this->id);
            $password = $user->password;
            if(!Yii::$app->getSecurity()->validatePassword($this->oldpass, $password))
                $this->addError($attribute,'Old password is incorrect');
        }
        
        /**
         * Asociate attributes whith labels
         *
         * @return array
         */
        public function attributeLabels(){
            return [
                'oldpass'=>'Old Password',
                'newpass'=>'New Password',
                'repeatnewpass'=>'Repeat New Password',
            ];
        }
    }