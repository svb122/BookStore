<?php
/**
 * @package BookStore\models
 * @uses Yii, BookStore\models\cart\CartPositionInterface, BookStore\models\cart\CartPositionTrait
 */

namespace app\models;

use Yii;
use app\models\cart\CartPositionInterface;
use app\models\cart\CartPositionTrait;

/**
 * This is the model class for table "books".
 *
 * @property string $id
 * @property string $ISBN
 * @property string $name
 * @property string $publishing
 * @property integer $year
 * @property integer $countpages
 * @property string $authors
 * @property string $category
 * @property string $bookdescribe
 * @property string $imgsrc
 */
class Book extends \yii\db\ActiveRecord implements CartPositionInterface
{
    /**
     * Determine table name 'books'
     * @return string
     */
    public static function tableName()
    {
        return 'books';
    }
	
    use CartPositionTrait;

    /**
     * Get id from database this function from CartPositionInterface
     * @return string $id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Determine validation rules for this class
     * @return array
     */
    public function rules()
    {
        return [
            [['year', 'countpages'], 'integer'],
            [['id', 'ISBN', 'name', 'publishing', 'year',  'authors', 'countpages', 'category', 'bookdescribe', 'imgsrc'], 'safe'],
            [['bookdescribe'], 'string'],
            [['ISBN', 'name', 'authors', 'category'], 'required'],
            [['ISBN'], 'string', 'max' => 13],
            [['name', 'publishing', 'authors', 'category', 'imgsrc'], 'string', 'max' => 255]
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
            'ISBN' => 'ISBN',
            'name' => 'Name',
            'publishing' => 'Publishing',
            'year' => 'Year',
            'countpages' => 'Count pages',
            'authors' => 'Authors',
            'category' => 'Category',
            'bookdescribe' => 'Describe',
            'imgsrc' => 'Image',
        ];
    }
	
    /**
     * Built array whith categories
     * @return array ($id => $name)
     */
    public function getCategories()
    {
        $categories = \app\models\Category::find()->all();
        $options = null;
		
        foreach($categories as $category) $options[$category['id']] = $category['name'];

        return $options;
    }
	
    /**
     * Getting category name
     * @param string $id
     * @return string
     */
    public function getCategoryName($id)
    {
        $category = \app\models\Category::findOne($id);

        return $category['name'];
    }
}
