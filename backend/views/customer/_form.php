<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'adder')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PassportNo')->textInput(['maxlength' => true]) ?>


  <?= $form->field($model, 'status')->dropDownList(['1'=>'有效','0'=>'无效'])->hiddenInput(['value'=>1])->label(false);?>
    
 
    <?= $form->field($model, 'created_at')->textInput()->hiddenInput(['value'=>$model->created_at?$model->created_at:time()])->label(false); ?>

    <?= $form->field($model, 'create_use')->textInput()->hiddenInput(['value'=>$model->create_use?$model->create_use:\Yii::$app->user->id])->label(false); ?>

    <?= $form->field($model, 'updated_at')->textInput()->hiddenInput(['value'=>time()])->label(false); ?>

    <?= $form->field($model, 'updated_use')->textInput()->hiddenInput(['value'=>\Yii::$app->user->id])->label(false); ?>   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
  function loginAccount(obj){
      console.log(obj.value);
  }
</script>