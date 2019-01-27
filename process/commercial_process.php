<?php
			
	require_once(dirname(__FILE__).'/../core/class.validation.php');
	
	$validate= new validation();	
	
	if(isset($_POST)){	
	

	$c_registration= $_POST['c_registration'];	
	$c_insurance= $_POST['c_insurance'];	
	$c_processing= $_POST['c_processing'];	
	$c_finance_commission= $_POST['c_finance_commission'];	
	$c_interest= $_POST['c_interest'];	
	
	
	$validate->filter("c_registration",$c_registration,TRUE,"First Name");
	$validate->filter("c_insurance",$c_insurance,TRUE ,"Last Name");
	$validate->filter("c_processing",$c_processing,TRUE,"Contact Number");
	$validate->filter("c_finance_commission",$c_finance_commission);
	$validate->filter("c_interest",$c_interest,TRUE,"Gender");
	
		
	if(empty($validate->error)){				
		$data = $validate->return_data();			
		$info = json_encode($data);
		$file = fopen('CommercialVehicleSettings.json','w+');
		$flag= fwrite($file, $info);
		fclose($file);

		if($flag){echo "Saved successfully";}

	}
	
		
		
}	
			
?>