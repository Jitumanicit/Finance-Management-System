<?php 

	require_once(dirname(__FILE__).'/core/class.datamanager.php');
	require_once(dirname(__FILE__).'/core/class.validation.php');
	require_once(dirname(__FILE__).'/core/class.session.php');
	require_once(dirname(__FILE__).'/core/class.upload.php');
	require_once(dirname(__FILE__).'/penalty.php');
		$sh;
	$validate= new validation();	
	
	if(isset($_POST['fullname'])){	
if(empty($_POST['insurancefor']))
{
$insurancefor=1;
}
else if(isset($_POST['insurancefor']) == 0)
{
$insurancefor=1;
}
else
{
$insurancefor=$_POST['insurancefor'];
}

	$finance_type= $_POST['finance_type'];	
	$vehicle_type= $_POST['vehicle_type'];	
	$vehicle_description= $_POST['vehicle_description'];	
	$registration= $_POST['registration'];
	$insurance= $_POST['insurance'];	
	$on_road_price= $_POST['on_road_price'];
	$vehicle_price= $_POST['vehicle_price'];	
	$down_payment= $_POST['down_payment'];	
	$finance_amount= $_POST['finance_amount'];	
	$documentation= $_POST['documentation'];	
	$finance_commission= $_POST['finance_commission'];	
	$interest= $_POST['interest'];	
	$scheme= $_POST['scheme'];
	
	$insurancefor=$_POST['insurancefor'];	
	$net_finance= $_POST['net_finance'];	
	$remarks= $_POST['remarks'];	
	$fullname= $_POST['fullname'];	
	$phone= $_POST['phone'];	
	//$email= $_POST['email'];
	$dob= $_POST['dob'];		
	$gender= $_POST['gender'];	
	$city= $_POST['city'];
	$pin_code= $_POST['pin_code'];
	$country= $_POST['country'];
	$address= $_POST['address'];
	
	$token_id=md5(time());
	$fullname1= $_POST['fullname1'];	
	$phone1= $_POST['phone1'];	
	//$email1= $_POST['email1'];
	$dob1= $_POST['dob1'];		
	$gender1= $_POST['gender1'];	
	$city1= $_POST['city1'];
	$pin_code1= $_POST['pin_code1'];
	$address1= $_POST['address1'];
	$country1= $_POST['country1'];



	
	
	
	
	$validate->filter("finance_type",$finance_type,TRUE,"This Field");
	$validate->filter("vehicle_type",$vehicle_type,TRUE ,"This Field");
	$validate->filter("vehicle_description",$vehicle_description);
	$validate->filter("registration",$registration,TRUE,"This Field");
	$validate->filter("insurance",$insurance,TRUE,"This Field");
	//$validate->filter("on_road_price",$on_road_price,TRUE,"This Field");
	$validate->filter("vehicle_price",$vehicle_price,TRUE,"This Field");
	$validate->filter("down_payment",$down_payment,TRUE,"This Field");
	$validate->filter("finance_amount",$finance_amount,TRUE,"This Field");
	$validate->filter("documentation",$documentation,TRUE,"This Field");
	$validate->filter("finance_commission",$finance_commission,TRUE,"This Field");
	$validate->filter("interest",$interest,TRUE,"This Field");
	$validate->filter("scheme",$scheme,TRUE,"This Field");
	$validate->filter("insurancefor",$insurancefor,TRUE,"This Field");
	$validate->filter("net_finance",$net_finance,TRUE,"This Field");
	// $validate->filter("remarks",$remarks,TRUE,"This Field");
	$validate->filter("name",$fullname,TRUE,"This Field");
	$validate->filter("phone",$phone,TRUE,"This Field");
	//$validate->filter("email",$email,TRUE,"This Field");
	$validate->filter("dob",$dob,TRUE,"This Field");
	$validate->filter("gender",$gender,TRUE,"This Field");
	$validate->filter("city",$city,TRUE,"This Field");
	$validate->filter("pin_code",$pin_code,TRUE,"This Field");
	$validate->filter("country",$country,TRUE,"This Field");
	$validate->filter("address",$address,TRUE,"This Field");
	$validate->filter("time",time(),TRUE,"This Field");
	//$validate->filter("transact_staff",current_user('name'),TRUE,"This Field");
	
	$validate->filter("token_id",$token_id,TRUE,"This Field");
	$validate->filter("gname",$fullname1,TRUE,"This Field");
	$validate->filter("gphone",$phone1,TRUE,"This Field");
	//$validate->filter("gemail",$email1,TRUE,"This Field");
	$validate->filter("gdob",$dob1,TRUE,"This Field");
	$validate->filter("ggender",$gender1,TRUE,"This Field");
	$validate->filter("gcity",$city1,TRUE,"This Field");
	$validate->filter("gpin_code",$pin_code1,TRUE,"This Field");
	$validate->filter("gcountry",$country1,TRUE,"This Field");
	$validate->filter("gaddress",$address1,TRUE,"This Field");
	


	

	var_dump($validate->error);
	if(empty($validate->error)){				
		
		$client_id = datamanager::save($validate->return_data(),"client");

	}
	if($scheme == 11){ //sh belongs to scheme value manipulation as eg:11=1;22=2 etc..
		$sh=1;}
	if($scheme==16){
		$sh=1.5;}
		if($scheme==22){
		$sh=2;}
	if($scheme==28){
		$sh=2.6;}
	if($scheme==33){
		$sh=3;}
	if($scheme==38){
		$sh=3.5;}
	if($scheme==44){
		$sh=4;}
	if($scheme==49){
		$sh=4.5;}
	if($scheme==55){
		$sh=5;}
			
		if($client_id){	
	
		$on_road_price=$vehicle_price+$registration+$insurance;
		$finance_amount = $on_road_price - $down_payment;
		$tmp_amount = $finance_amount + $documentation;
		$emi_finance_commission = $tmp_amount * ($finance_commission/100);
		$tmp_amount2 = ($tmp_amount+ $emi_finance_commission);
		$emi_interest = $tmp_amount2 * ($interest/100)*$sh;
		$emi_net_finance = $emi_interest + $tmp_amount2+$insurancefor;

		if($insurancefor > 0)
		{
		$emi_net_finance = $emi_interest + $tmp_amount2+$insurancefor;
		$emi_insurance = round($insurancefor/$scheme);
		}
else
{
$insurancefor=0;
}

		$emi_registration = round($registration/$scheme);
		//$emi_insurance = round($insurance/$scheme);
		//$emi_insurance = round($insurancefor/$scheme);
		$emi_processing = round($documentation/$scheme);
		$emi_finance = round($finance_amount/$scheme);
		$emi_finance_commission = round($emi_finance_commission/$scheme);
		$emi_interest = round($emi_interest/$scheme);
		$emi_net_finance = round($emi_net_finance/$scheme);

		$time = strtotime("now");		
		for($i=0; $i<$scheme ; $i++) {
			$time = strtotime("+30 days",$time);
			$data = array('client_id' =>$client_id,'registration' =>$emi_registration ,'insurance' =>$emi_insurance ,'documentation' =>$emi_processing ,'emi_date' =>$time,'finance' =>$emi_finance,'finance_commission' =>$emi_finance_commission,'interest' =>$emi_interest ,'net_finance' =>$emi_net_finance); 
			datamanager::save($data,"emi_table");
			$particulars='Finance';
				$time_rev=time();
				
				$time_sav=date('Y-m-d',$time_rev);
			datamanager::save(array('particulars'=>$particulars,'debit'=>$finance_amount, 'time'=>$time_sav,'token_id'=>$token_id),'revenue');

		}
		// echo "<br><br><br><br><br><br><br><br><br><br>";
		/*profile pic*/
		
			if(isset($_FILES['pic'])){	

				$up = new upload('pic');
				$up->set_directory("profile_pic");	

				$image = $up->upload();
				$thumb_image =  $up->thumbnail();	
					
				$flag = datamanager::save( array('image' => $image , 'thumb_image' => $thumb_image ),"client" , array('id' => $client_id) );
					if($flag){echo $image;}		
			}	
		/*profile pic*/
		$url = 'invoice.php?id='.$client_id;
		header("Location:".$url);
	}else{

	echo "error errorer rorerro rerrorerr orer rorerrorerro rerror";	
	}
		
		
}	


			
?>






