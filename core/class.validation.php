<?php 

class validation{
	
	public $error;
	public $field;
	public $data;
	
	
	 function __construct(){		
		$this->error=array();
		$this->data=array();		
		}
	
	public function required($field,$val,$msg){	
		if(empty($val)){
		$this->error[$field]=$msg." is Required";			
			}else{
		$this->data[$field]=$val;		 
			}
		
	}
	public function filter($field,$val,$flag=FALSE,$msg=""){
		$this->data[$field]=$val;
		if($flag==True){
			$this->required($field,$val,$msg);			
		}		
	}
		
	public function error($val){
		if(!empty ($this->error[$val])){
		return $this->error[$val];
		}	
	}
	
	public function return_data(){
		if(!empty ($this->data)){
		return $this->data;
		}	
	
	}
	}
