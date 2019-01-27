<?php

require_once(dirname(__FILE__).'/core/class.datamanager.php');	
require_once(dirname(__FILE__).'/core/class.db.php');
// require_once(dirname(__FILE__).'/header.php');
	//echo time()-(24*60*60*3);

	//$today = time() -(24*60*60);
	/*$today = time();
	$cal_time = 60*60*24*30;
	echo $today.'<br/>';
	echo $cal_time.'<br/>'; 
	
	$diff = $today - $cal_time;
	echo $diff.'<br/>'; */
	
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
			//echo 2;
			echo time() - $key['update_time'].'<br/>';
			//$tym_df=time() - $key['update_time'];
			if($key['update_time'] == NULL || time() - $key['update_time'] >= 86400)
				{ echo 1;
					
					if($key['update_time'] == NULL && $key['penalty_rate'] == NULL)
						{	
echo 'love<br/>';						
datamanager::save( array('penalty' => $penalty, 'update_time' => $update_time , 'penalty_rate' => $penalty) , 'emi_table',  array('id' => $key['id']) );
						}
						else
						{
echo 'hate<br/>';							
								$xyz=time() - $key['update_time'];
								$abcd=$xyz/86400;
								$efg=round($abcd);
								echo $efg."<br/>";
									if($key['penalty_rate'] !=NULL)
										{
										echo 'orange<br/>';	
											$wwe=$key['penalty']+($efg*$key['penalty_rate']);
										}
								else
										{
										echo 'mango<br/>';	
											$wwe=$efg;
										}
datamanager::save( array('penalty' => $wwe, 'update_time' => $update_time) , 'emi_table' ,  array('id' => $key['id'] ) );									
					echo 'donkey';
						}
				
				}
			

		}

	}
	//$url='new_client.php';
	//header("Location:".$url);
?>