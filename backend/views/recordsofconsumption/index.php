<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchRecordsofconsumption */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Recordsofconsumptions');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recordsofconsumption-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Recordsofconsumption'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'customer_id',
               ['label'=>'客户',  'attribute' => 'name',  'value' => 'customer.name'],
//            'SalesmanNumber',
//            'DoctorNumber',
//            'category',
            
         ['label'=>'项目',  'attribute' => 'category_name',  'value' => 'hospitalprojectcategory.category_name'],
            'price',
       
                  [
                      'attribute' => 'TimeToSpend',
                      'value' => function($data){
                           return isset($data['TimeToSpend'])?  date('Y-m-d',$data['TimeToSpend']):'' ;
                       }
                ],
           'integral',
            // 'status',
            // 'created_at',
            // 'create_use',
            // 'updated_at',
            // 'updated_use',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
