<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\States;
use app\models\Cities;
use yii\helpers\ArrayHelper;
use app\models\Category;
use yii\bootstrap\Dropdown;

$sql = 'SELECT id , name  FROM states where country_id=101';
$states = States::findBySql($sql)->all();
$states = ArrayHelper::map($states, 'id', 'name');


$cities = array();
if ($model->state != '') {   
    $sql = 'SELECT id , name  FROM cities where state_id='.$model->state ;
    $citiess = Cities::findBySql($sql)->all();
    $cities = ArrayHelper::map($citiess, 'id', 'name');
}
//print_r($user_id);exit;
$sql = 'SELECT id , name  FROM category';
$categories = Category::findBySql($sql)->all();
$categoriesData = ArrayHelper::map($categories, 'id', 'name');

/* @var $this yii\web\View */
/* @var $model app\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->hiddenInput(['value'=>Yii::$app->user->getId()]); ?>
    <?= $form->field($model, 'name')->textInput(array('value'=>$model->getAttribute('name'))) ?>

    <?= $form->field($model, 'public_email')->textInput(array('value'=>$model->getAttribute('public_email'))) ?>    

    <?= $form->field($model, 'mobile')->textInput(array('value'=>$model->getAttribute('mobile'))) ?>
    <?= $form->field($model, 'website')->textInput(array('value'=>$model->getAttribute('website'))) ?>

    <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions' => [
        'imageManagerJson' => ['/redactor/upload/image-json'],
        'imageUpload' => ['/redactor/upload/image'],
        'fileUpload' => ['/redactor/upload/file'],
        'plugins' => ['clips', 'fontcolor','imagemanager'],
    	'minHeight' => '200px',
    		
    	]
    ]) ?>

    <?= $form->field($model, 'address')->textInput(array('value'=>$model->getAttribute('address'))) ?>

    <?= $form->field($model, 'state')->dropDownList($states,['prompt'=>'Please select a State', 'id' => 'sid']) ?>

   <?= $form->field($model, 'city')->dropDownList($cities,['prompt'=>'Please select a City', 'id' => 'cid']); ?>

    <?= $form->field($model, 'zipcode')->textInput(array('value'=>$model->getAttribute('zipcode'))) ?>

   <?= $form->field($model, 'category')->dropDownList($categoriesData,['prompt'=>'Please select a Category', 'id' => 'catid']); ?>

    <div class="form-group">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>

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
