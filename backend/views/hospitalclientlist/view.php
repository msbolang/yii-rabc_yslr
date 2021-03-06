<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hospitalclientlist */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hospitalclientlists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalclientlist-view">

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
        [
            'label'=>'所属项目',
            'attribute'=>'category_name',
            'value'=>function($model){
               return $model->categoryname();
        }],
            'name',
            'price',
            'performance_royalty',
//            'status',
         [
            'label'=>'医生',
            'attribute'=>'belong',
            'value'=>function($model){
               return $model->doctor();
        }],
          
                
        [
            'label'=>'创建时间',
            'attribute'=>'created_at',
            'value'=>function($model){
               return $model->created_at?date('Y-m-d H:i',$model->created_at):'';
        }],
//            'created_at',
               [
                'label' => '创建人',
                'attribute' => 'create_use',
                'value' => function($model) {
                    return $model->getUserView('create');
                }
            ],  

//            'updated_use',
        ],
    ]) ?>

</div>
