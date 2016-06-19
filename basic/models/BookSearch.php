<?php
/**
 * @package BookStore\models
 * @uses Yii, yii\base\Mode, yii\data\ActiveDataProvider, BookStore\models\Book
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form about `app\models\Book`.
 */
class BookSearch extends Book
{
    /**
     * Determines validation rules for BookSearch form
     * @return array
     */
    public function rules()
    {
        return [
            [['id', 'year', 'countpages'], 'integer'],
            [['ISBN', 'name', 'publishing', 'authors', 'category', 'bookdescribe', 'imgsrc'], 'safe'],
        ];
    }

    /**
     * Get model scenarios
     * @return array Array of scenarios base class Model
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Book::find()->orderBy('name');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'year' => $this->year,
            'countpages' => $this->countpages,
        ]);

        $query->andFilterWhere(['like', 'ISBN', $this->ISBN])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'publishing', $this->publishing])
            ->andFilterWhere(['like', 'authors', $this->authors])
            ->andFilterWhere(['like', 'year', $this->year])
            ->andFilterWhere(['like', 'category', $this->category]);

        return $dataProvider;
    }
}
