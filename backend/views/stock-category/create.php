<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StockCategory */

$this->title = Yii::t('app', 'Create Stock Category');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Stock Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stock-category-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
