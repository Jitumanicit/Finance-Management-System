	<?php require_once(dirname(__FILE__).'/core/class.datamanager.php');?>
	<?php require_once(dirname(__FILE__).'/penalty.php');?>	

<?php  
	$_FINANCETYPE  = array('1' => 'Private','2' => 'Commercial' ,'3' => 'Re-finance' );
	$_VEHICLETYPE  = array('2' => 'Two Wheller','3' => 'Three Wheller' ,'4' => 'Four Wheller' );
	$page_title =  basename($_SERVER['PHP_SELF'],'.php');
	
	
	if(isset($_POST['submit_button'])){
		$field= $_POST['tr'];
		$field= explode(',',$field);
		$discount=$_POST['disc'];
$sett=$_POST['sett'];
$s_total=$_POST['total'];
$settle=($s_total - $discount)*($sett/100);
		
		foreach($field as $key){
				echo $key .'<br/>'; echo 'test';
				$token_id=md5(time());
				datamanager::save(array('discount'=>$discount,'settlement'=>$settle,'token_id'=>$token_id,'status'=>'1','payment_receiver' => current_user('name'),'payment_date'=>time()),'emi_table',array('id'=>$key));
				
				$net_finance = datamanager::get_single('net_finance',array('id'=>$key),'emi_table');
				
				$penalty = datamanager::get_single('penalty',array('id'=>$key),'emi_table');
				
				$discount_data = datamanager::get_single('discount',array('id'=>$key),'emi_table');
				
				$settlement_data = datamanager::get_single('settlement',array('id'=>$key),'emi_table');
				
				//$amt =datamanager::get_single('amount',array('id'=>1),'revenue');
				
				//$amt= $net_finance + $penalty + $amt;
				
				$dtm = datamanager::get_single('payment_date',array('id'=>$key),'emi_table');
				
				$particulars='Emi';
				$time_rev=time();
				//$amt= ($net_finance + $penalty) - ($discount_data + $settlement_data);
				 if(role()=='admin') {
$amt=$_REQUEST['gt'];
 }else{ 
$amt=$_REQUEST['total'];
 } 

				
				$time_sav=date('Y-m-d',$time_rev);
				
				datamanager::save(array('particulars'=>$particulars,'credit'=>$amt, 'time'=>$time_sav,'token_id'=>$token_id),'revenue');
				
				
				//$particulars1='Discount';
				//$token_id1=md5(sha1(time()));
				
				//datamanager::save(array('particulars'=>$particulars1,'debit'=>$discount, 'time'=>$time_sav,'token_id'=>$token_id),'revenue');
				//$particulars2='Settlement';
				//$token_id2=sha1(time().session_id());
				
				//datamanager::save(array('particulars'=>$particulars2,'debit'=>$settle, 'time'=>$time_sav,'token_id'=>$token_id),'revenue');
				
				
				
				//datamanager::save(array('time'=>$dtm,'amount'=>$amt),'revenue',array('id'=>1));
				echo $key .'<br/>'; echo 'test';
				$hl1=$_SERVER['PHP_SELF'];
				$gt1=$_GET['id'];
				
				
			}
		
			header("location:$hl1?id=$gt1&test=1");
		}
	
	
	?>
	<?php
	if(isset($_POST['save_button'])){
	$get_emi_id=$_GET['emi_id'];
$gross_emi=$_POST['gross_emi'];
$penalty_old=$_POST['penalty_old'];
$partial_amount=$_POST['partial_amount'];
$amount_to_paid=($gross_emi+$penalty_old)-$partial_amount;
$token_id=md5(time());
datamanager::save(array('net_finance'=>$amount_to_paid,'penalty'=>0,'penalty_rate'=>NULL,'token_id'=>$token_id),'emi_table',array('id'=>$get_emi_id));

	$particulars='Emi';
				$time_rev=time();


				
				$time_sav=date('Y-m-d',$time_rev);
				//$get_emi_token = datamanager::get_single('token_id',array('id'=>$get_emi_id),'emi_table');
				datamanager::save(array('particulars'=>$particulars,'credit'=>$partial_amount, 'time'=>$time_sav,'token_id'=>$token_id),'revenue');					
		
		$hl1=$_SERVER['PHP_SELF'];
				$gt1=$_GET['id'];
			header("location:$hl1?id=$gt1&test=2");
		}
	
	
	?>
