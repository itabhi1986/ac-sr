<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Profileimage */

$this->title = 'Create Profileimage';
$this->params['breadcrumbs'][] = ['label' => 'Profileimages', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profileimage-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
