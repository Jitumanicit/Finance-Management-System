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
			<?php if(isset($_GET['type'])) 
			{ 
			?>
			<form method="post" action="<?php echo $_SERVER['PHP_SELF'].'?type='.$_GET['type'];?>&filter=date">
			<?php
			}
			else
			{
			?>
			<form method="post" action="revenue.php?filter=date">
			<?php
			}
			?>
			From: <input type="date" name="from_date" class="form-control input-small input-inline" />
			To:<input type="date" name="to_date" class="form-control input-small input-inline" />
			<input type="submit" value="Submit" class="btn blue button-next" >
			</form>
			</div>
			<br/>
			<div align="center" style="padding:7px; font-weight:bold">
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=finance' ?>">Finance</a> | 
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=emi' ?>">Emi</a> | 
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=salary' ?>">Salary</a> | 
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=office_expenses' ?>">Office Expenses</a> | 
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=rent' ?>">Rent</a> | 
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=interest_payment' ?>">Interest</a> |
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=reprocess_charge_recieved' ?>">Reprocess Recieved</a> | 
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=reprocess_boy_payment' ?>">Reprocess Payment</a> | 
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=collection_charge_received' ?>">Collection Received</a> | 
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=collection_payment_account' ?>">Collection Payment</a> |
			<a href="<?php print $_SERVER['PHP_SELF'].'?type=remuneration' ?>">Remuneration</a>
			</div>
			<div class="row">
				<div class="col-md-12 col-sm-12">					
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
							
								<i class="fa fa-user"></i>Revenue Account 
								
							</div>
		
						</div>
						<div align="right" padding:15px; style="font-weight:bold;">
							<?php
							/* -----------------------------------------------------------------------------------------------------
							
							$sql_client_revenue_ifexist = $dbhi->prepare("SELECT  token_id FROM revenue;");
							$sql_client_revenue_ifexist->execute();
			for($y=0; $client_revenue_ifexist=$sql_client_revenue_ifexist->fetch(); $y++)				

{
							
							$sql_client_revenue_insert = $dbhi->prepare("SELECT  token_id, time, finance_amount FROM client;");
							$sql_client_revenue_insert->execute();
							
							
			for($x=0; $client_revenue_insert=$sql_client_revenue_insert->fetch(); $x++)				


{

if($client_revenue_ifexist['token_id'] != $client_revenue_insert['token_id'])

							
							
	{						
							
							
							
							
							
		$particulars_type='Finance';
$date_call=$client_revenue_insert['time'];
$date=date('Y-m-d',$date_call);
$token_id=$client_revenue_insert['token_id'];
$amount=$client_revenue_insert['finance_amount'];

							$mysql_insert_revenue_client = $dbhi->prepare("INSERT INTO `finance`.`revenue` 
(`particulars`,`debit`,`time`,`token_id`) 
VALUES 
('$particulars_type','$amount','$date','$token_id')");
$mysql_insert_revenue_client->execute();

} //if not

							} //for
							
							
							
} //for							

------------------------------------------------------------------------------------------------------------------------------------------							
*/ 

