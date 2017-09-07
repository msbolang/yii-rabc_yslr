<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Hospitalclientlist;

/**
 * SearchHospitalclientlist represents the model behind the search form about `app\models\Hospitalclientlist`.
 */

class SearchHospitalclientlist extends Hospitalclientlist
{
    /**
     * @inheritdoc
     */
    public $category_name;
    public $username;
    public function rules()
    {
        return [
            [['id', 'category', 'status', 'belong', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['name','category_name','username'], 'safe'],
            [['price', 'performance_royalty'], 'number'],
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
        $query = Hospitalclientlist::find();
        $query->joinWith(['hospitalprojectcategory','user']);
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
    $dataProvider->setSort([
        'attributes' => [
             'category_name' => [
                'asc' => ['hospitalprojectcategory.category_name' => SORT_ASC],  //table.字段，若行记录字段名唯一，可略table
                'desc' => ['hospitalprojectcategory.category_name' => SORT_DESC],
                'label' => 'category_name'
            ],
               'username' => [
                'asc' => ['user.username' => SORT_ASC],  //table.字段，若行记录字段名唯一，可略table
                'desc' => ['user.username' => SORT_DESC],
                'label' => 'username'
            ],
                  'name' => [
                'asc' => ['name' => SORT_ASC],  //table.字段，若行记录字段名唯一，可略table
                'desc' => ['name' => SORT_DESC],
                'label' => 'name'
            ],
                  'username' => [
                'asc' => ['user.username' => SORT_ASC],  //table.字段，若行记录字段名唯一，可略table
                'desc' => ['user.username' => SORT_DESC],
                'label' => 'username'
            ],
                  'price' => [
                'asc' => ['price' => SORT_ASC],  //table.字段，若行记录字段名唯一，可略table
                'desc' => ['price' => SORT_DESC],
                'label' => 'price'
            ],
                    'performance_royalty' => [
                'asc' => ['performance_royalty' => SORT_ASC],  //table.字段，若行记录字段名唯一，可略table
                'desc' => ['performance_royalty' => SORT_DESC],
                'label' => 'performance_royalty'
            ]
          ]
    ]);
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category' => $this->category,
            'price' => $this->price,
            'performance_royalty' => $this->performance_royalty,
            'status' => $this->status,
            'belong' => $this->belong,
            'created_at' => $this->created_at,
            'create_use' => $this->create_use,
            'updated_at' => $this->updated_at,
            'updated_use' => $this->updated_use,
         
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'hospitalprojectcategory.category_name', $this->category_name]);
        $query->andFilterWhere(['like', 'user.username', $this->username]);

        return $dataProvider;
    }
}
