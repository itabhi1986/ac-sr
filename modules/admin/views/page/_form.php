<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'page_name')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'page_content')->textarea(['rows' => 6]) ?>
    
    <?= $form->field($model, 'page_content')->widget(\yii\redactor\widgets\Redactor::className(), [
    'clientOptions' => [
        'imageManagerJson' => ['/redactor/upload/image-json'],
        'imageUpload' => ['/redactor/upload/image'],
        'fileUpload' => ['/redactor/upload/file'],
        'plugins' => ['clips', 'fontcolor','imagemanager'],
    	'minHeight' => '200px',
    		
    	]
    ]) ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'page_status')->dropDownList([
    			'publish' => 'Publish',
	    		'draft' => 'Draft'
    		]
    		)?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'show_breadcrumb')->dropDownList([
	    		'1' => 'Yes',
	    		'0' => 'No'
    		]
    		)?>

    <?= $form->field($model, 'layout')->dropDownList([
    			'right_sidebar' => 'Right Sidebar',
	    		'left_sidebar' => 'Left Sidebar',
	    		'full' => 'Full(No Sidebar)'
    		]
    		)?>

    <?= $form->field($model, 'sidebar')->dropDownList([
    			'page_sidebar_1' => 'Page Sidebar 1',
	    		'page_sidebar_2' => 'Page Sidebar 2',
	    		'page_sidebar_3' => 'Page Sidebar 3'
	    		
    		]
    		)?>
	<?php /* $form->field($model, 'page_type')->dropDownList([
	    		'page' => 'Page',
	    		'article' => 'Article'
    		]
    		) */?>
	<?= $form->field($model, 'featured')->dropDownList([
	    		'1' => 'Yes',
	    		'0' => 'No'
    		]
    		)?>
	<?= $form->field($model, 'allow_comments')->dropDownList([
	    		'1' => 'Yes',
	    		'0' => 'No'
    		]
    		)?>
	
	<?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php if($model->featured_image){ ?>
    <img src="<?php echo $model->getLogoUrl()?>" style="max-height: 300px;max-width: 300px;  margin-bottom: 25px;">
    <br>
    <label class="checkbox" style="display: inline-table; margin-left: 20px;">
		<input id="delete-logo" name="delete-logo" type="checkbox">Delete Logo.
	</label>
	<br>
    <?php } ?>
	
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
