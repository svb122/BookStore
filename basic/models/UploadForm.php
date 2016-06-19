<?php
/**
 * @package BookStore\models
 * @uses Yii, yii\base\Model, yii\web\UploadedFile
 */
namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * UploadForm is the model behind the upload form.
 */
class UploadForm extends Model
{
    /**
     * @var UploadedFile file attribute
     */
    public $file;
    
    /**
     * @var string url adress of uploaden file in server
     */
    public $src;

    /**
     * Determines validation rules for UploadForm
     *
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file', 'src'], 'safe'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'checkExtensionByMimeType' => false],
        ];
    }
	
    /**
     * Upload image to server
     *
     * @return bool if file successfuly uploaded true, else - false
     */
    public function upload()
    {
        if ($this->validate()) {
            $filename = Yii::$app->getSecurity()->generateRandomString();
            $this->file->saveAs('uploads/' . $filename . '.' . $this->file->extension);
            $this->src = 'uploads/' . $filename . '.' . $this->file->extension;
            return true;
        } else {
            return false;
        }
    }
}