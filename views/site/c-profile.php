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
        
        
        <!---right content aria -->
          <div class="col-md-9 col-sm-8 column">
            <div class=" clearfix categories">
             <?php if(count($profiles)>0)
             { ?>
            <h2 class="inner-page-heading">Search Result for <?php if(isset($searchText)){echo $searchText ;}?></h2>
			
                 <?= $this->render('profile-list',['profiles' => $profiles]) ?>
             <?php }
             else
             {
                 echo '<h2 class="inner-page-heading">No result Found for :'.$searchText.'</h2>';
             }?>
        
          </div>
         
        </div>
         <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12   column ">
            <div class="row clearfix mT60 ">
               <div class="addbanner">
                         <!--<img src="<?php echo $imageURL."aboutus.jpg"?>">-->
         <?php if(YII_ENV_PROD)
{?>
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
<?php } ?>
                                        </div>
            </div>
          </div>
      </div>
    </div>
  </div>