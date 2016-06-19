<?php
/**
 * @package BookStore\models
 * @uses Yii, yii\base\Model
 */

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class ContactForm extends Model
{
    /**
     *@var string $name
     */
    public $name;
    
    /**
     *@var string $email
     */
    public $email;
    
    /**
     *@var string $subject
     */
    public $subject;
    
    /**
     *@var string $body
     */
    public $body;
    
    /**
     *@var string $verifyCode
     */
    public $verifyCode;

    /**
     * Determines validation rules for ContactForm
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // name, email, subject and body are required
            [['name', 'email', 'subject', 'body'], 'required'],
            // email has to be a valid email address
            ['email', 'email'],
            // verifyCode needs to be entered correctly
            ['verifyCode', 'captcha'],
        ];
    }

    /**
     * Asociate attributes whith labels
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param  string  $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
}
