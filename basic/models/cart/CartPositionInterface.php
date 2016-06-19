<?php
/**
 * @package BookStore\models\cart
 */

namespace app\models\cart;


/**
 * Interfae determine functions of cart item
 */
interface CartPositionInterface
{
    /**
     * @return string
     */
    public function getId();

    /**
     * @param int $quantity
     * @return void
     */
    public function setQuantity($quantity);

    /**
     * @return int
     */
    public function getQuantity();
} 