<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Notice;

/**
 * SearchNotice represents the model behind the search form about `app\models\Notice`.
 */
class SearchNotice extends Notice {

    /**
     * @inheritdoc
     */
    public $username;

    public function rules() {
        return [
            [['id', 'status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['usergroup', 'title', 'content', 'peruser', 'username'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Notice::find();
        // $query->join('LEFT JOIN', 'user', "id in(abs(user.msg))");
        if (!$this->getAuthAssignment()) {
            $query->where(['in', 'id', $this->getUserMsgModel()]);
        }// add conditions that should always apply here
//         $models = $query->getModels();
//            foreach ($models as $key => $value) {
//           unset($models[0]);
//        }
//        
//        $dataProvider->setModels($models);


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
            'status' => $this->status,
            'created_at' => $this->created_at,
            'create_use' => $this->create_use,
            'updated_at' => $this->updated_at,
            'updated_use' => $this->updated_use,
        ]);

        $query->andFilterWhere(['like', 'usergroup', $this->usergroup])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'content', $this->content])
                ->andFilterWhere(['like', 'peruser', $this->peruser]);






        return $dataProvider;
    }

    private function getUserMsgModel() {
        $msgArr = [];
        $msg = User::find()->select('msg')->where(['id' => Yii::$app->user->id])->one();
        if (!empty($msg['msg'])) {
            $msgArr = explode(',', $msg['msg']);
            foreach ($msgArr as $key => $val) {
                $msgArr[$key] = abs($val);
            }
        }
        return $msgArr;
    }

    public function getAuthAssignment() {
        $auth = AuthAssignment::find()->where(['user_id' => Yii::$app->user->id, 'item_name' => ADMINNAME])->one();
        if ($auth) {
            return true;
        } else {
            return false;
        }
    }

}
