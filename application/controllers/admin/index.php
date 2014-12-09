<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/common_model');
	}

	
	public function index()
	{
		if($this->session->userdata('admin_id') && $this->session->userdata('admin_logged_in')===true)
		{
			redirect(base_url('admin/index/dashboard'));
			exit;
		}
		$data['title']='Admin Login';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/login');
    $this->load->view('admin/footer');
	}
	
	public function dashboard()
	{
		if(!$this->session->userdata('admin_id') || $this->session->userdata('admin_logged_in')!=true)
		{
			redirect(base_url('admin'));
			exit;
		}
		
		$data['title']='Dashboard';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/dashboard');
    $this->load->view('admin/footer');
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
