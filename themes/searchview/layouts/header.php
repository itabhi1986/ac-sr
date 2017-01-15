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
            <div class="col-md-3 col-sm-3 column"> <img alt="140x140" src="<?php echo $theme->getUrl('/images/logo.png'); ?>" class="fl logo"> </div>
             <div class="col-md-4 col-sm-4 column about-search">
                <div class="main_search_box">
                  <div class="search_box_outer">
                    <div class="search_box">
                     <div class="input-append">
                          <form action="/search/" method="get">
                         <input class="span1 top_search" id="appendedInputButton" type="text" placeholder="search..." name="s"/>
                         
                         <button type="submit" class="btn top_search_btn">
                             </form>
                          <i class="icon-search"></i>
                        </buttton>
                    </div>
                    </div>
                  </div>
                </div>
             </div>
          <div class="col-md-5 col-sm-5 about-nav  column right_logo">
          <nav role="navigation" class="navbar navbar-default home-nav ">
          <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar"">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
      </div>
              <div class="collapse navbar-collapse"  id="myNavbar"> <?php
                    echo Nav::widget([
                        'options' => ['class' => 'navbar-nav navbar-right'],
                        'items' => [
                            ['label' => 'Home', 'url' => ['/site/index']],
                            ['label' => 'About', 'url' => ['/site/about']],
                            ['label' => 'Contact Us', 'url' => ['/site/contact-us']],
                            ['label' => 'Register', 'url' => ['/user/register'],'visible' => Yii::$app->user->isGuest],
                            ['label' => 'Login', 'url' => ['/user/login'],'visible' => Yii::$app->user->isGuest],
                            ['label' => (!Yii::$app->user->isGuest)? Yii::$app->user->identity->username:'', 'url' => ['#'], 'visible' => !Yii::$app->user->isGuest
                            ,'items' => [
                                        ['label' => 'Dashboard', 'url' => ['/merchant/'],'visible' => !Yii::$app->user->isGuest],
                                        ['label' => 'Log out (' . (Yii::$app->user->isGuest)?'Logout':'' . ')', 'url' => ['/user/security/logout/'], 'linkOptions' => ['data-method' => 'post'],'visible' => !Yii::$app->user->isGuest]
                            ]]]
                            
                            
                    ]);
                    ?>
                    
            
         </div> </div></nav> </div>
          </div>
        </div>
      </div>
    </div>
  </div>