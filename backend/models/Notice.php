<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%notice}}".
 *
 * @property integer $id
 * @property string $usergroup
 * @property string $title
 * @property string $content
 * @property string $peruser
 * @property integer $status
 * @property integer $created_at
 * @property integer $create_use
 * @property integer $updated_at
 * @property integer $updated_use
 */
class Notice extends TotalModel {

    public $username;
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%notice}}';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [

            [['usergroup', 'title', 'content', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'required'],
            [['content', 'peruser'], 'string'],
            [['status', 'created_at', 'create_use', 'updated_at', 'updated_use'], 'integer'],
            [['usergroup'], 'string', 'max' => 50],
            [['title'], 'string', 'max' => 255],
            [['username'],'safe']
//            [['usergroup'], 'noticeUser', 'on' => ['update', 'create']],
        ];
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'usergroup' => Yii::t('app', '发送对象'),
            'title' => Yii::t('app', '标题'),
            'content' => Yii::t('app', '内容'),
            'peruser' => Yii::t('app', '阅读者'),
            'status' => Yii::t('app', '状态'),
            'created_at' => Yii::t('app', '创建时间'),
            'create_use' => Yii::t('app', '创建人'),
            'updated_at' => Yii::t('app', '修改时间'),
            'updated_use' => Yii::t('app', '修改人'),
        ];
    }

    /**
     * @inheritdoc
     * @return NoticeQuery the active query used by this AR class.
     */
    public static function find() {
        return new NoticeQuery(get_called_class());
    }

 



    /** 自定义方法
     * 
     * @return string场景
     */
    
    public function scenarios() {
        $parent = parent::scenarios();
        $parent['create'] = ['usergroup', 'title', 'content', 'created_at', 'create_use', 'updated_at', 'updated_use'];
        $parent['update'] = ['usergroup', 'title', 'content', 'created_at', 'create_use', 'updated_at', 'updated_use'];
        return $parent;
    }

//    public function noticeUser($attribute, $params) {
//    }

    public function setUserMsg($id) {
        if ($id) {
            $userArr = array();
            if ($this->usergroup == '所有人') {
                $userArr = User::find()->select('id')->asArray()->all();
            } else {
                $userArr = AuthAssignment::find()->select("user_id as id")->where(['item_name' => $this->usergroup])->asarray()->all();
            }
              $this->setUserMsgDate($userArr, $id);
        }
    }

    private function setUserMsgDate($users = [], $id) {
        
        if (!empty($users)) {
            foreach ($users as $key => $val) {
                $model = User::find()->where(['id' => $val['id']])->one();
                $model->msg = empty($model->msg) ? '-' . $id : $model->msg . ',-' . $id;
                if(!$model->save(FALSE)){
                    var_dump($model->getErrors());exit;
                };
            }
        }
    }
    
       public function usergroup() {
 
//       $auth = AuthAssignment::find()->where(['user_id'=>Yii::$app->user->identity->id,'item_name'=>ADMINNAME])->one();
  
        $arr = array('所有人'=>'所有人');
        $userGroup = AuthItem::find()->select("name")->where(['type' => 1])->asarray()->all();
        if (!empty($userGroup)) {
            foreach ($userGroup as $key => $value) {
                $arr[$value['name']] = $value['name'];
            }
        }
        return $arr;
    }

}
