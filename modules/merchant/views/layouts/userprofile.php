<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\MerchantAsset;
use yii\bootstrap\BootstrapPluginAsset;


MerchantAsset::register($this);
BootstrapPluginAsset::register($this);


$theme = $this->theme;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="http://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="http://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<body>
<?php $this->beginBody() ?>
    <div class="wrapper">
      <!-- BEGIN SIDEBAR-->
 <aside class="social-sidebar">
        <?php $this->beginContent('@app/modules/merchant/views/layouts/sidebar.php'); ?>
        <?php $this->endContent(); ?>
        
      </aside>
      <!-- END SIDEBAR-->
      <header>
        <!-- BEGIN NAVBAR-->
        <nav role="navigation" class="navbar navbar-fixed-top navbar-super social-navbar">
          <div class="navbar-header">
            <a href="#home" title="Social" class="navbar-brand">              
              <span>&nbsp;User Section</span>
            </a>
          </div>
          <div class="navbar-toggle"><i class="fa fa-align-justify"></i>
          </div>
          <!-- /.navbar-collapse-->
        </nav>
        <!-- END NAVBAR-->
      </header>
      <div class="main">
        <!-- BEGIN CONTENT-->
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h3 class="page-title">Dashboard</h3>
              <ul class="breadcrumb breadcrumb-arrows breadcrumb-default">
                <li>
                  <a href="#ignore"><i class="fa fa-home fa-lg"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="container">
          <?= $content ?>
        </div>
        <!-- END CONTENT-->
      </div>
      <footer>2016 © Search2city.com </footer>
    </div>
   

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
