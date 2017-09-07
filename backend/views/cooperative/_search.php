<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SearchCooperative */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cooperative-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'cooperativeNumber') ?>

    <?= $form->field($model, 'coname') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'adder') ?>

    <?php // echo $form->field($model, 'passportNumber') ?>

    <?php // echo $form->field($model, 'createuser') ?>

    <?php // echo $form->field($model, 'loginname') ?>

    <?php // echo $form->field($model, 'loginID') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'create_use') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'updated_use') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
