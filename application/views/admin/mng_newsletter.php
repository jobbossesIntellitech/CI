<?php 

	$controller = $this->uri->segment(2);
	$controller_url = 'admin/'.$controller;
 // debug($get_all_medias);
?>

<script type="text/javascript">
		$(document).ready(function() {
		
			$('.fancybox').fancybox();
		});
	</script>
	<script>
	function abc(value)
	{
		$('#template_id').val(value);
		$('#temp_id').val(value);
	
	
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
		
		<?php if($this->session->flashdata('alert_success')) { ?>
		<h4 class="alert_success"><?php echo $this->session->flashdata('alert_success'); ?></h4>
		<?php } else if($this->session->flashdata('alert_error')) { ?>
		<h4 class="alert_error"><?php echo $this->session->flashdata('alert_error'); ?></h4>
		<?php } else if($this->session->flashdata('alert_warning')) { ?>
		<h4 class="alert_warning"><?php echo $this->session->flashdata('alert_warning'); ?></h4>
		<?php } ?>	
		<article class="module width_3_quarter" style="width:95%;">
		<header><h3 class="tabs_involved">Manage Newsletter</h3>
	
		</header>
		<?php //debug($get_all_users); ?>
		<div class="tab_container">
			
				<table cellspacing="0" cellpadding="0" border="1" width="100%" id="mng_news">
				 <tr style="line-height:25px;">
					<th  width="10%" >Sr. no</th>				   
				    <th  width="20%">Newsletter Subject</th>
				    <th  width="20%">Newsletter Description</th>
				    <th  style="font-weight:bold" width="20%" ali2gn="center">Action</th>

				 </tr>
	 				<?php
	 				//debug($all_news);
					if(!empty($all_news))
					{						
						$count = 1;

						foreach($all_news as $key => $val)
						 {
						
							$id = $val['newsletter_id'];
							//$v_title = $val['v_title'];  
							
						
					?>	
				<tr>
					<td class="top"><?php echo $count; ?></td>
					<td class="top"><?php echo ucfirst($val['newsletter_title']); ?></td>
					<td class="top"><?php echo strip_tags($val['newsletter_desc']); ?></td>
					
					
					
					<td class="top">
					
					<a href="<?php echo base_url();?>admin/newsletter/edit_newsletter/<?php echo $id;?>"><img src="<?php echo base_url();?>images/icn_edit.png" title="Edit" /></a>
					&nbsp;&nbsp;
					<a href="javascript:void(0);" onclick="delete_news(<?php echo $id; ?>);"><img src="<?php echo base_url();?>images/admin/icn_trash.png" title="Delete" /></a>
					&nbsp;&nbsp;
					<a class="fancybox" href="#hidden_reg_popup" onclick="abc('<?php echo $id;?>');"><img title="Send Email" src="<?php echo base_url();?>images/email-icon.gif" /></a>
					
					</td>
				</tr>
	 				<?php	$count++; }} else	 { ?>
				<tr>
					<td colspan="7" class="top">No record found.</td>
				</tr>
					<?php } ?>
				</table>
		
		
			<?php if(!empty($all_news)){?>
				<div class="entry">
					<div class="pagination">
						<div style="float:right;width: 10%;">
						<strong style="color:#000;">Other Pages: </strong>
	
							<?php if($items > 0){ 						
								$num_pages = ceil($items/$users_per_page);
							}else{
								$num_pages = 0;
							} ?>
	
							<form name="search" action="" method="GET">
								<select style="width:55px;text-align:center;" name="page" onchange="this.form.submit();">
									<?php for($i=1; $i<= $num_pages ; $i++){?>
										<option <?php if(isset($_GET['page']) && $_GET['page'] == $i) { echo "selected";}?> value="<?php echo $i;?>"><?php echo $i;?></option>
									<?php } ?>
								</select>
						   </form>
						</div>
						
					</div>
					<div class="sep"></div>		
					
					<div style="height:20px;"></div>		
					
				</div>
			<?php } ?>
		</div>
		</article><!-- end of content manager article -->
		
		
		<div class="spacer"></div>
	</section>

	<div id="hidden_reg_popup" >
		<div class="email_full">
				<div id="email_left">
				<form method="post" action="<?php echo base_url(); ?>admin/newsletter/send_email_users">
						<input type="submit" class="email_button" value="Send Email To all Users" />
						<input type="hidden" name="temp_id" id="temp_id" value="" />
				</form>
				</div>
				<div id="email_right">
				<form method="post" action="<?php echo base_url(); ?>admin/newsletter/send_email_users">
					
					<select multiple="multiple" size="10" name="users[]">
					 <optgroup label="Select Users">
							<?php if(!empty($get_all_users)){
									foreach($get_all_users as $all_users)
									{
							?>
								<option value="<?php echo $all_users['id'];?>"><?php echo $all_users['firstname'].' '.$all_users['lastname'];?></option>
								<?php }}?>
					 </optgroup>
					</select>
					<br />
					<br />
					<input type="submit" class="email_button" value="SUBMIT" />
					<input type="hidden" name="template_id" id="template_id" value="" />
				</form>
				</div>
		</div>
	</div>