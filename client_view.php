<?php require_once(dirname(__FILE__).'/core/class.datamanager.php');?>
<?php require_once(dirname(__FILE__).'/core/class.db.php');?>
<?php require_once(dirname(__FILE__).'/header.php');?>
<?php require_once(dirname(__FILE__).'/sidebar.php');?>	
<?php require_once(dirname(__FILE__).'/penalty.php');?>	
<?php  
	$_FINANCETYPE  = array('1' => 'Private','2' => 'Commercial' ,'3' => 'Re-finance' );
	$_VEHICLETYPE  = array('2' => 'Two Wheller','3' => 'Three Wheller' ,'4' => 'Four Wheller' );
	$page_title =  basename($_SERVER['PHP_SELF'],'.php');
	$dbase=new database();
	?>

<?php if(isset($_GET['id'])){
							$id = $_GET['id'];
							$data = datamanager::get_single_row('client', array('id' => $id) );
							if(empty($data['thumb_image'])){
									        if(strtolower($data['gender'])== 'male'){
									          $image =  "assets/male.png";
									        }else{
									          $image =  "assets/female.png";
									        }
							     }else{
							      $image =  $data['thumb_image'];
							     }   
    						 }?>

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<?=$_PageTitle[basename($_SERVER['PHP_SELF'],'.php')];?> 
			<div align="right"><a class="btn btn-lg blue hidden-print margin-bottom-5" href="invoice.php?id=<?=$id?>">
						Invoice <i class="fa fa-print"></i></a>
            <button type="print" class="btn btn-lg blue hidden-print margin-bottom-5" name="print_button" onclick="javascript:window.print();">
						Print <i class="fa fa-print"></i>
						</button>
			</div>
			</h3>
			
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div class="row profile">
				<div class="col-md-12">
					<!--BEGIN TABS-->
					<div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Client View </a>
							</li>														
						</ul>
						<div class="tab-content">						
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
										<!--<ul class="list-unstyled profile-nav">
											<li>
												<img src="<?=$image;?>" class="img-dataponsive" alt="" width="200" />
												<a href="#" class="profile-edit">
												edit </a>
											</li>											
										</ul>-->
									</div>
									<div class="col-md-9">
										<div class="row">										
											<div class="col-md-12 profile-info">
											
											<div class="form-body">												
												<h3 class="form-section">Person Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Name:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																<?=$data['name'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Phone:</label>
															<div class="col-md-8">
																<p class="form-control-static">
																<?=$data['phone'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																<?=$data['email'];?>
																</p>
															</div>
														</div>
													</div>-->
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Date of Birth:</label>
															<div class="col-md-8">
																<p class="form-control-static">
																<?=$data['dob'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vehicle Price:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 <?=$data['vehicle_price'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Vehicle Type:</label>
															<div class="col-md-8">
																<p class="form-control-static">
																<?=$_VEHICLETYPE[$data['vehicle_type']];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
                                                <div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Vehiclel Description:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																<?=$data['vehicle_description'];?>
																</p>
															</div>
														</div>
													</div>
                                                   
													</div>
													<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Scheme:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																<?=$data['scheme'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Down Payment:</label>
															<div class="col-md-8">
																<p class="form-control-static">
																<?=CURRENCY." ".$data['down_payment'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Finance Type:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																<?=$_FINANCETYPE[$data['finance_type']];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Net Finance:</label>
															<div class="col-md-8">
																<p class="form-control-static">
																<?=CURRENCY." ".$data['net_finance'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<h3 class="form-section">Address</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																<?=$data['address'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">City:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	<?=$data['city'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>												
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Post Code:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 <?=$data['pin_code'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Country:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 <?=$data['country'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
											</div>	
										</div>
											<!--end col-md-8-->											
											
										</div>
										<!--end row-->

									</div>
								</div>
                                <div class="tabbable tabbable-custom tabbable-full-width">
						<ul class="nav nav-tabs">
							<li class="active">
								<a href="#tab_1_1" data-toggle="tab">
								Grantor View </a>
							</li>														
						</ul>
						<div class="tab-content">						
							<div class="tab-pane active" id="tab_1_1">
								<div class="row">
									<div class="col-md-3">
									</div>
									<div class="col-md-9">
										<div class="row">										
											<div class="col-md-12 profile-info">
											
											<div class="form-body">												
												<h3 class="form-section">Grantor Info</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Grantor Name:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																<?=$data['gname'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Phone:</label>
															<div class="col-md-8">
																<p class="form-control-static">
																<?=$data['gphone'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
												<!--/row-->
												<div class="row">
													<!--<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Email:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																<?=$data['gemail'];?>
																</p>
															</div>
														</div>
													</div>-->
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-4">Date of Birth:</label>
															<div class="col-md-8">
																<p class="form-control-static">
																<?=$data['gdob'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												<!--/row-->
												<h3 class="form-section">Address</h3>
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Address:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																<?=$data['gaddress'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">City:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	<?=$data['gcity'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>												
												<!--/row-->
												<div class="row">
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Post Code:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 <?=$data['gpin_code'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
													<div class="col-md-6">
														<div class="form-group">
															<label class="control-label col-md-3">Country:</label>
															<div class="col-md-9">
																<p class="form-control-static">
																	 <?=$data['gcountry'];?>
																</p>
															</div>
														</div>
													</div>
													<!--/span-->
												</div>
											</div>	
										</div>
											<!--end col-md-8-->											
											
										</div>
										<!--end row-->

									</div>
								</div>
                                </div>
                                </div>
                                </div>
                              <div class="tabbable tabbable-custom tabbable-custom-profile">
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab_1_11" data-toggle="tab">
													Instalments </a>
												</li>												
											</ul>
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1_11">
													<div class="portlet-body">
														<table class="table table-striped table-bordered table-advance table-hover">
														<thead>
														<tr>																														
															<th>Finance</th>
                                                            <th>Documentation</th>
															<th>Commission</th>
															<th>Insurance</th>
															<th>Interest</th>
															<th>Net Finance</th>
															<th>Penalty</th>
															<th>Total</th>
															<th>Emi Date</th>
                                                            <th>Payment Receiver/Date</th>
														</tr>
														</thead>
														<tbody>
												<?php $emi = datamanager::get_all('emi_table', array('client_id' =>$id));?>	
												<?php foreach ($emi as $key): ?>
														<tr>
															
															<td>
															<?=CURRENCY." ".$key['finance'];?>															
															</td>
                                                            <td>
															<?=CURRENCY." ".$key['documentation'];?>															
															</td>
															<td>
															<?=CURRENCY." ".$key['finance_commission'];?>
															</td>
															<td>
															<?=CURRENCY." ".$key['insurance'];?>															
															</td>
															<td>
															<?=CURRENCY." ".$key['interest'];?>
															</td>
															<td>
															<?=CURRENCY." ".$key['net_finance'];?>
															</td>
															<td>
															
															<?php /*
															$nxt = strtotime("+30 days",$key['emi_date']);
															$now=strtotime("now");
															$x=strtotime("+0 days",$key['emi_date']);
															$y=floor(($now-$x)/86400);
															
															if($now >$key['emi_date'] && $now<=$nxt){
															
															$pen= $key['net_finance']*$y*0.01;
																$data=array('penalty' =>$pen);
																	datamanager::save($data,"emi_table",array('emi_date' =>$key['emi_date']));
																
															} */
															?>
															<?=CURRENCY." ".$key['penalty'];?>
															</td>
															<td>
															<?=CURRENCY." ".($key['net_finance']+$key['penalty']);?>
															</td>															
															<td>
															<?php echo date('d-m-Y',$key['emi_date']); 
																if($key['status'] == 0  && time() -  $key['emi_date'] >= 86400){
									echo'<span class="emi label label-danger label-md">
																Penalty </span>';
							}
							if($key['status'] == 0  && time() -  $key['emi_date'] <= 86400 && time() -  $key['emi_date'] >= 0 ){
									echo'<span class="emi label label-warning label-md">
																UnPaid </span>';
							}
							if($key['status'] == 1 ){
									echo'<span class="emi label label-success label-md">
									
								Paid</span>';
							}
							if($key['status'] == 0 && time() < $key['emi_date']){
									echo'<span class="emi label label-warning label-md">
									
								UnPaid</span>';
							}
															/*if(time()> $key['emi_date']){
																	echo'<span class="emi label label-danger label-md">
																Penalty </span>';
														
															}else{
															echo($key['status'])?'<span class=" emi label label-success label-md">
																Paid </span>':'<span class="emi label label-warning label-md">
																UnPaid </span>';
																} */
																?>
															</td>	
															<td>
                                                             <?php echo $key['payment_receiver'];?>
															<?php if($key['payment_date'] !=NULL) echo date('d-m-Y',$key['payment_date']);?>
                                                            
                                                             </td>														
														</tr>
													<?php endforeach;?>	
														</tbody>
														</table>
													</div>
												</div>
												
											</div>
										</div>

							</div>
							<!--tab_1_2-->
													
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
<script src="assets/global/plugins/datapond.min.js"></script>
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
});
</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>