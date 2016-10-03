<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\PageSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'page_id') ?>

    <?= $form->field($model, 'page_name') ?>

    <?= $form->field($model, 'page_content') ?>

    <?= $form->field($model, 'page_status') ?>

    <?= $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'page_owner') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?php // echo $form->field($model, 'meta_keywords') ?>

    <?php // echo $form->field($model, 'show_breadcrumb') ?>

    <?php // echo $form->field($model, 'layout') ?>

    <?php // echo $form->field($model, 'sidebar') ?>

    <?php // echo $form->field($model, 'page_date_created') ?>

    <?php // echo $form->field($model, 'page_date_modified') ?>

    <?php // echo $form->field($model, 'page_type') ?>

    <?php // echo $form->field($model, 'featured') ?>

    <?php // echo $form->field($model, 'allow_comments') ?>

    <?php // echo $form->field($model, 'featured_image') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
