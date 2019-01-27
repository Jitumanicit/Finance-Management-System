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
<!--<link href="assets/admin/layout/css/layout.css" rel="stylesheet" type="text/css"/>-->
<!--<link href="assets/admin/layout/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color"/>-->
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
	<img src="assets/admin/layout/img/logo.jpg" alt="" height="91px" width="700px"/>
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
	<form class="login-form" action="" method="post">
		<h3 class="form-title">LOGIN YOUR ACCOUNT</h3>
		<div class="alert alert-danger display-hide">
			<button class="close" data-close="alert"></button>
			<span>
			Enter any username and password. </span>
		</div>
		<div class="form-group">
			<!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
			<label class="control-label visible-ie8 visible-ie9">Username</label>
			<div class="input-icon">
				<i class="fa fa-user"></i>
				<input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
			</div>
		</div>
		<div class="form-group">
			<label class="control-label visible-ie8 visible-ie9">Password</label>
			<div class="input-icon">
				<i class="fa fa-lock"></i>
				<input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
			</div>
			<div class="alert-danger">
				<strong><?php echo $error;?></strong>
			</div>
		</div>
		<div class="form-actions">
			<!--<label class="checkbox">
			<input type="checkbox" name="remember" value="1"/> Remember me </label>-->
			<p><br/>
			<button name="submit" type="submit" class="btn green-haze pull-right">
			Login <i class="m-icon-swapright m-icon-white"></i>
			</button>
			</p>
		</div>
        <div class="login-options">
			<h4>Or login with</h4>
			<ul class="social-icons">
				<li>
					<a class="facebook" data-original-title="facebook" href="#">
					</a>
				</li>
				<li>
					<a class="twitter" data-original-title="Twitter" href="#">
					</a>
				</li>
				<li>
					<a class="googleplus" data-original-title="Goole Plus" href="#">
					</a>
				</li>
				<li>
					<a class="linkedin" data-original-title="Linkedin" href="#">
					</a>
				</li>
			</ul>
		</div>
        <div class="create-account">
			<p>
				 Don't have an account yet ?&nbsp; <a href="creat_account.php">
				Create an account </a>
			</p>
		</div>
		
	</form>
	<!-- END REGISTRATION FORM -->
</div>
	</div>
<!-- END LOGIN -->
<!-- BEGIN COPYRIGHT -->
<!--<div class="copyright">
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