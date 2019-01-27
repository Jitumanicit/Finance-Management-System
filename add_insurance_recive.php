<?php 
	require_once(dirname(__FILE__).'/core/class.datamanager.php');
	require_once(dirname(__FILE__).'/core/class.validation.php');
	require_once(dirname(__FILE__).'/core/class.session.php');	
	

	
	
	/*
	$validate= new validation();	
	
	if(isset($_POST['email'])){	

	$name= $_POST['name'];	
	$email= $_POST['email'];
	$phone= $_POST['phone'];
	$password= $_POST['password'];
	$role= $_POST['role'];
	$address= $_POST['address'];	
	
	$validate->filter("name",$name,TRUE,"This Field");
	$validate->filter("email",$email,TRUE,"This Field");
	$validate->filter("phone",$phone,TRUE,"This Field");
	$validate->filter("password",$password,TRUE,"This Field");
	$validate->filter("role",$role,TRUE,"This Field");
	$validate->filter("address",$address);

	if(empty($validate->error)){	
		$success = datamanager::save($validate->return_data(),"admin");
	}
	
	if($success){
		header("Location:".$_SERVER[PHP_SELF]."");
		}else{echo "fail";}		
		
}	


if(isset($_POST['update'])){	

	$id= $_POST['id'];
	$role= $_POST['role'];	
	$validate->filter("role",$role,TRUE,"This Field");	

	if(empty($validate->error)){	
		 $success = datamanager::save($validate->return_data(),"admin", array('id' => $id ));
	}
	
	if($success){
		header("Location:".$_SERVER[PHP_SELF]."");
		//echo "siccdcd";		
	}else{echo "fail";}		
		
}

if(isset($_GET['delete'])){	

	$id= $_GET['delete'];
	$success = datamanager::delete('admin' ,  array('id' => $id ));
	if($success){
		header("Location:".$_SERVER[PHP_SELF]."");
		//echo "siccdcd";		
	}else{
		echo "fail";
	}		
		
}
*/
?>
<?php require_once(dirname(__FILE__).'/header.php');?>
<?php require_once(dirname(__FILE__).'/sidebar.php');?>	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<?=$_PageTitle[basename($_SERVER['PHP_SELF'],'.php')];?>
			</h3>
			
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
		<?php  if(isset($_GET['edit'])){
					$id = $_GET['edit'];
					$key = datamanager::get_single_row('admin', array('id' => $id ));
			?>
			<!--start edit form-->
			<div class="form-actions fluid">
							<div class="row">
							<div class="col-md-offset-3 col-md-9">
														<button name="update" type="submit" class="btn blue">Update</button>														
													</div>
												</div>
											</div>
										</form>
										<!-- END FORM-->
									</div>
								</div>

			<!--end edit form-->

			<?php }else{?>
			<!--start add form-->
			<div class="portlet box yellow">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Add New Insurance Recive
										</div>										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" method="POST" name="add_staff" class="form-horizontal">
											<div class="form-actions top">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<!--<button type="submit" class="btn green">Submit</button>-->
														<!--<button type="button" class="btn default">Cancel</button>-->
													</div>
												</div>
											</div>	
                                            										
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Client Name</label>
													<div class="col-md-4">
														<input type="text" name="client_name" class="form-control" placeholder="Enter Client Name">														
													</div>
												</div>
											</div>
                                            
                                            
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Vehicle Type</label>
													<div class="col-md-4">
														<input type="text" name="vehicle_type" class="form-control" placeholder="Enter Vehicle Type">														
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Vehicle Brand</label>
													<div class="col-md-4">
														<input type="text" name="vehicle_brand" class="form-control" placeholder="Enter Vehicle Brand">														
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Vehicle Model</label>
													<div class="col-md-4">
														<input type="text" name="vehicle_model" class="form-control" placeholder="Enter Vehicle Model">														
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Registration No</label>
													<div class="col-md-4">
														<input type="text" name="reg_no" class="form-control" placeholder="Enter Registration No">														
													</div>
												</div>
											</div>
                                            
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Chasis No</label>
													<div class="col-md-4">
														<input type="text"  name="chasis_no" class="form-control" placeholder="Enter Chasis No">														
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Premium Year</label>
													<div class="col-md-4">
														<input type="text"  name="premium_year" class="form-control" placeholder="Enter Premium Year">														
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Amount Paid</label>
													<div class="col-md-4">
														<input type="text"  name="amount_paid" class="form-control" placeholder="Enter Amount Paid">														
													</div>
												</div>
											</div>
											
											
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Date</label>
													<div class="col-md-4">
														<input type="date"  name="date" class="form-control" placeholder="Enter Date">
														
													</div>
												</div>
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green"	onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();">Submit</button>
														<!--<button type="button" class="btn default">Cancel</button>-->
														<a href="insurance_payment.php" class="btn default">Cancel</a>
													</div>
												</div>
											</div>
										</form>
										<?php
										if($_POST)
	{
	
	if(isset($_POST['client_name']) && isset($_POST['vehicle_type'])&& isset($_POST['vehicle_brand']) && isset($_POST['vehicle_model']) && isset($_POST['reg_no'])&& isset($_POST['chasis_no']) && isset($_POST['premium_year']) && isset($_POST['amount_paid']) && isset($_POST['date']))
	{ 
	$client_name=$_POST['client_name'];
	$vehicle_type=$_POST['vehicle_type'];
	$vehicle_brand=$_POST['vehicle_brand'];
	$vehicle_type=$_POST['vehicle_type'];
	$vehicle_model=$_POST['vehicle_model'];
	$reg_no=$_POST['reg_no'];
	$chasis_no=$_POST['chasis_no'];
	$premium_year=$_POST['premium_year'];
	$amount_paid=$_POST['amount_paid'];
	$date=$_POST['date'];
	
	
	/*
	echo $dealer_name;
	echo '<br/>';
	echo $client_name;
	echo '<br/>';
	echo $vehicle_type;
	echo '<br/>';
	echo $brand;
	echo '<br/>';
	echo $model;
	echo '<br/>';
	echo $price;
	echo '<br/>';
	echo $date;
	*/
	define("DB_CONN","mysql:dbname=finance");
	define("DB_USERNAME","root");
	define("DB_PASSWORD","");
	$dbhi=new PDO(DB_CONN, DB_USERNAME, DB_PASSWORD);
	
$mysql_insert_dealer = $dbhi->prepare("INSERT INTO `finance`.`insurance_recive` 
(`client_name`, `vehicle_type`,`vehicle_brand`, `vehicle_model`,`reg_no`, `chasis_no`,`premium_year`, `amount_paid`, `date`) 
VALUES 
('$client_name', '$vehicle_type', '$vehicle_brand', '$vehicle_model','$reg_no','$chasis_no','$premium_year','$amount_paid','$date')");
$mysql_insert_dealer->execute();

	/* $mysql_insert_dealer = $dbhi->prepare("INSERT INTO dealer_payment 
	(id, dealer_name, client_name, vehicle type, brand, model, price, purchase_date)
	VALUES (?, ?, ?, ?, ?, ?, ?,?)");
							
							$mysql_insert_dealer->execute(array(NULL,$dealer_name,$client_name,$vehicle_type,$brand,$model,$price,$date)); */
							//$mysql_query1->execute(array(dealer_name,client_name,vehicle_type,brand,model,price,date));
							header("location:insurance_recive.php");
							
	} //isset
	} // if post
	?>
										<!-- END FORM-->
									</div>
								</div>
						<!--ends add form-->		

							<?php }?>

										
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
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="assets/admin/layout/scripts/demo.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="process/search_ajax.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
FormValidation.init();
});
</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>

