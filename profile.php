<?php 
	require_once(dirname(__FILE__).'/core/class.datamanager.php');
	require_once(dirname(__FILE__).'/core/class.session.php');
	require_once(dirname(__FILE__).'/core/class.upload.php');	
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
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">							
							<li class="active">
								<a href="#tab_1_3" data-toggle="tab">
								Account </a>
							</li>							
						</ul>
						<div class="tab-content">
							
							<div class="tab-pane active" id="tab_1_3">
								<div class="row profile-account">
									
									<div class="col-md-3">
										<ul class="ver-inline-menu tabbable margin-bottom-10">
											<li><?php $img =  datamanager::get_single("image", array('id' => current_user('id') ),'admin');?>
												<img id="profile_pic" src="<?=$img?>" class="img-responsive" alt=""/>												
											</li>
											<li class="active">
												<a data-toggle="tab" href="#tab_1-1">
												<i class="fa fa-cog"></i> Personal info </a>
												<span class="after">
												</span>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_2-2">
												<i class="fa fa-picture-o"></i> Change Avatar </a>
											</li>
											<li>
												<a data-toggle="tab" href="#tab_3-3">
												<i class="fa fa-lock"></i> Change Password </a>
											</li>											
										</ul>
									</div>
									<div class="col-md-9">
										<div class="tab-content">
											<div id="tab_1-1" class="tab-pane active">
											<?php $data = datamanager::get_single_row('admin', array('email' =>current_user('email') ))?>
												<form id="form_profile" role="form" action="#">
													<div class="form-group">
														<label class="control-label">Username</label>
														<input type="hidden" name="p_id" value="<?=$data['id'];?>" />
														<input type="text" name="username" value="<?=$data['username'];?>" placeholder="Preffered username" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Name</label>
														<input type="text"  name="name" value="<?=$data['name'];?>"   class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Mobile Number</label>
														<input type="text" name="phone"  value="<?=$data['phone'];?>"  class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Email</label>
														<input type="text"  name="email"  value="<?=$data['email'];?>"  class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Role</label>
														<input type="text"  disabled="TRUE" value="<?=$data['role'];?>"  class="form-control"/>
													</div>													
													<div class="form-group">
														<label class="control-label">Address</label>
														<textarea name="address" name="address"  class="form-control"><?=$data['address'];?></textarea>
													</div>
													<div class="margiv-top-10">
														<button class="btn green">
														Save Changes </button>														
													</div>
												</form>
											</div>
											<div id="tab_2-2" class="tab-pane">												
												<form id="form_profile_pic" action="" method="post" enctype="multipart/form-data">
													<div class="form-group">
														<div class="fileinput fileinput-new" data-provides="fileinput">
															<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
																<img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt=""/>
															</div>
															<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
															</div>
															<div>
																<span class="btn default btn-file">
																<span class="fileinput-new">
																Select image </span>
																<span class="fileinput-exists">
																Change </span>
																<input type="file" name="pic" id="pic" >																
																</span>
																<a href="#" class="btn default fileinput-exists" data-dismiss="fileinput">
																Remove </a>
															</div>
														</div>
														<div class="clearfix margin-top-10">
															<span class="label label-danger">
															NOTE! </span>
															<span>
															Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
														</div>
													</div>
													<div class="margin-top-10">
														<button name="profile_button" class="btn green">
														Submit </button>
														<a href="#" class="btn default">
														Cancel </a>
													</div>
												</form>
											</div>
											<div id="tab_3-3" class="tab-pane">
												<form id="profile_password" action="#">
													<div class="form-group">
														<label class="control-label">Current Password</label>
														<input type="hidden" name="p_id" value="<?=$data['id'];?>" />
														<input name="old_password" type="password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">New Password</label>
														<input id="new_password" name="new_password" type="password" class="form-control"/>
													</div>
													<div class="form-group">
														<label class="control-label">Re-type New Password</label>
														<input id="repeat_password" name="repeat_password" type="password" class="form-control"/>
													</div>
													<div class="margin-top-10">
														<button href="#" class="btn green">
														Change Password </button>														
													</div>
												</form>
											</div>
											
												
										</div>
									</div>
									<!--end col-md-9-->
								</div>
							</div>
							<!--end tab-pane-->							
						</div>
					</div>
					<!--END TABS-->
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
<link href="assets/admin/pages/css/profile-old.css" rel="stylesheet" type="text/css"/>
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
<script type="text/javascript" src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
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

 $.ajax({
        url: "process/user_profile_get_image_ajax.php",    
        type: "POST",                   
        data: data,      
        contentType: false,             
        cache: false,                  
        processData:false,              
        success: function(data)         
        {
            alert(data);                   
        }, 
        error: function(XMLHttpRequest, textStatus, errorThrown) {
                         alert("Error Occur");
                      }          
   });  
/*ends ajax*/

});
</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>