<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use Yii;
use kartik\file\FileInput;
use bupy7\cropbox\Cropbox;

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
    
        
         echo $form->field($model, 'path')->widget(Cropbox::className(), ['attributeCropInfo' => 'crop_info', 'optionsCropbox' => [
                                                                                'boxWidth' => 350,
                                                                                'boxHeight' => 350,
                                                                                'cropSettings' => [
                                                                                    [
                                                                                        'width' => 307,
                                                                                        'height' => 336,
                                                                                    ],
                                                                                ],
                                                                            ],]);
  /*echo $form->field($model, 'path')->widget(FileInput::classname(), [
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
								
							]);*/
} else
    {
        ?>
    <div class="upload-img">
								<a href="javascript:void(0);" class="close" id="profile_img" redirectionUrl="" data-id="<?php echo $model->getAttribute('id'); ?>" > X </a>
								<?= Html::img('@web/uploads/'.$model->user_id.'/profile-image/thumb-'.$model->path, array('class'=>'profile_img') ) ?>
							</div>
    <?php
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
