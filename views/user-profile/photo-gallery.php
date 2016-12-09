<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\PhotoGallery */
/* @var $form yii\widgets\ActiveForm */
$model->user_id = $user_id;
?>
<div class="container">
    <div class="row clearfix bg-gry">
        <div class="col-md-12 column ">
            <div class="row clearfix">
                 <?= $this->render('user-menu') ?>
                  <!---right content aria -->
                <div class="col-md-9 col-sm-8 column bg-wht">
                    <div class="row clearfix categories">
                

<div class="photo-gallery-form">
    <div class="col-lg-12">
    <h2> Upload Images</h2>

    <?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]); ?>

   
        <div class="col-md-6">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
         <div class="col-md-6">

    <?= $form->field($model, 'sub_tittle')->textInput(['maxlength' => true]) ?>
             </div>
    
         <div class="col-md-6"><?= $form->field($model, 'path')->fileInput(array('class' =>'upload_img' ,'placeholder'=> 'Select a Image','accept' => 'image/*'))->label('Upload Image');   ?>
         <?= $form->field($model, 'user_id')->hiddenInput()->label(''); ?>
        </div>
        <div class="col-md-12">

        <?= Html::submitButton($model->isNewRecord ? 'Upload Images' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
        </div>

    <?php ActiveForm::end(); ?>

                  <div class="col-md-12">
 <div class="pic-thum">
                    <?php
                                if(isset($photoImages)&& count($photoImages)>0)
                                {
                                   foreach($photoImages as $key=>$value)
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

            </div>
        </div>
    </div>
</div>