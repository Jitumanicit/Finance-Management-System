<?php
	require_once(dirname(__FILE__).'/core/class.datamanager.php');
	require_once(dirname(__FILE__).'/core/class.session.php');
	require_once(dirname(__FILE__).'/penalty.php');
	$error="";
	
	if(isset($_POST['submit'])) {
		
	$email = $username = $_POST['username'];
	$password = $_POST['password'];	
	
	 $success=datamanager::check_login($username,$password);
	
	
	if($success) {
	/*$session= new session();
	$sid=$session->generate_sid( $chars = 100, $alpha = TRUE, $numeric = TRUE, $symbols = TRUE, $timestamp = TRUE );
	$email = datamanager::get_single('email',array('username' =>$username ),'admin');	
	$session->set( 'email', $email );
	$session->set( 'sid', $sid );	*/
	
	echo "log";
	header("Location: new_client.php");
	//die();	
	}else {
	$error="Invalid Login ID";		
		}
	}
	
?>	
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Finance management System | Login Form </title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="assets/global/plugins/select2/select2.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/pages/css/login3.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link href="assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>
<link href="assets/admin/layout/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN LOGO -->
<div class="logo">
	<a href="index.html">
	<img src="assets/admin/layout/img/logo.jpg" alt="" height="91px" width="775px"/>
	</a>
</div>
<!-- END LOGO -->
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGIN -->
<div class="col-md-2">
</div>

	<div class="col-md-4">
            <div class="profile">
                <p>Project Title - Finance Management System</p>
            </div>
</div>
	
    <div class="col-md-4">
		<div class="content">
	<!-- BEGIN LOGIN FORM -->
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
											<i class="fa fa-gift"></i>Add New Collection Recive
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
													<label class="col-md-3 control-label">Name Of Reciver</label>
													<div class="col-md-4">
														<input type="text" name="name" class="form-control" placeholder="Enter Name">
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
											<div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Amount</label>
													<div class="col-md-4">
														<input type="text"  name="amount" class="form-control" placeholder="Enter Amount">
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Vehicle NO</label>
													<div class="col-md-4">
														<input type="text"  name="vehicle_no" class="form-control" placeholder="Enter Vehicle No">
													</div>
												</div>
											</div>
                                            <div class="form-body">
												<div class="form-group">
													<label class="col-md-3 control-label">Client Name</label>
													<div class="col-md-4">
														<input type="text"  name="client_name" class="form-control" placeholder="Enter Client Name">
													</div>
												</div>
											</div>


											<div class="form-actions fluid">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
							<button type="submit" class="btn green"	onclick="this.value='Submitting ..';this.disabled='disabled'; this.form.submit();">Submit</button>
														<!--<button type="button" class="btn default">Cancel</button>-->
														<a href="colllection_recive.php" class="btn default">Cancel</a>
													</div>
												</div>
											</div>
										</form>
										<?php
										if($_POST)
	{

	if(isset($_POST['name']) && isset($_POST['date'])  && isset($_POST['amount'])  && isset($_POST['vehicle_no']) && isset($_POST['client_name']))
	{
	$name=$_POST['name'];
	$date=$_POST['date'];
	$amount=$_POST['amount'];
	$vehicle_no=$_POST['vehicle_no'];
	$client_name=$_POST['client_name'];


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

	$token_id=md5(time());
	
$mysql_insert_dealer = $dbhi->prepare("INSERT INTO `finance`.`collection`
(`name`, `date`, `amount`, `vehicle_no`, `client_name`,`token_id`)
VALUES
('$name', '$date', '$amount', '$vehicle_no', '$client_name','$token_id')");
$mysql_insert_dealer->execute();


$particulars_type='Collection_Charge_Received';
$mysql_insert_revenue_office = $dbhi->prepare("INSERT INTO `finance`.`revenue` 
(`particulars`,`credit`,`time`,`token_id`) 
VALUES 
('$particulars_type','$amount','$date','$token_id')");
$mysql_insert_revenue_office->execute();



	/* $mysql_insert_dealer = $dbhi->prepare("INSERT INTO dealer_payment
	(id, dealer_name, client_name, vehicle type, brand, model, price, purchase_date)
	VALUES (?, ?, ?, ?, ?, ?, ?,?)");

							$mysql_insert_dealer->execute(array(NULL,$dealer_name,$client_name,$vehicle_type,$brand,$model,$price,$date)); */
							//$mysql_query1->execute(array(dealer_name,client_name,vehicle_type,brand,model,price,date));
							header("location:collection_recive.php");

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
</div>
	</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<!----<div class="copyright">
	 <!--?php echo date('Y')." &copy; ".SITE." | Developed by ".DEVELOPED;?> 
</div>
<!-- END COPYRIGHT -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/pages/scripts/login.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {     
  Metronic.init(); // init metronic core components
  Layout.init(); // init current layout
  Login.init();
 
});
</script>
<!-- END JAVASCRIPTS -->
</body>

<!-- END BODY -->
</html>