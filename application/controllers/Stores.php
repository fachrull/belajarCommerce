<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This class for store owner only
 */
class Stores extends CI_Controller{

  function __construct(){
    parent::__construct();
      $params = array('server_key' => 'SB-Mid-server--tJLtZ_iEZ3G_oN_ixz3rtF3', 'production' => false);
      $this->load->library('midtrans');
      $this->midtrans->config($params);
    $this->load->helper('url');
    $this->load->model('Mstore', 'mstore');
    $this->load->model('Mhome', 'mhome');
  }

  // function confirm product (now it no used anymore)
  public function confirmProduct($idStore, $idProd){
    // checking if it store owner or not
    if ($this->session->userdata('uType') == 3) {
      // get id product and store owner id
      $condition = array(
        'id_product' => $idProd,
        'id_store'   => $this->session->userdata('idStore')
      );

      // set new to false
      $accept = array(
        'new' => 0,
      );

      // update confirmation product
      $this->mstore->updateData($condition, $accept, 'tr_product');
      redirect();
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  // function for list of store product
  public function storeProduct( $idProd = FALSE,$idStore = FALSE){
    // checking if it store owner or not
    if ($this->session->userdata('uType') == 3) {
      // checking if parameter is all false
      if ($idStore === FALSE && $idProd === FALSE) {

        // get id store from table tm_store_owner
        $idStore = $this->mstore->getProducts(array('id_userlogin' =>
        $this->session->userdata('uId')), array('idField' => 'id'),
        'tm_store_owner', TRUE);
        // get all products thats assign to store
        $data['products'] = $this->mstore->productAcceptStore($idStore['id']);
        // print_r($this->db->last_query());exit();

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('storeOwner/productStore', $data);
        $this->load->view('include/admin/footer');

        // if all parameters are true
      } else {
        // get all parameter
        $id = array('idStore' => $idStore, 'idProd' => $idProd);

        $data['id'] = $id;
        // get detail product from id prod
        $data['product'] = $this->mstore->getProducts(array('id' => $idProd), NULL, 'tm_product', TRUE);
        // get brand product
        $idBrand = $this->mstore->getProducts(array('id'=> $idProd), array('idBrand' => 'brand_id'), 'tm_product',
          TRUE);
        // get category product
        $idCat = $this->mstore->getProducts(array('id' => $idProd), array('idCat' => 'cat_id'), 'tm_product',
          TRUE);
        // get size product
        $idSize = $this->mstore->getProducts(array('prod_id' => $idProd), array('sizeId' => 'size_id'),
          'tr_product_size', TRUE);
        // get spec product
        $idSpec = $this->mstore->getProducts(array('prod_id' => $idProd), array('specId' => 'spec_id'),
          'tr_product_spec', TRUE);
        // get quantity product
        $data['Qnt'] = $this->mstore->getProducts(array('id_product' => $idProd, 'id_store' => $idStore),
          array('quantityField' => 'quantity'), 'tr_product', TRUE);
        // get product name
        $data['brand'] = $this->mstore->getProducts(array('id' => $idBrand['brand_id']),
          array('nameBrand' => 'name'), 'tm_brands', TRUE);
        // get product category name
        $data['cat'] = $this->mstore->getProducts(array('id' => $idCat['cat_id']),
          array('nameCat' => 'name'), 'tm_category', TRUE);
        // get product size name and detail
        $data['size'] = $this->mstore->getProducts(array('id' => $idSize['size_id']),
          array('nameField' => 'name', 'sizeField' => 'size'), 'tm_size', TRUE);
        // get product spec names
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

// function for add quantity product
  public function addQuantity($idStore, $idProd, $idProdSize){
    // checking usertype (store owner or not)
    if ($this->session->userdata('uType') == 3) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      // set rules
      $this->form_validation->set_rules('ibound', 'Inbound', 'required');

      if ($this->form_validation->run() === FALSE) {
        // get id store, id product, and id product size
        $id = array('idStore' => $idStore, 'idProd' => $idProd, 'idProdSize' => $idProdSize);
        $data['id'] = $id;
        // get detail product
        $data['product'] = $this->mstore->getProducts(array('id' => $idProd), NULL,
         'tm_product', TRUE);
        // get last quantity
        $data['quantity'] = $this->mstore->getProducts(array('id_store' => $idStore,
         'id_product' => $idProd, 'id_product_size' => $idProdSize),
         array('iBound' => 'inbound'),'tr_product', TRUE);
        // print_r($data);
        // exit();

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('storeOwner/addQuantity', $data);
        $this->load->view('include/admin/footer');
      } else {
        // get stock akhir from id store, id product, and id product size
        $stAkhir = $this->mstore->getProducts(array('id_store' => $idStore, 'id_product' => $idProd,
         'id_product_size' => $idProdSize), array('skAkhir' => 'stock_akhir'), 'tr_product', TRUE);
        // get inbound post
        $ibound = $this->input->post('ibound');
        // add inbound post with stock akhir
        $update_stAkhir = $ibound + $stAkhir['stock_akhir'];

        // update stock akhir
        $items = array(
          'inbound'     => $ibound,
          'stock_akhir' => $update_stAkhir
        );
        $condition = array(
          'id_store'        => $idStore,
          'id_product'      => $idProd,
          'id_product_size' => $idProdSize
        );
        $this->mstore->updateData($condition, $items, 'tr_product');

        // input history inbound
        $history_inbound = array(
          'id_prod_size'  => $idProdSize,
          'id_store'      => $idStore,
          'quantity'      => $ibound
        );
        $this->mstore->inputData('tr_stock', $history_inbound);
        redirect('stores/storeProduct');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  // function for add quantity special package product
  public function addQuantity_SpecialPkg($idStore, $idProd){
    // check user type (store owner or not)
    if ($this->session->userdata('uType') == 3) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      // set rules
      $this->form_validation->set_rules('quantity', 'Quantity', 'required');

      if ($this->form_validation->run() === FALSE) {
        // get id store and id product
        $data['core'] = array('idStore' => $idStore, 'idProd' => $idProd);
        // get last quantity
        $data['qty'] = $this->mstore->qtySpecial_Pkg($idStore, $idProd);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('storeOwner/addQty_SpecialPkg', $data);
        $this->load->view('include/admin/footer');
      }else {
        // data update quantity
        $condition = array(
          'id_store'    =>  $idStore,
          'id_product'  =>  $idProd,
        );

        $addQuantity = array(
          'quantity'    =>  $this->input->post('quantity')
        );

        // update quantity
        $this->mstore->updateData($condition, $addQuantity, 'tr_product');
        redirect('stores/storeProduct');
      }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  // function for detail special package
  public function detailSpecialPackage($prod_id){
    // checking usertype (store owner or not)
    if ($this->session->userdata('uType') == 3) {
      // get detail data special package
      $data['detail_SpclPckg'] = $this->mstore->detailSpecialPackage($prod_id);
      $data['prod_SpclPckg'] = $this->mstore->prodSpecial_Pkg($prod_id);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('storeOwner/detail_specialPkg', $data);
      $this->load->view('include/admin/footer');
    }else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  // function for update transaction status
  public function updateTransactionStatus($idOrder, $idCustomer) {
    // checking usertype (store owner or not)
      if ($this->session->userdata('uType') == 3) {
        // get status order that store owner post
          $status = array('status_order' => $this->input->post('status'));
          // update status order
          $condition = array('id'=> $idOrder);
          $this->mstore->updateData($condition, $status, 'tm_order');
          if($this->input->post('status') == 3) {
              $this->orderCancellation($idOrder, $idCustomer);
          }
          redirect('stores/detailTransaction/'.$idOrder.'/'.$idCustomer);
      } else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
      }
  }

  // function for cancellation order
  public function orderCancellation($idOrder, $idCustomer) {
    // checking user type (store owner or not)
      if ($this->session->userdata('uType') == 3) {
        // get detail order
          $detailOrder = $this->mstore->getDetailOrder($idOrder, $idCustomer);
          // get order number
          $orderId = $detailOrder[0]->order_number;

          // release stock
          foreach ($detailOrder as $item) {
              $id = $item->id_tr_product;
              $qty = $item->quantity;
              $qtyStore = $this->mstore->getProducts(array('id' => $id), array('qty' => 'quantity'), 'tr_product', TRUE);
              $newQuanStore = $qtyStore['quantity'] + $qty;
              $quantity = array('quantity' => $newQuanStore);
              $this->mstore->updateData(array('id' => $id), $quantity, 'tr_product');
          }
          $this->midtrans->cancel($orderId);

      } else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
      }
  }

  // function for inbound
  public function inbound() {
    // get id store from tm_store_owner
        $idStore = $this->mhome->getProducts(array('id_userlogin' => $this->session->userdata('uId')),
          array('idField' => 'id'), 'tm_store_owner', TRUE);
        // get store product and every detail
        $data['products'] = $this->mhome->joinStoreProd($idStore['id']);
        $id = array('idStore' => $idStore['id']);
        $this->session->set_userdata($id);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('storeOwner/myStore', $data);
        $this->load->view('include/admin/footer');
  }

  // function for list of transaction
  public function transaction(){
    // checking usertype (store owner or not)
    if ($this->session->userdata('uType') == 3) {
      // get store owner id
      $idStore = $this->session->userdata('uId');
      // get id store owner from tm_store_owner
      $idStOwner = $this->mstore->getProducts(array('id_userlogin' => $idStore),
       array('idField' => 'id'), 'tm_store_owner', TRUE);
      // get every transaction that store have
      $data['transactions'] = $this->mstore->testOrderList($idStOwner['id']);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('storeOwner/transaction', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }

  }

  // function for list of history transaction
    public function history(){
      // checking usertype (store owner or not)
        if ($this->session->userdata('uType') == 3) {
          // get user id from session
            $idStore = $this->session->userdata('uId');
            // get id store owner from tm_store_owner
            $idStOwner = $this->mstore->getProducts(array('id_userlogin' => $idStore), array('idField' => 'id'), 'tm_store_owner', TRUE);
            // get all history transaction with status order 1 or 3
            $data['transactions'] = $this->mstore->order_list($idStOwner['id'], TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('storeOwner/history-transaction', $data);
            $this->load->view('include/admin/footer');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }

    }

  // function for detail transaction
  public function detailTransaction($idOrder, $idCustomer){
    // get prime data of detail order
      $data['detailOrder'] = $this->mstore->testgetDetailOrder($idOrder, $idCustomer);
      // get detail product of transaction
      $listOrder = $this->mstore->getProducts(array('id_tm_order' => $idOrder), array('sbttl' => 'subtotal', 'qty' => 'quantity',
        'spcl' => 'special', 'idtrProdSize' => 'id_tr_prod_size', 'idProd' => 'id_product'), 'tr_order_detail', FALSE);

      // set empty variable
      $order_list = array();
      // checking product of transaction (is it special package or retail)
      foreach ($listOrder as $list) {
        // if special package
        if ($list['special'] == TRUE) {
          // get name special package
          $mainSP = $this->mstore->getProducts(array('id' => $list['id_product']), array('name' => 'name', 'img' => 'image'), 'tm_special_package', TRUE);
          // get detail products of  special package
          $detailSP = $this->mstore->listOrderSP($list['id_product']);
          // set detail product to empty variable (order_list)
          $detail_prod = array(
            'special'   =>  $list['special'],
            'name'      =>  $mainSP['name'],
            'size_name' =>  '',
            'size'      =>  '',
            'quantity'  =>  $list['quantity'],
            'subtotal'  =>  $list['subtotal'],
            'option'    =>  $detailSP
          );
          array_push($order_list, $detail_prod);

        // if retail product
        }else{
          // get detail of product
          $prod = $this->mstore->listOrderRetail($list['id_product'], $list['id_tr_prod_size']);
          // set detail product to empty variable
          $detail_prod = array(
            'special'   =>  $list['special'],
            'name'      =>  $prod['name'],
            'size_name' =>  $prod['sizeName'],
            'size'      =>  $prod['sizeDetail'],
            'quantity'  =>  $list['quantity'],
            'subtotal'  =>  $list['subtotal'],
            'option'    => '',
          );
          array_push($order_list, $detail_prod);
        }
      }
      $data['order_list'] = $order_list;

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('storeOwner/detail-transaction', $data);
      $this->load->view('include/admin/footer');
  }

  // function for store owner profile
    public function profile()
    {
      // checking usertype (store owner or not)
        if ($this->session->userdata('uType') == 3) {
          // get store owner id (from session)
            $id = $this->session->userdata('uId');
            // get detail profile store owner
            $data['detail_admin'] = $this->mstore->detail_admin($id);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('storeOwner/profile', $data);
            $this->load->view('include/admin/footer');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function for changing password store owner
    public function changePassword()
    {
      // checking usertype (store owner or not)
        if ($this->session->userdata('uType') == 3) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
            $this->form_validation->set_rules('current', 'Current password', 'required');
            $this->form_validation->set_rules('new', 'New password', 'required');
            $this->form_validation->set_rules('confirm', 'Confirm password', 'required');

            if ($this->form_validation->run() == TRUE) {
              // load model mauth
                $this->load->model('Mauth', 'mauth');
                // get store owner id (from session)
                $id = $this->session->userdata('uId');
                // get current password that store owner post
                $currentPassword = $this->input->post('current');
                // get old password store owner
                $userData = $this->mauth->getData(array('user_id' => $id), array('password' => 'password'), TRUE);

                // check old password with current password
                if (!password_verify($currentPassword, $userData->password)) {
                    $this->session->set_flashdata('error', 'Current password salah');
                    redirect('stores/changePassword');
                } else {
                  // get new password that store owner post
                    $newPassword = $this->input->post('new');
                    // get confirm password
                    $confirmPassword = $this->input->post('confirm');
                    // checking store owner new password and confirmation password
                    if ($confirmPassword === $newPassword) {
                      // hashing new password
                        $data = array(
                            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
                        );
                        // updating new password
                        $this->mstore->updateData(array('user_id' => $id)    , $data, 'user_login');
//                        echo $this->db->last_query();
                        redirect('stores/profile');

                    } else {
                        $this->session->set_flashdata('error', 'Password yang diinput tidak sama');
                        redirect('stores/changePassword');
                    }
                }

            } else {
                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('storeOwner/changePassword');
                $this->load->view('include/admin/footer');
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

}
