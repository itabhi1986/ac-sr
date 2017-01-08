<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;

/* @var $this yii\web\View */
/* @var $model app\models\StaffGallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-gallery-form">

    <?php $form = ActiveForm::begin(); ?>

     <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->getId()])->label(false); ?>

    <?= $form->field($model, 'path')->fileInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_tittle')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
