<script type="text/javascript">

	$(document).ready(function(){    					
		/*$("#personal").click(function(){
			personal_info();
		});	
		
		$("#paypal").click(function(){
			paypal_info();
		});		*/
		UserManager.editAdminProfile();	
    });
	
</script>
	<style>
	
#paypal_info fieldset input, select, #personal_info fieldset input{
	width:200px;
	    background-position: 10px 6px;
    border: 1px solid #BBBBBB;
    border-radius: 5px 5px 5px 5px;
    box-shadow: 0 2px 2px #CCCCCC inset, 0 1px 0 #FFFFFF;
    color: #666666;
    display: block;
    float: left;
    height: 20px;
    margin: 0px;
    padding-left: 10px;
}
#paypal_info fieldset select{
	width:215px;
	height:25px;
	margin: 0px;
}
label .error{
    display: block;
    float: left;
    font-weight: bold;
    height: 25px;
    line-height: 25px;
    margin: -5px 0 5px;
    padding-left: 10px;
    text-shadow: 0 1px 0 #FFFFFF;
    text-transform: uppercase;
	color:#666666;
}
.error{
width:auto;
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

<?php $this->load->view('admin/sidebar'); ?>
	
	<section id="main" class="column">
		
		<article class="module width_3_quarter" style="width:95%;">
		<header><h3 class="tabs_involved">Personal Information</h3>
		
		</header>
<div class="clear"></div>
		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<form id="personal_info" name="personal_info" action="<?php echo base_url('admin/common/save_personal_info'); ?>" method="post">
				<div class="module_content">
					<fieldset>
						<label>Name</label>
						<input type="text" name="admin_name" value="<?php echo $admin_info['admin_name'];?>">
					</fieldset>
					<fieldset>
						<label>Email</label>
						<input type="text" name="admin_email" value="<?php echo $admin_info['admin_email'];?>">
					</fieldset>
				</div>
					<footer>
					<div class="submit_link">
						<input style="width:60px;" id="personal" type="submit" value="Save">
					</div>
				</footer>
			
			</form>
			</div><!-- end of #tab1 -->
		
			
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		
		<div class="spacer"></div>
	</section>


</body>

</html>
