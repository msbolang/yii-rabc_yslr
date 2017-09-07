<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StockCategory */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Stock Category',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="stock-category-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