<?php require_once(dirname(__FILE__).'/header.php');?>
<?php require_once(dirname(__FILE__).'/sidebar.php');?>	
	<!-- BEGIN CONTENT -->
	<script class="cssdeck" src="qqq/jquery.min.js"></script>
	<?php if(isset($_GET['emi_id'])) { ?>
	<script>
	$(document).ready(function() {
   $('input').keyup(function(d)  {
        
        var a = parseFloat($('#gross_emi').val());
        var b = parseFloat($('#penalty_old').val());
        var c = parseFloat($('#partial_amount').val());

        d = (a+b)-c;
        $('#amount_due').val(d.toFixed(2));
    });
   });
	</script>
	<!--<script>
	$(document).ready(function()
{


    $('input[type=checkbox]:checked').removeAttr('checked');

    var checkboxesH = $('input[type="checkbox"][name="box2[]"]'); 
    checkboxesH.change(function()
    {
        var max = 2;
        var current = checkboxesH.filter(':checked').length;

		var i;
		var tot=0;
		var Val1=[];
		for(i=0;i<current;i++)
		{
        Val1[i] =parseFloat($(checkboxesH.filter(':checked').get(i)).val());
		
		tot=tot + Val1[i];
		}
		
        $('input[type="text"][name="gross_emi"]').val(tot);
        $('input[type="text"][name="penalty_old"]').val(tot);
		$('input[type="text"][name="gt1"]').val(tot);
    });
	
	
	});
	function penalty_fn()
		{
			var x= document.getElementById('gross_emi').value; 
			var y= document.getElementById('penalty_old').value;
			var z= document.getElementById('partial_amount').value;
			var a= (x+y)-z;
			
			document.getElementById('amount_due').value=a;
		}

	</script> -->
	<?php } else { ?>
	
	<script>
	$(document).ready(function()
{


    $('input[type=checkbox]:checked').removeAttr('checked');

    var checkboxesH = $('input[type="checkbox"][name="box2[]"]'); 
    checkboxesH.change(function()
    {
        var max = 2;
        var current = checkboxesH.filter(':checked').length;

		var i;
		var tot=0;
		var Val1=[];
		for(i=0;i<current;i++)
		{
        Val1[i] =parseFloat($(checkboxesH.filter(':checked').get(i)).val());
		
		tot=tot + Val1[i];
		}
		
        $('input[type="text"][name="total"]').val(tot);
        $('input[type="text"][name="gt1"]').val(tot);
		$('input[type="text"][name="gt1"]').val(tot);
    });
	
	
	});
	function diss()
		{
			var x= document.getElementById('total').value; 
			var y= document.getElementById('disc').value;
			var a= document.getElementById('sett').value;
			//var z=x-y-a*0.1;
			var zqa= x-y;
			var zq= (x-y)*a/100;
			var z = zqa - zq;
			
			document.getElementById('gt').value=z;
			document.getElementById('gt').value=z;
		}

	</script>
	<?php } ?>
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
    						 }
							 
							 
							 
							 ?>
				<div class="row invoice-logo">
					<div class="col-xs-6 invoice-logo-space">
						<img src="assets/admin/pages/media/invoice/logo.jpg" class="img-responsive" alt="" height="80" width="140"/>
					</div>
					<div class="col-xs-6">
						<p>

							<?php
							// Prints the day
							echo date("l") . "<br>";

							// Prints the day, date, month, year, time, AM or PM
							echo date(" jS \of F Y ") . "<br>";
							?>
							<span class="muted">
							FINANCE MANAGEMENT SYSTEM</span>
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
						<tr>	<?php if(!isset($_GET['emi_id']))
{	?>																												
							<th>Finance</th>
                            <th>Documentation</th>
							<th>Commission</th>
							<th>Insurance</th>
							<th>Interest</th> <?php } ?>
							<th>Net Finance</th>
							<th>Penalty</th>
							<th>Total</th>
							<th>Emi Date</th>	
