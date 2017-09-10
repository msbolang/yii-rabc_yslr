<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Notice */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Notices'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="notice-view">

 

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
            'usergroup',
            'title',
            'content:ntext',
//            'peruser:ntext',
//            'status',
//            'created_at',
//            'create_use',
//            'updated_at',
//            'updated_use',
                 [
                'label' => '创建时间',
                'attribute' => 'created_at',
                'value' => function($model) {
                    return $model->created_at ? date('Y-m-d H:i:s', $model->created_at) : '';
                }],
//            'created_at',
             [
                'label' => '创建人',
                'attribute' => 'create_use',
                'value' => function($model) {
                    return $model->getUser('create');
                },
             
            ], 
                        
        ],
             'template' => '<tr><th width="100">{label}</th><td>{value}</td></tr>',               
                        
    ]) ?>
    <p style="text-align: center;"> <a class="btn btn-success" href="/notice/index">返回</a>    </p>
</div>
