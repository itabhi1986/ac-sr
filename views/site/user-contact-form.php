<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserContactForm */
/* @var $form ActiveForm */
?>
<div class="site-user-contact-form">
  <?php   
    if (\Yii::$app->session->hasFlash('success'))
  {?>
    <div class="alert alert-success alert-dismissable fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong></strong> <?= Yii::$app->session->getFlash('success'); ?>
  </div>
    <?php } ?>
 
    <?php $form = ActiveForm::begin(['id' => 'user-contact',
        
        'options' => ['enctype' => 'multipart/form-data']]); ?>
       
        <?= $form->field($model, 'name')->textInput(['placeholder' => "Enter Your Name"])->label(false) ?>
    
        <?= $form->field($model, 'phone')->textInput(['placeholder' => "Enter Your Phone Number"])->label(false) ?>
        <?= $form->field($model, 'email')->textInput(['placeholder' => "Enter Your Email"])->label(false) ?>
        <?= $form->field($model, 'message')->textarea(['placeholder' => "Message"])->label(false) ?>
       
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn  btn-primary btn-lg']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-user-contact-form -->
