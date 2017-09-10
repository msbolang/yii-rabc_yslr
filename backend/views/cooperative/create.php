<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cooperative */

$this->title = Yii::t('app', 'Create Cooperative');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Cooperatives'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cooperative-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
