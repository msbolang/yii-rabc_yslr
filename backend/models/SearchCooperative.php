<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cooperative;

/**
 * SearchCooperative represents the model behind the search form about `app\models\Cooperative`.
 */
class SearchCooperative extends Cooperative
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'createuser', 'loginID', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['cooperativeNumber', 'coname', 'phone', 'adder', 'passportNumber', 'loginname'], 'safe'],
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
        $query = Cooperative::find();

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
            'createuser' => $this->createuser,
            'loginID' => $this->loginID,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'create_use' => $this->create_use,
            'updated_at' => $this->updated_at,
            'updated_use' => $this->updated_use,
        ]);

        $query->andFilterWhere(['like', 'cooperativeNumber', $this->cooperativeNumber])
            ->andFilterWhere(['like', 'coname', $this->coname])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'adder', $this->adder])
            ->andFilterWhere(['like', 'passportNumber', $this->passportNumber])
            ->andFilterWhere(['like', 'loginname', $this->loginname]);

        return $dataProvider;
    }
}
