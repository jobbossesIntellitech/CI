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
		
		<?php if($this->session->flashdata('alert_success')) { ?>
		<h4 class="alert_success"><?php echo $this->session->flashdata('alert_success'); ?></h4>
		<?php } else if($this->session->flashdata('alert_error')) { ?>
		<h4 class="alert_error"><?php echo $this->session->flashdata('alert_error'); ?></h4>
		<?php } else if($this->session->flashdata('alert_warning')) { ?>
		<h4 class="alert_warning"><?php echo $this->session->flashdata('alert_warning'); ?></h4>
		<?php } ?>	
		<article class="module width_3_quarter" style="width:95%;">
		<header><h3 class="tabs_involved">Personal Information</h3>
		
		</header>

		<div class="tab_container">
			<div id="tab1" class="tab_content">
			<table class="tablesorter" cellspacing="0" style="float:left; text-align:left; padding:0 10%;"> 
				<tr>
					<th width="25%">Name</th>
					<td  id="name" width="75%"><?php echo $admin_info['admin_name'];?></td>
				</tr>
				<tr>
					<th>Email</th>
					<td><?php echo $admin_info['admin_email'];?></td>
				</tr>
			</table>
			</div><!-- end of #tab1 -->
			
		</div><!-- end of .tab_container -->
		
		</article><!-- end of content manager article -->
		
		
		<div class="spacer"></div>
	</section>


</body>

</html>
