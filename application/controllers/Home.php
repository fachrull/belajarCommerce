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
    if ($this->session->userdata('uType') == 1) {
      if ($link === FALSE) {
        $data['posts'] = $this->mhome->getDataIndex();

        $this->load->view('include/header');
        $this->load->view('home_admin', $data);
        $this->load->view('include/footer');
      }else{
        $this->load->view('include/header');
        echo "<h1>This feature will be updated soon.</h1>";
        $this->load->view('include/footer');
      }
    } elseif ($this->session->userdata('uType') == 2) {
      if($link === FALSE){
        $data['posts'] = $this->mhome->getDataIndex();

        $this->load->view('include/header');
        $this->load->view('stores', $data);
        $this->load->view('include/footer');
      } else {
        $id_userLogin = $this->session->userdata('uId');
        $data['post'] = $this->mhome->getDataIndex($link);
        $data['prime'] = $this->mhome->dataPrime($id_userLogin);

        $this->load->view('include/header');
        $this->load->view('detail_store', $data);
        $this->load->view('include/footer');
      }
    } elseif ($this->session->userdata('uType') == 3) {
      $this->load->view('include/header');
      $this->load->view('store');
      $this->load->view('include/footer');
    } elseif ($this->session->userdata('uType') == 4) {
      $this->load->view('include/header');
      $this->load->view('home');
      $this->load->view('include/footer');
    } elseif ($this->session->userdata('uType') == NULL) {
      $this->load->view('include/header');
      $this->load->view('home');
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
      show_404();
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
      show_404();
    }

  }


}
