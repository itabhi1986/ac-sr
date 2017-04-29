<?php use yii\helpers\Url; ?>
<html>
    <body>
    	<table width="100%">
            <tr>
                <td align="center"><img src="" style="text-align:center">
                </td> </tr></table>
        <p> Hi </p>
        <p>A user visited on the page on the search2city website and tried to contact by filling following information.</p>
        <p> </p>
       
  <table width="50%" cellpadding="8" cellspacing="0" >
    <thead>
          <tbody>
        <tr>
                <td style="padding-bottom:0px" width="20%"><strong>Name:</strong></td>
                <td style="padding-bottom:0px" ><strong><?php echo $model['name'] ; ?></strong></td>                
            </tr>
             <tr style="">
                 <td style="padding-bottom:0px;padding-top: 0;" width="20%"><strong>Phone Number:</strong></td>
                <td style="padding-bottom:0px;padding-top: 0;"><strong><?php echo $model['phone'] ; ?></strong></td>                
            </tr>
            <tr style="">
                 <td style="padding-bottom:0px;padding-top: 0;" width="20%"><strong>Email ID:</strong></td>
                <td style="padding-bottom:0px;padding-top: 0;"><strong><?php echo  $model['email'] ; ?></strong></td>                
            </tr>
            <tr style="">
                 <td style="padding-bottom:0px;padding-top: 0;" width="20%"><strong>Message:</strong></td>
                <td style="padding-bottom:0px;padding-top: 0;"><strong><?php echo $model['message'] ; ?></strong></td>                
            </tr>
            </tbody>
  </table>
        <p></p>
        
        <p>Thanks <br>Search2City Team</p>
</body>
</html>
