<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Marketingplan */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Marketingplan',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marketingplans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="marketingplan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
