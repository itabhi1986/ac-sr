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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body{font-family: 'Open Sans', sans-serif;}
</style>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    </head>
    <body class="afterlogin">
<?php $this->beginBody() ?>
      
                <?php $this->beginContent('@app/themes/searchview/layouts/header.php', ['theme' => $theme, 'baseurl' => $baseurl]); ?>
        <?php $this->endContent(); ?>
                  
          
                <div class="content-wrapper">
                    <?= $content ?>
                </div>         
  <div class="bottom_footer">
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
          <div class="row clearfix">
            <div class="col-md-12 column">
              <div class="row clearfix">
                <div class="col-md-12 column">
                  <ul id="bottom_footer_menu">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact Us </a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                  </ul>
                </div>
                <div class="col-md-6 column copyright text-left">
                 <p> Designed & Developed by <a href="http://abhisheksinghchauhan.com/" target="_blank">Abhishek Singh Chauhan</a></p>
                </div>
                  <div class=" col-md-6 column copyright text-right">
                   <p>Copyright © 2016  Search 2 City. All rights reserved.</p>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
