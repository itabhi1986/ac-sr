<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Article', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'page_id',
            'page_name',
            'page_content:ntext',
            'page_status',
            'slug',
            // 'page_owner',
            // 'meta_description',
            // 'meta_keywords',
            // 'show_breadcrumb',
            // 'layout',
            // 'sidebar',
            // 'page_date_created',
            // 'page_date_modified',
            // 'page_type',
            // 'featured',
            // 'allow_comments',
            // 'featured_image',

            ['class' => 'yii\grid\ActionColumn',
	    		'template'=>'{view} {details} {update} {delete}',
    			'buttons'=>[
    				'view' => function ($url, $model) {
		    		return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '/admin/article/view?id='.$model->page_id, ['title' => Yii::t('yii', 'View inside admin panel'),]);
		    		},
		    		'details' => function ($url, $model) {
		    		return Html::a('<span class="glyphicon glyphicon-new-window"></span>', $model->getSeoUrl(), ['title' => Yii::t('yii', 'View on Website'), 'target' => '_blank']);
		    		}
    			],
    		],
        ],
    ]); ?>

</div>
