<?php require_once(dirname(__FILE__).'/core/class.datamanager.php');?>
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
				<!-- BEGIN PAGE CONTENT-->
			<div class="row">
				<div class="col-md-12">
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">							
							<li class="active">
								<a data-toggle="tab" href="#tab_1_5">
								User Search </a>
							</li>
						</ul>
						<div class="tab-content">							
							<div id="tab_1_5" class="tab-pane active">
								<div class="row search-form-default">
									<div class="col-md-12">
										<form  class="sidebar-search" action="" method="POST">
											<div class="input-group">
												<div class="input-cont">
													<input type="text" name="query" placeholder="Search..." class="form-control" required="TRUE" autocomplete="off"/>
												</div>
												<span class="input-group-btn">
												<button type="submit" class="btn green-haze">
												Search &nbsp; <i class="m-icon-swapright m-icon-white"></i>
												</button>
												</span>
											</div>
										</form>
									</div>
								</div>
								<div class="table-dataponsive">

								<?php if(isset($_POST['query'])){
											$q = $_POST['query'];
											$data = datamanager::search($q,'client');

								if(!$data){echo "Sorry No Result Found";}else{ ?>
								
									<table class="table table-striped table-bordered table-advance table-hover">
									<thead>
									<tr>
										<th>
											 Photo
										</th>
										<th>
											 Fullname
										</th>
										<th>
											 Email
										</th>
										<th>
											 Registered
										</th>
										
										<th>
											 Status
										</th>
										<th>
										</th>
									</tr>
									</thead>
									<tbody>
									
							<?php	foreach ($data as  $value){

							if(empty($value['thumb_image'])){
								        if(strtolower($value['gender'])== 'male'){
								          $image =  "assets/male.png";
								        }else{
								          $image =  "assets/female.png";
								        }
								     }else{

								      $image =  $value['thumb_image'];
								     }   ?>

									<tr>
										<td>
											<img src="<?=$image;?>" alt="" width="50"/>
										</td>
										<td>
											<?=$value['name'];?>
										</td>
										<td>
											 <?=$value['email'];?>
										</td>
										<td>
											 <?=date('d-m-Y',$value['time']);?>
										</td>
										
										<td>
											<span class="label label-sm label-success">
											Approved </span>
										</td>
										<td>
											<a class="btn default btn-xs red-stripe" href="client_view.php?id=<?=$value['id'];?>">
											View </a>
										</td>
									</tr>
								<?php }
								} ?>
									</tbody>
									</table>
								</div>
								<?php }?>
							</div>
							<!--end tab-pane-->
						</div>
					</div>
				</div>
				<!--end tabbable-->
			</div>
			<!-- END PAGE CONTENT-->
			
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
<script src="assets/global/plugins/datapond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<link href="assets/admin/pages/css/search.css" rel="stylesheet" type="text/css"/>
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