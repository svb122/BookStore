<?php
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
    public $src;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['file', 'src'], 'safe'],
            [['file'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'checkExtensionByMimeType' => false],
        ];
    }
	
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