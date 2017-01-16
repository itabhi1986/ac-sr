<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;

/* @var $this yii\web\View */
/* @var $model app\models\Profileimage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profileimage-form">

    <?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]); ?>    
    
    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->getId()])->label(false); ?>

    <?= $form->field($model, 'path')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'heading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
