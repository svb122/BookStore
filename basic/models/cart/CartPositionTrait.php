<?php

namespace app\models\cart;

use yii\base\Component;
use yii\base\Object;

/**
 * Trait CartPositionTrait
 * @property int $quantity Returns quantity of cart position
 */
trait CartPositionTrait
{
    protected $_quantity;

    public function getQuantity()
    {
        return $this->_quantity;
    }

    public function setQuantity($quantity)
    {
        $this->_quantity = $quantity;
    }
} 
