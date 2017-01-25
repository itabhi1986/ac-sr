<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo "<pre>";
//print_r($profile);
use app\models\States;
use app\models\Cities;
use \app\models\PhotoGallery;
use app\models\Profileimage;
use app\models\Links;
use yii\helpers\Url;
use app\models\StaffGallery;
$baseURL = Url::base(true);
$imageURL= $baseURL."/themes/searchview/images/"; 
?>

<div class="container">
    <div class="row clearfix">
        <div class="col-md-12 column " id="profile-home">
            <h1 class="text-center"><?php if(isset($profile['name'])){echo $profile['name']; } ?></h1>
            <div class="row clearfix">        

                <!---right content aria -->
                <div class="col-md-12  column">
                    <div class=" clearfix">
                        <div class="col-md-12">
                            <ul class="breadcrumb breadcrumb_new">
                                <li> <a href="#profile-home">HOME</a></li>
                                <li> <a href="#about-us">ABOUT US</a></li>
                                <li> <a href="#staff">STAFF</a> </li> 
                                <li> <a href="#photo-gallery">PHOTO GALLERY</a>  </li>
                                <li> <a href="#contact-us">CONTACT US</a></li>
                                <li> <a href="#important-links">IMPORTANT LINKS</a></li>                                
                            </ul>
                        </div>
                    </div>
                    <div class="innerpage_bottom detail" >
                        <div class="col-md-12 col-sm-12 col-xs-12 column ">
                            <div class=" detail">
                                <div class="clearfix ">
                                  
                                    <?php
                                        if(isset($bannerImages)&& count($bannerImages)>0)
                                            {
                                                $bannerSrc = $bannerImages['0'];
                                            }
                                            else
                                            {
                                                $bannerSrc='';
                                            }
                                    ?>
                                    <div class="prfilebanner-image full-width" style="background-image:url('<?php echo $bannerSrc;?>');" > 
                                                                                
                                    </div>

                                </div>
                            <div class="row">
                                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 column ">
                                <div class=" column mT60">
                                    <h2 id="about-us">About us</h2>
                                    
                                       
                                            <span class="clstitle"><?php if(isset($profile['name'])){echo $profile['name']; } ?></span> <br>
                                            <div class="customer_desc">
                                                <?php $profileImage = Profileimage::getProfileimagePathByProfileID($profile['user_id'],"thumb");
                                        foreach($profileImage as $pk=>$pv)
                                        {
                                            echo'<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column thumbnail_images"> <img src="'.$pv.'" alt=""> </div>';
                                        }
                                        ?>
                                                <?php echo $profile['description'] ; ?></div> <br>




                                        </div>
                                            <div class="gallery mT60" id="staff">
                                    <h2>Staff Details</h2>
                                    <div class=" clearfix" >
                                        <?php $profileImages = StaffGallery::getAllDetailsByProfileID($profile['user_id'],"medium");
                                        foreach($profileImages as $pk=>$pv)
                                        {
                                            
                                            echo'<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column thumbnail_images"> <img src="'.$pv['path'].'" alt=""> '
                                                    . '<div>'.$pv['name'].'</div>'
                                                    . '<div>'.$pv['sub_tittle'].'</div>'
                                                    . '</div>';
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                                     <div class="gallery mT60" id="photo-gallery">
                                    <h2>Photo gallery</h2>
                                    <div class=" clearfix" >
                                        <?php $profileImages = PhotoGallery::getAllDetailsByProfileID($profile['user_id'],"medium");
                                        foreach($profileImages as $pk=>$pv)
                                        {
                                            
                                            echo'<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column thumbnail_images"> <img src="'.$pv['path'].'" alt=""> '
                                                    . '<div>'.$pv['name'].'</div>'
                                                    . '<div>'.$pv['sub_tittle'].'</div>'
                                                    . '</div>';
                                        }
                                        ?>
                                        
                                    </div>
                                </div>
                                <div class=" column mT60" id="contact-us">
                                    <h2>Get In touch with Us</h2>
                                    <div class="">
                                        <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12 column ">
                                            <span class="clstitle">Fill the form below and we will contact you</span>

                                            <form>
                                                <div class="form-group">

                                                    <input type="text" class="form-control"  placeholder="Name"id="name">
                                                </div>
                                                <div class="form-group">

                                                    <input type="email"  placeholder="enter your Phone Number " class="form-control" id="Phone">
                                                </div>        <div class="form-group">

                                                    <input type="email"  placeholder="enter your Email id " class="form-control" id="email">
                                                </div>                    <div class="form-group">      
                                                    <textarea placeholder="Query "  class="form-control" rows="" cols="" name=""></textarea>

                                                </div>

                                                <div class="form-group">
                                                    <input type="button" class="btn  btn-primary btn-lg" value="SUBMIT">
                                                </div>
                                            </form>




                                        </div>
                                        <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 column ">
                                            <span class="clstitle">Contact us</span>
                                             <p class="address-profile">
                                            <?php if(isset($profile['address'])){echo "<strong>Address : </strong>".$profile['address']; } ?><br>
                                            <?php if(isset($profile['state'])){echo "<strong>State : </strong>".(States::getStateByID($profile['state'])); } ?><br>
                                            <?php if(isset($profile['city'])){echo "<strong>City : </strong>".(Cities::getCityByID($profile['city'])); } ?><br>
                                            <?php if(isset($profile['zipcode'])){echo"<strong>Zipcode : </strong>". $profile['zipcode']; } ?><br>
                                            <?php if(isset($profile['public_email'])){echo "<strong>Email : </strong>".$profile['public_email']; } ?> <br>
                                            <?php if(isset($profile['mobile'])){echo "<strong>Mobile : </strong>".$profile['mobile']; } ?></p><br>
                                        </div>
                                    </div>
                                </div>           
                                    </div>
                                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 column" id="important-links">
                                            
                                    <div class=" column mT60">
                                        <h2 >Important Links</h2>
                                    <ul><?php 
                                                $links = Links::getAllLinksbyUserID($profile['user_id']);
                                               foreach ($links as $link)
                                               {
                                                   echo "<li><a href='".$link['link']."' target='_balnk'><span>".$link['tittle']."</span></a><span>".$link['desc']."</span></li>";
                                               }
                                            ?>
                                            </ul>
                                        <div class="addbanner">
                                             <img src="<?php echo $imageURL."contactus.jpg"?>">
                                            
                                        </div>
                                        </div>
                                
                                </div>

                            
                                

                                



                            </div>
                        </div>



                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

