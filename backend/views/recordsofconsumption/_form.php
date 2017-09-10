<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Recordsofconsumption */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="recordsofconsumption-form">

<?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'customer_id')->dropDownList($model->getCustomerName(), ['prompt' => '请选择客户']); ?>
    <?= $form->field($model, 'SalesmanNumber')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'DoctorNumber')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'category')->dropDownList($model->getCategoryArr(), ['prompt' => '请选择项目']); ?>
    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TimeToSpend')->widget(DateTimePicker::classname(), [
        'name' => 'datetime_400',
        'options' => ['placeholder' => date('Y-m-d', time()), 'value' => $model->TimeToSpend ? date('Y-m-d', $model->TimeToSpend) : date('Y-m-d', time()),],
        'convertFormat' => FALSE,
        'removeButton' => false,
        'pluginOptions' => [
            'autoclose' => true,
            'todayHighlight' => true,
            'minView' => "month",
            'format' => 'yyyy-mm-dd'
        ]
    ]);
    ?>


    <?= $form->field($model, 'integral')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(['1' => '有效', '0' => '无效'])->hiddenInput(['value' => 1])->label(false); ?>

    <?= $form->field($model, 'created_at')->textInput()->hiddenInput(['value' => $model->created_at ? $model->created_at : time()])->label(false); ?>

    <?= $form->field($model, 'create_use')->textInput()->hiddenInput(['value' => $model->create_use ? $model->create_use : \Yii::$app->user->id])->label(false); ?>

    <?= $form->field($model, 'updated_at')->textInput()->hiddenInput(['value' => time()])->label(false); ?>

        <?= $form->field($model, 'updated_use')->textInput()->hiddenInput(['value' => \Yii::$app->user->id])->label(false); ?>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
