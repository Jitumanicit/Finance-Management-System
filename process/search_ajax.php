<?php

require_once(dirname(__FILE__).'/../core/class.datamanager.php');
//get the q parameter from URL

$q = $_POST['query'];

$s=datamanager::search($q,'client');
 
 
?> 
 
<?php
	if(!empty($s)) {
  foreach($s as $res){

    if(empty($res['thumb_image'])){
        if(strtolower($res['gender'])== 'male'){
          $image =  "assets/male.png";
        }else{
          $image =  "assets/female.png";
        }
     }else{

      $image =  $res['thumb_image'];
     }   
  
  ?>  


      <li class="clearfix">
          <a href="client_view.php?id=<?=$res['id'];?>">
          <img src="<?php echo $image;?>" >
          <span class="title"><?php echo $res['name'];?></span><br>
          <small><?php echo $res['address'];?></small>
          </a>
      </li>
   

  
	<?php }
     			}else {
     			echo '<li style="padding:20px 30px 20px 40px;color:#fff;"><span class="title">"Sorry No Result Found"</span></li>';		     
     }
     ?>   
        
   
    
   