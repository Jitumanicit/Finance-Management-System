<?php

	$percentage = 1;
	$tym=60*60*24;
	$data = datamanager::get_all('emi_table', array('status' => '0' ));
	foreach ($data as $key) {
	
	$txx=$key['emi_date'];
		if(time() - $txx > $tym){
			$penalty = $key['net_finance'] * ($percentage/100);
			$penalty = round($penalty,2);
			$penalty = $key['penalty'] + $penalty;
			
			$update_time=time();
			if($key['update_time'] == NULL || time() - $key['update_time'] >= 86400)
				{
					
					if($key['update_time'] == NULL && $key['penalty_rate'] == NULL)
						{		
								$xyz=time() - $key['emi_date'];
								$abcd=$xyz/86400;
								$efg=round($abcd);	
								$nt=$key['net_finance'] * (1/100);
								$nt = round($nt,2);
								$wwe=$efg*$nt;								
datamanager::save( array('penalty' => $wwe, 'update_time' => $update_time , 'penalty_rate' => $penalty, 'status' => 0) , 'emi_table',  array('id' => $key['id']) );

						}
					else
						{							
								$xyz=time() - $key['update_time'];
								$abcd=$xyz/86400;
								$efg=round($abcd);
									if($key['penalty_rate'] !=NULL)
										{

											$wwe=$key['penalty']+($efg*$key['penalty_rate']);
										}
								else
										{

											$wwe=$efg;
										}
datamanager::save( array('penalty' => $wwe, 'update_time' => $update_time, 'status' => 0) , 'emi_table' ,  array('id' => $key['id'] ) );									
						}
				
				}

		}

	}
?>