<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Marketingplan */

$this->title = Yii::t('app', 'Create Marketingplan');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Marketingplans'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marketingplan-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
