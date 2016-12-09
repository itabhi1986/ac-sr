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
    <div class="row clearfix">
        <div class="col-md-12 column bg-gry">
            <div class="row clearfix">
                <?= $this->render('user-menu') ?>

                <!---right content aria -->
                <div class="col-md-9 col-sm-8 column bg-wht">
                    <div class="row clearfix categories">
                    <h2> Uplade Banner</h2>
                        <div class="photo-gallery-form">
                            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

                            <?= $form->field($model, 'user_id')->hiddenInput()->label(''); ?>

                            <?= $form->field($model, 'path')->fileInput(array('class' => 'upload_img', 'placeholder' => 'Upload/Change Profle Photo', 'accept' => 'image/*'))->label('Upload/Change Profile Photo'); ?>

                            <?= $form->field($model, 'name')->hiddenInput(['maxlength' => true])->label('') ?>

                            <div class="form-group">
                            <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                            </div>

                            <?php ActiveForm::end(); ?>

                        </div>
                   
                    <div class="banner-profile">
                    <h3> Upladed Banner</h3>
                        <?php
                                if(isset($bannerImages) && count($bannerImages)>0)
                                {
                                   foreach($bannerImages as $key=>$value)
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