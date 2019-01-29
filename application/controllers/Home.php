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
          $idStore = array('idStore' => $link);
          $this->session->set_userdata($idStore);
          $id = $this->mhome->getProducts(array('id' => $link),
            array('idUserLogin' => 'id_userlogin'), 'tm_store_owner', TRUE);
          $data['post'] = $this->mhome->getDataIndex($link);
          $data['prime'] = $this->mhome->dataPrime($id['id_userlogin']);

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/detail_store', $data);
          $this->load->view('include/admin/footer');
        }
      }
    } elseif ($this->session->userdata('uType') == 3) {
      if ($this->session->userdata('uNew') == 1) {
        redirect('auth/completing_profile');
      }else{
        $idStore = $this->mhome->getProducts(array('id_userlogin' => $this->session->userdata('uId')),
          array('idField' => 'id'), 'tm_store_owner', TRUE);
        $data['products'] = $this->mhome->joinStoreProd($idStore['id']);
        $id = array('idStore' => $idStore['id']);
        $this->session->set_userdata($id);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('storeOwner/myStore', $data);
        $this->load->view('include/admin/footer');
      }
    } elseif ($this->session->userdata('uType') == 4) {
      $data['slides'] = $this->mhome->getProducts(NULL, array('slideField' => 'slide'), 'tm_slide', FALSE);
      $data['pedias'] = $this->mhome->getProducts(NULL, NULL, 'tm_agmpedia', FALSE);
      
      $this->load->view('include/header');
      $this->load->view('home', $data);
      $this->load->view('include/footer');
    } elseif ($this->session->userdata('uType') == NULL) {
      $data['pedias'] = $this->mhome->getProducts(NULL, NULL, 'tm_agmpedia', FALSE);
      $data['slides'] = $this->mhome->getProducts(NULL, array('slideField' => 'slide'), 'tm_slide', FALSE);

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

  public function shop(){
    $this->load->view('include/header2');
    $this->load->view('shop');
    $this->load->view('include/footer');
  }

  public function listArticle(){
    $data['pedias'] = $this->mhome->getProducts(NULL, array('idField' => 'id', 'titleField' => 'title',
      'subContent' => 'sub_content', 'thumbnailField' => 'thumbnail'), 'tm_agmpedia', FALSE);
      
    $this->load->view('include/header2');
    $this->load->view('list-article', $data);
    $this->load->view('include/footer');
  }

  public function fullArticle($id){
    $data['pedias'] = $this->mhome->getProducts(NULL, array('idField' => 'id', 'titleField' => 'title',
      'subContent' => 'sub_content', 'thumbnailField' => 'thumbnail'), 'tm_agmpedia', FALSE);
    $data['article'] = $this->mhome->getProducts(array('id' => $id), NULL, 'tm_agmpedia', TRUE);

    $this->load->view('include/header2');
    $this->load->view('full-article', $data);
    $this->load->view('include/footer');
  }

  public function detailProduct(){
    $this->load->view('include/header2');
    $this->load->view('detail-product');
    $this->load->view('include/footer');
  }

  public function shopCart(){
    $this->load->view('include/header2');
    $this->load->view('shop-cart');
    $this->load->view('include/footer');
  }

  public function shopCheckout(){
    $this->load->view('include/header2');
    $this->load->view('shop-checkout');
    $this->load->view('include/footer');
  }

  public function checkoutDone(){
    $this->load->view('include/header2');
    $this->load->view('checkout-done');
    $this->load->view('include/footer');
  }

  public function promotionPage(){
    $this->load->view('include/header2');
    $this->load->view('promotion-page');
    $this->load->view('include/footer');
  }

  public function pageAbout(){
    $this->load->view('include/header2');
    $this->load->view('page-about');
    $this->load->view('include/footer');
  }

  public function pageContact(){
    $this->load->view('include/header2');
    $this->load->view('page-contact');
    $this->load->view('include/footer');
  }

  public function pageFaq(){
    $this->load->view('include/header2');
    $this->load->view('page-faq');
    $this->load->view('include/footer2');
  }

  public function termCondition(){
    $this->load->view('include/header2');
    $this->load->view('term-condition');
    $this->load->view('include/footer');
  }

  public function privacyPolicy(){
    $this->load->view('include/header2');
    $this->load->view('privacy-policy');
    $this->load->view('include/footer');
  }

  public function searchResult(){
    $this->load->view('include/header2');
    $this->load->view('search-result');
    $this->load->view('include/footer');
  }

  public function partnership(){
    $this->load->view('include/header2');
    $this->load->view('partnership');
    $this->load->view('include/footer');
  }

  public function pageLogin(){
    $this->load->view('include/header2');
    $this->load->view('login');
    $this->load->view('include/footer');
  }

  public function promotionDetail(){
    $this->load->view('include/header2');
    $this->load->view('promotion-detail');
    $this->load->view('include/footer');
  }
  
  public function bestSeller(){
    $this->load->view('include/header2');
    $this->load->view('best-seller');
    $this->load->view('include/footer');
  }
}
