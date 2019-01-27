<?php 
header('Content-Type: image/jpeg');
require_once(dirname(__FILE__).'/class.simpleresize.php');

if( isset($_POST['submit']) ) {


  
   $image = new SimpleImage(); 
   $image->load($_FILES['uploaded_image']['tmp_name']); 
   $image->resizeToWidth(150); 

   $image->output();

    } else {  

     ?> 

       <form action="" method="post" enctype="multipart/form-data"> 

       <input type="file" name="uploaded_image" />  

        <input type="submit" name="submit" value="Upload" /> 

          </form>  

           <?php } ?> 