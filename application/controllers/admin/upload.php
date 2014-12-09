<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin/csv_model');
		 $this->load->library('csvimport');
	}


	function index() {
	
		if(!$this->session->userdata('admin_id'))
		{
			redirect(base_url('admin'));
			exit;
		}
		$data['menu_title']='Upload';
		$data['title']='CSV Upload';
		$this->load->view('admin/header',$data);
		$this->load->view("admin/csvindex");
		$this->load->view('admin/footer');
	
    }
	 public function importcsv() {
	 
      
		//debug($data['addressbook']);die;
        $data['error'] = '';    //initialize image upload error array to empty

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = '1000';
		
		

        $this->load->library('upload', $config);
		$this->upload->initialize($config);
		$data['menu_title']='Upload';
		$data['title']='CSV Upload';
        // If upload failed, display error
        if (!$this->upload->do_upload()) {
            $data['error'] = $this->upload->display_errors();
			$this->load->view('admin/header',$data);
            $this->load->view('admin/csvindex');
			$this->load->view('admin/footer');
        } else {

            $file_data = $this->upload->data();
            $file_path =  './uploads/'.$file_data['file_name'];
            
            if ($this->csvimport->get_array($file_path)) {
                $csv_array = $this->csvimport->get_array($file_path);
                foreach ($csv_array as $row) {
                    $insert_data = array(
                        'firstname'=>$row['firstname'],
                        'lastname'=>$row['lastname'],
                        'email'=>$row['email'],
                    );
                    $this->csv_model->insert_csv($insert_data);
                }
                $this->session->set_flashdata('success', 'Csv Data Imported Succesfully');
                redirect(base_url().'admin/upload');
                //echo "<pre>"; print_r($insert_data);
            } else 
                $data['error'] = "Error occured";
				$this->load->view('admin/header',$data);
				$this->load->view('admin/csvindex');
				$this->load->view('admin/footer');
              
            }
            
    }


	public function addrssbook_list()
	{
		if(!$this->session->userdata('admin_id'))
		{
			redirect(base_url('admin'));
			exit;
		}
		
		$data['menu_title']='Upload';
		$data['title']='Addressbook List';
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
		$data['items']=$this->csv_model->get_num_addressbook();
		$data['addressbook'] = $this->csv_model->get_addressbook($start,$end);
		
		$this->load->view('admin/header',$data);
		$this->load->view('admin/addrssbook_list');
		$this->load->view('admin/footer');
	
	
	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */