<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Users extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$data['username'] = ucfirst($this->session->userdata('userName'));
	    $data['title'] = 'User Home';
	    $data['quote'] = $this->user_model->get_quote();
	    $data['quoteId'] = $this->user_model->get_quoteId($data['quote']);
	    $data['comment'] = $this->user_model->get_comment($data['quoteId']);

	    $this->load->view('templates/header', $data);
	    $this->load->view('pages/userMain', $data);
	    $this->load->view('pages/quote_view', $data);
	    $this->load->view('pages/spotlight_view', $data);
	    $this->load->view('templates/footer');
	}

	public function comment_update()
	{
	    $data['title'] = 'User Home';
	    $data['username'] = ucfirst($this->session->userdata('userName'));
	    $data['quote'] = $this->user_model->get_quote();
	    $data['quoteId'] = $this->user_model->get_quoteId($data['quote']);
	    $data['comment'] = $this->user_model->get_comment($data['quoteId']);
	    
	    if($this->input->post('user_comment') == "")
	    {
	    	return false;
	    }
	    else
	    {
	    	$this->user_model->set_comment($data['username']);
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

	    $this->user_model->edit_user($data['userId']);

	    $this->load->view('templates/header', $data);
	    $this->load->view('pages/update_success');
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

	      	$this->load->view('pages/delete_success');
	    }
	    else
	    {
	        $this->load->view('templates/header', $data);
		    $this->load->view('pages/userMain', $data);
		    $this->load->view('pages/quote_view', $data);
		    $this->load->view('pages/spotlight_view', $data);
		    $this->load->view('templates/footer');
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