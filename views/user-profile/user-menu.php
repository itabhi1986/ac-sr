<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
?>
<!-- left nav--->
<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 column column ">
    <div class="row clearfix left_side">
        <ul class="leftmenu">
            <li><a href="/user-profile/index/"> <i class="fa fa-plane icon" aria-hidden="true"></i>Dashboard</a></li>
            <li><a href="/user-profile/index/"> <i class="fa fa-plane icon" aria-hidden="true"></i>Profile</a></li>
            <li><a href="/user-profile/profile-image/"> <i class="fa fa-plane icon" aria-hidden="true"></i>Profile Image</a></li>
            <li><a href="/user-profile/photo-gallery/"> <i class="fa fa-plane icon" aria-hidden="true"></i>Photo Gallery</a></li>            
            <li><a href="/user-profile/settings/"> <i class="fa fa-plane icon" aria-hidden="true"></i>Important Links</a></li>
            <li><a href="/user-profile/banner/"> <i class="fa fa-plane icon" aria-hidden="true"></i>Banner Images</a></li>
            <li> <?php  $url = Html::a('<span class="fa fa-plane icon" aria-hidden="true"></span> Logout',
                        ['//user/security/logout/'],
                        ['class' => '', 'data-method'=>'post']);
                        echo $url;
                
                        ?></li>
        </ul>


    </div>
</div> 
