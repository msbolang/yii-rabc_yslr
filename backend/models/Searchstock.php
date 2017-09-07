<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Stock;

/**
 * Searchstock represents the model behind the search form about `app\models\Stock`.
 */
class Searchstock extends Stock
{
    /**
     * @inheritdoc
     */
    public $category_name;
    public $username;
    public function rules()
    {
        return [
            [['id', 'category', 'number', 'purchase_time', 'outbound_time', 'early_warning', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['product_name', 'product_number', 'advent', 'detailed_description','category_name','username'], 'safe'],
            [['ex_shipment_price_perbox', 'Postage_per_shipment'], 'number'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Stock::find();
        $query->joinWith(['stock_category']);
        $query->joinWith(['user']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

     
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category' => $this->category,
            'number' => $this->number,
            'purchase_time' => $this->purchase_time,
            'outbound_time' => $this->outbound_time,
            'ex_shipment_price_perbox' => $this->ex_shipment_price_perbox,
            'Postage_per_shipment' => $this->Postage_per_shipment,
            'early_warning' => $this->early_warning,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'create_use' => $this->create_use,
            'updated_at' => $this->updated_at,
            'updated_use' => $this->updated_use,

        ]);

        $query->andFilterWhere(['like', 'product_name', $this->product_name])
              ->andFilterWhere(['like', 'product_number', $this->product_number])
              ->andFilterWhere(['like', 'advent', $this->advent])
              ->andFilterWhere(['like', 'detailed_description', $this->detailed_description])
         ->andFilterWhere(['like', 'stock_category.category_name', $this->category_name])
        ->andFilterWhere(['like', 'user.username', $this->username])
                ;
//        echo '<pre>';print_r($dataProvider);exit;
        return $dataProvider;
    }
    
    
    

}
