<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchNotice */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Notices');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notice-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Helper::filterActionColumn(['create'])?Html::a(Yii::t('app', 'Create Notice'), ['create'], ['class' => 'btn btn-success']):''; ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'usergroup',
            'title',
//            'content:ntext',
            
//            'peruser:ntext',
            // 'status',
          
            [
                  'attribute' => 'created_at',
                  'value' => function($data){
                           return isset($data['created_at'])?  date('Y-m-d H:i:s',$data['created_at']):'' ;
                       }
            ],
                 
                    
             ['label'=>'创建者',  'attribute' => 'username',  'value' => function($model){
                    return $model->UserView;
            }],
            // 'updated_at',
            // 'updated_use',

            ['class' => 'yii\grid\ActionColumn','template' => Helper::filterActionColumn('{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}')],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
