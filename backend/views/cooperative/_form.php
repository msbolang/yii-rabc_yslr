<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cooperative */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cooperative-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cooperativeNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'coname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passportNumber')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'createuser')->textInput() ?>

    <?= $form->field($model, 'loginname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'loginID')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'create_use')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'updated_use')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
