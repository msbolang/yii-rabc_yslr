<?php

use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Customers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <p>
      <?=  Helper::filterActionColumn(['update'])?Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']):''; ?>
<?= Helper::filterActionColumn(['delete'])?Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]):''; ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'phone',
            'adder',
            'PassportNo',
            'integral',
//            'status',
                  [
                'label' => '创建时间',
                'attribute' => 'created_at',
                'value' => function($model) {
                    return $model->created_at ? date('Y-m-d H:i:s', $model->created_at) : '';
                }],
                        
                [
                'label' => '创建人',
                'attribute' => 'create_use',
                'value' => function($model) {
                   return $model->getUser('create');
                }
            ],       
                    
//            'created_at',
     
//            [
//                'label' => '修改时间',
//                'attribute' => 'updated_at',
//                'value' => function($model) {
//                    return $model->updated_at ? date('Y-m-d H:i:s', $model->updated_at) : '';
//                }],
//         
//                        
//                [
//                'label' => '修改人',
//                'attribute' => 'updated_use',
//                'value' => function($model) {
//                  return $model->getupdated_use();
//                }
//            ],   
                        
      
         
        ],
    ]) ?>

</div>
