<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\SearchviewAsset;

SearchviewAsset::register($this);
$asset = app\assets\AppAsset::register($this);
$baseurl = $asset->baseUrl;
$theme = $this->theme;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
<?php $this->head() ?>
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
  
<style>
body{font-family: 'Open Sans', sans-serif;}
</style>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    </head>
    <body class="conect-pages">
<?php $this->beginBody() ?>
      
                <?php $this->beginContent('@app/themes/searchview/layouts/header.php', ['theme' => $theme, 'baseurl' => $baseurl]); ?>
        <?php $this->endContent(); ?>
                   <?php /*$this->beginContent('@app/themes/searchview/layouts/banner.php', ['theme' => $theme, 'baseurl' => $baseurl]); ?>
            <?php $this->endContent(); */?>
            <?php $this->beginContent('@app/themes/searchview/layouts/subheader.php', ['theme' => $theme, 'baseurl' => $baseurl]); ?>
                <?php $this->endContent(); ?>
                <div class="content-wrapper">
                    <?= $content ?>
                </div>         
  <?php $this->beginBody() ?>
      
                <?php $this->beginContent('@app/themes/searchview/layouts/footer.php', ['theme' => $theme, 'baseurl' => $baseurl]); ?>
        <?php $this->endContent(); ?>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
