<?php
	require_once(dirname(__FILE__).'/../core/class.datamanager.php');		
	require_once(dirname(__FILE__).'/../core/class.validation.php');
	
	$validate= new validation();	
	
	if(isset($_POST)){	
	
	$id = $_POST['p_id'];	
	$username = $_POST['username'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$address = $_POST['address'];
	
	$validate->filter("username",$username,TRUE,"username");
	$validate->filter("name",$name,TRUE,"name");
	$validate->filter("email",$email,TRUE,"email");
	$validate->filter("phone",$phone,TRUE,"phone");
	$validate->filter("address",$address,TRUE,"address");	
		
	if(empty($validate->error)){	
		
		$flag = datamanager::save($validate->return_data(),"admin" , array('id' => $id ));
		if($flag){echo "Profile Updated ";}

	}
	
		
		
}	
			
?>