<?php if(!isset($_GET['emi_id'])) { ?><th>Payment Receiver/date</th> <?php } else { ?><th>&nbsp;&nbsp;&nbsp;&nbsp;Status</th><?php } ?>                      
						</tr>
						</thead>
						<tbody>

<?php if(isset($_GET['emi_id']))
{
$emi = datamanager::get_all('emi_table', array('id' =>$_GET['emi_id']));

 foreach ($emi as $key): ?>
						<tr>
							
						
							<td>
							<?=CURRENCY." ".$key['net_finance'];?>
							</td>
							<td>
							<?=($key['penalty'])?CURRENCY." ".$key['penalty']:"--";?>
							</td>
							<td>
							<?php $sub_total= $key['net_finance']+$key['penalty'];?>
							<?=CURRENCY." ".$sub_total;?>
							</td>															
							<td>
							<?php echo date('d-m-Y',$key['emi_date']); ?>
								
						</td>
                       
						<td>
                           <?php if($key['status']<1){?> 
                          
							<?php 
							
							
							if($key['penalty']>0 && $key['status']!=1){
									echo'<span class="emi label label-danger label-md">
									<span class="a">
								Penalty</span> </span>';
							}else{
							echo($key['status'])?'<span class=" emi label label-success label-md">
								Paid </span>':'<span class="emi label label-warning label-md">
								UnPaid </span>';
								} ?>
                           <?php }else{?>
                            <?php echo $key['payment_receiver'];?>
                           <?php echo date('d-m-Y',$key['payment_date']);?>
                           <?php }?>
							</td>	
                            
						</tr>
					<?php  endforeach;
					}	

 else { $emi = datamanager::get_all('emi_table', array('client_id' =>$id)); ?>	
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
							<?=($key['penalty'])?CURRENCY." ".$key['penalty']:"--";?>
							</td>
							<td>
							<?php $sub_total= $key['net_finance']+$key['penalty'];?>
							<a href="<?php echo $_SERVER['PHP_SELF'].'?id='.$_GET['id'].'&emi_id='.$key['id']; ?>"><?=CURRENCY." ".$sub_total;?></a>
							</td>															
							<td>
							<?php echo date('d-m-Y',$key['emi_date']); 
							
							
							if($key['penalty']>0 && $key['status']!=1){
									echo'<span class="emi label label-danger label-md">
									<span class="a">
								Penalty</span> </span>';
							}else{
							echo($key['status'])?'<span class=" emi label label-success label-md">
								Paid </span>':'<span class="emi label label-warning label-md">
								UnPaid </span>';
								} ?>
								
						</td>
                       
							<td>
                           <?php if($key['status']<1){?> 
                          
							<input id="box2" name="box2[]" type="checkbox" value="<?php echo $sub_total?>">
                            <input class="checkbox22" name="emi<?php  echo $key['id']?>" type="checkbox" value="<?php echo $key['id']?>">
                           <?php }else{?>
                            <?php echo $key['payment_receiver'];?>
                           <?php echo date('d-m-Y',$key['payment_date']);?>
                           <?php }?>
							</td>
                            
						</tr>
					<?php  endforeach; } ?>	

						
						</tbody>
						</table>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-4">
						<div class="well">
							<address>
							<strong>FINANCE MANAGEMENT SYSTEM</strong><br/>
							
							CENTRAL INSTITUTE OF TECHNOLOGY, KOKRAJHAR:BTAD, ASSAM <br/>
							<abbr title="Phone">Phone No:</abbr> (+91)0000000000</address>
							<address>
							<strong>Full Name</strong><br/>
							<?php echo current_user('name'); ?>
							</address>
						</div>
					</div>
					<div class="col-xs-8 invoice-block">
                    <form action="" method="post">
						<ul class="list-unstyled amounts">
							<li>
								<?php if(isset($_GET['emi_id'])) { ?>
								<strong>Gross Emi:</strong><input type="text"  name="gross_emi" id="gross_emi" readonly="readonly" value="<?php $gross_emi=$key['net_finance']; echo $gross_emi; ?>">
								<?php } else { ?>
								<?php if(role()=='admin'): ?>
								<strong>Sub - Total amount:</strong><input type="text"  name="total" id="total" readonly="readonly" value="">
								<?php endif;?>
								<?php } ?>
							</li>
							</br>
							
							
							<li>
								<?php if(isset($_GET['emi_id'])) { ?>
								<strong>Penalty:</strong><input type="text" name="penalty_old" id="penalty_old" readonly="readonly" value="<?php $penalty_old=$key['penalty']; echo $penalty_old; ?>">
								<?php } else { ?>
								<?php if(role()=='admin'): ?>
								<strong>Discount:</strong><input type="text" name="disc" id="disc" onchange="diss()">
								<?php endif;?>
								<?php } ?>

							</li>
							</br>
							
							<li>
								<?php if(isset($_GET['emi_id'])) { ?>							
								<strong>Partial Amount:</strong><input type="text" name="partial_amount" id="partial_amount" onchange="penalty_fn()">
								<?php } else { ?>
								<?php if(role()=='admin'): ?>
								<strong>Settlement (%):</strong><input type="text" name="sett" id="sett" onchange="diss()">
								<?php endif;?>
								<?php } ?>

							</li>
							</br>
							
							
							<li>
								<?php if(isset($_GET['emi_id'])) { ?>
								<strong>Amount Due:</strong><input type="text" name="amount_due" id="amount_due" readonly="readonly" value="">
								<?php } else { ?>
								<?php if(role()=='admin') { ?>
								<strong>Grand Total:</strong><input type="text" name="gt" id="gt" readonly="readonly" value="">								
							</li>
								<?php }else{ ?>
							<li>
								<strong>Grand Total:</strong><input type="text"  name="total" id="total" readonly="readonly" value="">
								<?php } ?>
							</li>
							
							<?php } 
							$dt=date("d-m-Y",strtotime("now"));
							?>
							<input type="hidden" name="tr" id="Products" value="">
							<input type="hidden" name="sname" id="sname" value="<?php echo current_user('name'); ?>">
							<input type="hidden" name="tdate" id="tdate" value="<?php echo $dt; ?>">
							<input type="hidden" name="cname" id="cname" value="<?php echo $data['name']; ?>">
						</ul>
						<br/>
						<?php if(isset($_GET['emi_id'])) { ?>
						<button type="submit"  class="btn btn-lg blue hidden-print margin-bottom-5" name="save_button" onclick="javascript:window.print();">
						 <b class="fa fa-print">Save & Print</b>
						</button>
						<?php } else { ?>
						<button type="submit" class="btn btn-lg blue hidden-print margin-bottom-5" name="submit_button" onclick="javascript:window.print();">
						Print <i class="fa fa-print"></i>
						<?php } ?>
						</button>						
					</div>
				</div>
				</form>
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
<script>
	$(document).ready(function(e) {

	$(".checkbox22").change(function(event){
    //event.preventDefault();
    var searchIDs = $(".checkbox22:checked").map(function(){
      return $(this).val();
    }).get().join(); // <----
    
	console.log(searchIDs);
	
	$('#Products').val(searchIDs);
	
	var sum = 0;
$('.price').each(function(){
	
    sum += parseFloat(this.value);
});
console.log(sum );
	
});
       
    });
</script>

</body>

<!-- END BODY -->
</html>