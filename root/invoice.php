<?php require_once(dirname(__FILE__).'/core/class.datamanager.php');?>

<?php  
	$_FINANCETYPE  = array('1' => 'Private','2' => 'Commercial' ,'3' => 'Re-finance' );
	$_VEHICLETYPE  = array('2' => 'Two Wheller','3' => 'Three Wheller' ,'4' => 'Four Wheller' );
	$page_title =  basename($_SERVER['PHP_SELF'],'.php');
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
			<!-- BEGIN PAGE CONTENT-->
			<div class="invoice">
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
				<div class="row invoice-logo">
					<div class="col-xs-6 invoice-logo-space">
						<img src="assets/admin/pages/media/invoice/walmart.png" class="img-responsive" alt=""/>
					</div>
					<div class="col-xs-6">
						<p>
							 #5652256 / 28 Feb 2013 <span class="muted">
							Consectetuer adipiscing elit </span>
						</p>
					</div>
				</div>
				<hr/>
				<div class="row">
					<div class="col-xs-4">
						<h3>Client:</h3>
						<ul class="list-unstyled">
							<li>
								<?=$data['name'];?>
							</li>
							<li>
								 <?=$data['email'];?>
							</li>
							<li>
								 <?=$data['phone'];?>
							</li>
							<li>
								 <?=$data['dob'];?>
							</li>							
						</ul>
					</div>
					<div class="col-xs-4">
						<h3>Address:</h3>
						<ul class="list-unstyled">
							<li>
								<?=$data['address'];?>
							</li>
							<li>
								 <?=$data['city'];?>
							</li>
							<li>
								 <?=$data['country'];?>
							</li>
						</ul>
					</div>
					<div class="col-xs-4 invoice-payment">
						<h3>Payment Details:</h3>
						<ul class="list-unstyled">
						<li><strong>Cash</strong> </li>
							<!--<li>
								<strong>V.A.T Reg #:</strong> 542554(DEMO)78
							</li>
							<li>
								<strong>Account Name:</strong> FoodMaster Ltd
							</li>
							<li>
								<strong>SWIFT code:</strong> 45454DEMO545DEMO
							</li>
							<li>
								<strong>V.A.T Reg #:</strong> 542554(DEMO)78
							</li>
							<li>
								<strong>Account Name:</strong> FoodMaster Ltd
							</li>
							<li>
								<strong>SWIFT code:</strong> 45454DEMO545DEMO
							</li>-->
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-striped table-hover">
						<thead>
						<tr>																														
							<th>Finance</th>
							<th>Commission</th>
							<th>Insurance</th>
							<th>Interest</th>
							<th>Net Finance</th>
							<th>Penalty</th>
							<th>Total</th>
							<th>Emi Date</th>
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
							<?=($key['penalty'])?CURRENCY." ".$key['penalty']:"--";?>
							</td>
							<td>
							<?=CURRENCY." ".($key['net_finance']+$key['penalty']);?>
							</td>															
							<td>
							<?php echo date('d-m-Y',$key['emi_date']); 
							if(time() >$key['emi_date']){
									echo'<span class="emi label label-danger label-md">
								Penalty </span>';
							}else{
							echo($key['status'])?'<span class=" emi label label-success label-md">
								Paid </span>':'<span class="emi label label-warning label-md">
								UnPaid </span>';
								} ?>
							</td>															
						</tr>
					<?php endforeach;?>	


						
						</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4">
						<div class="well">
							<address>
							<strong>Loop, Inc.</strong><br/>
							795 Park Ave, Suite 120<br/>
							Guwahati, CA 94107<br/>
							<abbr title="Phone">P:</abbr> (234) 145-1810 </address>
							<address>
							<strong>Full Name</strong><br/>
							<a href="mailto:#">
							first.last@email.com </a>
							</address>
						</div>
					</div>
					<div class="col-xs-8 invoice-block">
						<ul class="list-unstyled amounts">
							<li>
								<strong>Sub - Total amount:</strong>_____________
							</li>
							<li>
								<strong>Discount:</strong>_____________
							</li>
							<li>
								<strong>VAT:</strong> _____________
							</li>
							<li>
								<strong>Grand Total:</strong>_____________
							</li>
						</ul>
						<br/>
						<a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
						Print <i class="fa fa-print"></i>
						</a>						
					</div>
				</div>
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
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<link href="assets/admin/pages/css/invoice.css" rel="stylesheet" type="text/css"/>
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