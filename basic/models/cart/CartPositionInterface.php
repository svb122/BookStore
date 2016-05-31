<?php

namespace app\models\cart;


/**
 * Interface CartItemInterface
 * @property string $id
 * @property int $quantity
 */
interface CartPositionInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param int $quantity
     */
    public function setQuantity($quantity);

    /**
     * @return int
     */
    public function getQuantity();
} 