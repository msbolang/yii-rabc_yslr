<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Searchstock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'product_name') ?>

    <?= $form->field($model, 'product_number') ?>

    <?= $form->field($model, 'number') ?>

    <?php // echo $form->field($model, 'purchase_time') ?>

    <?php // echo $form->field($model, 'outbound_time') ?>

    <?php // echo $form->field($model, 'ex_shipment_price_perbox') ?>

    <?php // echo $form->field($model, 'Postage_per_shipment') ?>

    <?php // echo $form->field($model, 'advent') ?>

    <?php // echo $form->field($model, 'early_warning') ?>

    <?php // echo $form->field($model, 'detailed_description') ?>

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
