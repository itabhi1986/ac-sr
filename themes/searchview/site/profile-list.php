<?php
use app\models\States;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

    foreach($profiles as $key=>$value)
    {
        
        echo '<div class=" categories">
        <div class="clearfix ">
        <div class="col-md-3 col-sm-4 col-xs-4 clsmd3 full-width"> <img src="img/listing_img.jpg"> </div>
        <div class="col-md-9 col-sm-8 col-xs-8 full-width clsmd6"> 
        <span class="clstitle">
         <a href="/'.$value['category_slug'].'/'.$value['profile_slug'].'/">'.$value['name'].'</a></span> <br>';
           echo '<span class="customer_desc"><strong> Address: </strong>'.$value['address'].'</span>';
               echo '<br>
            <span class="customer_name"><strong> State: </strong>'.(States::getStateByID($value['state'])).'</span>
                <br>
            <span class="customer_name"><strong> City: </strong>'.$value['city'].'</span>
                <br>
            <span class="customer_name"><strong> Zipcode: </strong>'.$value['zipcode'].'</span>
                
                </div>

    </div>
</div>';
    }

?>
