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
      if ($this->session->userdata('uNew') == 1) {
        echo "you are new here";
      }else{
        if ($link === FALSE) {
          $data['posts'] = $this->mhome->getDataIndex();

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/home_admin', $data);
          $this->load->view('include/admin/footer');
          $this->load->view('include/admin/right-sidebar');
        }else{
          $this->load->view('include/header');
          echo "<h1>This feature will be updated soon.</h1>";
          $this->load->view('include/footer');
        }
      }
    } elseif ($this->session->userdata('uType') == 2) {
      if($this->session->userdata('uNew') == 1){
        echo "you are new here";
      }else{
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
      }
    } elseif ($this->session->userdata('uType') == 3) {
      if ($this->session->userdata('uNew') == 1) {
        echo "you are new here";
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

  public function sa_brand($link = FALSE){
    if ($this->session->userdata('uType') == 1) {
      if ($link === FALSE) {
        $data['brands'] = $this->mhome->getProducts(NULL, NULL, 'tm_brand', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/sa_brand', $data);
        $this->load->view('include/admin/right-sidebar');
        $this->load->view('include/admin/footer');
      }else{
        $data['brand'] = $this->mhome->getProducts(array('id' => $link),
          array('nameField' => 'name'), 'tm_brand', TRUE);

        $this->load->view('include/header');
        $this->load->view('detail_brand', $data);
        $this->load->view('include/footer');
      }

    }else{
      show_404();
    }
  }

  public function addBrand(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('items', 'Brand', 'required|callback_checkingBrand');

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addBrands');
        $this->load->view('include/admin/right-sidebar');
        $this->load->view('include/admin/footer');
      }else{
        $this->mhome->createItems('tm_brand');
        redirect('home/sa_brand');
      }
    }else{
      show_404();
    }
  }

  public function checkingBrand($brand){
    $has_brand = $this->mhome->getProducts(array('name' => $brand),
      array('nameField' => 'name'), 'tm_brand', TRUE);
    if(isset($has_brand)){
      $this->session->set_flashdata('error', 'Brand has already been created');
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function sa_cat(){
    if ($this->session->userdata('uType') == 1) {
      $data['categories'] = $this->mhome->getProducts(NULL, NULL, 'tm_category', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_cat', $data);
      $this->load->view('include/admin/right-sidebar');
      $this->load->view('include/admin/footer');
    }else {
      show_404();
    }
  }

  public function addCat(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('items', 'Category', 'required|callback_checkingCat');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addCats');
        $this->load->view('include/admin/right-sidebar');
        $this->load->view('include/admin/footer');
      }else{
        $this->mhome->createItems('tm_category');
        redirect('home/sa_cat');
      }
    }
  }

  public function checkingCat($category){
    $has_cat = $this->mhome->getProducts(array('name' => $category),
      array('nameField' => 'name'), 'tm_category', TRUE);
    if(isset($has_cat)){
      $this->session->set_flashdata('error', 'Category has already been created');
      return FALSE;
    }else{
      return TRUE;
    }
  }

}
