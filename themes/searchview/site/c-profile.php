<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
 <div class="container">
    <div class="row clearfix">
      <div class="col-md-12 column ">
        <div class="row clearfix">
        
        <!-- left nav--->
         <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 column column ">
            <div class="row clearfix left_side">
               <?= $this->render('categories') ?>
            </div>
          </div>
        
        <!---right content aria -->
          <div class="col-md-9 col-sm-8 column">
            <div class=" clearfix categories">
            <h2 class="inner-page-heading"> </h2>
			
                 <?= $this->render('profile-list',['profiles' => $profiles]) ?>
        
          </div>
         
        </div>
      </div>
    </div>
  </div>