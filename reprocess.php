<?php require_once(dirname(__FILE__).'/core/class.datamanager.php');?>
<?php require_once(dirname(__FILE__).'/header.php');?>
<?php require_once(dirname(__FILE__).'/sidebar.php');?>	
<?php require_once(dirname(__FILE__).'/penalty.php');?>	
	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">
		<div class="page-content">
			
			
			<!-- BEGIN PAGE HEADER-->
			<h3 class="page-title">
			<?=$_PageTitle[basename($_SERVER['PHP_SELF'],'.php')];?>
			</h3>
			
			<!-- END PAGE HEADER-->
			<!-- BEGIN PAGE CONTENT-->
			<div align="right">
			<form method="post" action="<?php print $_SERVER['PHP_SELF'] ?>">
			From: <input type="date" name="from_date" class="form-control input-small input-inline" />
			To:<input type="date" name="to_date" class="form-control input-small input-inline" />
			<input type="submit" value="Submit" class="btn blue button-next" >
			</form>
			<br/>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">					
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-user"></i>Table
							</div>
							
						</div>
						<div align="center" style="padding-left:10px;">
						
						<?php 
						/*
						$xyz=datamanager::get_sum_emi_table_total('emi_table');
						foreach ($xyz as $keyxyz);
						echo 'Registration='.$keyxyz['reg'].'&nbsp;&nbsp;&nbsp;';
						echo 'Insurance='.$keyxyz['ins'].'&nbsp;&nbsp;&nbsp;';
						echo 'Documentation='.$keyxyz['doc'].'&nbsp;&nbsp;&nbsp;';
						echo 'Documentation='.$keyxyz['fin_com'].'&nbsp;&nbsp;&nbsp;';
						echo 'Interest='.$keyxyz['inte'].'&nbsp;&nbsp;&nbsp;';
						echo 'Net Finance='.$keyxyz['net_fin'].'&nbsp;&nbsp;&nbsp;';
						echo 'Penalty='.$keyxyz['pen'].'&nbsp;&nbsp;&nbsp;';
						/*
						$sum_reg = datamanager::sel("SELECT SUM(registration) FROM emi_table");
							$sum_reg->execute();
								for($i=0; $key3x = $sum_reg->fetch(); $i++)
						{
							echo 'Registration = '.$key3x['registration'].'&nbsp;&nbsp;&nbsp;&nbsp;';
						} */
						?>
						
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
								</th>
								<th>Name</th>
								<th>Email</th>
								<th>Phone</th>
								<th>City</th>
								<th>Status</th>
								<th>Action</th>
								</tr>
							</thead>
							<tbody>
						<?php   
						if(isset($_POST['from_date']) && isset($_POST['to_date']))
							{
								$from_date=strtotime($_POST['from_date']);
								$to_date=strtotime($_POST['to_date']);
								$data = datamanager::get_all_date_filter("client","$from_date","$to_date");
							}
						else
							{
						$data = datamanager::get_all("client");
							}
							foreach ($data as $key ):?>		
						
				 <?php //echo $key['scheme'];
							$paid =  datamanager::count("Select * FROM emi_table where client_id =".$key['id']." AND status = 1");
							$unpaid =  datamanager::count("Select * FROM emi_table where client_id =".$key['id']." AND status = 0");
							$penalty = datamanager::count("Select * FROM emi_table where client_id =".$key['id']." AND penalty > 1 AND status = 0"); 

							if($penalty >2){
							?>
								<tr class="odd gradeX">
								<td><input type="checkbox" class="checkboxes" value="<?php echo $key['id'];?>"/></td>
								<td><?php echo $key['name'];?></td>
								<td><?php echo $key['email'];?></td>
								<td><?php echo $key['phone'];?></td>
								<td><?php echo $key['city'];?></td>								
								<td>
								<?php
								echo '<span class="label label-md label-danger"> Pending </span>';
							
							?>
								</td>
								<td><a class="btn btn-circle btn-sm blue-stripe" href="client_view.php?id=<?=$key['id'];?>" >VIEW<span class="glyphicon glyphicon-user"></span></a></td>
								
							</tr>
								
						<?php } endforeach;?>
							</tbody>
							</table>
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
<script type="text/javascript" src="assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="assets/global/plugins/select2/select2.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/layout.js" type="text/javascript"></script>
<script src="assets/admin/layout/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="assets/global/plugins/bootstrap-toastr/toastr.min.js"></script>
<script src="assets/admin/pages/scripts/table-managed.js"></script>
<script src="assets/admin/pages/scripts/form-validation.js"></script>
<script src="process/search_ajax.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {       
   // initiate layout and plugins
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
QuickSidebar.init(); // init quick sidebar
 TableManaged.init();
 FormValidation.init();
});
</script>
<!-- END JAVASCRIPTS -->

</body>

<!-- END BODY -->
</html>