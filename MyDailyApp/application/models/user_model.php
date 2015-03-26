<?php
class User_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
		$this->load->library('session');
	}

	public function get_users()
	{	
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function add_favorite($quote)
	{
		$data = array(
			'userId' => $this->session->userdata('userId'),
			'favorite' => $quote
		);

		$this->db->insert('favorites', $data);
	}

	public function select_favorite()
	{
		$this-> db -> select('favorite');
		$this-> db -> from('favorites');
		$this-> db -> where('userId', $this->session->userdata('userId'));

		$query = $this-> db -> get();

		$result = array();

		foreach ($query->result() as $row)
		{
			$result[] = $row->favorite;
		}

		return $result;
	}

	public function select_quote($userId)
	{
		$this-> db -> select('quote');
		$this-> db -> from('quotes');
		$this-> db -> where('quoteId', $userId);

		$query = $this-> db -> get();

		$result = array();

		foreach ($query->result() as $row)
		{
			$result[] = $row->quote;
		}

		return $result;
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

	public function edit_user($userid)
	{
		$data = array(
			'fName' => $this->input->post('fName'),
			'lName' => $this->input->post('lName'),
			'userName' => $this->input->post('userName'),
			'email' => $this->input->post('email')
		);

		$this -> db -> where('userId', $userid);
		$this -> db -> update('users', $data);
		
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

	public function get_quote()
	{
		$this -> db -> select('quote');
		$this -> db -> from('quotes');
		$this -> db -> order_by('quote', 'random');
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		foreach ($query->result() as $row)
		{
			$result = $row->quote;
		}

		return $result;
	}

	public function get_quoteId($quote)
	{
		$this -> db -> select('quoteId');
		$this -> db -> from('quotes');
		$this -> db -> where('quote', $quote);

		$query = $this -> db -> get();

		$result = '';
		foreach ($query->result() as $row)
		{
			$result = $row->quoteId;
		}

		return $result;
	}

	public function get_comment($quoteId)
	{
		$this -> db -> select('comment');
		$this -> db -> from('comments');
		$this -> db -> where('comId', $quoteId);

		$query = $this -> db -> get();

		$result = array();

		foreach ($query->result() as $row)
		{
			$result[] = $row;
		}

		return $result;
	}

	public function set_comment($username)
	{
		$result_Id = '';

	    $this -> db -> select('userId');
	    $this -> db -> from('users');
	    $this -> db -> where('userName', $username);
	    $this -> db -> limit(1);

	    $query = $this -> db -> get();

	    foreach ($query->result() as $row)
		{
			$result_Id = $row->userId;
		}

		$data = array(
		'comId' => $result_Id,
		'comment' => $this->input->post('user_comment')
		);

		$this -> db -> insert('comments', $data);	
		
		$this -> db -> select('comment');
		$this -> db -> from('comments');
		$this -> db -> where('comId', $result_Id);

		$com_query = $this -> db -> get();

		foreach ($com_query->result() as $row)
		{
			$result_final = $row->comment;
		}

		return $result_final;
	}

	public function set_quote($userId, $quote)
	{
		$data = array(
			'quoteId' => $userId,
			'quote' => $quote
		);

		$this -> db -> insert('quotes', $data);	
		
		$this -> db -> select('quote');
		$this -> db -> from('quotes');
		$this -> db -> where('quoteId', $userId);

		$query = $this -> db -> get();

		$result = array();

		foreach ($query->result() as $row) 
		{
			$result[] = $row->quote;
		}

		return $result;
	}

	public function get_details($username)
	{
		$this -> db -> select('fName, lName, userName, email, pass');
	    $this -> db -> from('users');
	    $this -> db -> where('userName', $username);
	    $this -> db -> limit(1);

	    $query = $this -> db -> get();

	    $user = array();

	    foreach ($query->result() as $row)
	    {
	    	$user[] = $row;
	    }

	    return $user;
	}

	public function delete_user($username, $userId)
	{
	    $this -> db -> where('userName', $username);
	    $this -> db -> delete('users');

	    $this -> db -> where('comId', $userId);
	    $this -> db -> delete('comments');

	    $this -> db -> where('quoteId', $userId);
	    $this -> db -> delete('quotes');

	}
}




