<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\PageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pages';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="page-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Page', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],
            'page_name',
            //'page_content:ntext',
            'slug',
    		/* [
    		'label' => 'Content',
    		'format' => 'raw',
    		'value' => function($dataProvider) {
    			$length = 400;
    			$string = strip_tags($dataProvider['page_content']);
	    		if(strlen($string) > $length) {
	    			$string = substr($string, 0, $length);
	    		}
                return $string;
            },
    		//'contentOptions'=>['style'=>'max-width: 100px;'] // <-- right here
    		], */
            // 'page_owner',
            // 'meta_description',
            // 'meta_keywords',
            // 'show_breadcrumb',
            // 'layout',
            // 'sidebar',
            // 'page_date_created',
            // 'page_date_modified',

            ['class' => 'yii\grid\ActionColumn',
	    		'template'=>'{view} {details} {update} {delete}',
    			'buttons'=>[
    				'view' => function ($url, $model) {
		    		return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', '/admin/page/view?id='.$model->page_id, ['title' => Yii::t('yii', 'View inside admin panel'),]);
		    		},
		    		'details' => function ($url, $model) {
		    		return Html::a('<span class="glyphicon glyphicon-new-window"></span>', $model->getSeoUrl(), ['title' => Yii::t('yii', 'View on Website'), 'target' => '_blank']);
		    		}
    			],
    		],
        ],
    ]); ?>

</div>
