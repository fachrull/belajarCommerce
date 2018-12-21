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

  public function index(){
      $this->load->view('include/header');
      $this->load->view('home');
      $this->load->view('include/footer');
  }

  public function admin(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->view('include/header');
      $this->load->view('admin');
      $this->load->view('include/footer');
    } else {
      show_404();
    }
  }

  public function store(){
    if ($this->session->userdata('uType') == 2) {
      $this->load->view('include/header');
      $this->load->view('store');
      $this->load->view('include/footer');
    }elseif ($this->session->userdata('uType') == 1) {
      if ($this->session->userdata('uId') === FALSE) {
        $data['posts'] = $this->mhome->dataStores();
        $this->load->view('include/header');
        $this->load->view('stores', $data);
        $this->load->view('include/footer');
      }else {
        $id = $this->session->userdata('uId');
        $data['post'] = $this->mhome->dataStores($id);
        $this->load->view('include/header');
        $this->load->view('stores', $data);
        $this->load->view('include/footer');
      }

    } else {
      show_404();
    }
  }

  public function customer(){
    if ($this->session->userdata('uType') == 3) {
      $this->load->view('include/header');
      $this->load->view('customer');
      $this->load->view('include/footer');
    }else {
      show_404();
    }
  }


}
