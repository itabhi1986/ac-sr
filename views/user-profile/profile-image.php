<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

$model->user_id = $user_id;
?>

<div class="container">
    <div class="row clearfix bg-gry">
        <div class="col-md-12 column ">
            <div class="row clearfix">
                <?= $this->render('user-menu') ?>

                <!---right content aria -->
                <div class="col-md-9 col-sm-8 column bg-wht">
                    <div class="row clearfix categories profile-images">
                        <div class="photo-gallery-form">
                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                            <?= $form->field($model, 'user_id')->hiddenInput()->label(''); ?>

                            <?= $form->field($model, 'path')->fileInput(array('class' => 'upload_img', 'placeholder' => 'Upload/Change Profle Photo', 'accept' => 'image/*'))->label('Upload/Change Profile Photo'); ?>

                            <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Name') ?>
                            

                            <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                        <div class="pic-thum">
                        <?php
                                if(isset($profileImages)&& count($profileImages)>0)
                                {
                                   foreach($profileImages as $key=>$value)
                                   {
                                       ?>
                                        <img src="<?php echo $value;?>" />
                                       <?php
                                   }
                                }
                                              
                        
                        ?>
                    </div>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
</div>