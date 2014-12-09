
<aside id="sidebar" class="column">
<?php if($this->session->userdata('admin_id'))
		{?>
		
		<h3>Content</h3>
		<ul class="toggle">
			<li class="icn_new_article"><a href="<?php echo base_url(); ?>admin/newsletter">Manage Newsletter</a></li>
			<li class="icn_edit_article"><a href="<?php echo base_url(); ?>admin/newsletter/add_newsletter">Add New Newsletter</a></li>
			
		</ul>
		<h3>Upload CSV</h3>
		<ul class="toggle">
			<li class="icn_add_user"><a href="<?php echo base_url();?>admin/upload">Uplaod CSV File</a></li>
			<li class="icn_view_users"><a href="<?php echo base_url();?>admin/upload/addrssbook_list">Address Book List</a></li>
			
		</ul>
		<h3>Media</h3>
		<ul class="toggle">
			<li class="icn_folder"><a href="#">File Manager</a></li>
			<li class="icn_photo"><a href="#">Gallery</a></li>
			<li class="icn_audio"><a href="#">Audio</a></li>
			<li class="icn_video"><a href="#">Video</a></li>
		</ul>
		<h3>Admin</h3>
		<ul class="toggle">
			<li class="icn_settings"><a href="<?php echo base_url(); ?>admin/common/view_profile">View Profile</a></li>
			<li class="icn_security"><a href="<?php echo base_url('admin/common/edit_profile'); ?>">Edit Profile</a></li>
			<li class="icn_security"><a href="<?php echo base_url('admin/common/change_password'); ?>">Change Password</a></li></li>
			<li class="icn_jump_back"><a href="javascript:void(0);" onclick="logout();">Logout</a></li>
		</ul>
		
		<footer>
			<hr />
			<p><strong>Copyright &copy; 2011 Website Admin</strong></p>
			<p></p>
		</footer>
<?php }?>
	</aside><!-- end of sidebar -->