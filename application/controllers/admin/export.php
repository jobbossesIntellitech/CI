<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Export extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		
	}

	public function index(){
		if($this->session->userdata('admin_id'))
		{
			if(isset($_POST['export']) && $_POST['export']=='addressbook')
			{
				$tables = array($_POST['export']); //table name
				$file = 'export';
				$csv_output = "";
				
				foreach ($tables as $table)
				{
								
					$csv_output .= "firstname,lastname,email";
					$csv_output .= "\n";
								
					
					$query = $this->db->query("SELECT firstname,lastname,email from addressbook limit 5");
					
					foreach($query->result_array() as $res2)
					{				
						$csv_output .= '"' . strip_slashes(implode('","',$res2)) . "\"\n";
					}
					$csv_output .= "\n\n";

				}
				$this->session->set_userdata('export_data','export data successfully');
				
				header("Content-type:text/octect-stream");
				header("Content-Disposition:attachment;filename=export_orders.csv");
				print $csv_output;
				exit;
			}
		}
		else
		{ 
			redirect('admin'); 
			die; 
		}
	}
}

/* End of file export.php */
/* Location: ./application/controllers/export.php */