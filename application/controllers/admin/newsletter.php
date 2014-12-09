<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends CI_Controller {

	public function __construct() 
	{
			parent::__construct();
			
			$this->load->model("admin/newsletter_model");
			$this->load->model('admin/common_model');
				
	}
	
	public function index()
	{
		if(!$this->session->userdata('admin_id'))
		{
			redirect(base_url('admin'));
			exit;
		}
  
		$data['menu_title']='Newsletter';
		$data['title']='Manage Newsletter';
		$users_per_page=10;
		$start=0;
		$end=$users_per_page;
		if(isset($_GET['page'])){
			$page=$_GET['page'];
			$start=($page - 1)*$users_per_page;
		}
		$limit=$end.",".$start;
		//echo $limit;
		$co=$start+1;
		$data['users_per_page']=$users_per_page;
		$data['items']=$this->common_model->get_num_news();
		$data['all_news']=$this->common_model->get_all_news($start,$end);
		$data['get_all_users']=$this->common_model->get_all_users();
	
	
		$this->load->view('admin/header',$data);
		$this->load->view("admin/mng_newsletter");
		$this->load->view('admin/footer');
	
	
	}
	
	public function add_newsletter()
	{
		if(!$this->session->userdata('admin_id'))
		{
			redirect(base_url('admin'));
			exit;
		}
				
		$data['menu_title']='Newsletter';
		$data['title']='Add Newsletter';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/add_newsletter');
		$this->load->view('admin/footer');
	
	
	}
	
	
	public function save_newsletter_template()
	{
			$newsletter_title=$this->input->post('newsletter_title');
			$newsletter_desc=$this->input->post('newsletter_desc');
			$data=array(
							'newsletter_title' => $newsletter_title,
							'newsletter_desc' => $newsletter_desc,
						);
			$res=$this->newsletter_model->save_newsletter_template($data);
			if($res)
			{
				$this->session->set_flashdata('alert_success','Newsletter Templeate has been added successfully. Thankyou ');
				redirect(base_url('admin/newsletter/add_newsletter'));
			}
			else {
				$this->session->set_flashdata('alert_error','There is error in adding of newsletter template. Please try again.');
				redirect(base_url('admin/newsletter/add_newsletter'));
			}
			
			
	
	}
	
	public function edit_newsletter()
	{
		if(!$this->session->userdata('admin_id'))
		{
			redirect(base_url('admin'));
			exit;
		}
		
		$news_id=$this->uri->segment(4);
		$data['get_newsletter_info']=$this->newsletter_model->get_newsletter_info($news_id);	
		
		$data['menu_title']='Newsletter';
		$data['title']='Edit Newsletter';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/edit_newsletter');
		$this->load->view('admin/footer');
	
	
	}
	
	public function update_newsletter_template()
	{
	
			$newsletter_title=$this->input->post('newsletter_title');
			$newsletter_desc=$this->input->post('newsletter_desc');
			$newsletter_id=$this->input->post('newsletter_id');
			$data=array(
									'newsletter_title' => $newsletter_title,
									'newsletter_desc' => $newsletter_desc,
									);
			$res=$this->newsletter_model->update_newsletter_template($data,$newsletter_id);
			$affected=$this->db->affected_rows();
			if($affected)
			{		
					$this->session->set_flashdata('alert_success','Newsletter template has been updated successfully. Thank you ');
					redirect(base_url('admin/newsletter'));
				}
				else {
					$this->session->set_flashdata('alert_warning','You update the same template.');
					redirect(base_url('admin/newsletter'));
				}	
	}


	public function delete_news(){

		$newsletter_id = $this->input->post('newsletter_id');
		$this->db->where('newsletter_id', $newsletter_id);
		$result = $this->db->delete('tbl_newsletter');
		echo ($result)? 1:0;

	}
	
	public function send_email_users()
	{	
		if($this->input->post('template_id'))
		{
			$template_id=$this->input->post('template_id');
		}
		else
		{
			$template_id=$this->input->post('temp_id');
		}
		
		$template_detail=$this->common_model->get_template_detail($template_id);
		$temmplate_subject=$template_detail['newsletter_title'];
		$temmplate_message=$template_detail['newsletter_desc'];
		
		if($this->input->post('users'))
		{
			$get_all_users=array();
			$user_id=$this->input->post('users');
			
			for($i=0;$i<count($user_id);$i++)
			{
				
				$userid=$user_id[$i];
				$use_email=$this->common_model->get_users($userid);
				$get_all_users[] = $use_email;
			}
			
			
		}
		else{
			$get_all_users=$this->common_model->get_all_users();
			
		}
		
		$admin_detail=$this->common_model->get_admin_detail();
		$admin_email=$admin_detail['admin_email'];
		
		
		
		foreach($get_all_users as $get_email)
		{
			$user_email=$get_email['email'];
			$user_name=$get_email['firstname'].' '.$get_email['lastname'];
			$this->load->library('email');
			$config['mailtype'] = 'html';				
			$this->email->initialize($config);
			$this->email->from("Newsletter",$admin_email);
			$this->email->to($user_email);
			$this->email->subject($temmplate_subject);
			$message_d = @file_get_contents("templates/newsletter_subscribe.html");
			$message_d = str_replace("[MESSAGE]",$temmplate_message, $message_d);
			$message_d = str_replace("[USERNAME]",$user_name, $message_d);
			$this->email->message($message_d); 		 
			$this->email->send();
		
		
		}
		
		$this->session->set_flashdata('alert_success','Thank you, Email has been sent successfully to users.');
		redirect(base_url('admin/newsletter'));
		
	}
	

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */