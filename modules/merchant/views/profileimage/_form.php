<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Profileimage */
/* @var $form yii\widgets\ActiveForm */
print_r($model->path);
?>

<div class="profileimage-form">

    <?php $form = ActiveForm::begin([
    'options'=>['enctype'=>'multipart/form-data'] // important
]); ?>    
    
    <?= $form->field($model, 'user_id')->hiddenInput(['value'=> Yii::$app->user->getId()])->label(false); ?>
<?php if($model->path=='')
{
  echo $form->field($model, 'path')->widget(FileInput::classname(), [
							    'options' => ['class' =>'','accept' => 'image/*'],
								'pluginOptions' => [
									'allowedFileExtensions'=>['jpg','gif','png','jpeg'],
								    //'showPreview' => false,
									'showUpload' => false,
									'showCaption' => false,
									'showRemove'=> false,
									//'browseClass' => 'input-group-lg',
									'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
									'browseLabel' =>  'Upload/ChangePhoto',
									'minFileSize'=>50,  //100kb
									'maxFileSize'=>2048,  //2mb  
									'minImageWidth'=> 400,
									'minImageHeight'=> 400,
									//'resizeImage'=> true,
								    //'maxImageWidth'=> 1000, 
									//'maxImageHeight'=> 1095,
								    //'resizePreference'=> 'width',
									'previewFileType' => 'image',
									
								],
								
							]);
}
  ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'heading')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'desc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
