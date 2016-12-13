<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Url;
$baseURL = Url::base(true);
$imageURL= $baseURL."/themes/searchview/images/";
?>
 <div class="container">
    <div class="row clearfix">
      <div class="col-md-12 column ">
        <div class="row clearfix">
        
        <!-- left nav--->
         <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 column column ">
            <div class="row clearfix mT60 ">
               <div class="addbanner">
                   <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- sidebar_search2city -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-7853046234892696"
     data-ad-slot="5152767964"
     data-ad-format="auto"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
                                             <img src="<?php echo $imageURL."contactus.jpg"?>">
                                              <img src="<?php echo $imageURL."contactus.jpg"?>">
                                              <img src="<?php echo $imageURL."contactus.jpg"?>">
                                              <img src="<?php echo $imageURL."contactus.jpg"?>">
                                            
                                        </div>
            </div>
          </div>
        
        <!---right content aria -->
          <div class="col-md-9 col-sm-8 column">
            <div class=" clearfix categories">
            <h2 class="inner-page-heading"> Search Result </h2>
			
                 <?= $this->render('profile-list',['profiles' => $profiles]) ?>
        
          </div>
         
        </div>
      </div>
    </div>
  </div>