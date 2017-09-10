<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>
  <?= Html::errorSummary($model)?>
<script>
 function getClientInfo(v){
    
     $.post("/api/getusers",{data:v},function(data){
             var json = eval( "(" + data + ")" );
 $("#user-relationid").html("").append(json.users);
    });
    
 }
</script>
<div class="user-form">
 

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <?= $form->field($model, 'group')->dropDownList(
        $model->getGroup(),  
          ['prompt' => '请选择分组', 'onchange'=>'getClientInfo('.'$(this).val()'.')',
              'options'=>["$model->relation"=>['Selected'=>true]
            ]
           ]
            );?>
    <?= $form->field($model, 'relationId')->dropDownList($model->getGroupFormUser($model->relation,$model->relationId),  ['prompt' => '请选择用户']);?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
