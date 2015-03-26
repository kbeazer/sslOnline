<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->library('session');
	}

	public function index()
	{
		$this->session->set_userdata('quote', $this->user_model->get_quote());

		$data['username'] = ucfirst($this->session->userdata('userName'));
	    $data['title'] = 'User Home';
	    $data['quote'] = $this->session->userdata('quote');
	    $data['quoteId'] = $this->user_model->get_quoteId($data['quote']);
	    $data['comment'] = $this->user_model->get_comment($data['quoteId']);
	    $data['fav_view'] = $this->user_model->select_favorite();
	    $data['userQuote'] = $this->user_model->select_quote($this->session->userdata('userId'));

	    $this->load->view('templates/header', $data);
	    $this->load->view('pages/userMain', $data);
	    $this->load->view('pages/quote_view', $data);
	    $this->load->view('pages/spotlight_view', $data);
	    $this->load->view('templates/footer');
	}

	public function favorites()
	{	
		$data['fav_view'] = $this->user_model->add_favorite($this->session->userdata('quote'));

		$this->index();
	}

	public function comment_update()
	{
	    $data['title'] = 'User Home';
	    $data['username'] = ucfirst($this->session->userdata('userName'));
	    $data['quote'] = $this->session->set_userdata('quote', $this->user_model->get_quote());
	    $data['quoteId'] = $this->user_model->get_quoteId($data['quote']);
	    $data['comment'] = $this->user_model->get_comment($data['quoteId']);
	    
	    if($this->input->post('user_comment') == "")
	    {
	    	return false;
	    }
	    else
	    {
	    	$this->user_model->set_comment($data['username']);
	    	$this->index();
	    }
	}

	public function quote_update()
	{	
		$data['userId'] = $this->session->userdata('userId');
	    $data['user_entry'] = $this->input->post('user_quote');
	    
	    if($this->input->post('user_quote') == "")
	    {
	    	return false;
	    }
	    else
	    {
	    	$data['userQuote'] = $this->session->set_userdata('userQuote', $this->user_model->set_quote($data['userId'], $data['user_entry']));
	    }

	    $this->index();
	}

	public function update_user()
	{
	    $data['title'] = 'Update User';
	    $data['username'] = $this->session->userdata('userName');
	    $data['userInfo'] = $this->user_model->get_details($data['username']);

	    $this->load->view('templates/header', $data);
	    $this->load->view('pages/update_view', $data);
	    $this->load->view('templates/footer');
	}

  	public function db_update()
  	{
	    $data['userId'] = $this->session->userdata('userId');
	    $data['title'] = 'Update User';

	    $this->user_model->edit_user($data['userId']);

	    $this->load->view('templates/header');
	    $this->load->view('pages/update_success');
	    $this->load->view('templates/footer');
  	}

  	public function delete_mess()
  	{
  		$data['title'] = 'Delete User';

  		$this->load->view('templates/header');
  		$this->load->view('pages/delete_warning');
  		$this->load->view('templates/footer');
  	}

  	public function delete_profile()
  	{
	    $data['username'] = $this->session->userdata('userName');
	    $data['userid'] = $this->session->userdata('userId');
	    $data['title'] = 'User Home';
	    $data['quote'] = $this->user_model->get_quote();
	    $data['quoteId'] = $this->user_model->get_quoteId($data['quote']);
	    $data['comment'] = $this->user_model->get_comment($data['quoteId']);

	    if($this->input->post('subYes'))
	    {
	      	$this->user_model->delete_user($data['username'], $data['userid']);

	      	$this->load->view('pages/delete_success', $data);
	    }
	    else
	    {
		   $this->index();
	    }
  	}

  	public function log_out()
  	{
	    if($this->comment_update())
	    {
	      redirect('../home', 'refresh');
	    }
	    else
	    {
	      redirect('home', 'refresh');
	    } 
  	}
}