<?php
/**
 * @package BookStore\models\cart
 * @uses Yii, BookStore\models\cart\CartPositionInterface, yii\base\Component, yii\base\Component, yii\web\Session
 */

namespace app\models\cart;

use Yii;
use app\models\cart\CartPositionInterface;
use yii\base\Component;
use yii\di\Instance;
use yii\web\Session;


/**
 * Class ShoppingCart implements functionality BookStore\models\cart\CartPositionInterface
 * @property CartPositionInterface[] $positions
 * @property int $count Total count of positions in the cart
 * @property int $cost Total cost of positions in the cart
 * @property bool $isEmpty Returns true if cart is empty
 * @property string $hash Returns hash (md5) of the current cart, that is uniq to the current combination
 * of positions, quantities and costs
 * @property string $serialized Get/set serialized content of the cart
 */
class ShoppingCart extends Component
{
    /**
     * If true (default) cart will be automatically stored in and loaded from session.
     * If false - you should do this manually with saveToSession and loadFromSession methods
     * @var bool
     */
    public $storeInSession = true;
    
    /**
     * Session component
     * @var string|Session
     */
    public $session = 'session';
    
    /**
     * Shopping cart ID to support multiple carts
     * @var string
     */
    public $cartId = __CLASS__;
    
    /**
     * @var CartPositionInterface[]
     */
    protected $_positions = [];

    /**
     * Inicialize cart
     * @return void
     */
    public function init()
    {
        if ($this->storeInSession)
            $this->loadFromSession();
    }

    /**
     * Loads cart from session
     * @return void
     */
    public function loadFromSession()
    {
        $this->session = Instance::ensure($this->session, Session::className());
        if (isset($this->session[$this->cartId]))
            $this->setSerialized($this->session[$this->cartId]);
    }

    /**
     * Saves cart to the session
     * @return void
     */
    public function saveToSession()
    {
        $this->session = Instance::ensure($this->session, Session::className());
        $this->session[$this->cartId] = $this->getSerialized();
    }

    /**
     * Sets cart from serialized string
     * @param string $serialized
     * @return void
     */
    public function setSerialized($serialized)
    {
        $this->_positions = unserialize($serialized);
    }

    /**
     * @param CartPositionInterface $position
     * @param int $quantity
     * @return void
     */
    public function put($position, $quantity = 1)
    {
        if (isset($this->_positions[$position->getId()])) {
            $this->_positions[$position->getId()]->setQuantity(
                $this->_positions[$position->getId()]->getQuantity() + $quantity);
        } else {
            $position->setQuantity($quantity);
            $this->_positions[$position->getId()] = $position;
        }
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Returns cart positions as serialized items
     * @return string
     */
    public function getSerialized()
    {
        return serialize($this->_positions);
    }

    /**
     * Update position quantity
     * @param CartPositionInterface $position
     * @param int $quantity
     * @return void
     */
    public function update($position, $quantity)
    {
        if ($quantity <= 0) {
            $this->remove($position);
            return;
        }

        if (isset($this->_positions[$position->getId()])) {
            $this->_positions[$position->getId()]->setQuantity($quantity);
        } else {
            $position->setQuantity($quantity);
            $this->_positions[$position->getId()] = $position;
        }
		
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Removes position from the cart
     * @param CartPositionInterface $position
     * @return void
     */
    public function remove($position)
    {
        $this->removeById($position->getId());
    }

    /**
     * Removes position from the cart by ID
     * @param string $id
     * @return void
     */
    public function removeById($id)
    {
        unset($this->_positions[$id]);
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Remove all positions
     * @return void
     */
    public function removeAll()
    {
        $this->_positions = [];
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Returns position by it's id. Null is returned if position was not found
     * @param string $id
     * @return CartPositionInterface|null
     */
    public function getPositionById($id)
    {
        if ($this->hasPosition($id))
            return $this->_positions[$id];
        else
            return null;
    }

    /**
     * Checks whether cart position exists or not
     * @param string $id
     * @return bool
     */
    public function hasPosition($id)
    {
        return isset($this->_positions[$id]);
    }

    /**
     * Return all items from cart
     * @return CartPositionInterface[]
     */
    public function getPositions()
    {
        return $this->_positions;
    }

    /**
     * Set $positions to $_positions
     * @param CartPositionInterface[] $positions
     * @return void
     */
    public function setPositions($positions)
    {
        $this->_positions = array_filter($positions, function (CartPositionInterface $position) {
            return $position->quantity > 0;
        });
		
        if ($this->storeInSession)
            $this->saveToSession();
    }

    /**
     * Returns true if cart is empty
     * @return bool
     */
    public function getIsEmpty()
    {
        return count($this->_positions) == 0;
    }

    /**
     * Return count of all positions in cart
     * @return int
     */
    public function getCount()
    {
        $count = 0;
        foreach ($this->_positions as $position)
            $count += $position->getQuantity();
        return $count;
    }

    /**
     * Returns hash (md5) of the current cart, that is unique to the current combination
     * of positions, quantities and costs. This helps us fast compare if two carts are the same, or not, also
     * we can detect if cart is changed (comparing hash to the one's saved somewhere)
     * @return string
     */
    public function getHash()
    {
        $data = [];
        foreach ($this->positions as $position) {
            $data[] = [$position->getId(), $position->getQuantity(), $position->getPrice()];
        }
        return md5(serialize($data));
    }


}
