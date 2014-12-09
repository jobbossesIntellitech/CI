<script type="text/javascript">

	$(document).ready(function(){    					
		UserManager.editNewsletter();	
    });
	
</script>
<style>
#mceu_20
{
	margin-left:20%;

}
</style>
<?php 


	$controller = $this->uri->segment(2);
	$controller_url = 'admin/'.$controller;
	$news_id = $this->uri->segment(4);
	
	
 // debug($get_all_medias);
?>

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
		<header><h3 class="tabs_involved">Edit Newsletter</h3>
	
		</header>
		<?php //debug($all_history); ?>
		<div class="tab_container">
			<form id="newsletter_subs" name="newsletter_subs" action="<?php echo base_url('admin/newsletter/update_newsletter_template'); ?>" method="post">
				<div class="module_content">
					<fieldset>
						<label>Newsletter Subject :</label>
						<input type="text" id="newsletter_title" name="newsletter_title" value="<?php echo $get_newsletter_info['newsletter_title'];?>" />
						<input type="hidden" name="newsletter_id" value="<?php echo $news_id;?>" />
					</fieldset>
					<fieldset>
						<label>Newsletter Description :</label>
						<textarea id="newsletter_desc" name="newsletter_desc" ><?php echo $get_newsletter_info['newsletter_desc'];?></textarea>
						<input type="hidden" name="newsletter_id" value="<?php echo $news_id;?>" />
					</fieldset>
				</div>
					<footer>
					<div class="submit_link">
						<input style="width:60px;" id="personal" type="submit" value="Save">
					</div>
				</footer>
			
			</form>
		</div>
		</article><!-- end of content manager article -->
		<div class="spacer"></div>
	</section>
