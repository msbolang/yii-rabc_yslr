<?php
use mdm\admin\components\Helper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Hospitalprojectcategory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hospitalprojectcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalprojectcategory-view">

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
            'category_name',
            'parent',
        ],
    ]) ?>

</div>
