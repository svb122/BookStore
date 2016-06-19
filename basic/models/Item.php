<?php
/**
 * @package BookStore\models
 * @uses Yii
 */

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_items".
 *
 * @property integer $id
 * @property integer $book_id
 * @property integer $quantity
 * @property integer $order_id
 *
 * @property Orders $order
 */
class Item extends \yii\db\ActiveRecord
{
    /**
     * Define the name of table in database
     * @return string
     */
    public static function tableName()
    {
        return 'order_items';
    }

    /**
     * Determines validation rules for Item
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['book_id', 'quantity', 'order_id'], 'required'],
            [['book_id', 'quantity', 'order_id'], 'integer']
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
            'book_id' => 'Book ID',
            'quantity' => 'Quantity',
            'order_id' => 'Order ID',
        ];
    }

    /**
     * Get order for Item
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }
}
