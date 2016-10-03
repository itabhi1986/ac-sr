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

$owner = $page->getOwner();
?>
<div class="site-content">
	<div class="article-wrapper">
		<?php 
		if($page->getLogoUrl()){
			?>
			<div class="article-featured_image">
				<img src="<?php echo $page->getLogoUrl();?>">
			</div>
			<?php 
		}
		?>
	<h1>
	<?php //print_r();exit;
	echo $page->page_name;
	?>
	</h1>
	<div class="owner-details">
			<span>
				<em>
					<?php
						$profile_name = ($owner->profile->name) ? $owner->profile->name : $owner->username;
						echo "$profile_name, " . $owner->profile->bio;?>
				</em>
			</span>
	</div>
	<div class="content">
		<?php 
		echo $page->page_content;
		?>
	</div>
	</div>
</div>
