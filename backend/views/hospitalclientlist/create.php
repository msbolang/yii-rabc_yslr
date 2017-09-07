<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hospitalclientlist */

$this->title = Yii::t('app', 'Create Hospitalclientlist');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hospitalclientlists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalclientlist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
