<?php
class Common_model extends CI_Model 
{
	/**
	 * @Function Usage: Check users Login 
	 * @Params:  $email, $password							
	*/
	public function check_login($admin_name= '', $admin_password='') 
	{ 
		$this->db->select("admin_id,admin_email");
		$result = $this->db->get_where('tbl_admin', array('admin_name' => $admin_name, 'admin_password' => md5($admin_password), 'admin_status' => 1));
		$total_rows =$result->num_rows();
		if($total_rows > 0) 
		{	
			$result = $result->row_array();
			$userdata = array(
									'admin_id'	=> $result['admin_id'],
									'admin_email' => $result['admin_email'],
									'admin_logged_in' => TRUE
			                    );
			$this->session->set_userdata($userdata);
			return true;
		}
		else
			return false;
	}
	
	public function is_authenticated($username = "", $password = "") {
		
		 $sql = " SELECT * FROM tbl_admin 
				 WHERE admin_name = '".$this->db->escape_str($username)."' 
				 AND admin_password = MD5('".$this->db->escape_str($password)."') ";
		//echo $this->db->last_query();
		$result = $this->db->query($sql);

		return $result->row();

	}
	
	public function check_authenticated($username = "") 
   {
		
		 $sql = " SELECT * FROM tbl_admin 

				 WHERE admin_name = '".$this->db->escape_str($username)."'";
		//echo $this->db->last_query();
		$result = $this->db->query($sql);

		return $result->row();

	}
	
	public function change_admin_password($admin_username, $password) {
		
		$sql = " UPDATE tbl_admin 
				 SET admin_password = '".$this->db->escape_str($password)."' WHERE admin_name = '".$this->db->escape_str($admin_username)."' ";

		$result = $this->db->query($sql);

		return (boolean) $result;

	}
		
	public function profile($admin_id = 0)
	{
		$res = $this->db->get_where('tbl_admin',array('admin_id' => $admin_id));
		return $res->row_array();
	}
	
	public function update_info($tbl_name,$data)
	{
		$this->db->update('tbl_admin',$data);
		return $this->db->affected_rows();
	}
	
	public function change_status($table, $column, $value, $uniqueNameCol, $uniqueColValue)
	{
		$query = $this->db->query("UPDATE ".$table." SET `".$column."` = '".$value."' WHERE `".$uniqueNameCol."` = '".$uniqueColValue."' ");	
		//echo $this->db->last_query();
	}
	
	
	public function get_num_news(){
			return $this->db->count_all('tbl_newsletter');

		}
		public function get_all_news($start,$end){

			
			
			$this->db->select('s.*');

			$this->db->from('tbl_newsletter s');
			
			$this->db->order_by("s.newsletter_id", "desc"); 
			$this->db->limit($end,$start);

			$query=$this->db->get();
			
		//echo $this->db->last_query();

			return $query->result_array();
		}
		
	public function insert_data($data,$tbl_name)
	{	
		$sql = $this->db->insert($tbl_name,$data);
		return ( $this->db->_error_number() === 0 );
	}
	public function get_admin_detail()
	{
			$sql="select * from tbl_admin where admin_id=1";
			$query=$this->db->query($sql);
			return $query->row_array();
	}
	
	public function get_all_users()
	{
			$query = $this->db->get('addressbook');
			return $query->result_array();
	
	}
	
	public function get_users($userid)
	{	
		
		$sql="select * from addressbook where id='$userid'";
		
		$query=$this->db->query($sql);
		return $query->row_array();
	}
	
	public function get_template_detail($newsletter_id)
	{
		$sql="select * from tbl_newsletter where newsletter_id='$newsletter_id'";
		$query=$this->db->query($sql);
		return $query->row_array();

		
	}

	

}
