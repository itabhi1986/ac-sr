<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\StaffGallery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="staff-gallery-form">

    <?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]); ?>

     <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->getId()])->label(false); ?>

    <?= $form->field($model, 'path')->widget(FileInput::classname(), [
							    'options' => ['class' =>'','accept' => 'image/*'],
								'pluginOptions' => [
									'allowedFileExtensions'=>['jpg','gif','png'],
								    //'showPreview' => false,
									'showUpload' => false,
									'showCaption' => false,
									'showRemove'=> false,
									//'browseClass' => 'input-group-lg',
									'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
									'browseLabel' =>  'Upload/ChangePhoto',
									'minFileSize'=>50,  //100kb
									'maxFileSize'=>2048,  //2mb  
									'minImageWidth'=> 500,
									'minImageHeight'=> 500,
									//'resizeImage'=> true,
								    //'maxImageWidth'=> 1000, 
									//'maxImageHeight'=> 1095,
								    //'resizePreference'=> 'width',
									'previewFileType' => 'image',
									
								],
								
							]);?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_tittle')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
