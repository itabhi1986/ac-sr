<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = $page->page_name;
if($page->show_breadcrumb){
	$this->params['breadcrumbs'][] = $this->title;
}

if($page->meta_keywords){
	$meta_keywords = $page->meta_keywords;
}
else{
	$meta_keywords = $page->page_name;
}

if($page->meta_description){
	$meta_description = $page->meta_description;
}
else{
	$meta_description = strip_tags($page->page_content);
}
$this->registerMetaTag(['name' => 'keywords', 'content' => $meta_keywords]);
$this->registerMetaTag(['name' => 'description', 'content' => $meta_description]); 
?>
<div class="site-content">
	<?php echo $page->page_content; ?>
</div>
