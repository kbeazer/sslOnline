<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class VerifyLogin extends CI_Controller {
 
  public function __construct()
  {
    parent::__construct();
    $this->load->model('user_model');
    $this->load->library('session');
  }
 
  public function index()
  {
    //This method will have the credentials validation
    $this->load->library('form_validation');
 
    $this->form_validation->set_rules('userName', 'Username', 'trim|required|xss_clean');
    $this->form_validation->set_rules('pass', 'Password', 'trim|required|xss_clean|callback_check_database');
 
    if($this->form_validation->run() == FALSE)
    {
      //Field validation failed.  User redirected to login page
      $this->load->view('templates/header');
      $this->load->view('pages/home');
      $this->load->view('templates/footer');
    }
    else
    {
      $this->load_page();
    }
  }
 
  public function check_database($password)
  {
    //Field validation succeeded.  Validate against database
    $username = $this->input->post('userName');
    $password = md5($this->input->post('pass'));
 
    //query the database
    $result = $this->user_model->login($username, $password);
 
    if($result)
    {
      $sess_array = array();
      foreach($result as $row)
      {
        $sess_array = array(
          'userId' => $row -> userId,
          'userName' => $row -> userName
        );

        $this->session->set_userdata($sess_array);
      }
      return TRUE;
    }
    else
    {
      $this->form_validation->set_message('check_database', 'Invalid username or password');
      return false;
    }
  }

  public function load_page()
  {
    $this->session->set_userdata('quote', $this->user_model->get_quote());

    $data['fav_view'] = $this->user_model->select_favorite();
    $data['username'] = ucfirst($this->session->userdata('userName'));
    $data['title'] = 'User Home';
    $data['quote'] = ucfirst($this->session->userdata('quote'));
    $data['userQuote'] = $this->user_model->select_quote($this->session->userdata('userId'));
    $data['quoteId'] = $this->user_model->get_quoteId($data['quote']);
    $data['comment'] = $this->user_model->get_comment($data['quoteId']);

    $this->load->view('templates/header', $data);
    $this->load->view('pages/userMain', $data);
    $this->load->view('pages/quote_view', $data);
    $this->load->view('pages/spotlight_view', $data);
    $this->load->view('templates/footer');
  }

}
