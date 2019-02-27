<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This class for store owner only
 */
class Stores extends CI_Controller{

  function __construct(){
    parent::__construct();

    $this->load->helper('url');
    $this->load->model('Mstore', 'mstore');
    $this->load->model('Mhome', 'mhome');
  }

  public function confirmProduct($idStore, $idProd){
    if ($this->session->userdata('uType') == 3) {
      $condition = array(
        'id_product' => $idProd,
        'id_store'   => $this->session->userdata('idStore')
      );
      $accept = array(
        'new' => 0,
      );
      $this->mstore->updateData($condition, $accept, 'tr_product');
      redirect();
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function storeProduct( $idProd = FALSE,$idStore = FALSE){
    if ($this->session->userdata('uType') == 3) {
      if ($idStore === FALSE && $idProd === FALSE) {
        $data['products'] = $this->mstore->productAcceptStore($this->session->userdata('idStore'));

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('storeOwner/productStore', $data);
        $this->load->view('include/admin/footer');
      } else {
        $id = array('idStore' => $idStore, 'idProd' => $idProd);
        $data['id'] = $id;
        $data['product'] = $this->mstore->getProducts(array('id' => $idProd), NULL, 'tm_product', TRUE);
        $idBrand = $this->mstore->getProducts(array('id'=> $idProd), array('idBrand' => 'brand_id'), 'tm_product',
          TRUE);
        $idCat = $this->mstore->getProducts(array('id' => $idProd), array('idCat' => 'cat_id'), 'tm_product',
          TRUE);
        $idSize = $this->mstore->getProducts(array('prod_id' => $idProd), array('sizeId' => 'size_id'),
          'tr_product_size', TRUE);
        $idSpec = $this->mstore->getProducts(array('prod_id' => $idProd), array('specId' => 'spec_id'),
          'tr_product_spec', TRUE);
        $data['Qnt'] = $this->mstore->getProducts(array('id_product' => $idProd, 'id_store' => $idStore),
          array('quantityField' => 'quantity'), 'tr_product', TRUE);
        $data['brand'] = $this->mstore->getProducts(array('id' => $idBrand['brand_id']),
          array('nameBrand' => 'name'), 'tm_brands', TRUE);
        $data['cat'] = $this->mstore->getProducts(array('id' => $idCat['cat_id']),
          array('nameCat' => 'name'), 'tm_category', TRUE);
        $data['size'] = $this->mstore->getProducts(array('id' => $idSize['size_id']),
          array('nameField' => 'name', 'sizeField' => 'size'), 'tm_size', TRUE);
        $data['spec'] = $this->mstore->getProducts(array('id' => $idSpec['spec_id']),
          array('nameField' => 'name'), 'tm_spec', TRUE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('storeOwner/detail_prodStore', $data);
        $this->load->view('include/admin/footer');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addQuantity($idStore, $idProd){
    if ($this->session->userdata('uType') == 3) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('quantity','Quantity','required');

      if ($this->form_validation->run() === FALSE) {
        $id = array('idStore' => $idStore, 'idProd' => $idProd);
        $data['id'] = $id;
        $data['product'] = $this->mstore->getProducts(array('id' => $idProd), NULL, 'tm_product', TRUE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('storeOwner/addQuantity', $data);
        $this->load->view('include/admin/footer');
      } else {
        $items = array('quantity' => $this->input->post('quantity'));
        $condition = array(
          'id_store'    => $idStore,
          'id_product'  => $idProd
        );
        $this->mstore->updateData($condition, $items, 'tr_product');
        redirect('stores/storeProduct');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }

  }

  public function inbound() {
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

}
