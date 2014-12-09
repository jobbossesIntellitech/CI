<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 */
	 
	public function index()
	{
		if($this->session->userdata('admin_id'))
		{
			redirect(base_url('admin/index/dashboard'));
			exit;
		}
	    $data['title']='Admin Login ';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/login');	
        $this->load->view('admin/footer');	
	}

}
