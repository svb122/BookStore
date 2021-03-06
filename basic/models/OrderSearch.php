<?php
/**
 * @package BookStore\models
 * @uses Yii,yii\base\Model, yii\data\ActiveDataProvider, app\models\Order
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * OrderSearch represents the model behind the search form about `app\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * Determines validation rules for Item
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'phone', 'addres'], 'safe'],
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
        $query = Order::find();

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
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'addres', $this->addres]);

        return $dataProvider;
    }
}
