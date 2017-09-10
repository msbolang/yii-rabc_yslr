<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Searchstock */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Stocks');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    
          <?= Helper::filterActionColumn(['create'])?Html::a(Yii::t('app', 'Create Stock'), ['create'], ['class' => 'btn btn-success']):''; ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'category',
      ['label'=>'分类',  'attribute' => 'category_name',  'value' => 'stock_category.category_name'],
            
            'product_name',
//            'product_number',
            'number',
        
           [
                      'attribute' => 'purchase_time',
                      'value' => function($data){
                           return isset($data['purchase_time'])?  date('Y-m-d',$data['purchase_time']):'' ;
                       }
                ],
                             
                [
                      'attribute' => 'outbound_time',
                      'value' => function($data){
                           return isset($data['outbound_time'])?  date('Y-m-d',$data['outbound_time']):'' ;
                       }
                ],
                        
            'ex_shipment_price_perbox',
            'Postage_per_shipment',
            ['label'=>'创建者',  'attribute' => 'username',  'value' => 'user.username'],
//            'advent',
//             'early_warning',
//           'detailed_description:ntext',
            // 'status',
            // 'created_at',
            // 'create_use',
            // 'updated_at',
            // 'updated_use',

             ['class' => 'yii\grid\ActionColumn','template' => Helper::filterActionColumn('{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}')],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