<?php require_once(dirname(__FILE__).'/header.php');?>
<?php require_once(dirname(__FILE__).'/sidebar.php');?>	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div class="modal fade" id="portlet-config" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
							<h4 class="modal-title">Modal title</h4>
						</div>
						<div class="modal-body">
							 Widget settings form goes here
						</div>
						<div class="modal-footer">
							<button type="button" class="btn blue">Save changes</button>
							<button type="button" class="btn default" data-dismiss="modal">Close</button>
						</div>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>
			<!-- /.modal -->
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<?=$_PageTitle[basename($_SERVER['PHP_SELF'],'.php')];?>
			</h3>
			
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box blue" id="form_wizard_1">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i> Registration Wizard - <span class="step-title">
								Step 1 of 4 </span>
							</div>							
						</div>
						<div class="portlet-body form">
							<form action="" class="form-horizontal" id="submit_form" enctype="multipart/form-data" method="POST">
								<input type="hidden" name="p_registration" value="<?php echo $_commercial['p_registration'];?>" >
								<input type="hidden" name="p_insurance" value="<?php echo $_private['p_insurance'];?>" >
								<input type="hidden" name="p_processing" value="<?php echo $_private['p_processing'];?>" >
								<input type="hidden" name="p_finance_commission" value="<?php echo $_private['p_finance_commission'];?>" >
								<input type="hidden" name="p_interest" value="<?php echo $_private['p_interest'];?>" >

								<input type="hidden" name="c_registration" value="<?php echo $_commercial['c_registration'];?>" >
								<input type="hidden" name="c_insurance" value="<?php echo $_commercial['c_insurance'];?>" >
								<input type="hidden" name="c_processing" value="<?php echo $_commercial['c_processing'];?>" >
								<input type="hidden" name="c_finance_commission" value="<?php echo $_commercial['c_finance_commission'];?>" >
								<input type="hidden" name="c_interest" value="<?php echo $_commercial['c_interest'];?>" >

								<div class="form-wizard">
									<div class="form-body">
										<ul class="nav nav-pills nav-justified steps">
											<li>
												<a href="#tab1" data-toggle="tab" class="step">
												<span class="number">
												1 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Vehicle Setup </span>
												</a>
											</li>
											<li>
												<a href="#tab2" data-toggle="tab" class="step">
												<span class="number">
												2 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Finance Setup </span>
												</a>
											</li>
											<li>
												<a href="#tab3" data-toggle="tab" class="step active">
												<span class="number">
												3 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Profile Setup </span>
												</a>
											</li>
											<li>
												<a href="#tab4" data-toggle="tab" class="step">
												<span class="number">
												4 </span>
												<span class="desc">
												<i class="fa fa-check"></i> Confirm </span>
												</a>
											</li>
										</ul>
										<div id="bar" class="progress progress-striped" role="progressbar">
											<div class="progress-bar progress-bar-success">
											</div>
										</div>
										<div class="tab-content">
											<div class="alert alert-danger display-none">
												<button class="close" data-dismiss="alert"></button>
												You have some form errors. Please check below.
											</div>
											<div class="alert alert-success display-none">
												<button class="close" data-dismiss="alert"></button>
												Your form validation is successful!
											</div>
											<div class="tab-pane active" id="tab1">
												<h3 class="block">Provide your account details</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Finance Type <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select id="finance_type" name="finance_type" class="form-control">
															<option value=""></option>
															<option value="1" <?php if($finance_type=='1'){echo 'selected="selected"';}?> >Private</option>
															<option value="2" <?php if($finance_type=='2'){echo 'selected="selected"';}?> >Commercial</option>
															<option value="3" <?php if($finance_type=='3'){echo 'selected="selected"';}?> >Re-Finance</option>															
														</select>
														<span class="help-block"><?php echo $validate->error("finance_type"); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Vehicle Type <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select id="vehicle_type"  name="vehicle_type" class="form-control">
															<option value=""></option>
															<option value="2" <?php if($vehicle_type=='2'){echo 'selected="selected"';}?> >Two Wheeler</option>
															<option id="threewheller" value="3" <?php if($vehicle_type=='3'){echo 'selected="selected"';}?> >Three Wheeler</option>
															<option value="4" <?php if($vehicle_type=='4'){echo 'selected="selected"';}?> >Four Wheeler</option>															
														</select>
														<span class="help-block"><?php echo $validate->error("vehicle_type"); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Vehicle Description 
													</label>
													<div class="col-md-4">
														<textarea name="vehicle_description" class="form-control" rows="3"><?php echo $vehicle_description;?></textarea>	
														<span class="help-block"><?php echo $validate->error("vehicle_description"); ?></span>													
													</div>
												</div>													
											</div>
											<div class="tab-pane" id="tab2">
												<h3 class="block">Provide your profile details</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Registration <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"  value="<?php echo $registration; ?>" name="registration"/>
														<span class="help-block"><?php echo $validate->error("registration"); ?></span>														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Insurance<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"  value="<?php echo $insurance; ?>"  name="insurance"/>	
														<span class="help-block"><?php echo $validate->error("insurance"); ?></span>													
													</div>
												</div>
												
												<div class="form-group">
													<label class="control-label col-md-3">Vehicle Price <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" value="<?php echo $vehicle_price; ?>" name="vehicle_price"/>
														<span class="help-block"><?php echo $validate->error("vehicle_price"); ?></span>														
													</div>
												</div>
                                                	<div class="form-group">
													<label class="control-label col-md-3">On Road Price <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" value="<?php echo $off_road_price; ?>" name="on_road_price"/>
														<span class="help-block"><?php echo $validate->error("vehicle_price"); ?></span>														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Down Payment<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" value="<?php echo $down_payment; ?>"  name="down_payment"/>
														<span class="help-block"><?php echo $validate->error("down_payment"); ?></span>														
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Finance Amount<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"  readonly="readonly" value="<?php echo $finance_amount; ?>"  name="finance_amount"/>	
														<span class="help-block"><?php echo $validate->error("finance_amount"); ?></span>													
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Documentation<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"   value="<?php echo $documentation;?>"  name="documentation"/>	
														<span class="help-block"><?php echo $validate->error("documentation"); ?></span>													
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Commission<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"   value="<?php echo $finance_commission;?>" name="finance_commission"/>	
														<span class="help-block"><?php echo $validate->error("finance_commission"); ?></span>													
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3">Interest<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" autocomplete="off"  value="<?php echo $interest;?>" name="interest"/>	
														<span class="help-block"><?php echo $validate->error("interest"); ?></span>													
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Scheme<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<select name="scheme" class="form-control">
															<option value="11">Option 11</option>
															<!--<option value="16">Option 16</option>-->
															<option value="22">Option 22</option>
                                                            <option value="28">Option 28</option>
															<option value="33">Option 33</option>
                                                            <!--<option value="38">Option 38</option>
															<option value="44">Option 44</option>
                                                            <option value="49">Option 49</option>-->	
                                                            <option value="55">Option 55</option>																										
														</select>
														<span class="help-block"><?php echo $validate->error("scheme"); ?></span>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">Insurance For 2,3,4,5 year<span class="required">
													* </span>
													
													</label>
													
													<div class="col-md-4">
														<input type="text" class="form-control"   value="<?php echo $ins2; ?>" name="insurancefor"/>
														<span class="help-block"><?php  $validate->error("ins2"); ?></span>														
													</div>
													<div style="color:red"> N.B[Enter 1 for No Insurance]</div>
												</div>	
												<div class="form-group">
													<label class="control-label col-md-3">Net Finance<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"  readonly="readonly" value="<?php echo $net_finance;?>" name="net_finance"/>
														<span class="help-block"><?php echo $validate->error("net_finance"); ?></span>														
													</div>
												</div>	
												<div class="form-group">
													<label class="control-label col-md-3">Remarks</label>
													<div class="col-md-4">
														<textarea class="form-control" rows="3" name="remarks"><?php echo $remarks;?></textarea>
														<span class="help-block"><?php echo $validate->error("remarks"); ?></span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab3">
												<h3 class="block">Provide Client details</h3>
												<div class="form-group">
													<label class="control-label col-md-3">Fullname <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" value="<?php echo $fullname;?>"  name="fullname"/>
														<span class="help-block"><?php echo ($validate->error("fullname"))?$validate->error("fullname"):"Provide your fullname"; ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Phone Number <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" value="<?php echo $phone;?>"  name="phone"/>
														<span class="help-block"><?php echo ($validate->error("phone"))?$validate->error("phone"):"Provide your phone number"; ?></span>														
													</div>
												</div>
												<!--<div class="form-group">
													<label class="control-label col-md-3">Email<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" value="<?php echo $email;?>"  name="email"/>
														<span class="help-block"><?php //echo ($validate->error("email"))?$validate->error("email"):"Provide your email"; ?></span>																												
													</div>
												</div>-->
												<div class="form-group">
													<label class="control-label col-md-3">Date Of Birth<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input id="date" type="date" class="form-control" value="<?php echo $dob;?>"  name="dob"/>
														<span class="help-block"><?php echo ($validate->error("dob"))?$validate->error("dob"):"Provide your Date Of Birth"; ?>
                                                        </span>																			
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Gender <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<div class="radio-list">
															<label>
															<input type="radio" name="gender" <?php if($gender=='Male'){echo "checked";}?> value="Male" data-title="Male"/>
															Male </label>
															<label>
															<input type="radio" name="gender" <?php if($gender=='Female'){echo "checked";}?> value="Female" data-title="Female"/>
															Female </label>
														</div>
														<div id="form_gender_error">
														</div>
														<span class="help-block"><?php echo $validate->error("gender"); ?></span>																												
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3">City/Town <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"  value="<?php echo $city;?>" name="city"/>
														<span class="help-block"><?php echo $validate->error("city"); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Post Code<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"  value="<?php echo $pin_code;?>" name="pin_code"/>
														<span class="help-block"><?php echo $validate->error("pin_code"); ?></span>
													</div>
												</div>

													<div class="form-group">
													<label class="control-label col-md-3">Country</label>
													<div class="col-md-4">
														<select name="country" id="country_list" class="form-control">
															<option value="IN">India</option>
              												</select>
														<span class="help-block"><?php echo $validate->error("country"); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Address <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<textarea class="form-control" name="address"><?php echo $address;?></textarea> 
														<span class="help-block"><?php echo $validate->error("address"); ?></span>
													</div>
												</div>
												<h3 class="block">Provide Grantor details</h3>
												
												

												
												<div class="form-group">
													<label class="control-label col-md-3">Fullname <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" value="<?php echo $fullname1;?>"  name="fullname1"/>
														<span class="help-block"><?php echo ($validate->error("fullname1"))?$validate->error("fullname1"):"Provide your fullname"; ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Phone Number <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" value="<?php echo $phone1;?>"  name="phone1"/>
														<span class="help-block"><?php echo ($validate->error("phone1"))?$validate->error("phone1"):"Provide your phone number"; ?></span>														
													</div>
												</div>
												<!--<div class="form-group">
													<label class="control-label col-md-3">Email<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control" value="<?php echo $email1;?>"  name="email1"/>
														<span class="help-block"><?php //echo ($validate->error("email1"))?$validate->error("email1"):"Provide your email"; ?></span>																												
													</div>
												</div>-->
												<div class="form-group">
													<label class="control-label col-md-3">Date Of Birth<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input id= "date1" type="date" class="form-control" value="<?php echo $dob1;?>"  name="dob1"/>
														<span class="help-block"><?php echo ($validate->error("dob1"))?$validate->error("dob1"):"Provide your Date Of Birth"; ?>
                                                        </span>																			
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Gender <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<div class="radio-list">
															<label>
															<input type="radio" name="gender1" <?php if($gender1=='Male'){echo "checked";}?> value="Male" data-title="Male"/>
															Male </label>
															<label>
															<input type="radio" name="gender1" <?php if($gender1=='Female'){echo "checked";}?> value="Female" data-title="Female"/>
															Female </label>
														</div>
														<div id="form_gender_error">
														</div>
														<span class="help-block"><?php echo $validate->error("gender1"); ?></span>																												
													</div>
												</div>												
												<div class="form-group">
													<label class="control-label col-md-3">City/Town <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"  value="<?php echo $city1;?>" name="city1"/>
														<span class="help-block"><?php echo $validate->error("city1"); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Post Code<span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<input type="text" class="form-control"  value="<?php echo $pin_code1;?>" name="pin_code1"/>
														<span class="help-block"><?php echo $validate->error("pin_code1"); ?></span>
													</div>
												</div>

													<div class="form-group">
													<label class="control-label col-md-3">Country</label>
													<div class="col-md-4">
														<select name="country1" id="country_list" class="form-control">
															<option value="IN">India</option>
              												</select>
														<span class="help-block"><?php echo $validate->error("country1"); ?></span>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Address <span class="required">
													* </span>
													</label>
													<div class="col-md-4">
														<textarea class="form-control" name="address1"><?php echo $address1;?></textarea> 
														<span class="help-block"><?php echo $validate->error("address1"); ?></span>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="tab4">
												<h3 class="block">Confirm your account</h3>												
												<h4 class="form-section">Profile</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Fullname:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="fullname">
														</p>
													</div>
												</div>
												<!--<div class="form-group">
													<label class="control-label col-md-3">Email:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="email">
														</p>
													</div>
												</div>-->												
												<div class="form-group">
													<label class="control-label col-md-3">Phone:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="phone">
														</p>
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-md-3">Postal Code:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="pin_code">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Address:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="address">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">City/Town:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="city">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Country:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="country">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Remarks:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="remarks">
														</p>
													</div>
												</div>
                                                <h4 class="form-section">Grantor Details</h4>
												
												<div class="form-group">
													<label class="control-label col-md-3">Fullname:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="fullname1">
														</p>
													</div>
												</div>
												<!--<div class="form-group">
													<label class="control-label col-md-3">Email:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="email1">
														</p>
													</div>
												</div>	-->											
												<div class="form-group">
													<label class="control-label col-md-3">Phone:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="phone1">
														</p>
													</div>
												</div>

												<div class="form-group">
													<label class="control-label col-md-3">Postal Code:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="pin_code1">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Address:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="address1">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">City/Town:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="city1">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Country:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="country1">
														</p>
													</div>
												</div>
												<h4 class="form-section">Finance Billing</h4>
												<div class="form-group">
													<label class="control-label col-md-3">Registration:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="registration">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Insurance:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="insurance">
														</p>
													</div>
												</div>
                                                <div class="form-group">
													<label class="control-label col-md-3">On Road Vehicle Price:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="vehicle_price">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Vehicle Price:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="vehicle_price">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Down Payment:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="down_payment">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Finance Amount:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="finance_amount">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Documentation:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="documentation">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Commission:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="finance_commission">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Interest:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="interest">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3"> Scheme:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="scheme">
														</p>
													</div>
												</div>
												<div class="form-group">
													<label class="control-label col-md-3">Net Finance Amount:</label>
													<div class="col-md-4">
														<p class="form-control-static" data-display="net_finance">
														</p>
													</div>
												</div>
												
											
												
												
												
											</div>
										</div>
									</div>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-offset-3 col-md-9">
												<a href="javascript:;" class="btn default button-previous">
												<i class="m-icon-swapleft"></i> Back </a>
												<a href="javascript:;" class="btn blue button-next">
												Continue <i class="m-icon-swapright m-icon-white"></i>
												</a>
												<a href="javascript:;" class="btn green button-submit">
												Submit <i class="m-icon-swapright m-icon-white"></i>
												</a>
											</div>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<!-- END CONTENT -->
<?php require_once(dirname(__FILE__).'/quick_sidebar.php');?>	
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		<?php echo date('Y')." &copy; ".SITE." | Developed by ".DEVELOPED;?> 
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css"/>
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script src="assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/form-wizard.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="process/search_ajax.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
//Demo.init(); // init demo features
   FormWizard.init();
   FormValidation.init();

    $("#dob").inputmask("d/m/y", {
            autoUnmask: true
        }); //direct mask 
});
</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>