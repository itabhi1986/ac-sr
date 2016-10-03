<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Profile;

$model->state= $model->getattribute('state');
$model->city = $model->getAttribute('city');
$model->category = $model->getAttribute('category');
$model->description = $model->getAttribute('description');
$model->profile_slug = $model->getAttribute('profile_slug');
$model->timezone = Profile::getTimeZone();
/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form ActiveForm */
?>
<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column ">
            <div class="row clearfix">
                 <?= $this->render('user-menu') ?>
                  <!---right content aria -->
                <div class="col-md-9 col-sm-8 column">
                    <div class="row clearfix categories">

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6"><?= $form->field($model, 'name')->textInput(array('value'=>$model->getAttribute('name'))) ?>
    </div>
    <div class="col-md-6"><?= $form->field($model, 'public_email')->textInput(array('value'=>$model->getAttribute('public_email'))) ?>
         </div>
    <div class="col-md-6"><?= $form->field($model, 'mobile')->textInput(array('value'=>$model->getAttribute('mobile'))) ?>
         </div>
    <div class="col-md-6"><?= $form->field($model, 'website')->textInput(array('value'=>$model->getAttribute('website'))) ?>
         </div>
    <div class="col-md-6"><?= $form->field($model, 'address')->textInput(array('value'=>$model->getAttribute('address'))) ?>
         </div>
    <div class="col-md-6"><?= $form->field($model, 'state')->dropDownList($states,['prompt'=>'Please select a State', 'id' => 'sid']) ?>
         </div>
    <div class="col-md-6"><?= $form->field($model, 'city')->dropDownList($cities,['prompt'=>'Please select a City', 'id' => 'cid']); ?>
         </div>
    <div class="col-md-6"><?= $form->field($model, 'zipcode')->textInput(array('value'=>$model->getAttribute('zipcode'))) ?>
          </div>
    <div class="col-md-6"><?= $form->field($model, 'category')->dropDownList($categoriesData,['prompt'=>'Please select a Category', 'id' => 'catid']); ?>
         </div>
    <div class="col-md-12">
    <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions' => [
        'imageManagerJson' => ['/redactor/upload/image-json'],
        'imageUpload' => ['/redactor/upload/image'],
        'fileUpload' => ['/redactor/upload/file'],
        'plugins' => ['clips', 'fontcolor','imagemanager'],
    	'minHeight' => '200px',
    		
    	]
    ]) ?>
         
            <?php // $form->field($model, 'profile_slug')->textInput(['maxlength' => true]) ?> 
        <?= $form->field($model, 'user_id')->hiddenInput(array('value'=>$model->getAttribute('user_id')))->label('') ?>
        
       <!--textInput(array('value'=>$model->getAttribute('description')))  -->
    </div>
    <div class="clearfix">
    </div>
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-profile-index -->

                        
          
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
var URL = '<?php echo  Yii::$app->getUrlManager()->createUrl("/user-profile/get-cities/")?>';

</script>
<?php
$script = <<< JS
 

$("#sid").change(function() {
        
  var sid = $(this).val();
      
  $.ajax({
        url: URL,
        type: "POST",
        datatype: "JSON",
        data:{'sid':sid},
        success: function(data) {
           $('#cid').children('option:not(:first)').remove();
           $("#cid").append(data);
        
        }
    }) ;
        });
        
        
        
JS;
$this->registerJs($script);
?>