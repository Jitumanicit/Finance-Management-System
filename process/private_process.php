<?php
			
	require_once(dirname(__FILE__).'/../core/class.validation.php');
	
	$validate= new validation();	
	
	if(isset($_POST)){	
	

	$p_registration= $_POST['p_registration'];	
	$p_insurance= $_POST['p_insurance'];	
	$p_processing= $_POST['p_processing'];	
	$p_finance_commission= $_POST['p_finance_commission'];	
	$p_interest= $_POST['p_interest'];	
	
	
	$validate->filter("p_registration",$p_registration,TRUE,"First Name");
	$validate->filter("p_insurance",$p_insurance,TRUE ,"Last Name");
	$validate->filter("p_processing",$p_processing,TRUE,"Contact Number");
	$validate->filter("p_finance_commission",$p_finance_commission);
	$validate->filter("p_interest",$p_interest,TRUE,"Gender");
	
		
	if(empty($validate->error)){				
		$data = $validate->return_data();			
		$info = json_encode($data);
		$file = fopen('PrivateVehicleSettings.json','w+');
		$flag= fwrite($file, $info);
		fclose($file);

		if($flag){echo "Saved successfully";}

	}
	
		
		
}	
			
?>