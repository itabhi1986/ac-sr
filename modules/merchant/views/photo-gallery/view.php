<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\PhotoGallery;

/* @var $this yii\web\View */
/* @var $model app\models\PhotoGallery */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Photo Galleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="photo-gallery-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'user_id',
            //'path',
            array(
                'attribute'=>'path',
            'format' => 'html',
                'value'=>Html::img(PhotoGallery::getImagePathByID($model->id),['width' => '70px']),
                 
                ),
            'name',
            'sub_tittle',
        ],
    ]) ?>

</div>