?>
<?php							
							if(isset($_GET['type']))
							{
							$type_pr=$_GET['type'];
							
							if(isset($_POST['from_date']) && isset($_POST['to_date']))
			{
					
					$from_date=$_POST['from_date'];
					$to_date=$_POST['to_date'];
			        $sqlzz=$dbhi->prepare("SELECT  
        SUM(credit) AS cred, 
        SUM(debit) AS deb,
        SUM(credit) -  SUM(debit) total
FROM revenue WHERE particulars='$type_pr' AND time BETWEEN '$from_date' AND '$to_date'");
					
					
			}
			else
			{
									$sqlzz = $dbhi->prepare("SELECT  
        SUM(credit) AS cred, 
        SUM(debit) AS deb,
        SUM(credit) -  SUM(debit) total
FROM revenue WHERE particulars='$type_pr';");
			}
							$sqlzz->execute();
							//$sqlzz->fetch();
	
							for($i=0; $key3x = $sqlzz->fetch(); $i++)
						{
						
						if($key3x['cred'] == 0)
						{
						echo 'Debit Total = '.$key3x['deb'].'&nbsp;&nbsp;&nbsp;&nbsp;';
						}
						if($key3x['deb'] == 0)
						{
						echo 'Credit Total = '.$key3x['cred'].'&nbsp;&nbsp;&nbsp;&nbsp;';
						//echo 'Debit Total = '.$key3x['deb'].'&nbsp;&nbsp;&nbsp;&nbsp;';
					//	echo 'Net Profit = '.$key3x['total'].'&nbsp;&nbsp;&nbsp;&nbsp;';
						
						}
						} //for loop
							
							} //isset type
							if(!isset($_GET['type']))
							{
							
							
							if(isset($_POST['from_date']) && isset($_POST['to_date']))
			{
					
					$from_date=$_POST['from_date'];
					$to_date=$_POST['to_date'];
			        $sqlzz=$dbhi->prepare("SELECT  
        SUM(credit) AS cred, 
        SUM(debit) AS deb,
        SUM(credit) -  SUM(debit) total
FROM revenue WHERE time BETWEEN '$from_date' AND '$to_date'");
					
					
			}
			else
			{
							$sqlzz = $dbhi->prepare("SELECT  
        SUM(credit) AS cred, 
        SUM(debit) AS deb,
        SUM(credit) -  SUM(debit) total
FROM revenue;");
			}			
			$sqlzz->execute();
							//$sqlzz->fetch();
	
							for($i=0; $key3x = $sqlzz->fetch(); $i++)
						{
						if($key3x['cred'] == 0) { $key3x['cred'] =0; $key3x['total'] = 0 - $key3x['deb'];}
						if($key3x['deb'] == 0) { $key3x['deb'] =0; $key3x['total'] = $key3x['cred'] - 0 ;}
						echo 'Credit Total = '.$key3x['cred'].'&nbsp;&nbsp;&nbsp;&nbsp;';
						echo 'Debit Total = '.$key3x['deb'].'&nbsp;&nbsp;&nbsp;&nbsp;';
						echo 'Net Profit = '.$key3x['total'].'&nbsp;&nbsp;&nbsp;&nbsp;';
						
						}
						 } //not isset type
							?>
							</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<!--<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
									
								</th>-->
								<th>ID</th>
								<!--<th>ID</th>-->
								<th>Date</th>
							<th>Particulars</th>
								
								<th>Debit</th>
								<th>Credit</th>
							</tr>
							</thead>
							<tbody>
							
						<?php   							
if(isset($_GET['type']))
{
$get_type=$_GET['type'];
if(isset($_POST['from_date']) && isset($_POST['to_date']))
			{
					
					$from_date=$_POST['from_date'];
					$to_date=$_POST['to_date'];
			        $sql2=$dbhi->prepare("SELECT * FROM `revenue` WHERE particulars='$get_type' AND time BETWEEN '$from_date' AND '$to_date'");
					$sql2->execute();
					
			}
else{			

$sql2 = $dbhi->prepare("SELECT * FROM  revenue WHERE particulars='$get_type'");
	$sql2->execute();
	}
							
	
							for($i=0; $key3 = $sql2->fetch(); $i++)
						{
						?>	
						
								<tr class="odd gradeX">
								<!--<td><input type="checkbox" class="checkboxes" value="<?php echo $key3['id'];?>"/></td>-->
								<td><?php  echo $key3['id'];?></td>
								<!--<td><?php // echo $key3['id'];?></td>-->
								<td><?php echo $key3['time'];?></td>
								<td><a href=<?php echo $_SERVER['PHP_SELF']."?type=".strtolower($key3['particulars']);?> /><?php echo ucwords($key3['particulars']); ?></a></td>
								
								<td><?php echo $key3['debit'];?></td>	
								<td><?php echo $key3['credit'];?></td>
								
				 <?php 
			 					
				 } //for loop end
				 
}
if(!isset($_GET['type']))
{


if(isset($_POST['from_date']) && isset($_POST['to_date']))
			{
					
					$from_date=$_POST['from_date'];
					$to_date=$_POST['to_date'];
			        $sql2=$dbhi->prepare("SELECT * FROM `revenue` WHERE time BETWEEN '$from_date' AND '$to_date'");
					$sql2->execute();
					
			}
else
{			


							
							$sql2 = $dbhi->prepare("SELECT * FROM  revenue  ORDER BY `id` DESC");
									
							$sql2->execute();
}							
							
							for($i=0; $key3 = $sql2->fetch(); $i++)
						{
						
						
						
							?>	
							
							<tr class="odd gradeX">
								<!--<td><input type="checkbox" class="checkboxes" value="<?php echo $key3['id'];?>"/></td>-->
								<td><?php  echo $key3['id'];?></td>
								<!--<td><?php // echo $key3['id'];?></td>-->
								<td><?php echo $key3['time'];?></td>
								<td><a href=<?php echo $_SERVER['PHP_SELF']."?type=".strtolower($key3['particulars']);?> /><?php echo ucwords($key3['particulars']); ?></a></td>
								
								<td><?php echo $key3['debit'];?></td>	
								<td><?php echo $key3['credit'];?></td>
									
									
								<!-- <td> -->
								<!--	<td>
										<div class="btn-toolbar margin-bottom-10">
														<div class="btn-group btn-group-sm btn-group-solid">															
															<a href="<?php echo$_SERVER['PHP_SELF']."?edit=".$key3['id'];?>" class="btn green">EDIT</a>
															<a href="<?php echo$_SERVER['PHP_SELF']."?delete=".$key3['id'];?>" class="btn red">DELETE</a>
														</div>
													</div>
							</td> -->
							
				 <?php 
				 					
				 } //for loop end
				 } //else
		
							?>
	
							</tr>
			
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