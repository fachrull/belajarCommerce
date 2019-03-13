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
          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/home');
          $this->load->view('include/admin/footer');
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
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/home');
        $this->load->view('include/admin/footer');
      }
    } elseif ($this->session->userdata('uType') == 4) {
      $data['slides'] = $this->mhome->getProducts(NULL, array('slideField' => 'slide'), 'tm_slide', FALSE);
      $data['pedias'] = $this->mhome->getProducts(NULL, NULL, 'tm_agmpedia', FALSE);
      $data['stores'] = $this->storesToGeoJson();

      $this->load->view('include/header');
      $this->load->view('home', $data);
      $this->load->view('include/footer');
    } elseif ($this->session->userdata('uType') == NULL) {
      $data['pedias'] = $this->mhome->getProducts(NULL, NULL, 'tm_agmpedia', FALSE);
      $data['slides'] = $this->mhome->getProducts(NULL, array('slideField' => 'slide'), 'tm_slide', FALSE);
      $data['stores'] = $this->storesToGeoJson();

      $this->load->view('include/header');
      $this->load->view('home', $data);
      $this->load->view('include/footer');
    }
  }

  function storesToGeoJson() {
    $geojson = array (
      'type' => 'FeatureCollection',
      'features' => array()
    );

    $stores = $this->mhome->getProducts(NULL, array('idField' => 'id',
      'company_nameField' => 'company_name', 'addField' => 'address', 'latField' => 'latitude',
      'lngField' => 'langtitude', 'phoneField' => 'phone1'), 'tm_store_owner', FALSE);

      foreach ($stores as $store) {
        $feature =  array(
          'id' => $store['id'],
          'type' => 'Feature',
          'geometry' => array(
            'type' => 'Point',
            'coordinates' => array($store['langtitude'], $store['latitude'])
          ),
          'properties' => array(
            'company_name' => $store['company_name'],
            'address' => $store['address'],
            'phone' => $store['phone1']
          )
        );
        array_push($geojson['features'], $feature);
      }
    return JSON_encode($geojson, JSON_NUMERIC_CHECK);
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

  public function shop($brand, $category){
    if($brand == 6){
        $category = NULL;
    }
    $data['products'] = $this->mhome->getProduct_price($brand, $category);
    $data['brand'] = $this->mhome->getProducts(array('id' => $brand), array('nameField' => 'name', 'idField' => 'id'),
      'tm_brands', TRUE);
    $data['category'] = $this->mhome->brand_categories($brand);
    $data['brands'] = $this->mhome->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name'),
      'tm_brands', FALSE);

    $this->load->view('include/header2');
    $this->load->view('shop', $data);
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

  public function checkStockbyDistrict($idProduct, $idDistrict){
    $data = $this->mhome->checkStock_by_District($idProduct, $idDistrict);
    if($data) {
        print_r(json_encode($data));
    } else {
        $data = array();
        print_r(json_encode($data));
    }
  }

  public function checkPricebyProdSize($idProd, $idSize){
      $data = $this->mhome->getProducts(array('prod_id'=>$idProd, 'id'=> $idSize),
        array('priceField'=>'price'), 'tr_product_size', TRUE);
      if($data){
        print_r(json_encode($data));
      }else{
          $data = array();
          print_r(json_encode($data));
      }
  }

  public function detailProduct($idProduct){
    $specs = [];
    $prices = [];
    $sizes = [];
    $data['product'] = $this->mhome->getProduct_MaxMinPrice($idProduct);
    // print_r($data['product']);
    // exit();
    $data['provinces'] = $this->mhome->getProducts(NULL, array('id_provField' => 'id_prov', 'nameProv' => 'nama'),
      'provinsi', FALSE);
    $data['cities'] = $this->mhome->getProducts(NULL, NULL, 'kabupaten', FALSE);
    $data['sub_districts'] = $this->mhome->getProducts(NULL, NULL, 'kecamatan', FALSE);
    $idSpec = $this->mhome->getProducts(array('prod_id' => $idProduct),
       array('idField' => 'spec_id'), 'tr_product_spec', FALSE);
    $idSize = $this->mhome->getProducts(array('prod_id' => $idProduct),
       array('idField' => 'size_id', 'priceField' => 'price'), 'tr_product_size', FALSE);

    for ($i=0; $i < count($idSpec) ; $i++) {
        array_push($specs, $this->mhome->getProducts(array('id' => $idSpec[$i]['spec_id']),
         array('nameField' => 'name'), 'tm_spec', TRUE));
      }
    $data['specs'] = $specs;

    for ($i=0; $i < count($idSize); $i++) {
        array_push($prices, $idSize[$i]['price']);
      }
      $data['prices'] = $prices;

      for ($i=0; $i < count($idSize); $i++) {
        array_push($sizes, $this->mhome->getProducts(array('id' => $idSize[$i]['size_id']),
         array('nameField' => 'name', 'sizeField' => 'size'), 'tm_size', FALSE));
      }
      $data['sizes'] = $sizes;

    $this->load->view('include/header2');
    $this->load->view('detail-product', $data);
    $this->load->view('include/footer');
  }

  public function checkProv($idProvince){
    $province = $this->mhome->getProducts(array('id_prov' => $idProvince), array('id_kabField' => 'id_kab',
      'namaField'=> 'nama'), 'kabupaten', FALSE);
    if($province) {
        print_r(json_encode($province));
    } else {
        echo "Something went wrong";
    }
  }

  public function checkSubDistrict($idCity){
    $subDistrict = $this->mhome->getProducts(array('id_kab' => $idCity), array('id_kecField' => 'id_kec',
      'namaField'=> 'nama'), 'kecamatan', FALSE);
    if($subDistrict) {
        print_r(json_encode($subDistrict));
    } else {
        echo "Something went wrong";
    }
  }

  public function deleteCart(){
      $this->cart->destroy();
      redirect('home/shopCart');
  }

  public function updateCart($cart_rowId){
      $this->cart->remove($cart_rowId);
      redirect('home/shopCart');
  }

  public function addToCart($idDistrict) {
    $size_name = $this->mhome->sizeStock($this->input->post('size'));
    $idTrProduct['id_trProduct'] = $this->mhome->getProducts(array('id_product' => $this->input->post('product_id'),
      'id_product_size' => $this->input->post('size')), array('idField' => 'id'), 'tr_product', TRUE);
    $idUserLogin = $this->session->userdata('uId');
    $product = $this->mhome->getProducts(array('id'=>$this->input->post('product_id')), NULL, 'tm_product', TRUE);
    $data = array(
      'id'          => $this->input->post('product_id'),
      'image'       => $product['image'],
      'qty'         => $this->input->post('qty'),
      'price'       => $this->input->post('price'),
      'name'        => $this->input->post('product_name'),
      'id_trProduct'=> $idTrProduct['id_trProduct']['id'],
      'id_userlogin'=> $idUserLogin,
      'sizeName'    => $size_name[0]['name_size'],
      'detailSize'  => $size_name[0]['detail_size'],
      'sub_district'=> $idDistrict,
      'options' => array('Size' => $this->input->post('size'))
    );
    // print_r($this->session->userdata());
    // print_r($data);
    // exit();
    $this->cart->insert($data);
    // print_r($this->cart->contents());
    // exit();
    redirect('home/shopCart');
  }

  public function shopCart(){
    $data['cart'] = $this->cart->contents();
    $this->load->view('include/header2');
    $this->load->view('shop-cart', $data);
    $this->load->view('include/footer');
  }

  public function checkout(){
      if ($this->session->userdata('uType') == 4) {
          $data['cart'] = $this->cart->contents();
          $userId = $this->session->userdata('uId');
          $defaultAdd = $this->mhome->getProducts(array('id_userlogin' => $userId, 'default_address' => 1),
              array('idField' => 'id'), 'tm_customer_detail', true);
          $rand = rand(1, 999);
          $order = array (
              'order_number'  => 'AGM'.date("dmy").$rand,
              'id_userlogin'  => $userId,
              'total'         => $this->cart->total(),
              'address_detail' => $defaultAdd['id'],
              'status_order'  => 2
          );
          $this->mhome->inputData('tm_order', $order);
          $orderId = $this->mhome->getProducts(array('order_number' => $order['order_number']), array('id' => 'id'),
              'tm_order',true);
          foreach ($data['cart'] as $cart) {
              $save_to_Order = array(
                  'id_tm_order'  => $orderId['id'],
                  'id_tr_Product'  => $cart['id_trProduct'],
                  'quantity'      => $cart['qty'],
                  'subtotal'      => $cart['subtotal']
              );
              $this->mhome->inputData('tr_order_detail', $save_to_Order);
              $qtyStore = $this->mhome->getProducts(array('id' => $cart['id_trProduct']), array('qty' => 'quantity'), 'tr_product', TRUE);
              $newQuanStore = $qtyStore['quantity'] - $cart['qty'];
              $inputQtyStore = array('quantity' => $newQuanStore);
              $this->mhome->updateData(array('id' => $cart['id_trProduct']), $inputQtyStore, 'tr_product');
          }
          $this->cart->destroy();
          redirect('home/checkoutDone');
      } else {
          redirect('auth/login');
      }
  }

  public function cancelOrder($id) {
      if($this->session->userdata('uType') ==  4) {
          $statusOrder = array('status_order' => 3);
          $idCustomer = $this->session->userdata('uId');
          $this->mhome->updateData(array('id' => $id), $statusOrder, 'tm_order');
          $data['detailOrder'] = $this->mhome->detailOrder($id, $idCustomer);

          foreach ($data['detailOrder'] as $item) {
              $id = $item->id_tr_product;
              $qty = $item->quantity;
              $qtyStore = $this->mhome->getProducts(array('id' => $id), array('qty' => 'quantity'), 'tr_product', TRUE);
              $newQuanStore = $qtyStore['quantity'] + $qty;
              $quantity = array('quantity' => $newQuanStore);
              $this->mhome->updateData(array('id' => $id), $quantity, 'tr_product');
          }
          redirect('home/transactionPage');
      }
  }

  public function shopCheckout(){
    if($this->session->userdata('uType') == 4){
      $this->load->helper('form');
      $this->load->library('form_validation');
      if ($this->form_validation->run() === FALSE) {
        $data['alamat_default'] = $this->mhome->detailProfileCustomer($this->session->userdata('uId'));
        $data['historicals'] = $this->mhome->historicalShipping($this->session->userdata('uId'));
        $data['provinces'] = $this->mhome->getProducts(NULL, array('id_provField' => 'id_prov', 'nameProv' => 'nama'),
          'provinsi', FALSE);
        $data['cities'] = $this->mhome->getProducts(NULL, NULL, 'kabupaten', FALSE);
        $data['sub_districts'] = $this->mhome->getProducts(NULL, NULL, 'kecamatan', FALSE);
        $this->load->view('include/header2');
        $this->load->view('shop-checkout', $data);
        $this->load->view('include/footer');
      } else {
        // if ($this->input->post('idShippingHistory') != NULL) {
        //
        // } else {
        //   // code...
        // }
        echo "mantap";
      }
    }else{
      redirect('auth/login');
    }
  }

  public function checkoutDone(){
    if ($this->session->userdata('uType') == 4) {
      $data['uName'] = $this->mhome->getProducts(array('user_id' => $this->session->userdata('uId')), array('usernameField' => 'username'), 'user_login', TRUE);
      $this->load->view('include/header2');
      $this->load->view('checkout-done', $data);
      $this->load->view('include/footer');
    }else{
      redirect('auth/login');
    }
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
    $this->load->view('include/footer');
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

  public function historyPage(){
    $this->load->view('include/header2');
    $this->load->view('history-page');
    $this->load->view('include/footer');
  }

  public function wishlistPage(){
    $this->load->view('include/header2');
    $this->load->view('wishlist-page');
    $this->load->view('include/footer');
  }

  public function transactionPage(){
    if ($this->session->userdata('uType') == 4) {
      $idCustomer = $this->session->userdata('uId');

      $data['orderList'] = $this->mhome->listOrderCustomer($idCustomer);

//      print_r($data);

      $this->load->view('include/header2');
      $this->load->view('transaction-page', $data);
      $this->load->view('include/footer');
    } else {
      redirect('auth/login');
    }
  }

  public function detail_transaction($idOrder){
    if ($this->session->userdata('uType') == 4) {
      $idCustomer = $this->session->userdata('uId');
      $data['detailOrder'] = $this->mhome->detailOrder($idOrder, $idCustomer);

//      print_r($data['detailOrder'][0]->order_number);
//
      $this->load->view('include/header2');
      $this->load->view('detail-transaction-page', $data);
      $this->load->view('include/footer');
    } else {
      redirect('auth/login');
    }

  }

  public function profilePage(){
    $this->load->view('include/header2');
    $this->load->view('page-profile');
    $this->load->view('include/footer');
  }

  public function profileSetting(){
    $this->load->view('include/header2');
    $this->load->view('page-profile-settings');
    $this->load->view('include/footer');
  }
}
