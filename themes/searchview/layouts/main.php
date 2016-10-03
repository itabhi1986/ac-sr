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
    </head>
    <body>
<?php $this->beginBody() ?>
      
                <?php $this->beginContent('@app/themes/searchview/layouts/header.php', ['theme' => $theme, 'baseurl' => $baseurl]); ?>
        <?php $this->endContent(); ?>
                   <?php $this->beginContent('@app/themes/searchview/layouts/banner.php', ['theme' => $theme, 'baseurl' => $baseurl]); ?>
            <?php $this->endContent(); ?>
            <?php $this->beginContent('@app/themes/searchview/layouts/subheader.php', ['theme' => $theme, 'baseurl' => $baseurl]); ?>
                <?php $this->endContent(); ?>
                <div class="content-wrapper">
                    <?= $content ?>
                </div> 
        
        <!--<div class="footer">
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column" >
          <div class="row clearfix">
            <?php //$this->beginBody() ?>
      
                <?php //$this->beginContent('@app/themes/searchview/layouts/footerCategories.php', ['theme' => $theme, 'baseurl' => $baseurl]); ?>
        <?php //$this->endContent(); ?>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 column footer_right">
              <div class="email_subscription">
                <h1>Subscribe to email</h1>
                <input type="text" class="sub_email" value="yourname@email.com">
                <input type="button" class="submit_btn" value="SUBMIT">
                <p>To get latest updates and attractive deals 
                  please register and subscribe NOW !</p>
              </div>
              <div class="footer_social_icon">
                <h1>Follow us on </h1>
                <ul>
                  <li class="facebook"><a href="#"></a></li>
                  <li class="twitter"><a href="#"></a></li>
                  <li class="bring"><a href="#"></a></li>
                  <li class="google_plus"><a href="#"></a></li>
                  <li class="in_icon"><a href="#"></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>-->
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
