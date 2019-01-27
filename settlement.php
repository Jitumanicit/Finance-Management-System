<?php require_once(dirname(__FILE__).'/core/class.datamanager.php');?>
<?php require_once(dirname(__FILE__).'/header.php');?>
<?php require_once(dirname(__FILE__).'/sidebar.php');?>	
<?php require_once(dirname(__FILE__).'/penalty.php');?>	
<?php
define("DB_CONN","mysql:dbname=finance");
define("DB_USERNAME","root");
define("DB_PASSWORD","");

							$dbhi=new PDO(DB_CONN, DB_USERNAME, DB_PASSWORD);
							
		
							?>
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
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?filter=date'; ?>">
		
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
							
								<i class="fa fa-user"></i>Settlement Account 
								
							</div>
							
						<div align="right" style="padding-left:10px;">
						
						<?php 
						
						$xyz=datamanager::get_sum_tot('emi_table','settlement','pric');
						foreach ($xyz as $keyxyz);
						echo '<b>Total='.$keyxyz['pric'].'&nbsp;&nbsp;&nbsp;</b>';
						?>
						
						</div>	
						
						<?php 
						
						//$xyz=datamanager::get_sum_tot('rent','amount','pric');
						//foreach ($xyz as $keyxyz);
						//echo '<b>Total='.$keyxyz['pric'].'&nbsp;&nbsp;&nbsp;</b>';
						?>
						
						
						
						<div align="right" style="padding:12px; font-weight:none; font-size:17px;"></div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>

								<th>ID</th>
								<th>Name</th>
								<th>Address</th>
								<th>Date</th>
								<th>Amount</th>
							</tr>
							</thead>
							<tbody>
							<?php
if(isset($_POST['from_date']) && isset($_POST['to_date']))
							{
					
					$from_date=strtotime($_POST['from_date']);
					$from_date=$from_date;
					$to_date=strtotime($_POST['to_date']);
					$to_date=$to_date;
					$sql2 = $dbhi->prepare("SELECT client.id, client.name, client.address, emi_table.payment_date, emi_table.settlement
FROM client
JOIN emi_table
ON client.id=emi_table.client_id WHERE emi_table.settlement > 0 AND emi_table.payment_date BETWEEN '$from_date' AND '$to_date'  ORDER BY `id` DESC");
							}
							else
							{
							$sql2 = $dbhi->prepare("SELECT client.id, client.name, client.address, emi_table.payment_date, emi_table.settlement
FROM client
JOIN emi_table
ON client.id=emi_table.client_id WHERE emi_table.settlement > 0 ORDER BY `id` DESC");
							}		
							$sql2->execute();
							
							
							for($i=0; $key3 = $sql2->fetch(); $i++)
						{
						
						
						
							?>	
							
							<tr class="odd gradeX">
								<!--<td><input type="checkbox" class="checkboxes" value="<?php echo $key3['id'];?>"/></td>-->
								<td><?php echo $key3['id'];?></td>
								<td><?php echo $key3['name'];?></td>
								<td><?php echo $key3['address'];?></td>								
								<td><?php echo date('d-m-Y',$key3['payment_date']);?></td>
								<td><?php echo $key3['settlement'];?></td>	
							
							
				 <?php 
				 					
				 } //for loop end
				 ?>
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
 
  $.ajax({
        url: "process/edit_dealer_process.php",    
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