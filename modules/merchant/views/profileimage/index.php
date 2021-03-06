<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProfileimageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profileimages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profileimage-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Profileimage', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            //'user_id',
            'path',
            'name',
            'heading',
            // 'desc',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
