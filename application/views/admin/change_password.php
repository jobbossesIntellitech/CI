	<script type="text/javascript">

	$(document).ready(function(){    					
	UserManager.changePassword();	
    
    });
	
</script>
	<style>
.page input{
	width:320px;
	    background-position: 10px 6px;
    border: 1px solid #BBBBBB;
    border-radius: 5px 5px 5px 5px;
    box-shadow: 0 2px 2px #CCCCCC inset, 0 1px 0 #FFFFFF;
    color: #666666;
    display: block;
    float: left;
    height: 20px;
}
    label.error {
    display: block;
    float: left;
    font-weight: bold;
    height: 25px;
    line-height: 34px;
    margin: -5px 0 5px;
    padding-left: 10px;
    text-shadow: 0 1px 0 #FFFFFF;
    text-transform: uppercase

}
.submit_link{

padding:5px 0 0 0;
}
	</style>
	<section id="secondary_bar">
		<div class="user">
			<p>Admin Panel</p>
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo base_url('admin');?>">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo $menu_title; ?></a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo $title; ?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	
<?php $this->load->view('admin/sidebar');?>
	
	<section id="main" class="column">
    <h4 class="alert_success" style="display:none;"></h4>
		<article class="module width_3_quarter" style="width:95%;">
		<header><h3 class="tabs_involved">Change Password</h3>
	
		</header>
		<form action="" method="post" id="chng_pwd" name="chng_pwd">
		<div class="tab_container page">
			<div id="tab1" class="tab_content">

			<table class="tablesorter" cellspacing="0" style="float:left; text-align:center;"> 
				<tr>
						<td width="22%">Old Password:</td>
						<td><input type="password" name="old_password" id="old_password" class="required" /></td>
				</tr>
				<tr>
						<td style="vertical-align:top;">
							New Password:
						</td>
						<td><input type="password" name="password" id="password"  class="required"/>
						</td>
				</tr>
        		<tr>
						<td style="vertical-align:top;">
							Confirm New Password:
						</td>
						<td><input type="password" name="confirm_password" id="confirm_password"  class="required"/>
						</td>
				</tr>
			</table>
		
			</div>
			
		</div><!-- end of .tab_container -->
		<div class="clear"></div>
			<footer>
					<div class="submit_link">
						<!--<img src="<?php //echo base_url(); ?>images/admin/submit_btn.png" id="change_pass_button" width="74px">-->
						<input type="submit" value="Submit">
					</div>
			</footer>
			</form>
		</article><!-- end of content manager article -->
		
	
		
		<div class="clear"></div>

		<div class="spacer"></div>
	</section>


</body>

</html>
