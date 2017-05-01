<?php
use yii\helpers\Url;
use yii\helpers\Html;
?><div class="social-sidebar-content">
    <!-- BEGIN USER SECTION-->
    <div class="user">        
        <div class="user-settings">
            <!-- BEGIN USER SETTINGS TITLE-->
            <h3 class="user-settings-title">Settings shortcuts</h3>
            <!-- END USER SETTINGS TITLE-->
            <!-- BEGIN USER SETTINGS CONTENT-->
            <div class="user-settings-content">
                <a href="#my-profile">
                    <!-- //Notice .icon class-->
                    <div class="icon"><i class="fa fa-user"></i>
                    </div>
                    <!-- //Notice .title class-->
                    <div class="title">My Profile</div>
                    <!-- //Notice .content class-->
                    <div class="content">View your profile</div>
                </a>
                <a href="#view-messages">
                    <!-- //Notice .icon class-->
                    <div class="icon"><i class="fa fa-envelope-o"></i>
                    </div>
                    <!-- //Notice .title class-->
                    <div class="title">View Messages</div>
                    <!-- //Notice .content class-->
                    <div class="content">
                        You have <strong>17</strong>
                        new messages
                    </div>
                </a>
                <a href="#view-pending-tasks">
                    <!-- //Notice .icon class-->
                    <div class="icon"><i class="fa fa-tasks"></i>
                    </div>
                    <!-- //Notice .title class-->
                    <div class="title">View Tasks</div>
                    <!-- //Notice .content class-->
                    <div class="content">You have <strong>8</strong> pending tasks</div>
                </a>
            </div>
            <!-- END USER SETTINGS CONTENT-->
            <!-- BEGIN USER SETTINGS FOOTER-->
            <div class="user-settings-footer">
                <a href="#more-settings">See more settings</a>
            </div>
            <!-- END USER SETTINGS FOOTER-->
        </div>
    </div>
    <!-- END USER SETTINGS SECTION-->
    <!-- EDN USER SECTION-->
    <!-- BEGIN SEARCH SECTION-->
    <div class="search-sidebar">
        <form class="search-sidebar-form has-icon">
            <label for="sidebar-query" class="fa fa-search"></label>
            <input id="sidebar-query" type="text" placeholder="Search" class="search-query">
        </form>
    </div>
    <div class="clearfix"></div>
    <!-- END SEARCH SECTION-->
    <!-- BEGIN MENU SECTION-->
    <div class="menu">
        <div class="menu-content">
            <ul id="social-sidebar-menu">
                <!-- BEGIN ELEMENT MENU-->
                <!-- //Notice .active class-->
                <li class="active">
                    <a href="<?= Url::home() . "merchant/" ?>">
                        <!-- icon--><i class="fa fa-home"></i>
                        <span>Dashboard</span>
                        <!-- badge-->
                        <span class="badge">9</span>
                    </a>
                </li>
                <!-- END ELEMENT MENU-->
                <!-- BEGIN ELEMENT MENU-->
                <li>
                    <a href="<?php echo Url::home();?>" target="_blank">
                        <!-- icon--><i class="fa fa-star"></i>
                        <span>Frontend</span>
                    </a>
                </li>
                
                 <li>
                    <a href="/merchant/profile/update/" >
                        <!-- icon--><i class="fa fa-user"></i>
                        <span>Update Profile</span>
                    </a>
                </li>
                <li>
                    <a href="/merchant/profile/slug/" >
                        <!-- icon--><i class="fa fa-user"></i>
                        <span>Update Slug</span>
                    </a>
                </li> 
               
                <!-- END ELEMENT MENU-->
                              
                <!-- BEGIN MULTI-LEVEL-->
                <li>
                    <a data-toggle="collapse" data-parent="#social-sidebar-menu" href="#menu-multilevel"><i class="fa fa-picture-o"></i>
                        <span>Photo Gallery</span><i class="fa arrow"></i>
                    </a>
                    <ul id="menu-multilevel" class="collapse">
                         <li><?php echo  Html::a("All Gallery", Url::home() . "merchant/photo-gallery/index/");?></li>
                         <li><?php echo  Html::a("Add New Photo", Url::home() . "merchant/photo-gallery/create/");?></li>
                        
                    </ul>
                </li>
                <li>
                    <a href="#menu-pages" data-toggle="collapse" data-parent="#social-sidebar-menu">
                        <!-- icon--><i class="fa fa-picture-o"></i>
                        <span>Banners</span>
                        <!-- arrow--><i class="fa arrow"></i>
                    </a>
                    <!-- BEGIN SUB-ELEMENT MENU-->
                    <ul id="menu-pages" class="collapse">
                        <li>
                           <?php echo  Html::a("All Banners", Url::home() . "merchant/banner/index/");?>
                        </li>
                        <li>
                           <?php echo  Html::a("Add New", Url::home() . "merchant/banner/create/");?>
                        </li>                        
                    </ul>
                    <!-- END SUB-ELEMENT MENU-->
                </li>
                
                <li>
                    <a data-toggle="collapse" data-parent="#social-pagesidebar-menu" href="#menu-pages-sidebar"><i class="fa fa-link"></i>
                        <span>Import Links</span><i class="fa arrow"></i>
                    </a>
                    <ul id="#menu-pages-sidebar" class="collapse">
                         <li><?php echo  Html::a("All Links", Url::home() . "merchant/links/index/");?></li>
                         <li><?php echo  Html::a("Add New Link", Url::home() . "merchant/links/create/");?></li>
                        
                    </ul>
                </li>              
                
                <li>
                    <a data-toggle="collapse" data-parent="#social-pagesidebar-menu" href="#menu-pages-sidebar"><i class="fa fa-users"></i>
                        <span>Staff Management</span><i class="fa arrow"></i>
                    </a>
                    <ul id="#menu-pages-sidebar" class="collapse">
                         <li><?php echo  Html::a("All Staff Details", Url::home() . "merchant/staff-gallery/index/");?></li>
                         <li><?php echo  Html::a("Add New Staff Member", Url::home() . "merchant/staff-gallery/create/");?></li>
                        
                    </ul>
                </li>
                
                <li><?php echo  Html::a("Profile Image", Url::home() . "merchant/profileimage/index/");?></li>                  
                </li>
                <li class="active"><?php echo  Html::a('<span class="glyphicon glyphicon-log-out"></span> Logout ', ['/user/logout'], ['data-method' => 'post'])?> </li>
                <!-- END ELEMENT MENU-->
            </ul>
        </div>
    </div>
    <!-- END MENU SECTION-->
</div>