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
		$data['user'] = $this->user_model->get_users();
		$data['title'] = 'Users';

		$this->load->view('templates/header', $data);
		$this->load->view('pages/userDetails', $data);
		$this->load->view('templates/footer');
	}
}