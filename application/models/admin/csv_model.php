<?php

class Csv_model extends CI_Model {
    
    function __construct() {
        parent::__construct();
        
    }
    
	public function get_addressbook($start,$end){

			
			
			$this->db->select('a_b.*');

			$this->db->from('addressbook a_b');
			
			$this->db->order_by("a_b.id", "desc"); 
			$this->db->limit($end,$start);

			$query=$this->db->get();
			
		//echo $this->db->last_query();

			return $query->result_array();
		}
	
	public function get_num_addressbook(){
			return $this->db->count_all('addressbook');

	}
    
    function insert_csv($data) {
        $this->db->insert('addressbook', $data);
    }
}
/*END OF FILE*/
