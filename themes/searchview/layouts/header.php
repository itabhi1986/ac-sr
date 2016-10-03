<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
?><div class="outer_container">
  <div class="bg_blue"></div>
  <div class="bg_orange"></div>
  <div class="top_header">
    <div class="container">
      <div class="row clearfix">
        <div class="col-md-12 column">
          <div class="row clearfix">
            <div class="col-md-3 col-sm-4 column"> <img alt="140x140" src="<?php echo $theme->getUrl('/images/logo.png'); ?>" class="fl logo"> </div>
            <div class="col-md-9 col-sm-8 column right_logo">
          <nav role="navigation" class="navbar navbar-default">
              <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => [
                            ['label' => 'Home', 'url' => ['/site/index']],
                            ['label' => 'About', 'url' => ['/site/about']],
                            ['label' => 'Contact Us', 'url' => ['/site/contact-us']],
                            ['label' => 'Register', 'url' => ['/user/register'],'visible' => Yii::$app->user->isGuest],
                            ['label' => 'Login', 'url' => ['/user/login'],'visible' => Yii::$app->user->isGuest],
                            ['label' => '(Welcome' .')', 'url' => ['#'], 'visible' => !Yii::$app->user->isGuest
                            ,'items' => [
                                        ['label' => 'User Dashboard', 'url' => ['/user-profile/index/'],'visible' => !Yii::$app->user->isGuest],
                                        ['label' => 'Log out (' . (Yii::$app->user->isGuest)?'Logout':'' . ')', 'url' => ['/user/security/logout/'], 'linkOptions' => ['data-method' => 'post'],'visible' => !Yii::$app->user->isGuest]
                            ]]]
                            
                    ]);
                    ?>
            
          </nav> </div>
          </div>
        </div>
      </div>
    </div>
  </div>