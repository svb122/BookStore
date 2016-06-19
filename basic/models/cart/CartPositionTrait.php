<?php
/**
 * @package BookStore\models\cart
 * @uses yii\base\Component, yii\base\Object
 */

namespace app\models\cart;

use yii\base\Component;
use yii\base\Object;

/**
 * Trait CartPositionTrait implements cart position functions BookStore\models\cart\CartPositionInterface
 */
trait CartPositionTrait
{
    /**
     * @var int $_quantity Determine quantity of cart position
     */
    protected $_quantity;

    /**
     * Return quantity items on cart
     * @return int $_quantity
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * Set quantity items on cart
     * @return void
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = $quantity;
    }
} 
