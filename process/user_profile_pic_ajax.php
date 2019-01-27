<?php
	require_once(dirname(__FILE__).'/../core/class.datamanager.php');	
	require_once(dirname(__FILE__).'/../core/class.upload.php');
	
	
	
	if(isset($_FILES)){			

	$up = new upload('pic');
	$up->set_directory("../profile_pic");	

	$image = $up->upload();
	$thumb_image =  $up->thumbnail();
	
		
		
	if(!empty($_FILES['pic'])){	
		
		$flag = datamanager::save( array('image' => $image,'thumb_image' =>$thumb_image ),"admin" , array('id' => current_user('id') ));
		if($flag){echo $image;}

	}
	
		
		
}	


?>