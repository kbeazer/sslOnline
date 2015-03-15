<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_users()
	{	
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function set_user()
	{	
		$data = array(
			'fName' => $this->input->post('fName'),
			'lName' => $this->input->post('lName'),
			'userName' => $this->input->post('userName'),
			'email' => $this->input->post('email'),
			'pass' => md5($this->input->post('pass'))
		);

		return $this->db->insert('users', $data);
	}

	public function login($username, $password)
	{
	    $this -> db -> select('userId, userName, pass');
	    $this -> db -> from('users');
	    $this -> db -> where('userName', $username);
	    $this -> db -> where('pass', $password);
	    $this -> db -> limit(1);
	 
	    $query = $this -> db -> get();
	 
	    if($query -> num_rows() == 1)
	    {
	    	return $query->result();
	    }
	    else
	    {
	    	return false;
	    }
	}
}




