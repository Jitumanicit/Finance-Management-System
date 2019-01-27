<?php require_once(dirname(__FILE__).'/core/class.datamanager.php');?>
<?php require_once(dirname(__FILE__).'/header.php');?>
<?php require_once(dirname(__FILE__).'/sidebar.php');?>	

<?php
define("DB_CONN","mysql:dbname=finance");
define("DB_USERNAME","root");
define("DB_PASSWORD","");

							$dbhi=new PDO(DB_CONN, DB_USERNAME, DB_PASSWORD);
							
		if(isset($_GET['delete']) && isset($_GET['confirm']))
				{
					$delete_staff=$_GET['delete'];
					if($_GET['confirm'] == 'yes')
						{
							$sql5 = $dbhi->prepare("DELETE from staff WHERE id=$delete_staff");
							$sql5->execute();
							$sql_adm = $dbhi->prepare("DELETE from admin WHERE id=$delete_staff");
							$sql_adm->execute();
							header("location:staff_list.php?data_succesfully_deleted");
							
						}
				}


/*
if($_POST)
{
echo 'test';
// UPDATE FUNCTION RUN HERE ###########################################################################
$dealer_name=$_POST['dealer_name'];
$client_name=$_POST['client_name'];
$vehicle_type=$_POST['vehicle_type'];
$brand=$_POST['brand'];
$model=$_POST['model'];
$price=$_POST['price'];
$date=$_POST['date'];

$sql3 = $dbhi->prepare("UPDATE dealer_payment SET dealer_name=$dealer_name, 
client_name=$client_name, vehicle type=$vehicle_type, brand=$brand, model=$model, price=$price, date=$date WHERE id=$get_edit");
	$sql3->execute();
	header("location:/finance/dealer_payment.php");
}				
*/							
											
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
			<div class="row">
				<div class="col-md-12 col-sm-12">					
					<div class="portlet box yellow">
						<div class="portlet-title">
							<div class="caption">
							
								<i class="fa fa-user"></i>Staff List 
								
							</div>
							 <?php if(role()=='admin' || role()=='accounts'): ?>
				
					
				
			
							<div align="right" style="padding:12px; font-weight:none; font-size:17px;"><a href="add_staff.php">Add Staff</a></div>
						</div>
						<div class="portlet-body">
							<table class="table table-striped table-bordered table-hover" id="sample_2">
							<thead>
							<tr>
								<!--<th class="table-checkbox">
									<input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes"/>
									
								</th>-->
								<th></th>
								<th>ID</th>
								<th>Name</th>
                                <th>Address</th>
                                <th>Phone</th>
								<th>Role</th>
                                <th>Salary</th>
								<th>Setting</th>
							</tr>
							</thead>
							<tbody>
						<?php   
						
						// NEW DATA INSERT
						
						
		
		
						
						//NEW DATA INSERT
						
						
						
						
						//$data = datamanager::get_allx("dealer_payment");
							//foreach ($data as $key ):
							
							



/*------------------------------------------------------DELETE FUNCTION RUN HERE----------------------*/




if(isset($_GET['delete']) && !isset($_GET['edit']) && !isset($_GET['view']))
$delete_staff=$_GET['delete'];
{
							
							$sql4 = $dbhi->prepare("SELECT * FROM  staff WHERE id=$delete_staff");
									
							$sql4->execute();
							
							
							for($i=0; $key3 = $sql4->fetch(); $i++)
						{
						
						
						
							?>	
							
							<tr class="odd gradeX">
							<!--<td><input type="checkbox" class="checkboxes" value="<?php echo $key3['id'];?>"/></td>-->
								<td><?php // echo $key3['id'];?></td>
								<td><?php echo $key3['id'];?></td>
                                <td><?php echo $key3['name'];?></td>
                                <td><?php echo $key3['address'];?></td>
								<td><?php echo $key3['phone'];?></td>	
								<td><?php echo ucwords($key3['role']);?></td>
                                	
								<!-- <td> -->
								<td>
                                <?php if($key3['id']==1) { ?>
								
								
									<div class="btn-toolbar margin-bottom-10">
														<div class="btn-group btn-group-sm btn-group-solid">
                                                       <a class="btn btn-circle btn-sm blue-stripe" href="staff1.php.php?id=<?=$key['id'];?>" >VIEW<span class="glyphicon glyphicon-user"></span></a>
														</div>
													</div>
								
								<?php }?></td>
																	<td>
										<div class="btn-toolbar margin-bottom-10">
														<div class="btn-group btn-group-sm btn-group-solid">															
												<a href="<?php echo $_SERVER['PHP_SELF']."?delete=".$key3['id'].'&confirm=yes';?>" class="btn green">CONFIRM</a>
															<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn red">CANCEL</a>
														</div>
													</div>
							</td>
							</form>
				 <?php 
				 					
				 } //for loop end
				 
				 } // if isset delete




