	
	<section id="secondary_bar">
		<div class="user">
			<p>Admin Panel</p>
	
		</div>
		<div class="breadcrumbs_container">
			<article class="breadcrumbs"><a href="<?php echo base_url('admin');?>">Website Admin</a> <div class="breadcrumb_divider"></div> <a class="current"><?php echo $title; ?></a></article>
		</div>
	</section><!-- end of secondary bar -->
	
<?php $this->load->view('admin/sidebar'); ?>
	
	<section id="main" class="column">
		<?php if($this->session->userdata('login_message')) { ?>
		<h4 class="alert_info"><?php echo $this->session->userdata('login_message');  $this->session->unset_userdata("login_message");?></h4>
		<?php } ?>		
		
		
		
		
	
		
	
		<article class="module width_full">
			<header><h3>Dashboard Information</h3></header>
				<div class="module_content" style="height:100px; text-align:center;">
					<h1 style="padding:25px;">Admin Panel</h1>
				</div>
		</article><!-- end of styles article -->
		<div class="spacer"></div>
	</section>


</body>

</html>
