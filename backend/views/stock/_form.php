<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Stock */
/* @var $form yii\widgets\ActiveForm */
use kartik\datetime\DateTimePicker;
?>

<div class="stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'category')->dropDownList($model->findcategory(),  ['prompt' => '请选择分类']);?>

    <?= $form->field($model, 'product_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'number')->textInput() ?>



     <?= $form->field($model, 'purchase_time')->widget(DateTimePicker::classname(), [ 
          'name' => 'datetime_400',
          'options' => ['placeholder' => date('Y-m-d',time()),'value' => $model->purchase_time?date('Y-m-d',$model->purchase_time):date('Y-m-d',time()) ,], 
          'convertFormat' => FALSE,
          'removeButton' => false,
          'pluginOptions' => [ 
                'autoclose' => true,
                  'todayHighlight' => true,
                      'minView' => "month",
                'format' => 'yyyy-mm-dd'
    ] 

]); ?>
    
    
        <?= $form->field($model, 'outbound_time')->widget(DateTimePicker::classname(), [ 
          'name' => 'datetime_400',
          'options' => [
//              'placeholder' => date('Y-m-d H:i',time()),
              'value' => $model->outbound_time?date('Y-m-d',$model->outbound_time):'' ,], 
          'convertFormat' => FALSE,
          'removeButton' => false,
          'pluginOptions' => [ 
                'autoclose' => true,
                      'todayHighlight' => true,
                        'minView' => "month",
                'format' => 'yyyy-mm-dd'
    ] 

          
]); ?>
    


    <?= $form->field($model, 'ex_shipment_price_perbox')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Postage_per_shipment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'advent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'early_warning')->textInput() ?>

    <?= $form->field($model, 'detailed_description')->textarea(['rows' => 6]) ?>

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
