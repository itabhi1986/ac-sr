<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$model->user_id = $user_id;
?>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column ">
            <div class="row clearfix">
                 <?= $this->render('user-menu') ?>

                <!---right content aria -->
                <div class="col-md-9 col-sm-8 column">
                    <div class="row clearfix categories">
                        <div class="links-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'user_id')->hiddenInput()->label(''); ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true])->label("Link (e.g http://google.com)") ?>

    <?= $form->field($model, 'tittle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>