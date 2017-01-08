<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\StaffGallery */

$this->title = 'Create Staff Gallery';
$this->params['breadcrumbs'][] = ['label' => 'Staff Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-gallery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
