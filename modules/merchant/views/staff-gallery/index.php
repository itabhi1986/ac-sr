<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StaffGallerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Staff Galleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="staff-gallery-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Staff Gallery', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
           array(
                'attribute' => 'path',
                'format' => 'html',
                'label' => 'Image',
                'value' => function($data) {
                    return Html::img($data->getImagePathByID($data['id']), ['width' => '70px']);
                },
                    ),
            'name',
            'sub_tittle',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
