<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Banner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banner-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']] ); ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'path')->fileInput(array('class' =>'upload_img' ,'placeholder'=> 'Upload/Change Profle Photo','accept' => 'image/*'))->label('Upload/Change Profile Photo');   ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
