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
      $this->session->set_flashdata('error', 'Wrong username!');
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
        $this->session->set_flashdata('error', 'Wrong password!');
        return FALSE;
      }
    } else {
      $this->session->set_flashdata('error', 'Wrong username!');
    }
  }

  // public function inputDummyUser(){
  //   $this->load->model('Mauth', 'mauth');
  //   $this->mauth->createDummyUser();
  // }

  public function regis(){
    $this->load->helper('form');
    $this->load->library('form_validation');

<<<<<<< HEAD
    $this->form_validation->set_rules('uname', 'Username', 'required|callback_checkingUnameReg');
    $this->form_validation->set_rules('password', 'Passsword', 'required|callback_checkingPassReg');
    $this->form_validation->set_rules('email', 'Email', 'required|callback_checkingEmailReg');
=======
    $this->form_validation->set_rules('uname', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Passsword', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
>>>>>>> 27d538f46cbedac8f6567d9b7f89233aefec6e98
    $this->form_validation->set_rules('company', 'Company', 'required');

    if ($this->form_validation->run() === FALSE) {
      $this->load->view('include/header');
      $this->load->view('register');
      $this->load->view('include/footer');
    } else {
      $this->mauth->regis();
<<<<<<< HEAD
      if($this->session->userdata('isLogin') == NULL){
        redirect('auth/login');
      }elseif($this->session->userdata('isLogin') == 1){
        redirect('home/adminStores');
      }
    }
  }

  public function checkingUnameReg($username){
    $user = $this->mauth->getData(array('username' => $username),
      array('unameRegField' => 'username'), TRUE);

    if(isset($user)){
      $this->session->set_flashdata('error','Username has already been taken');
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function checkingEmailReg($email){
    if ($this->checkingUnameReg($this->input->post('uname'))) {
      $user = $this->mauth->getData(array('email' => $email),
        array('emailRegField' => 'email'), TRUE);

      if(isset($user)){
        $this->session->set_flashdata('error', 'Email hasl already been taken');
        return FALSE;
      }else{
        return TRUE;
=======
      if ($this->session->userdata('uType') == NULL) {
        redirect('auth/login');
      } elseif($this->session->userdata('uType') == 1){
        redirect('');
>>>>>>> 27d538f46cbedac8f6567d9b7f89233aefec6e98
      }
    }else {
      $this->session->set_flashdata('error', 'Username has already been taken');
    }
<<<<<<< HEAD
  }

  public function checkingPassReg($password){
    if ($this->checkingEmailReg($this->input->post('email'))) {
      $user = $this->mauth->getData(array('username' => $this->input->post('uname')),
        array('paswordRegField' => 'password'), TRUE);

        if(password_verify($password, $user->password)){
          $this->session->set_flashdata('error', 'Password has already been taken');
          return FALSE;
        }else {
          return TRUE;
        }
    } elseif ($this->checkingUnameReg($this->input->post('uname'))) {
      $this->session->set_flashdata('error', 'Username has already been taken');
    }else {
      $this->session->set_flashdata('error', 'Email has already been taken');
    }
=======
>>>>>>> 27d538f46cbedac8f6567d9b7f89233aefec6e98
  }

}
