<?php
/**
 * @package BookStore\models
 * @uses Yii
 */

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $addres
 *
 * @property OrderItems[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * Define the name of table in database
     * @return string
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * Determines validation rules for Item
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name', 'phone', 'addres'], 'required'],
            [['phone', 'addres', 'name'], 'string', 'max' => 255],
        ];
    }
	
    /**
     * Get date in dd.mm.yyyy format
     * @return string date.
     */
    public function getDate()
    {
        $array = explode("-", $this->datu);
        $array = array_reverse($array);
        return implode(".", $array);
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
            'phone' => 'Phone',
            'addres' => 'Addres',
        ];
    }

    /**
     * Get items for Order
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItems::className(), ['order_id' => 'id']);
    }
}
