<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchHospitalprojectcategory */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Hospitalprojectcategories');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalprojectcategory-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
       
         <?= Helper::filterActionColumn(['create'])?Html::a(Yii::t('app', 'Create Hospitalprojectcategory'), ['create'], ['class' => 'btn btn-success']):''; ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'category_name',
//            'parent',

            ['class' => 'yii\grid\ActionColumn','template' => Helper::filterActionColumn('{view}&nbsp;&nbsp;{update}&nbsp;&nbsp;{delete}')],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
