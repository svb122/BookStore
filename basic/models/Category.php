<?php
/**
 * @package BookStore\models
 * @uses Yii
 */

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $id
 * @property string $name
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * Determine table name 'category'
     * @return string
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * Determine validation rules for this class
     * @return array
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * Asociate attributes whith labels
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }
}