/*--------------------------------------------DELETE FUNCTION END HERE-----------------------------------*/









							
if(isset($_GET['edit']) && !isset($_GET['delete']) && !isset($_GET['view']))
{
// EDIT FUNCTION ######################################################################
$get_edit_id=$_GET['edit'];
	header("location:edit_staff.php?id=$get_edit_id");
?>





		<form name="edit_staff" id="edit_staff" method="POST" novalidate="novalidate" action="<?php  echo $_SERVER['PHP_SELF']."?edit=".$key3['id'];?>">
<?php		


$get_edit=$_GET['edit'];
$sql2 = $dbhi->prepare("SELECT * FROM  staff WHERE id=$get_edit");
	$sql2->execute();
							
	
							for($i=0; $key3 = $sql2->fetch(); $i++)
						{
						?>	

							<tr class="odd gradeX">
								<td><input style="new_input_text" type="checkbox" class="checkboxes" value="<?php echo $key3['id'];?>"/></td>
								<td><input class="new_input_text" type="text" name="name" value="<?php 
								if($_POST['name'])
								{
								echo 'test';
								}
								echo $key3['name'];
								?>"/></td>
								<td><input class="new_input_text" type="text" name="address" value="<?php echo $key3['address'];?>"/></td>
                                <td><input class="new_input_text" type="text" name="phone" value="<?php echo $key3['phone'];?>"/></td>
								<td><input class="new_input_text" type="text" name="role" value="<?php echo $key3['role'];?>"/></td>
								<!-- <td> -->
								<td>
								<div class="btn-toolbar margin-bottom-10">
														<div class="btn-group btn-group-sm btn-group-solid">
                                                       <a class="btn btn-circle btn-sm blue-stripe" href="staff_info.php?id=<?=$key['id'];?>" >VIEW<span class="glyphicon glyphicon-user"></span></a>
														</div>
													</div>
													</td>
									<td>
										<div class="btn-toolbar margin-bottom-10">
														<div class="btn-group btn-group-sm btn-group-solid">	
										<input type="submit" name="save" value="SAVE" class="btn green" />
															<!--<a href="<?php //echo$_SERVER['PHP_SELF']."?save=".$key3['id'];?>" class="btn green">SAVE</a>-->
															<a href="<?php echo $_SERVER['PHP_SELF'];?>" class="btn red">CANCEL</a>
														</div>
													</div>
									</td>
									
									
				 <?php 
			 					
				 } //for loop end
				 
				



if(isset($_GET['view']) && !isset($_GET['edit']) && !isset($_GET['delete']))
{
// VIEW FUNCTION ######################################################################
$get_view_id=$_GET['view'];
if($key3['id']==1)
	header("location:staff1.php?id=$get_view_id");
	if($key3['id']==2)
	header("location:staff2.php?id=$get_view_id");
	if($key3['id']==3)
	header("location:staff3.php?id=$get_view_id");
	if($key3['id']==4)
	header("location:staff4.php?id=$get_view_id");
	if($key3['id']==5)
	header("location:staff5.php?id=$get_view_id");
	if($key3['id']==6)
	header("location:staff6.php?id=$get_view_id");
	if($key3['id']==7)
	header("location:staff7.php?id=$get_view_id");
	if($key3['id']==8)
	header("location:staff8.php?id=$get_view_id");
	if($key3['id']==9)
	header("location:staff9.php?id=$get_view_id");
	if($key3['id']==10)
	header("location:staff10.php?id=$get_view_id");
	if($key3['id']==11)
	header("location:staff11.php?id=$get_view_id");
	if($key3['id']==12)
	header("location:staff12.php?id=$get_view_id");
	if($key3['id']==13)
	header("location:staff13.php?id=$get_view_id");
	if($key3['id']==14)
	header("location:staff14.php?id=$get_view_id");
	if($key3['id']==15)
	header("location:staff15.php?id=$get_view_id");
	if($key3['id']==16)
	header("location:staff16.php?id=$get_view_id");



?>





				 <?php 
			 					
				 } //for loop end
				 
			echo	 '</form>';	

############################################################################################



				 
}
if(!isset($_GET['delete']) && !isset($_GET['edit']) && !isset($_GET['view']))
{
							
							$sql2 = $dbhi->prepare("SELECT * FROM staff ORDER BY `id` DESC");
									
							$sql2->execute();
							
							
							for($i=0; $key3 = $sql2->fetch(); $i++)
						{
						
						
						
							?>	
							
							<tr class="odd gradeX">
								<!--<td><input type="checkbox" class="checkboxes" value="<?php echo $key3['id'];?>"/></td>-->
								<td><?php // echo $key3['id'];?></td>
								<td><?php echo $key3['id'];?></td>
                                <td><?php echo $key3['name'];?></td>
                                <td><?php echo $key3['address'];?></td>
								<td><?php echo $key3['phone'];?></td>	
								<td><?php echo ucwords($key3['role']);?></td>
								<!-- <td> -->
                                <td>
                               
                                <div class="btn-toolbar margin-bottom-10">
														<div class="btn-group btn-group-sm btn-group-solid">
                                                       <a class="btn btn-circle btn-sm blue-stripe" href="<?php echo "staff".$key3['id'].".".php;?>" >VIEW<span class="glyphicon glyphicon-user"></span></a>
														</div>
													</div>
                              
									<td>
										<div class="btn-toolbar margin-bottom-10">
														<div class="btn-group btn-group-sm btn-group-solid">
                                                        																
															<a href="<?php echo$_SERVER['PHP_SELF']."?edit=".$key3['id'];?>" class="btn green">EDIT</a>
															<a href="<?php echo$_SERVER['PHP_SELF']."?delete=".$key3['id'];?>" class="btn red">DELETE</a>
														</div>
													</div>
							</td>
							</form>
				 <?php 
				 					
				 } //for loop end
				 } //else
				 //-------------------------------------TEMP-------------------------------------------------
				 //echo $key['scheme'];
							//$paid =  datamanager::count("Select * FROM dealer_payment where client_id =".$key['id']." AND status = 1");
							//$unpaid =  datamanager::count("Select * FROM dealer_payment where client_id =".$key['id']." AND status = 0");
							//$penalty = datamanager::count("Select * FROM dealer_payment where client_id =".$key['id']." AND penalty > 1 AND status = 0"); 

							//if($penalty >0){
							//	echo '<span class="label label-md label-danger"> Over Due </span>';
							//}elseif($unpaid <= 0 || $paid == $key['scheme']){
							//	echo '<span class="label label-md label-success"> Cleared </span>';
							//}else{
								//echo '<span class="label label-md label-warning"> UnPaid </span>';
							//}
//-------------------------------------------------------TEMP-------------------------------------------------------------
							?>

								<!-- </td> -->
								<!-- <td><a class="btn btn-circle btn-sm blue-stripe" href="dealer_payment.php?id=<?=$key['id'];?>" >VIEW<span class="glyphicon glyphicon-user"></span></a></td> -->
										
							</tr>
						<?php 
						//} 
						// for loop
						//endforeach;
						?>
							</tbody>
							</table>
						</div>
						<?php endif;?>
					</div>		

			
			<!-- END PAGE CONTENT-->
		</div>
	</div>
	<?php if(role()!='admin' && role()!='accounts'): ?>	
<div align="center"><b><font size="5" color="red">Access denied.</font><br/> <font size="3" color="red">You don't have permission to view this page.</font></b>
</div>
<?php endif;?>	
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
