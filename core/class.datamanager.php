<?php 

require_once(dirname(__FILE__).'/../config.php');
require_once(dirname(__FILE__).'/class.db.php');
require_once(dirname(__FILE__).'/class.session.php');
require_once(dirname(__FILE__).'/class.upload.php');
require_once(dirname(__FILE__).'/class.validation.php');

class datamanager {
	
	
	public static function get_sum_emi_table_total($table,$condition = NULL,$order_by="id",$serial="desc"){
		$db= new database;
			if($condition){
				return $db->get_sum_emi_table_total($condition,$table);		
			}else{
				$sql="SELECT  SUM(registration) AS reg, SUM(insurance) AS ins,
				SUM(documentation) AS doc, SUM(finance_commission) AS fin_com, 
				SUM(interest) AS inte, SUM(net_finance) AS net_fin, 
				SUM(penalty) AS pen FROM ".$table."  ORDER by    `".$order_by."` ".$serial."";		
				return $db->query($sql);	
			}		
		
		}
		
		
		public static function get_sum_tot($table,$sum_item,$sum1,$condition = NULL){
		$db= new database;
			if($condition){
				return $db->get_all($condition,$table);		
			}else{
				$sql="SELECT SUM(".$sum_item.") AS ".$sum1." FROM ".$table."";		
				return $db->query($sql);	
			}		
		
		}

	public static function penalty ($table,$pn,$st,$condition = NULL){
		$db= new database;
			if($condition){
				return $db->penalty($condition,$table);		
			}else{
				$sql="UPDATE ".$table." SET penalty=".$pn." WHERE status=".$st."";		
				return $db->query($sql);	
			}		
		
		}		
	
	
	public static function save($data,$table,$condition=NULL){
		$db= new database();
				
		if(empty($condition)){
			return	$db->insert($data,$table);					
		}else{			
			return	$db->update($data,$condition,$table);					
			}	
		}
	

		
	public static function count_data($table,$condition = NULL ,$join = NULL ){
		$db= new database;		
		return $db->countrow($condition,$table,$join);		
		}


	public static function count($sql,$condition = NULL ){
		$db= new database;		
		return $db->count($sql,$condition);		
		}



	public static function get_single_row($table,$condition,$range = NULL){
		$db= new database;						
		return $db->get_single_row($range,$condition,$table);		
		}


	public static function get_single($get,$condition,$table){
		$db= new database;						
		return $db->get_single($get,$condition,$table);		
		}	



	public static function get_all($table,$condition = NULL,$order_by="id",$serial="desc"){
		$db= new database;
			if($condition){
				return $db->get_all($condition,$table);		
			}else{
				$sql="SELECT * FROM ".$table."  ORDER by    `".$order_by."` ".$serial."";		
				return $db->query($sql);	
			}		
		
		}	
		
		public static function get_all_date_filter($table,$from_date_filter,$to_date_filter,$condition = NULL,$order_by="id",$serial="desc"){
		$db= new database;
			if($condition){
				return $db->get_all($condition,$table);		
			}else{
				$sql="SELECT * FROM ".$table." WHERE time BETWEEN ".$from_date_filter." AND ".$to_date_filter." ORDER by    `".$order_by."` ".$serial."";		
				return $db->query($sql);	
			}		
		
		}
		

	public static function get_row_by_limit($group_number="0",$items_per_group="15",$order_by="date",$serial="desc"){
		$db= new database;
		$table="emi_table";
		$position = ($group_number * $items_per_group);
		$sql="SELECT * FROM  ".$table."   ORDER by `".$order_by."` ".$serial."  LIMIT ".$position.",".$items_per_group."";		
		return $db->query($sql);
		
		}

	

	public static function search($s,$table){
			$db= new database;			
			$range=array('id','name','email','phone','city');
		return	$db->search_data($s,$table,$range);		
		}


	public static function delete($table , $condition){
			$db= new database;		
			return	$db->delete($table,$condition);		
		}


	public static function truncate($table){
			$db= new database;		
			return	$db->truncate($table);		
		}	
		
		
		
		
		
	public static function get_id($extended_id_value, $extended_id=FALSE){	
	
	$db= new database;
	if($extended_id == TRUE){
	$id=$extended_id_value.rand("1000", "999999");	
	if($db->countrow(array("id"=>"$id"), "client") > '0'){
	$id=$extended_id_value.rand("1001", "100000");	
	}
	if($db->countrow(array("id"=>"$id"), "client") > '0'){
	$id=$extended_id_value.rand("1111", "999999");	
	}
	if($db->countrow(array("id"=>"$id"), "client") > '0'){
	$id=$extended_id_value.rand("2222", "899999");	
	}
	if($db->countrow(array("id"=>"$id"), "client") > '0'){
	$id=$extended_id_value.rand("10001", "1999999");	
	}
	}else{
		$id=rand("1000", "999999");
	if($db->countrow(array("id"=>"$id"), "client") > '0'){
	$id=$id+1;	
	}
	if($db->countrow(array("id"=>"$id"), "client") > '0'){
	$id=$id+1;	
	}
	if($db->countrow(array("id"=>"$id"), "client") > '0'){
	$id=rand("10000", "8888888");	
	}
	if($db->countrow(array("id"=>"$id"), "client") > '0'){
	$id=$id+1;	
	}
		}
	return 	$id;		
		
		}

########## Session Part ##########################


	public static function check_login($username,$pwd,$type=NULL){
			
			$email = strpos($username,'@');
			if($email){
				$condition = array('email' => $username );					
			}else{
				$condition = array('username' => $username );	
			}

			$data = datamanager::get_single_row('admin',$condition);
		

			if ( $pwd == $data['password'] ){
					$session= new session();
					$sid=$session->generate_sid( $chars = 100, $alpha = TRUE, $numeric = TRUE, $symbols = TRUE, $timestamp = TRUE );					
					$session->set( 'email', $data['email'] );
					$session->set( 'sid', $sid );
  		 			return TRUE; 
				}		 else {
   					return FALSE; 
				}		
		}
		


	public static function user_role(){
		$session= new session();
		$email = $session->get('email');
	return datamanager::get_single('role',array('email' => $email ),'admin');
	}		
	


}//class ends get_single_row($table,$condition,$range = NULL)



function role(){
return datamanager::user_role();
}

function is_login(){
	$session = new session();
	return ($session->get('email'))?TRUE:FALSE; 
}

function current_user($var){
	$session = new session();
	$email = $session->get('email');
	$data = datamanager::get_single_row('admin', array('email' => $email ), "id,name,email,phone,username,role,address");	
	return ($data[$var])?$data[$var]:'NULL';
}