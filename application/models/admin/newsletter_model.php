<?php
class Newsletter_model extends CI_Model 
{
	/**
	 * @Function Usage: Check users Login 
	 * @Params:  $email, $password							
	*/
	
	public function check_news_email($email)
	{
			$sql="select * from tbl_newsletter where newsletter_email='$email'";
			$query=$this->db->query($sql);
			return $query->result_array();
	
	}
	
	public function save_newsletter_template($data)
	{
			$this->db->insert('tbl_newsletter',$data);
			return $this->db->insert_id();
	}
	
	public function get_admin_email()
	{
		$sql="select admin_email from tbl_admin where admin_id='1'";
		$query=$this->db->query($sql);
		return $query->row_array();
	}
	
	public function get_newsletter_info($news_id)
	{
		$sql="select * from tbl_newsletter where newsletter_id='$news_id'";
		$query=$this->db->query($sql);
		return $query->row_array();
	
	}
	
	public function update_newsletter_template($data,$newsletter_id){
	
		$this->db->where('newsletter_id', $newsletter_id);
		$this->db->update('tbl_newsletter', $data); 
	
	
	}
	
	
}

