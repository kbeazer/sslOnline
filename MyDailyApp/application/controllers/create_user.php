<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Create_user extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Register';

		$this->form_validation->set_rules('userName', 'Username', 'required');
		$this->form_validation->set_rules('pass', 'Password', 'required');

		if ($this->form_validation->run() === FALSE)
		{
			$data['title'] = 'Error';

			$this->load->view('templates/header', $data);
			$this->load->view('pages/register', $data);
			$this->load->view('templates/footer');	
		}
		else
		{
			$this->user_model->set_user();
			$this->load->view('templates/header', $data);
			$this->load->view('pages/success');
			$this->load->view('templates/footer');
		}
	}
}

