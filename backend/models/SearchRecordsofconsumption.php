<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Recordsofconsumption;

/**
 * SearchRecordsofconsumption represents the model behind the search form about `app\models\Recordsofconsumption`.
 */
class SearchRecordsofconsumption extends Recordsofconsumption
{
    public $name;
    public $category_name;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'customer_id', 'category', 'TimeToSpend', 'integral', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['SalesmanNumber', 'DoctorNumber','name','category_name'], 'safe'],
            [['price'], 'number'],
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
        $query = Recordsofconsumption::find();
        $query->joinWith(['customer']); 
         $query->joinWith(['hospitalprojectcategory']); 
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
            'customer_id' => $this->customer_id,
            'category' => $this->category,
            'price' => $this->price,
            'TimeToSpend' => $this->TimeToSpend,
            'integral' => $this->integral,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'create_use' => $this->create_use,
            'updated_at' => $this->updated_at,
            'updated_use' => $this->updated_use,
        ]);

        $query->andFilterWhere(['like', 'SalesmanNumber', $this->SalesmanNumber])
            ->andFilterWhere(['like', 'DoctorNumber', $this->DoctorNumber])
            ->andFilterWhere(['like', 'customer.name', $this->name]) 
           ->andFilterWhere(['like', 'hospitalprojectcategory.category_name', $this->category_name]) ;  
        return $dataProvider;
    }
}
