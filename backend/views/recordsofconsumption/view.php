<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Recordsofconsumption */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recordsofconsumptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recordsofconsumption-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'customer_id',
           [
                'label' => '客户',
                'attribute' => 'customer_id',
                'value' => function($model) {
                  return $model->getViewCustomerId();
                }
            ],
            'SalesmanNumber',
            'DoctorNumber',
           [
                'label' => '项目',
                'attribute' => 'category_name',
                'value' => function($model) {
                  return $model->getViewCategory();
                }
            ],
            'price',
            'TimeToSpend:datetime',
                         [
                'label' => '消费时间',
                'attribute' => 'TimeToSpend',
                'value' => function($model) {
                  return $model->TimeToSpend?date('Y-m-d',$model->TimeToSpend):'';
                }
            ],
            'integral',
//            'status',
//            'created_at',
//            'create_use',
//            'updated_at',
//            'updated_use',
                             [
                'label' => '创建时间',
                'attribute' => 'created_at',
                'value' => function($model) {
                    return $model->created_at ? date('Y-m-d', $model->created_at) : '';
                }],

             [
                'label' => '创建人',
                'attribute' => 'create_use',
                'value' => function($model) {
                  return $model->getcreate_use();
                }
            ],     
        ],
    ]) ?>

</div>
