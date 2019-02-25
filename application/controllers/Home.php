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
    $data = $this->mhome->checkStock_by_Distcit($idProduct, $idDistrict);
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

  public function addToCart() {
    $size_name = $this->mhome->sizeStock($this->input->post('size'));
    $product = $this->mhome->getProducts(array('id'=>$this->input->post('product_id')), NULL, 'tm_product', TRUE);
    $data = array(
      'id'          => $this->input->post('product_id'),
      'image'       => $product['image'],
      'qty'         => $this->input->post('qty'),
      'price'       => $this->input->post('price'),
      'name'        => $this->input->post('product_name'),
      'sizeName'    => $size_name[0]['name_size'],
      'detailSize'  => $size_name[0]['detail_size'],
      'options' => array('Size' => $this->input->post('size'))
    );
    $this->cart->insert($data);
    // print_r($this->cart->contents());
    // echo "</br>";
    // print_r($data);
    redirect('home/shopCart');
  }

  public function shopCart(){
    $data['cart'] = $this->cart->contents();
    $this->load->view('include/header2');
    $this->load->view('shop-cart', $data);
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
    $this->load->view('include/header2');
    $this->load->view('transaction-page');
    $this->load->view('include/footer');
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
