<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Hospitalprojectcategory */

$this->title = Yii::t('app', 'Create Hospitalprojectcategory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Hospitalprojectcategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="hospitalprojectcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
