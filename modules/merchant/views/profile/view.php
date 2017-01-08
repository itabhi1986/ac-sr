<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Profile */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Profiles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update'], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'user_id',
            'name',
            'public_email:email',
            'gravatar_email:email',
            'gravatar_id',
            'location',
            'website',
            'bio:ntext',
            'mobile',
            'description:ntext',
            'address',
            'state',
            'city',
            'zipcode',
            'category',
        ],
    ]) ?>

</div>
