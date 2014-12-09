<?php 

	$controller = $this->uri->segment(2);
	$controller_url = 'admin/'.$controller;
 // debug($get_all_medias);
?>
<style>
.export_class{
background: #D0D1D4 url(../images/btn_submit.png) repeat-x;
border: 1px solid #A8A9A8;
-webkit-box-shadow: 0 1px 0 #fff;
-moz-box-shadow: 0 1px 0 #fff;
box-shadow: 0 1px 0 #fff;
font-weight: bold;
height: 60px !important;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
padding: 0 10px;
color: #666 !important;
text-shadow: 0 1px 0 #fff;
cursor: pointer;

}
</style>
<script>
function abc()
{
	$("#export_form").hide();
	$("#upload_form").show();

}
</script>
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
		
		<?php if (isset($error)): ?>
		<h4 class="alert_error"><?php echo strip_tags($error); ?></h4>
		 <?php endif; ?>
		 <?php if ($this->session->flashdata('success') == TRUE): ?>
		<h4 class="alert_success"><?php echo $this->session->flashdata('success'); ?></h4>
		 <?php endif; ?>
	
		<article class="module width_3_quarter" style="width:95%;">
		<header><h3 class="tabs_involved"><?php if($this->session->userdata('export_data')) {?>Upload Csv <?php } else { echo "Export Csv"; }?></h3></header>
		<?php //debug($all_history); ?>
		<div class="tab_container">
			<?php if(!$this->session->userdata('export_data')) {?>
			<form name="export_form" id="export_form" method="post" action="<?php echo base_url(); ?>admin/export">
				<div class="module_content">
					<fieldset>
						<p style="margin:0 10px 10px 10px;"><b>For uploading the csv file please first check the format of Csv file</b></p>
					<p style="margin:0 10px 10px 10px;"><a class="export_class" href="<?php echo base_url();?>uploads/book.csv" onclick="abc();" >Export</a>
					<input type="hidden" name="export" value="addressbook" /></p>
					</fieldset>
				</div>
			</form>
			<?php } 
			?>
		
			<form method="post" action="<?php echo base_url();?>admin/upload/importcsv" enctype="multipart/form-data" id="upload_form" style="display:none;">
				<div class="module_content">
					<fieldset>
						<label>Upload CSV file :</label>
						<input type="file" name="userfile" >
					</fieldset>
				</div>
				<footer>
					<div class="submit_link">
						 <input type="submit" name="submit" value="UPLOAD" >
					</div>
				</footer>
			
			</form>
			
		
		</div>
		</article><!-- end of content manager article -->
		
		
		<div class="spacer"></div>
	</section>