<!-- BEGIN QUICK SIDEBAR -->
	<a href="javascript:;" class="page-quick-sidebar-toggler"><i class="icon-close"></i></a>
	<div class="page-quick-sidebar-wrapper">
		<div class="page-quick-sidebar">
			<div class="nav-justified">
				<ul class="nav nav-tabs nav-justified">
					<li class="active">
						<a href="#quick_sidebar_tab_1" data-toggle="tab">
						Quick Settings
						</a>
					</li>
					<li class="form-group hide" style="display:none !important;">
						<a href="#quick_sidebar_tab_2" data-toggle="tab">
						commercial
						</a>
					</li>
					<li class="form-group hide" style="display:none !important;">
						<a href="#quick_sidebar_tab_3" data-toggle="tab">
						Alerts <span class="badge badge-success">7</span>
						</a>
					</li>					
				</ul>
				<div class="tab-content">
					<div class="tab-pane active page-quick-sidebar-settings" id="quick_sidebar_tab_1">
						<div class="page-quick-sidebar-settings-list">
							<h3 class="list-heading">Private Settings</h3>
							<form action="#" id="form_sample_1" class="form-horizontal">
							<ul class="list-items borderless">
								<li class="form-group">
									 Registration fee <input type="text" autocomplete="off" value="<?php echo $_private['p_registration'];?>" class="form-control settings" name="p_registration"/>
								</li>
								<li class="form-group">
									 Insurance <input type="text" autocomplete="off" value="<?php echo $_private['p_insurance'];?>" class="form-control settings" name="p_insurance"/>
								</li>
								<li class="form-group">
									 Processing charge <input type="text" autocomplete="off" value="<?php echo $_private['p_processing'];?>" class="form-control settings" name="p_processing"/>
								</li>
								<li class="form-group">
									Finance commission <input type="text" autocomplete="off" value="<?php echo $_private['p_finance_commission'];?>" class="form-control settings" name="p_finance_commission"/>
								</li>
								<li class="form-group">
									Interest <input type="text" autocomplete="off" value="<?php echo $_private['p_interest'];?>" class="form-control settings" name="p_interest"/>
								</li>
							</ul>							
							<div class="inner-content">
								<button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
							</div>
							</form>
							<h3 class="list-heading">Commercial/ReFinance Settings</h3>
							<form action="#" id="form_sample_2" class="form-horizontal">
							<ul class="list-items borderless">
								<li class="form-group">
									 Registration fee <input type="text" autocomplete="off"  value="<?php echo $_commercial['c_registration'];?>" class="form-control settings" name="c_registration"/>
								</li>
								<li class="form-group">
									 Insurance <input type="text" autocomplete="off" value="<?php echo $_commercial['c_insurance'];?>"  class="form-control settings" name="c_insurance"/>
								</li>
								<li class="form-group">
									 Processing charge <input type="text" autocomplete="off" value="<?php echo $_commercial['c_processing'];?>"  class="form-control settings" name="c_processing"/>
								</li>
								<li class="form-group">
									Finance commission <input type="text" autocomplete="off" value="<?php echo $_commercial['c_finance_commission'];?>"  class="form-control settings" name="c_finance_commission"/>
								</li>
								<li class="form-group">
									Interest <input type="text" autocomplete="off" value="<?php echo $_commercial['c_interest'];?>"  class="form-control settings" name="c_interest"/>
								</li>
							</ul>													
							<div class="inner-content">
								<button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
							</div>
							</form>	
						</div>
					</div>
					
					<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_2">
						<div class="page-quick-sidebar-settings-list">
							<h3 class="list-heading">General Settings</h3>
							<ul class="list-items borderless">
								<li class="form-group">
									 Enable Notifications <input type="text" class="form-control" name="fullname"/>
								</li>
								<li class="form-group">
									 Allow Tracking <input type="text" class="form-control" name="fullname"/>
								</li>
								<li class="form-group">
									 Log Errors <input type="text" class="form-control" name="fullname"/>
								</li>
								<li class="form-group">
									 Auto Sumbit Issues <input type="text" class="form-control" name="fullname"/>
								</li>
								<li class="form-group">
									 Enable SMS Alerts <input type="text" class="form-control" name="fullname"/>
								</li>
							</ul>							
							<div class="inner-content">
								<button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
							</div>
						</div>
					</div>
					<div class="tab-pane page-quick-sidebar-settings" id="quick_sidebar_tab_3">
						<div class="page-quick-sidebar-settings-list">
							<h3 class="list-heading">General Settings</h3>
							<ul class="list-items borderless">
								<li class="form-group">
									 Enable Notifications <input type="text" class="form-control" name="fullname"/>
								</li>
								<li class="form-group">
									 Allow Tracking <input type="text" class="form-control" name="fullname"/>
								</li>
								<li class="form-group">
									 Log Errors <input type="text" class="form-control" name="fullname"/>
								</li>
								<li class="form-group">
									 Auto Sumbit Issues <input type="text" class="form-control" name="fullname"/>
								</li>
								<li class="form-group">
									 Enable SMS Alerts <input type="text" class="form-control" name="fullname"/>
								</li>
							</ul>							
							<div class="inner-content">
								<button class="btn btn-success"><i class="icon-settings"></i> Save Changes</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END QUICK SIDEBAR -->