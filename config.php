<?php

ob_start();
error_reporting(0);

##################### Settings ####################################
$_private = file_get_contents(dirname(__FILE__).'/process/PrivateVehicleSettings.json');
$_private=json_decode($_private,true);
$_commercial = file_get_contents(dirname(__FILE__).'/process/CommercialVehicleSettings.json');
$_commercial=json_decode($_commercial,true);

########################## //Settings// ########################################
define('SERVER', 'root');
define('SITE','Finance');
define('DEVELOPED','JITUMANI BHAGAWATI,CIT');
define('CURRENCY','&#x20B9;');
define('UPLOAD_DIRECTORY', 'upload');

###################################################################
	$_PageTitle = array('client_view' => 'Client Details','profile' => 'Profile Page' ,'add_staff' => 'Staff' ,'client_list' => 'Client List' ,'invoice' => 'Invoice ' ,'new_client' => 'Registration' ,'search' => 'Search Page' ,'blank' => 'Blank' );

############################//SET ROLES HERE //######################################
$_ROLE = array('admin' =>'ADMIN','recp' =>'RECEPTIONIST','account' =>'ACCOUNTS' );
$_VEHICLE_TYPE = array('two' =>'Two Wheeler','three' =>'Three Wheeler','four' =>'Four Wheeler' );
#############################//CURRENCY//#####################################

####################################################################


