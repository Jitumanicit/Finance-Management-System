<?php
	require_once(dirname(__FILE__).'/../core/class.datamanager.php');		
	require_once(dirname(__FILE__).'/../core/class.validation.php');
	
	$validate= new validation();	
	
	if(isset($_POST['old_password'])){	
	
	$id = $_POST['p_id'];	
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];
	$repeat_password = $_POST['repeat_password'];

	$validate->filter("password",$new_password,TRUE,"password");

	$db_pass = datamanager::get_single('password', array('id' => current_user('id') ) , 'admin');

	if($old_password == $db_pass){

			if(empty($validate->error)){

				$flag = datamanager::save($validate->return_data(),"admin" , array('id' => $id ));

					if($flag){
						echo "1"; //echo "Password Updated ";
					}else{
						echo "2"; //echo "Password Not Updated ";
					}

				}

		}else{
			echo "00";	//wrong password;		
		}
		
		
	}	
			
?>