<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Recordsofconsumption */

$this->title = Yii::t('app', 'Create Recordsofconsumption');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Recordsofconsumptions'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="recordsofconsumption-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
