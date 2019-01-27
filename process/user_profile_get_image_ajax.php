<?php
	require_once(dirname(__FILE__).'/../core/class.datamanager.php');		
	require_once(dirname(__FILE__).'/../core/class.validation.php');

	
	echo datamanager::get_single("image", array('id' => current_user('id') ),'admin');
?>