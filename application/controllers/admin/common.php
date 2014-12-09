<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/common_model');
	}


  /*****    Check Admin Login  *****/
	
	public function check_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$login_status = $this->common_model->check_login($username,$password);
		if($login_status)
		{
      $this->session->set_userdata('admin_username',$username);
			$this->session->set_userdata("login_message","Welcome to Admin Panel.");
			echo true;
		}
		else
			echo false;
	}
	


   /*****    Function For Logout    *****/

	public function logout()
	{
		if($this->input->post('logout'))
		{
			$this->session->sess_destroy();
			$this->session->unset_userdata('admin_id');
			$this->session->unset_userdata('admin_email');
			$this->session->unset_userdata('admin_logged_in');
			echo true;
		}
		else
			echo false;
	}

   /*****    Function For Delete Users    *****/
   
     /*****    Function For Showing Admin Change Password Page     *****/

 
	public function change_password() {
		if(!$this->session->userdata('admin_id'))
		{
			redirect(base_url('admin'));
			exit;
		}
  
		$data['menu_title']='Admin';
		$data['title']='Change Password';
		$this->load->view('admin/header',$data);
		$this->load->view("admin/change_password");
		$this->load->view('admin/footer');
    
	}
	
	 /*****   Change Admin Password  *****/


   public function change_password_handler() 
   {

		$old_password = MD5($this->input->post("old_password"));
		$password = MD5($this->input->post("password"));
		$admin_username = $this->session->userdata("admin_username");
   
		$admin_info = $this->common_model->is_authenticated($admin_username, $old_password);
		$admin_check_info=$this->common_model->check_authenticated($admin_username);
		if($old_password != $admin_check_info->admin_password)
		{                                
		  echo 0;
		   
		}
		else 
		{
   
	$result = $this->common_model->change_admin_password($admin_username, $password);

		if ($result) 
		{
			echo 1; // Password changed 
		}
		else {
			echo 3; // Cannot change Password
		}
		
	}
 }
 
	public function edit_profile()
	{
		if(!$this->session->userdata('admin_id'))
		{
			redirect(base_url('admin'));
			exit;
		}
		$data['admin_info'] = $this->common_model->profile($this->session->userdata('admin_id'));
		
		$data['menu_title']='Admin';
		$data['title']='Edit Profile';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/edit_profile');
		$this->load->view('admin/footer');
	}
	
	/*****    Function For updating Admin Information    *****/


	public function save_personal_info()
	{
		
		$admin_name = $this->input->post('admin_name');
		$admin_email = $this->input->post('admin_email');
		if(!empty($admin_name) && !empty($admin_email))
		{
			$data = array(
					'admin_name' => $admin_name,
					'admin_email' => $admin_email
			);
			$result = $this->common_model->update_info('tbl_admin',$data);
			if($result)
			{
				$this->session->set_userdata('admin_email',$admin_email);
				$this->session->set_flashdata('alert_success','Information Updated Successfully.');
			}
			else
				$this->session->set_flashdata('alert_warning','Nothing Updated.');		
		}
		else
			$this->session->set_flashdata('alert_error','Error Occured.');
		redirect(base_url('admin/common/view_profile'));
	}
	
	public function view_profile()
	{
		$data['admin_info'] = $this->common_model->profile($this->session->userdata('admin_id'));
			
		$data['menu_title']='Admin';
		$data['title']='View Profile';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/profile');
		$this->load->view('admin/footer');
	}
	

/*****    Change Status Of pages  *****/


	public function change_status()
	{
	
		$table = $this->input->post('table');
		
		$column = $this->input->post('column');
		$value = $this->input->post('value');
		$uniqueNameCol = $this->input->post('uniqueNameCol');
		$uniqueColValue = $this->input->post('uniqueColValue');
		
		$re = $this->common_model->change_status($table, $column, $value, $uniqueNameCol, $uniqueColValue);
				
	}


	public function delete_news(){

	$newsletter_id = $this->input->post('newsletter_id');
		$this->db->where('newsletter_id', $newsletter_id);
		$result = $this->db->delete('tbl_newsletter');
		echo ($result)? 1:0;

	}	
	
	public function delete_address_book(){

	$address_book_id = $this->input->post('address_book_id');
		$this->db->where('id', $address_book_id);
		$result = $this->db->delete('addressbook');
		echo ($result)? 1:0;

	}
}
