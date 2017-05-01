<?php
use app\models\Category;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$categories = Category::getAllCategories();
echo '<ul class="leftmenu">';
foreach($categories as $key=>$value)
{
    echo '<li><a href="/'.$key.'/"> <i class="fa fa-plane icon" aria-hidden="true"></i>'.$value.'</a></li>';
}
echo '</ul>';
?>
