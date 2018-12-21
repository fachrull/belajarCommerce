<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * this class for authentification user logging
 */
class Auth extends CI_Controller{
  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Mauth', 'mauth');
  }

  public function login(){

    // if we are already get session to login
    if ($this->session->userdata('isLogin') === TRUE) {
      redirect();

    // this is block for condition that we aren't get session to login
    } else {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('uname', 'Username', 'required|callback_checkingUsername');
      $this->form_validation->set_rules('password', 'Password', 'required|callback_checkingPassword');

      // this is block for if our form validation running unseccessly
      if ($this->form_validation->run() === FALSE) {
        $this->load->view('include/header');
        $this->load->view('login');
        $this->load->view('include/footer');

        // this block for giving session login if all the requiry is complete
      } else {
        $userType = $this->mauth->getData(array('username' => $this->input->post('uname')),
          array('userTypeField' => 'user_type'), TRUE);
        $type = $userType->user_type;

        $userId = $this->mauth->getData(array('username' => $this->input->post('uname')),
          array('userIdField' => 'user_id'), TRUE);
        $id = $userId->user_id;

        $data = array(
          'uId'     => $id,
          'uType'   => $type,
          'isLogin' => TRUE
        );
        $this->session->set_userdata($data);
        redirect();
      }
    }
  }

  // this function for unset sessio
  public function logout(){
    $data =  array('uId','uType', 'isLogin');
    $this->session->unset_userdata($data);
    redirect();
  }

  // this function for checking username
  public function checkingUsername($username){
    $user = $this->mauth->getData(array('username' => $username),
      array('usernameField' => 'username'), TRUE);

    if (isset($user)) {
      return TRUE;
    } else {
      $this->session->set_flashdata('error', 'username salah');
    }
  }
  // this function for checking password
  public function checkingPassword($password){
    if($this->checkingUsername($this->input->post('uname'))){
      $user = $this->mauth->getData(array('username' => $this->input->post('uname')),
        array('passwordField' => 'password'), TRUE);

      if (password_verify($password, $user->password)) {
        return TRUE;
      } else {
        $this->session->set_flashdata('error', 'Password salah');
        return FALSE;
      }
    } else {
      $this->session->set_flashdata('error', 'Username salah');
    }
  }

  // public function inputDummyUser(){
  //   $this->load->model('Mauth', 'mauth');
  //   $this->mauth->createDummyUser();
  // }

  public function regis(){
    $this->load->helper('form');
    $this->load->library('form_validation');

    if ($this->session->userdata('isLogin', FALSE)) {

      $this->form_validation->set_rules('uname', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Passsword', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('company', 'Company', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('include/header');
        $this->load->view('register');
        $this->load->view('include/footer');
      } else {
        $this->mauth->regis();
        redirect('auth/login');
      }
    } elseif ($this->session->userdata('uType') == 1) {
      $this->form_validation->set_rules('uname', 'Username', 'required');
      $this->form_validation->set_rules('password', 'Passsword', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('company', 'Company', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('include/header');
        $this->load->view('register');
        $this->load->view('include/footer');
      }else {
        $this->mauth->regis();
        redirect();
      }
    }

  }

}
