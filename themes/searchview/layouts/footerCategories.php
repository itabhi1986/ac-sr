<?php
use app\models\Category;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$categories = Category::getAllCategories();
$countKey = ceil(count($categories)/3);

 
$categories = array_chunk($categories,$countKey,true);

echo '<div class="col-md-8 column footer_left">
              <div class="row clearfix">
                <h1>Categories</h1>';

foreach($categories as $k=>$v)
{
    echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 column bottom_menu">
                  <ul class="footer_menu">';
        foreach($v as $key=>$value)
    {
        echo '<li><a href="#">'.$value.'</a></li>';
    }
    echo '</ul>
                </div>';
}
echo '</div>
</div>';

?>
