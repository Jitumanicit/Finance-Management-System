	<?php 
	require_once(dirname(__FILE__).'/core/class.datamanager.php');
	require_once(dirname(__FILE__).'/core/class.validation.php');
	require_once(dirname(__FILE__).'/core/class.session.php');	
	

	
	
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
											<i class="fa fa-gift"></i>Add New Staff
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
													<label class="col-md-3 control-label"> Name</label>
													<div class="col-md-4">
														<input type="text" name="name" class="form-control" placeholder="Name">														
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Email</label>
													<div class="col-md-4">
														<input type="text"  name="email" class="form-control" placeholder="Email">														
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Username</label>
													<div class="col-md-4">
														<input type="text"  name="username" class="form-control" placeholder="Username">														
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Password</label>
													<div class="col-md-4">
														<input type="text"  name="password" class="form-control" placeholder="password">														
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Confirm Password</label>
													<div class="col-md-4">
														<input type="text"  name="confirm_password" class="form-control" placeholder="confirm_password">														
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Date of Joining</label>
													<div class="col-md-4">
														<input type="date"  name="doj" class="form-control" placeholder="DOJ">
														
													</div>
												</div>
											</div>
                                            <div class="form-body">
                                            <div class="form-group">
                                           
                                           <label class="col-md-3 control-label">Gender </label>                                            
														 <div class="col-md-4">
                                                        <div class="radio-list">
                                                       
															
                                                            <label>
															<input type="radio" name="gender" <?php if($gender=='Male'){echo "checked";}?> value="Male" data-title="Male"/>
															Male </label>
															<label>
															<input type="radio" name="gender" <?php if($gender=='Female'){echo "checked";}?> value="Female" data-title="Female"/>
															Female </label>
														</div>
														
														</div>
																																															
													</div>
												</div>
                                            
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Address</label>
													<div class="col-md-4">
														<input type="text"  name="address" class="form-control" placeholder="Address">
														
													</div>
												</div>
											</div>
											
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Phone</label>
													<div class="col-md-4">
														<input type="text"  name="phone" class="form-control" placeholder="Phone">
														
													</div>
												</div>
											</div>
											<div class="form-body">
											<div class="form-group">
													<label class="control-label col-md-3">Role</label>
													<div class="col-md-4">
														<select name="role" id="role" class="form-control">
															<option value="admin">Admin</option>
															<option value="accounts">Accounts</option>
															<option value="cashier">Cashier</option>
              												</select>
														</div>
												</div>										
											
												
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Salary</label>
													<div class="col-md-4">
														<input type="salary"  name="salary" class="form-control" placeholder="Salary">																									
													</div>
												</div>
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green"	onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();">Submit</button>
														<!--<button type="button" class="btn default">Cancel</button>-->
														<a href="staff_list.php" class="btn default">Cancel</a>
													</div>
												</div>
											</div>
										</form>
										<?php
										if($_POST)
	{
	
	if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['doj']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['gender']) && isset($_POST['address']) && isset($_POST['phone']) && isset($_POST['role']) && isset($_POST['salary']))
	{ 
	$name=$_POST['name'];
	$email=$_POST['email'];
	$doj=$_POST['doj'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$phone=$_POST['phone'];
	$role=$_POST['role'];
	$salary=$_POST['salary'];
	
	
	define("DB_CONN","mysql:dbname=finance");
	define("DB_USERNAME","root");
	define("DB_PASSWORD","");
	$dbhi=new PDO(DB_CONN, DB_USERNAME, DB_PASSWORD);
	$token_id=md5(time());
$mysql_insert_dealer = $dbhi->prepare("INSERT INTO `finance`.`staff` 
(`name`, `email`, `doj`, `gender`, `address`, `phone`, `role`,`salary`, `token_id`) 
VALUES 
('$name', '$email', '$doj', '$gender', '$address', $phone, '$role' , '$salary', '$token_id')");
$mysql_insert_dealer->execute();



$mysql_insert_admin = $dbhi->prepare("INSERT INTO `finance`.`admin` 
(`name`, `email`, `phone`, `username`, `password`,  `role`, `date`, `address`,`token_id`) 
VALUES 
('$name', '$email', '$phone',  '$username', '$password' , '$role', '$doj',  '$address',  '$token_id')");
$mysql_insert_admin->execute();


	/* $mysql_insert_dealer = $dbhi->prepare("INSERT INTO dealer_payment 
	(id, dealer_name, client_name, vehicle type, brand, model, price, purchase_date)
	VALUES (?, ?, ?, ?, ?, ?, ?,?)");
							
							$mysql_insert_dealer->execute(array(NULL,$dealer_name,$client_name,$vehicle_type,$brand,$model,$price,$date)); */
							//$mysql_query1->execute(array(dealer_name,client_name,vehicle_type,brand,model,price,date));
							header("location:staff_list.php");
							
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

