<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cooperative */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cooperatives'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cooperative-view">

 

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
             'coname',
            'phone',
            'adder',
            'passportNumber',
//            'createuser',
//            'loginname',
//            'loginID',
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
                  return $model->getUser('create');
                }
            ],  
//            'updated_at',
//            'updated_use',
        ],
    ]) ?>

</div>
