<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchStaff */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Staff');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Staff'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'position_id',
            'induction_time:datetime',
            'departure_time:datetime',
            'WorkingPlace',
            // 'SalesmanNumber',
            // 'department',
            // 'name',
            // 'eag',
            // 'sex',
            // 'height',
            // 'weight',
            // 'email:email',
            // 'wechat',
            // 'phone',
            // 'adder',
            // 'remarks:ntext',
            // 'createuser',
            // 'loginname',
            // 'loginID',
            // 'status',
            // 'created_at',
            // 'create_use',
            // 'updated_at',
            // 'updated_use',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
