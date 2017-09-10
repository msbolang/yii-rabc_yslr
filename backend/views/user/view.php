<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

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
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            
              'assignment.item_name',
//            'status',
              [
                'label' => '创建时间',
                'attribute' => 'created_at',
                'value' => function($model) {
                    return $model->created_at ? date('Y-m-d H:i', $model->created_at) : '';
                }],
//            'updated_at',
        ],
    ]) ?>

</div>
