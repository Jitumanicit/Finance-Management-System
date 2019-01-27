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
			<div class="portlet box blue-hoki">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit Staff
										</div>										
									</div>
									<div class="portlet-body form">
										<!-- BEGIN FORM-->
										<form action="" method="POST" name="add_staff" class="form-horizontal">	
										<input type="hidden"  name="id" value="<?php echo $key['id'];?>">																			
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Name</label>
													<div class="col-md-4">
														<p class="form-control-static"><?php echo $key['name'];?></p>
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Email</label>
													<div class="col-md-4">
														<p class="form-control-static"> <?php echo $key['email'];?> </p>														
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Phone</label>
													<div class="col-md-4">
														<p class="form-control-static"><?php echo $key['phone'];?></p>														
													</div>
												</div>
											</div>											
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Role</label>
													<div class="col-md-4">
														<select name="role" class="form-control">
														<?php foreach ($_ROLE as $key => $value): ?>
															<option value="<?php echo $key;?>"><?php echo $value;?></option>
														<?php endforeach;?>																
														</select>
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Date of Joining</label>
													<div class="col-md-4">
														<p class="form-control-static"> <?php echo $key['doj'];?> </p>
													</div>
												</div>
											</div>
                                            											
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Address</label>
													<div class="col-md-4">
														<p class="form-control-static"> <?php echo $key['address'];?> </p>
													</div>
												</div>
											</div>
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
			
			<?php
			
	define("DB_CONN","mysql:dbname=finance");
	define("DB_USERNAME","root");
	define("DB_PASSWORD","");
	$dbhi2=new PDO(DB_CONN, DB_USERNAME, DB_PASSWORD);
	$get_id=$_GET['id'];
	$mysql_select_dealer = $dbhi2->prepare("SELECT * FROM `finance`.`staff5` WHERE `id`=$get_id");
	$mysql_select_dealer->execute();
	$db_dealer_value = $mysql_select_dealer->fetch();
			
			?>
			<!--start add form-->
			<div class="portlet box yellow">
									<div class="portlet-title">
										<div class="caption">
											<i class="fa fa-gift"></i>Edit Salary Account
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
													<label class="col-md-3 control-label">Name</label>
													<div class="col-md-4">
<input value="<?php echo $db_dealer_value['name']; ?>" type="text" name="name" class="form-control" placeholder="Enter Name">														
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Role</label>
													<div class="col-md-4">
<input value="<?php echo $db_dealer_value['role']; ?>" type="text"  name="role" class="form-control" placeholder="Enter Role">														
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Salary</label>
													<div class="col-md-4">
<input value="<?php echo $db_dealer_value['salary']; ?>" type="text"  name="salary" class="form-control" placeholder="Enter Salary">														
													</div>
												</div>
											</div>
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Advance</label>
													<div class="col-md-4">
<input value="<?php echo $db_dealer_value['advance']; ?>" type="text"  name="advance" class="form-control" placeholder="Enter Advance">														
													</div>
												</div>
											</div>
                                            
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Date</label>
													<div class="col-md-4">
<input value="<?php echo $db_dealer_value['date']; ?>" type="date"  name="date" class="form-control" placeholder="Enter Date">														
													</div>
												</div>
											</div>
											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
									<button type="submit" class="btn green"	onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();">Update</button>																		  									<!--<button type="button" class="btn default">Cancel</button>-->
														<a href="staff5.php" class="btn default">Cancel</a>
													</div>
												</div>
											</div>
										</form>
										<?php
										if($_POST)
	{
	if(isset($_POST['name']) && isset($_POST['role']) && isset($_POST['salary']) && isset($_POST['advance']) && isset($_POST['date']))
	{ 
	$name=$_POST['name'];
	$role=$_POST['role'];
	$salary=$_POST['salary'];
	$advance=$_POST['advance'];
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
	
	define("DB_CONN","mysql:dbname=finance");
	define("DB_USERNAME","root");
	define("DB_PASSWORD","");
	$dbhi=new PDO(DB_CONN, DB_USERNAME, DB_PASSWORD);
	*/
$mysql_update_dealer = $dbhi2->prepare("UPDATE `finance`.`staff5` 
SET `name`='$name',
	`role`='$role',
	`salary`='$salary', 
	`advance`='$advance', 
	`date`='$date'	
WHERE  `id`=$get_id;");
	$mysql_update_dealer->execute();



							header("location:staff5.php?show_id=$get_id&update=data_sucessfully_updated");
							
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
