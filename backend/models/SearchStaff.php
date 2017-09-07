<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Staff;

/**
 * SearchStaff represents the model behind the search form about `app\models\Staff`.
 */
class SearchStaff extends Staff
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'position_id', 'induction_time', 'departure_time', 'sex', 'createuser', 'loginID', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['WorkingPlace', 'SalesmanNumber', 'department', 'name', 'eag', 'email', 'wechat', 'phone', 'adder', 'remarks', 'loginname'], 'safe'],
            [['height', 'weight'], 'number'],
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
        $query = Staff::find();

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
            'position_id' => $this->position_id,
            'induction_time' => $this->induction_time,
            'departure_time' => $this->departure_time,
            'sex' => $this->sex,
            'height' => $this->height,
            'weight' => $this->weight,
            'createuser' => $this->createuser,
            'loginID' => $this->loginID,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'create_use' => $this->create_use,
            'updated_at' => $this->updated_at,
            'updated_use' => $this->updated_use,
        ]);

        $query->andFilterWhere(['like', 'WorkingPlace', $this->WorkingPlace])
            ->andFilterWhere(['like', 'SalesmanNumber', $this->SalesmanNumber])
            ->andFilterWhere(['like', 'department', $this->department])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'eag', $this->eag])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'wechat', $this->wechat])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'adder', $this->adder])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'loginname', $this->loginname]);

        return $dataProvider;
    }
}
