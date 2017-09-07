<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Stock */

$this->title = $model->product_name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stocks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;




?>
<div class="stock-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
//            'category',
            [
                'label' => '分类',
                'attribute' => 'category',
                'value' => function($model) {
                  return $model->getcategory();
                }
            ],
            'product_name',
            'product_number',
            'number',
            [
                'label' => '进库时间',
                'attribute' => 'purchase_time',
                'value' => function($model) {
                    return date('Y-m-d', $model->purchase_time);
                }],
//            'purchase_time:datetime',
            [
                'label' => '出库时间',
                'attribute' => 'outbound_time',
                'value' => function($model) {
                    return $model->outbound_time ? date('Y-m-d', $model->outbound_time) : '';
                }],
//            'outbound_time:datetime',
            'ex_shipment_price_perbox',
            'Postage_per_shipment',
            'advent',
            'early_warning',
            'detailed_description:ntext',
//            'status',
            [
                'label' => '创建时间',
                'attribute' => 'created_at',
                'value' => function($model) {
                    return $model->created_at ? date('Y-m-d', $model->created_at) : '';
                }],
//            'created_at',
             [
                'label' => '创建人',
                'attribute' => 'create_use',
                'value' => function($model) {
                  return $model->getcreate_use();
                }
            ],     
                    
//            [
//                'label' => '修改时间',
//                'attribute' => 'updated_at',
//                'value' => function($model) {
//                    return $model->updated_at ? date('Y-m-d', $model->updated_at) : '';
//                }],
////            'updated_at',
//                [
//                'label' => '修改人',
//                'attribute' => 'updated_use',
//                'value' => function($model) {
//                  return $model->getupdated_use();
//                }
//            ],   
        ],
    ])
    ?>

</div>
