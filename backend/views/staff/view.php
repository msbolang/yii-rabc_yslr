<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Staff */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Staff'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-view">

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
            'id',
            'position_id',
            'induction_time:datetime',
            'departure_time:datetime',
            'WorkingPlace',
            'SalesmanNumber',
            'department',
            'name',
            'eag',
            'sex',
            'height',
            'weight',
            'email:email',
            'wechat',
            'phone',
            'adder',
            'remarks:ntext',
            'createuser',
            'loginname',
            'loginID',
            'status',
            'created_at',
            'create_use',
            'updated_at',
            'updated_use',
        ],
    ]) ?>

</div>
