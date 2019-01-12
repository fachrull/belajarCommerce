<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * this is class for home page
 */
class Home extends CI_Controller{

  function __construct(){
    parent::__construct();
    $this->load->helper('url');
    $this->load->model('Mhome', 'mhome');
  }

  public function index($link = FALSE){
    $this->load->library('form_validation');
    if ($this->session->userdata('uType') == 1) {
      if ($this->session->userdata('uNew') == 1) {
        redirect('auth/completing_profile');
      }else{
        if ($link === FALSE) {
          $data['posts'] = $this->mhome->getDataIndex();

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/home_admin', $data);
          $this->load->view('include/admin/footer');
        }else{
          $this->load->view('include/header');
          echo "<h1>This feature will be updated soon.</h1>";
          $this->load->view('include/footer');
        }
      }
    } elseif ($this->session->userdata('uType') == 2) {
      if($this->session->userdata('uNew') == 1){
        redirect('auth/completing_profile');
      }else{
        if($link === FALSE){
          $data['posts'] = $this->mhome->getDataIndex();

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/stores', $data);
          $this->load->view('include/admin/footer');
        } else {
          $id_userLogin = $this->session->userdata('uId');
          $data['post'] = $this->mhome->getDataIndex($link);
          $data['prime'] = $this->mhome->dataPrime($id_userLogin);

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/detail_store', $data);
          $this->load->view('include/admin/footer');
        }
      }
    } elseif ($this->session->userdata('uType') == 3) {
      if ($this->session->userdata('uNew') == 1) {
        $this->load->view('include/header');
        $this->load->view('new_user');
        $this->load->view('include/footer');
      }else{
        $this->load->view('include/header');
        $this->load->view('store');
        $this->load->view('include/footer');
      }
    } elseif ($this->session->userdata('uType') == 4) {
      $this->load->view('include/header');
      $this->load->view('home');
      $this->load->view('include/footer');
    } elseif ($this->session->userdata('uType') == NULL) {
      $data['pedias'] = $this->mhome->getProducts(NULL, NULL, 'tm_agmpedia', FALSE);

      $this->load->view('include/header');
      $this->load->view('home', $data);
      $this->load->view('include/footer');
    }
  }

  public function customer(){
    if ($this->session->userdata('uType') == 3) {
      $id = $this->session->userdata('uId');
      $data['post'] = $this->mhome->dataStores($id);

      $this->load->view('include/header');
      $this->load->view('customer', $data);
      $this->load->view('include/footer');
    }else {
      $this->load->view('include/header');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function editProfile(){
    if ($this->session->userdata('uType') == 3) {
      $id = $this->session->userdata('uId');
      $data['post'] = $this->mhome->dataStores($id);

      $this->load->view('include/header');
      $this->load->view('edit_profile', $data);
      $this->load->view('include/footer');
    }else {
      $this->load->view('include/header');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  // public function ($value='')
  // {
  //   // code...
  // }
}
