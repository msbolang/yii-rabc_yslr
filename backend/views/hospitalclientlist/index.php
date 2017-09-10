<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchHospitalclientlist */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Hospitalclientlists');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalclientlist-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
     
         <?= Helper::filterActionColumn(['create'])?Html::a(Yii::t('app', 'Create Hospitalclientlist'), ['create'], ['class' => 'btn btn-success']):''; ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
      'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'category',
            ['label'=>'项目', 'attribute'=>'category_name', 'value'=>'hospitalprojectcategory.category_name'],
            ['label'=>'医生', 'attribute'=>'username', 'value'=>'user.username'],
            'name',
            'price',
            'performance_royalty',
            // 'status',
            // 'belong',
            // 'created_at',
            // 'create_use',
            // 'updated_at',
            // 'updated_use',
   
            ['class' => 'yii\grid\ActionColumn','template' => Helper::filterActionColumn('{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}')],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
