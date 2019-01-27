<?php require_once(dirname(__FILE__).'/core/class.datamanager.php');?>
<?php
$data_emi = datamanager::get_all('emi_table', array('status' => '0' ));
foreach ($data_emi  as $key1) {
	if($key1['status'] == 0  && time() -  $key1['emi_date'] >= 86400)
		{
		
		}
							  }
?>