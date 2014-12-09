<script type="text/javascript">

	$(document).ready(function(){    					
		UserManager.chkLogin();	
    });
	
</script>

	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin Panel</p>
	
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo base_url('admin');?>">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo $title; ?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	
<?php $this->load->view('admin/sidebar');?>
	

<section id="main" class="column">
				
		<div class="clear"></div>
		
		<article class="module width_full">
			<header><h3>Admin Login</h3></header>
				<div class="module_content">
					<form action="" name="login_frm" id= "login_frm" method="post">
						<div class="module_content login_frm">
								<fieldset>
									<label>Username</label>
									<input type="text" id="username" name="username">
								</fieldset>
								<fieldset>
									<label>Password</label>
									<input type="password" id="password" name="password" >
								</fieldset>		
							<div class="clear"></div>
						</div>
						<footer>
							<div class="submit_link"><span id="error"></span>
								<input type="submit" value="Login">
							</div>
						</footer>
					</form>
		</article><!-- end of post new article -->		
		<div class="spacer"></div>
	</section>