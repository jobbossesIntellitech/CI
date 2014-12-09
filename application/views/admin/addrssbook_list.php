<?php 

	$controller = $this->uri->segment(2);
	$controller_url = 'admin/'.$controller;
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
		
		<?php if (isset($error)): ?>
		<h4 class="alert_error"><?php echo strip_tags($error); ?></h4>
		 <?php endif; ?>
		 <?php if ($this->session->flashdata('success') == TRUE): ?>
		<h4 class="alert_success"><?php echo $this->session->flashdata('success'); ?></h4>
		 <?php endif; ?>
	
		<article class="module width_3_quarter" style="width:95%;">
		<header><h3 class="tabs_involved">Addressbook List</h3>
	
		</header>
		<?php //debug($all_history); ?>
		<div class="tab_container">
			<table cellspacing="0" cellpadding="0" border="1" width="100%" id="mng_news">
				 <tr style="line-height:25px;">
					<th  width="10%" >Sr. no</td>				   
				    <th  width="20%">Fisrt Name</td>
				    <th  width="20%">Last Name</td>
				    <th  width="20%">Email</td>
				    <th  style="font-weight:bold" width="20%" ali2gn="center">Action</td>

				</tr>
	 				<?php
	 				//debug($addressbook);
					if(!empty($addressbook))
					{						
						$count = 1;

						foreach($addressbook as $key => $val)
						 {
							$id=$val['id'];
					?>	
				<tr>
					<td class="top"><?php echo $count; ?></td>
					<td class="top"><?php echo $val['firstname']; ?></td>
					<td class="top"><?php echo $val['lastname']; ?></td>
					<td class="top"><?php echo $val['email']; ?></td>
					<td class="top"><a onclick="delete_address_book('<?php echo $id;?>');" href="javascript:void(0);"><img title="Delete" src="http://projectsdemos.com/new_project/images/admin/icn_trash.png">
					
					</a></td>
					
				</tr>
	 				<?php	$count++; }} else	 { ?>
				<tr>
					<td colspan="7" class="top">No record found.</td>
				</tr>
					<?php } ?>
				</table>
		</form>
		
		<?php if(!empty($addressbook)){?>
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