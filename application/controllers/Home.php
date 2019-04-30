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
      if ($this->session->userdata('uNew') == 1) {
        redirect('auth/completing_profile');
      }else{
          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/home');
          $this->load->view('include/admin/footer');
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
        $data['slides'] = $this->mhome->getProducts(array('cover' => 1), array('slideField' => 'slide'), 'tm_cover', FALSE);
        $data['best_seller'] = $this->mhome->getProducts(array('cover' => 2), array('slideField' => 'slide'), 'tm_cover', TRUE);
        $data['spPackage'] = $this->mhome->getProducts(array('cover'  => 3), array('slideField' =>  'slide'), 'tm_cover', TRUE);
        $data['bedLinen'] = $this->mhome->getProducts(array('cover' => 4), array('slideField' => 'slide'), 'tm_cover', TRUE);
        $data['beddingAcc'] = $this->mhome->getProducts(array('cover' => 5), array('slideField' => 'slide'), 'tm_cover', TRUE);
        $data['pedias'] = $this->mhome->getPedia();
        $data['stores'] = $this->storesToGeoJson();
        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

        $this->load->view('include/header', $brands);
        $this->load->view('home', $data);
        $this->load->view('include/footer');

    } elseif ($this->session->userdata('uType') == NULL) {
      $data['slides'] = $this->mhome->getProducts(array('cover' => 1), array('slideField' => 'slide'), 'tm_cover', FALSE);
      $data['best_seller'] = $this->mhome->getProducts(array('cover' => 2), array('slideField' => 'slide'), 'tm_cover', TRUE);
      $data['spPackage'] = $this->mhome->getProducts(array('cover'  => 3), array('slideField' =>  'slide'), 'tm_cover', TRUE);
      $data['bedLinen'] = $this->mhome->getProducts(array('cover' => 4), array('slideField' => 'slide'), 'tm_cover', TRUE);
      $data['beddingAcc'] = $this->mhome->getProducts(array('cover' => 5), array('slideField' => 'slide'), 'tm_cover', TRUE);
      $data['pedias'] = $this->mhome->getPedia();
      $data['stores'] = $this->storesToGeoJson();
        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header', $brands);
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
      'lngField' => 'longitude', 'phoneField' => 'phone1'), 'tm_store_owner', FALSE);

      foreach ($stores as $store) {
        $feature =  array(
          'id' => $store['id'],
          'type' => 'Feature',
          'geometry' => array(
            'type' => 'Point',
            'coordinates' => array($store['longitude'], $store['latitude'])
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
        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header', $brands);
      $this->load->view('customer', $data);
      $this->load->view('include/footer');
    }else {
        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

        $this->load->view('include/header', $brands);
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function editProfile(){
    if ($this->session->userdata('uType') == 3) {
      $id = $this->session->userdata('uId');
      $data['post'] = $this->mhome->dataStores($id);
        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

        $this->load->view('include/header', $brands);
      $this->load->view('edit_profile', $data);
      $this->load->view('include/footer');
    }else {
        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

        $this->load->view('include/header', $brands);
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function shop($brand = NULL, $category = NULL){
    if ($brand === NULL && $category === NULL) {
      $data['products'] = $this->mhome->getShop_product();
      $data['brand'] = array('name' => 'All Products');
      $data['category'] = $this->mhome->brand_categories($brand);
    } elseif ($brand !== NULL && $category === NULL) {
      if($brand === 6){
        $category = NULL;
      }
      $data['products'] = $this->mhome->getShop_product($brand);
      $data['brand'] = $this->mhome->getProducts(array('id' => $brand), array('idField' => 'id','nameField' => 'name'), 'tm_brands', TRUE);
      $data['category'] = $this->mhome->brand_categories($brand);
    } else {
      if($brand === 6){
        $category = NULL;
      }
      $data['products'] = $this->mhome->getShop_product($brand, $category);
      $data['brand'] = $this->mhome->getProducts(array('id' => $brand), array('idField' => 'id','nameField' => 'name'), 'tm_brands', TRUE);
      $data['category'] = $this->mhome->brand_categories($brand);
    }
    $data['bestSellers'] = $this->mhome->topthree_bestSeller();
    // print_r($data['category']);
    // exit();
      $data['image'] = $this->mhome->getProducts(NULL, NULL, 'tr_product_image', TRUE);
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('shop', $data);
    $this->load->view('include/footer');
  }

  // public function shop($brand = NULL, $category = NULL){
  //   print_r($data['products']);
  //   echo "</br></br>";
  //   print_r($data['brand']);
  //
  //   $this->load->view('include/header2');
  //   $this->load->view('shop', $data);
  //   $this->load->view('include/footer');
  //   exit();
  //
  //   $data['products'] = $this->mhome->getProduct_price($brand, $category);
  //   $data['brand'] = $this->mhome->getProducts(array('id' => $brand), array('nameField' => 'name', 'idField' => 'id'),
  //     'tm_brands', TRUE);
  //   $data['brands'] = $this->mhome->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name'),
  //     'tm_brands', FALSE);
  // }

  public function listArticle(){
    $data['pedias'] = $this->mhome->getProducts(array('status' => 1, 'deleted' => 0), array('idField' => 'id', 'titleField' => 'title',
      'subContent' => 'sub_content', 'thumbnailField' => 'thumbnail'), 'tm_agmpedia', FALSE);

      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('list-article', $data);
    $this->load->view('include/footer');
  }

  public function fullArticle($id){
    $data['pedias'] = $this->mhome->getProducts(NULL, array('idField' => 'id', 'titleField' => 'title',
      'subContent' => 'sub_content', 'thumbnailField' => 'thumbnail'), 'tm_agmpedia', FALSE);
    $data['article'] = $this->mhome->getProducts(array('id' => $id), NULL, 'tm_agmpedia', TRUE);

      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
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
        NULL, 'tr_product_size', TRUE);
      if($data){
        print_r(json_encode($data));
      }else{
          $data = array();
          print_r(json_encode($data));
      }
  }

  public function detailProduct($idProduct){
    $specs = array();
    $data['product'] = $this->mhome->getProduct_MaxMinPrice($idProduct);
    $id_brand = $this->mhome->getProducts(array('id' => $idProduct), array('id_brand' => 'brand_id'), 'tm_product', TRUE);
    $data['brand'] = $id_brand['brand_id'];
    $data['categories'] = $this->mhome->brand_categories($id_brand['brand_id']);
    // print_r($data['categories']);
    // exit();
    $data['provinces'] = $this->mhome->getProducts(NULL, array('id_provField' => 'id_prov', 'nameProv' => 'nama'),
      'provinsi', FALSE);
    $data['cities'] = $this->mhome->getProducts(NULL, NULL, 'kabupaten', FALSE);
    $data['sub_districts'] = $this->mhome->getProducts(NULL, NULL, 'kecamatan', FALSE);
    $data['reviews'] = $this->mhome->getProducts(array('prod_id' => $idProduct, 'display' => 1), array('nameField' => 'name',
      'data_attemptF' => 'date_attempt', 'starsF' => 'stars', 'commentF' => 'comment'), 'tm_review', FALSE);
    $idSpec = $this->mhome->getProducts(array('prod_id' => $idProduct),
       array('idField' => 'spec_id'), 'tr_product_spec', FALSE);

    for ($i=0; $i < count($idSpec) ; $i++) {
        array_push($specs, $this->mhome->getProducts(array('id' => $idSpec[$i]['spec_id']),
         array('nameField' => 'name'), 'tm_spec', TRUE));
      }
    $data['specs'] = $specs;
    $data['image'] = $this->mhome->getProductImage($idProduct);
    $data['bestSellers'] = $this->mhome->topthree_bestSeller();
    // print_r($data['specs']);echo "</br></br>";
    // print_r($data['prices']);echo "</br></br>";
    // print_r($data['sizes']);echo "</br></br>";exit();

      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
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

  public function reviewProduct($idProduct){
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('comment', 'Comment', 'required');
    $this->form_validation->set_rules('product-review-vote', 'Vote', 'required');

    if ($this->form_validation->run() == TRUE) {
        $secretKey = "6Lcxm5wUAAAAABvbtNLsnQwiPTQJNjM57xV7vOTA";
        $captcha = $this->input->post('token');
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $secretKey, 'response' => $captcha);

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response,true);
        header('Content-type: application/json');
        if($responseKeys["success"]) {
            $data = array(
                'prod_id' =>  $idProduct,
                'name'    =>  $this->input->post('name'),
                'email'   =>  $this->input->post('email'),
                'comment' =>  $this->input->post('comment'),
                'stars'    =>  $this->input->post('product-review-vote'),
                'display' =>  0,
            );
                $this->mhome->inputData('tm_review', $data);
            $this->session->set_flashdata('success', 'Review Submitted');
            redirect('home/detailProduct/'.$idProduct);
        } else {
            $this->session->set_flashdata('error', 'captcha error');
            redirect('home/detailProduct/'.$idProduct);
        }

    } else {
      $this->session->set_flashdata('error', validation_errors());
      redirect('home/detailProduct/'.$idProduct);
    }

  }

  public function updateCart(){
    $carts = $this->cart->contents();
    if ($carts != NULL) {
      $qty = $this->input->post('qty');

      $no = 0;foreach ($carts as $cart) {
        $update_cart = array(
          'rowid' =>  $cart['rowid'],
          'qty'   =>  $qty[$no]
        );
        print_r($update_cart);echo "</br>";
        $this->cart->update($update_cart);
        $no++;
      }

      print_r($this->cart->contents());
      redirect('home/shopCart');
    } else {
      redirect();
    }
  }

  public function deleteCart(){
      $cart = $this->cart->contents();
      if ($cart != NULL) {
        $this->cart->destroy();
        redirect('home/shopCart');
      } else {
        redirect();
      }
  }

  public function removeCart_item($cart_rowId){
    $cart = $this->cart->contents();
    if ($cart != NULL) {
      $this->cart->remove($cart_rowId);
      redirect('home/shopCart');
    } else {
      redirect();
    }
  }

  public function testSP(){
    $idSP = 154;

  }

  public function addToCart($idDistrict) {
    // store id product to variable id_prod
    $id_prod = $this->input->post('product_id');
    $sku = $this->input->post('sku');

    // quantity order
    $qty = $this->input->post('qty');

    // product name rules
    $product_name_rules = '\.\:\-_ a-z0-9\d\D)'; // alpha-numeric, dashes, underscores, colons or periods
    // product name
    $prod_name = $this->input->post('product_name');
    // delete some character
    $prod_name = rtrim($prod_name, $product_name_rules);
    $prod_name = str_replace('(', '- ', $prod_name);

    $price = $this->mhome->getProducts(array('id' => $sku), array('prc' => 'price'), 'tr_product_size', TRUE);

    // checking brand product
    $product = $this->mhome->getProducts(array('id' => $id_prod), NULL, 'tm_product', TRUE);
    $image = $this->mhome->getProducts(array('id' => $id_prod), NULL, 'tr_product_image', TRUE);


    if ($product['brand_id'] != 0) {
      echo "Bukan Special Package";echo "</br></br>";
      echo "Brand = ";print_r($product['brand_id']);echo "</br></br>";
      echo "ID product = ";print_r($id_prod);echo "</br></br>";

      // store id product size to variable to id_tr_prod_size
      $tr_prod_size['id'] = $this->input->post('size');

      // set type of product special package or retail?
      $type = 'retail';

      // image product
      $img = $image['image_1'];

      // search size_name and it detail
      $size_name = $this->mhome->sizeStock($tr_prod_size['id']);
      $options = '';
    }else {
      echo "Special Package";echo "</br></br>";
      echo "Brand = ";print_r($product['brand_id']);echo "</br></br>";
      echo "ID product = ";print_r($id_prod);echo "</br></br>";

      // set type of product special package or retail?
      $type = 'special';

      // image product
      $img = 'special-package/'.$product['image'];

      // store id product size to variable to id_tr_prod_size
      $tr_prod_size = $this->mhome->getProducts(array('prod_id' => $id_prod), array('idField' => 'id'),
        'tr_product_size', TRUE);

      // search size_name and it detail (special package hasn't specific size so I set it blank)
      $size_name['name_size'] = '';
      $size_name['detail_size'] = '';
      $detailSP = $this->mhome->detail_specialPackage($id_prod);
      $options = array();
      foreach ($detailSP as $SP) {
        array_push($options, $SP);
      }
    }

    $data = array(
      'id'            => $id_prod,
      'type'          => $type,
      'image'         => $img,
      'qty'           => $qty,
      'price'         => $price['price'],
      'name'          => $prod_name,
      'id_trProduct'  => $tr_prod_size['id'],
      'voucher'       => '',
      'id_address'    => '',
      'available'      => FALSE,
      'comment'       => '',
      'sizeName'      => $size_name['name_size'],
      'detailSize'    => $size_name['detail_size'],
      'sub_district'  => $idDistrict,
      'option'        => $options,
      // 'option'        => array(
      //                   'id'            =>
      //                   'type'          =>
      //                   'id_trProduct'  =>
      //                   'price'         =>
      //                   'voucher'       =>
      // ),
    );
    print_r($data);echo "</br></br>";
    // exit();
    $this->cart->insert($data);
    print_r($this->cart->contents());
    // exit();
    redirect('home/shopCart');
  }

  public function printCart() {
      print_r($this->cart->contents());
  }

  public function addVoucher(){
    if ($this->cart->contents() != NULL) {
      $voucherCode = $this->input->post('voucher');
      $carts = $this->cart->contents();
      foreach ($carts as $cart) {
        $rowId = $cart['rowid'];
        $addVoucher = array(
          'rowid'   =>  $cart['rowid'],
          'voucher' =>  $voucherCode
        );
        $this->cart->update($addVoucher);
      }
        $qty = $this->mhome->getProducts(array('kode_voucher' => $voucherCode), array('jumlah' => 'jumlah'), 'tm_voucher', TRUE);
        $quantity = $qty['jumlah'] - 1;
        $data = array('jumlah' => $quantity);

      $this->mhome->updateData(array('kode_voucher' => $voucherCode), $data, 'tm_voucher' );
      redirect('home/shopCart');
    }
  }

  public function removeVoucher() {
      $carts = $this->cart->contents();
      foreach ($carts as $cart) {
          $rowId = $cart['rowid'];
          $addVoucher = array(
              'rowid'   =>  $cart['rowid'],
              'voucher' =>  ''
          );
          $voucher = $cart['voucher'];
          $this->cart->update($addVoucher);
      }
      $qty = $this->mhome->getProducts(array('kode_voucher' => $voucher), array('jumlah' => 'jumlah'), 'tm_voucher', TRUE);
      $quantity = $qty['jumlah'] + 1;
      $data = array('jumlah' => $quantity);

      $this->mhome->updateData(array('kode_voucher' => $voucher), $data, 'tm_voucher' );
      redirect('home/shopCart');
  }

  public function shopCart(){
      $cart = $this->cart->contents();
      $data['cart'] = $cart;

      if($cart) {
          $keys = array_keys($cart);
          $voucher = $cart[$keys[0]]["voucher"];
          $address = $cart[$keys[0]]["id_address"];

          if ($address === "") {
            $data['add'] = 0;
          }else{
            $data['add'] = 1;
          }

          if($voucher === "") {
              $data['discount'] = 0;
          } else {
              $result = $this->mhome->getProducts(array('kode_voucher' => $voucher), array('discount', 'discount'), 'tm_voucher', TRUE);
              $data['discount'] = floatval($this->cart->total() * $result['discount']);
          }
      }
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
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
          $detailOrder= $this->mhome->detailOrder($id, $idCustomer);
          $orderId = $detailOrder[0]->order_number;

          foreach ($detailOrder as $item) {
              $id = $item->id_tr_product;
              $qty = $item->quantity;
              $qtyStore = $this->mhome->getProducts(array('id' => $id), array('qty' => 'quantity'), 'tr_product', TRUE);
              $newQuanStore = $qtyStore['quantity'] + $qty;
              $quantity = array('quantity' => $newQuanStore);
              $this->mhome->updateData(array('id' => $id), $quantity, 'tr_product');
          }
          redirect('snap/cancel/'.$orderId);
      }
  }

  public function shop_summary(){
    if ($this->session->userdata('uType') == 4) {
      $carts = $this->cart->contents();
      if ($carts != NULL) {
        $id_address = array();
        $data['available'] = TRUE;
        foreach ($carts as $cart) {
          array_push($id_address, array('id_cs_detail' => $cart['id_address']));
          if ($cart['available'] == FALSE) {
            $data['available'] = FALSE;
          }
        }
        $data['address_shipping'] = $this->mhome->customer_detail($id_address[0]['id_cs_detail']);
        $data['carts']  = $this->cart->contents();
        $data['midtrans'] = $this->mhome->getProducts(NULL, NULL, 'midtrans_config', TRUE);

          $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

          $this->load->view('include/header2', $brands);
        $this->load->view('shop-summary', $data);
        $this->load->view('include/footer');
      } else {
        redirect();
      }
    } else {
      redirect('auth/login');
    }
  }

  public function shopCheckout(){
    if($this->session->userdata('uType') == 4){
      // Load helper form and library form validation
      $this->load->helper('form');
      $this->load->library('form_validation');

      // Setting rules for the form
      $this->form_validation->set_rules('firstname', 'Firstname','required');
      $this->form_validation->set_rules('lastname', 'Lastname', 'required');
      $this->form_validation->set_rules('address', 'Address', 'required');
      $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
      $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
      $this->form_validation->set_rules('kecamatan', 'kecamatan', 'required');
      $this->form_validation->set_rules('postcode', 'Postcode', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
      $this->form_validation->set_rules('phone', 'Phone Number', 'required');

      // Condition if the form running FALSE
      if ($this->form_validation->run() === FALSE) {
        // Load cart session to carts (variable)
        $carts = $this->cart->contents();

        // Load customer userdata ID from session
        $userId = $this->session->userdata('uId');

        // make an empty variable type array to store district ID from cart
        $district_cart = array();

        // load customer default address district ID
        $user_district = $this->mhome->getProducts(array('id_userlogin' => $userId, 'default_address' => 1),
        array('subDistrict' => 'sub_district'), 'tm_customer_detail', TRUE);

        // set an empty variable above from ID district on cart
        foreach ($carts as $cart) {
          array_push($district_cart, $cart['sub_district']);
        }

        $cart_availablelity = $this->cart->contents();
        foreach ($cart_availablelity as $cart) {
          $quantity_Prod = $this->mhome->getProducts(array('id_product_size' => $cart['id_trProduct']),
            array('quantityF' => 'quantity'), 'tr_product', TRUE);
          if ($quantity_Prod['quantity'] > 3) {
            if ($cart['qty'] < $quantity_Prod['quantity']) {
              $updateAvbllty = array(
                'rowid'     => $cart['rowid'],
                'available' => TRUE,
                'comment'   => 'Available',
              );
              $this->cart->update($updateAvbllty);
            } else {
              $updateAvbllty = array(
                'rowid'     => $cart['rowid'],
                'available' => FALSE,
                'comment'   => 'Our quantity less than your order',
              );
              $this->cart->update($updateAvbllty);
            }
          } else {
            $updateAvbllty = array(
              'rowid'     => $cart['rowid'],
              'available' => FALSE,
              'comment'   => 'Stock not available',
            );
            $this->cart->update($updateAvbllty);
          }
        }

        $mayPurchase = $this->cart->contents();
        $data['available'] = TRUE;
        foreach ($mayPurchase as $cart) {
          if ($cart['available'] == FALSE) {
            $data['available'] = FALSE;
          }
        }

        // load detail profile with a default address customer to store it to view
        $data['alamat_default'] = $this->mhome->detailProfileCustomer($this->session->userdata('uId'));

        // load detail cart to store it to view
        $data['carts'] = $this->cart->contents();
        // $data['historicals'] = $this->mhome->historicalShipping($this->session->userdata('uId'));

        // load detail district, city, and province, and store it to view
        $data['addressCart'] = $this->mhome->detail_district_cart($district_cart[0]);

          $cart = $this->cart->contents();
          $data['cart'] = $cart;
          $keys = array_keys($cart);
          $voucher = $cart[$keys[0]]["voucher"];

          if($voucher === "") {
              $data['discount'] = 0;
          } else {
              $result = $this->mhome->getProducts(array('kode_voucher' => $voucher), array('discount', 'discount'), 'tm_voucher', TRUE);
              $data['discount'] = floatval($this->cart->total() * $result['discount']);
          }

        // load view
          $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

          $this->load->view('include/header2', $brands);
        $this->load->view('shop-checkout', $data);
        $this->load->view('include/footer');

        // Condition if the form running TRUE
      } else {
        // store id user login from session
        $idUserLogin = $this->session->userdata('uId');

        // store data on cart
        $carts = $this->cart->contents();

        // make an empty variable type array to store district ID from cart
        $district_cart = array();

        // set an empty variable above from ID district on cart
        foreach ($carts as $cart) {
          array_push($district_cart, $cart['sub_district']);
        }

        // load detail province, city, and district from the variable that we fill before
        $addressCart = $this->mhome->detail_district_cart($district_cart[0]);

        // load customer default address
        $shipping_same_with_default_address = $this->mhome->getProducts(array('sub_district' => $district_cart[0],
          'id_userlogin' => $idUserLogin, 'default_address' => 1), array('idField' => 'id', 'defaultAddress' => 'default_address'),
           'tm_customer_detail', TRUE);

        print_r($shipping_same_with_default_address);echo "</br></br>";

        // checking is shipping address has same district with default address or not
        if ($shipping_same_with_default_address != NULL) {

          // beli   stock
          // 1      98    TRUE
          // 5      4     FALSE
          // 4      4     TRUE
          // 4      3     TRUE

          // if shipping is same with default address
          // checking availability
          foreach ($carts as $cart) {
            // id tr_product from cart
            $id_trProduct = $cart['id_trProduct'];
            // checking the stock
            $prod_qty = $this->mhome->getProducts(array('id_product_size' => $id_trProduct), array('qty' => 'quantity'), 'tr_product', TRUE);

            // checking is the stock more than 3 and insert id shipping address
            if ($prod_qty['quantity'] > 3) {

              // checking is the stock on store more than quantity that customer order and insert id shipping address
              if ($cart['qty'] < $prod_qty['quantity']) {
                $availablelity_stock = array(
                  'rowid'       => $cart['rowid'],
                  'id_address'  => $shipping_same_with_default_address['id'],
                  'available'   => TRUE
                );
                $this->cart->update($availablelity_stock);

              // checking is the stock on store less than quantity that customer order and insert id shipping address
              } else {
                $availablelity_stock = array(
                  'rowid'       => $cart['rowid'],
                  'id_address'  => $shipping_same_with_default_address['id'],
                  'available'   => FALSE
                );
                $this->cart->update($availablelity_stock);
              }

            // checking is the stock less than 3 and insert id shipping address
            } else {
              $availablelity_stock = array(
                'rowid'       => $cart['rowid'],
                'id_address'  => $shipping_same_with_default_address['id'],
                'available'   => FALSE
              );
              $this->cart->update($availablelity_stock);
            }
          }

          print_r($this->cart->contents());
          redirect('home/shop_summary');
        } else {

          // store shipping address to an array variable
          $shipping_address = array(
            'id_userlogin'    =>  $idUserLogin,
            'first_name'      =>  $this->input->post('firstname'),
            'last_name'       =>  $this->input->post('lastname'),
            'address'         =>  $this->input->post('address'),
            'province'        =>  $this->input->post('provinsi'),
            'city'            =>  $this->input->post('kabupaten'),
            'sub_district'    =>  $this->input->post('kecamatan'),
            'postcode'        =>  $this->input->post('postcode'),
            'email'           =>  $this->input->post('email'),
            'phone'           =>  $this->input->post('phone'),
            'default_address' =>  0
          );

          // shearching are the shipping address has already being shipped before
          $has_same_shipped_address = $this->mhome->getProducts($shipping_address, array('idField' => 'id'),
           'tm_customer_detail', TRUE);

          // if the shipping address has already being shipped address before
          if ($has_same_shipped_address != NULL) {

            print_r($has_same_shipped_address);echo "</br></br>";

            foreach ($carts as $cart) {
              // id tr_product from cart
              $id_trProduct = $cart['id_trProduct'];
              print_r($id_trProduct);echo "</br></br>";

              // checking the stock
              $prod_qty = $this->mhome->getProducts(array('id_product_size' => $id_trProduct), array('qty' => 'quantity'), 'tr_product', TRUE);

              // checking is the stock more than 3 and insert id shipping address
              if ($prod_qty['quantity'] > 3) {

                // if quantity order less than stock
                if ($cart['qty'] < $prod_qty['quantity']) {
                  $availablelity_stock = array(
                    'rowid'       =>  $cart['rowid'],
                    'id_address'  =>  $has_same_shipped_address['id'],
                    'available'   =>  TRUE
                  );
                  $this->cart->update($availablelity_stock);

                // if quntity order more than stock
                } else {
                  $availablelity_stock = array(
                    'rowid'       =>  $cart['rowid'],
                    'id_address'  =>  $has_same_shipped_address['id'],
                    'available'   =>  FALSE
                  );
                  $this->cart->update($availablelity_stock);
                }
              } else {
                $availablelity_stock = array(
                  'rowid'       =>  $cart['rowid'],
                  'id_address'  =>  $has_same_shipped_address['id'],
                  'available'   =>  FALSE
                );
                $this->cart->update($availablelity_stock);
              }
            }
            print_r($this->cart->contents());
            redirect('home/shop_summary');

          // if the shipping address is new
          } else {

            // insert the new shipping address to tm_customer_detail
            $this->mhome->inputData('tm_customer_detail', $shipping_address);

            // select id from new shipping address
            $id_new_shipping_address = $this->mhome->getProducts($shipping_address, array('idField' => 'id'),
              'tm_customer_detail', TRUE);
            print_r($id_new_shipping_address);echo "</br></br>";

            foreach ($carts as $cart) {
              // id tr_product from cart
              $id_trProduct = $cart['id_trProduct'];
              print_r($id_trProduct);echo "</br></br>";

              // checking the stock
              $prod_qty = $this->mhome->getProducts(array('id_product_size' => $id_trProduct), array('qty' => 'quantity'), 'tr_product', TRUE);

              // checking is the stock more than 3 and insert id shipping address
              if ($prod_qty['quantity'] > 3) {

                // if quantity stock less than order
                if ($cart['qty'] < $prod_qty['quantity']) {
                  $availablelity_stock = array(
                    'rowid'       =>  $cart['rowid'],
                    'id_address'  =>  $id_new_shipping_address['id'],
                    'available'   =>  TRUE
                  );
                  $this->cart->update($availablelity_stock);

                // if quantity order more than
                } else {
                  $availablelity_stock = array(
                    'rowid'       =>  $cart['rowid'],
                    'id_address'  =>  $id_new_shipping_address['id'],
                    'available'   =>  FALSE
                  );
                  $this->cart->update($availablelity_stock);
                }
              } else {
                $availablelity_stock = array(
                  'rowid'       =>  $cart['rowid'],
                  'id_address'  =>  $id_new_shipping_address['id'],
                  'available'   =>  FALSE
                );
                $this->cart->update($availablelity_stock);
              }
            }
            print_r($this->cart->contents());
            redirect('home/shop_summary');
          }

        }
        exit();
      }
    }else{
      redirect('auth/login');
    }
  }

  public function purchase($orderId, $snapResponse){
    if ($this->session->userdata('uType') == 4) {
      $cart = $this->cart->contents();
      if ($cart != NULL) {
        print_r($cart);echo "</br></br>";
        $cartAdress = $this->cart->contents();
        $address_detail = array();
        foreach ($cartAdress as $cart) {
          $address_detail['id_address'] = $cart['id_address'];
        }
        $idUserLogin = $this->session->userdata('uId');
        $statusOrder = 2;
        if ($snapResponse == 200) {
            $statusOrder = 4;
        } else {
            $statusOrder = 2;
        }


          $data_order = array(
          'order_number'    => $orderId,
          'id_userlogin'    => $idUserLogin,
          'total'           => $this->cart->total(),
          'address_detail'  => $address_detail['id_address'],
          'status_order'    => $statusOrder
        );

          // Voucher item
          $keys = array_keys($cart);
          $voucher = $cart['voucher'];
          if ($voucher != NULL) {
              $voucherDetail = $this->mhome->getProducts(array('kode_voucher' => $voucher), NULL, 'tm_voucher', TRUE);
              $discount = floatval($this->cart->total() * $voucherDetail['discount']);
              $data_order['id_voucher'] = $voucherDetail['id'];
              $data_order['total'] = $this->cart->total() - $discount;
          }

        print_r($data_order);echo "</br></br>";
        $this->mhome->inputData('tm_order', $data_order);
        $idOrder = $this->mhome->getProducts($data_order, array('idField' => 'id'), 'tm_order', TRUE);

        $carts = $this->cart->contents();
        foreach ($carts as $cart) {
          $detail_order = array(
            'id_tm_order'   =>  $idOrder['id'],//'AGM'.date("dmy").$rand,
            'id_tr_product' =>  $cart['id_trProduct'],
            'quantity'      =>  $cart['qty'],
            'subtotal'      =>  $cart['subtotal']
          );
          $this->mhome->inputData('tr_order_detail', $detail_order);
          print_r($detail_order);echo "</br></br>";
        }

        $cuttingStocks = $this->cart->contents();
        foreach ($cuttingStocks as $cut) {
          $stock = $this->mhome->getProducts(array('id' => $cut['id_trProduct']), array('qty' => 'quantity'), 'tr_product', TRUE);
          $newStock['quantity'] = $stock['quantity'] - $cut['qty'];
          $this->mhome->updateData(array('id' => $cut['id_trProduct']), $newStock, 'tr_product');
          print_r($newStock);
        }

        $this->cart->destroy();
        redirect('home/checkoutDone');
        exit();
        if ($alreadyHasAddress['id'] !== NULL && $alreadyHasAddress['default_address'] == 1) {
          $rand = rand(1, 999);
          $data_order = array(
              'order_number'    => 'AGM'.date("dmy").$rand,
              'id_userlogin'    => $idUserLogin,
              'total'           => $this->cart->total(),
              'address_detail'  => $alreadyHasAddress['id'],
              'status_order'    => 2,
          );
          print_r($data_order);
          echo "</br></br>";
          $this->mhome->inputData('tm_order', $data_order);
          $idOrder = $this->mhome->getProducts($data_order, array('idField' => 'id'), 'tm_order', TRUE);

          $data['cart'] = $this->cart->contents();
          foreach ($data['cart'] as $cart) {

            $this->mhome->inputData('tr_order_detail', $detail_order);
          }

          redirect('home/checkoutDone');
        } elseif ($alreadyHasAddress['id'] !== NULL) {
          $rand = rand(1, 999);
          $data_order = array(
              'order_number'    => 'AGM'.date("dmy").$rand,
              'id_userlogin'    => $idUserLogin,
              'total'           => $this->cart->total(),
              'address_detail'  => $alreadyHasAddress['id'],
              'status_order'    => 2,
          );
          print_r($data_order);
          echo "</br></br>";
          $this->mhome->inputData('tm_order', $data_order);
          $idOrder = $this->mhome->getProducts($data_order, array('idField' => 'id'), 'tm_order', TRUE);

          $data['cart'] = $this->cart->contents();
          foreach ($data['cart'] as $cart) {
            $detail_order = array(
              'id_tm_order'   =>  $idOrder['id'],
              'id_tr_product' =>  $cart['id_trProduct'],
              'quantity'      =>  $cart['qty'],
              'subtotal'      =>  $cart['subtotal']
            );
            $this->mhome->inputData('tr_order_detail', $detail_order);
          }
          $this->deleteCart();
          redirect('home/checkoutDone');
        } else {
          $data['default_address'] = 0;
          print_r($data);
          $this->mhome->inputData('tm_customer_detail', $data);
          $newAddress = $this->mhome->getProducts($data, array('idField' => 'id'), 'tm_customer_detail', TRUE);
          print_r($data);

          $rand = rand(1, 999);
          $data_order = array(
              'order_number'    => 'AGM'.date("dmy").$rand,
              'id_userlogin'    => $idUserLogin,
              'total'           => $this->cart->total(),
              'address_detail'  => $newAddress['id'],
              'status_order'    => 2,
          );
          print_r($data_order);
          echo "</br></br>";
          $this->mhome->inputData('tm_order', $data_order);
          $idOrder = $this->mhome->getProducts($data_order, array('idField' => 'id'), 'tm_order', TRUE);

          $data['cart'] = $this->cart->contents();
          foreach ($data['cart'] as $cart) {
            $detail_order = array(
              'id_tm_order'   =>  $idOrder['id'],
              'id_tr_product' =>  $cart['id_trProduct'],
              'quantity'      =>  $cart['qty'],
              'subtotal'      =>  $cart['subtotal']
            );
            $this->mhome->inputData('tr_order_detail', $detail_order);
          }
          redirect('home/checkoutDone');
        }
      }
    }else{
      redirect();
    }
  }

  public function checkoutDone(){
    if ($this->session->userdata('uType') == 4) {
      $data['uName'] = $this->mhome->getProducts(array('user_id' => $this->session->userdata('uId')), array('usernameField' => 'username'), 'user_login', TRUE);
        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

        $this->load->view('include/header2', $brands);
      $this->load->view('checkout-done', $data);
      $this->load->view('include/footer');
    }else{
      redirect('auth/login');
    }
  }

  public function promotionPage(){
      $data['promotions'] = $this->mhome->getProducts(array('status =' => 1, 'deleted' => 0), NULL, 'tm_promotion', FALSE);
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('promotion-page', $data);
    $this->load->view('include/footer');
  }

  public function pageAbout(){
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('page-about');
    $this->load->view('include/footer');
  }

  public function pageContact(){
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('page-contact');
    $this->load->view('include/footer');
  }

  public function pageFaq(){
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('page-faq');
    $this->load->view('include/footer');
  }

  public function termCondition(){
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('term-condition');
    $this->load->view('include/footer');
  }

  public function privacyPolicy(){
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('privacy-policy');
    $this->load->view('include/footer');
  }

  public function searchResult(){
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('search-result');
    $this->load->view('include/footer');
  }

  public function partnership(){
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('partnership');
    $this->load->view('include/footer');
  }

  public function pageLogin(){
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('login');
    $this->load->view('include/footer');
  }

  public function promotionDetail($id){
      $data['promotion'] = $this->mhome->getProducts(array('id' => $id), NULL, 'tm_promotion', TRUE);
      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('promotion-detail', $data);
    $this->load->view('include/footer');
  }

  public function bestSeller($brand = NULL, $cat = NULL){
    $data['products'] = $this->mhome->listBestSeller_Product($brand, $cat);

      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('best-seller', $data);
    $this->load->view('include/footer');
  }

  public function historyPage(){
      if ($this->session->userdata('uType') == 4) {
          $idCustomer = $this->session->userdata('uId');

          $data['orderList'] = $this->mhome->getOrderHistory($idCustomer);

//      print_r($data);

          $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

          $this->load->view('include/header2', $brands);
          $this->load->view('history-page', $data);
          $this->load->view('include/footer');
      } else {
          redirect('auth/login');
      }
  }

  public function wishlistPage(){
    $this->load->view('include/header2');
    $this->load->view('wishlist-page');
    $this->load->view('include/footer');
  }

  public function transactionPage(){
    if ($this->session->userdata('uType') == 4) {
      $idCustomer = $this->session->userdata('uId');

      $data['orderList'] = $this->mhome->getOrderList($idCustomer);
      // print_r($data['orderList']);exit();

        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

        $this->load->view('include/header2', $brands);
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

      if($data['detailOrder'][0]['brand_id'] == 0) {
          $data['detailOrder'][0]['type'] = 'special';
          $data['detailOrder'][0]['items'] = $this->mhome->detail_specialPackage($data['detailOrder'][0]['sku']);
      } else {
          $data['detailOrder'][0]['type'] = 'retail';
      }

//      print_r($data['detailOrder']);
//      echo "<br>";
//      print_r($this->db->last_query());
//      exit();
        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

        $this->load->view('include/header2', $brands);
      $this->load->view('detail-transaction-page', $data);
      $this->load->view('include/footer');
    } else {
      redirect('auth/login');
    }

  }

  public function profilePage(){
    if ($this->session->userdata('uType') == 4) {
      $id_userlogin = $this->session->userdata('uId');
      $data['profile'] = $this->mhome->detailProfileCustomer($id_userlogin);

        $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

        $this->load->view('include/header2', $brands);
      $this->load->view('page-profile', $data);
      $this->load->view('include/footer');
    } else {
      redirect();
    }
  }

  public function test(){
    $data['bed_linenes'] = $this->mhome->bed_linenProducts();
    $data['beddingACC'] = $this->mhome->beddingAcc();
    print_r(count($data['bed_linenes']));
    print_r($data['bed_linenes']);
    echo "</br></br>";
    print_r(count($data['beddingACC']));
    echo "</br></br>";
    print_r($data['beddingACC']);
  }

  public function profileSetting($pass = NULL){
    if ($this->session->userdata('uType') == 4) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      if ($pass == NULL) {
        $this->form_validation->set_rules('firstname', 'First name', 'required');
        $this->form_validation->set_rules('lastname', 'Last name', 'required');
        $this->form_validation->set_rules('phone', 'Phone number', 'required');
        $this->form_validation->set_rules('province', 'Province', 'required');
        $this->form_validation->set_rules('city', 'City', 'required');
        $this->form_validation->set_rules('sub_district', 'Sub district', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('postcode', 'Postcode', 'required');

        if ($this->form_validation->run() === TRUE) {
          $id_userlogin = $this->session->userdata('uId');
          $profile = $this->mhome->getProducts(array('id_userlogin' => $id_userlogin, 'default_address' => 1), NULL, 'tm_customer_detail'
          , TRUE);
          $id_customerDetail = $profile['id'];
          print_r($profile);echo "</br></br>";
          $updateProfile = array(
            'id_userlogin'    =>  $id_userlogin,
            'first_name'      =>  $this->input->post('firstname'),
            'last_name'       =>  $this->input->post('lastname'),
            'gender'          =>  $profile['gender'],
            'phone'           =>  $this->input->post('phone'),
            'address'         =>  $this->input->post('address'),
            'province'        =>  $this->input->post('province'),
            'city'            =>  $this->input->post('city'),
            'sub_district'    =>  $this->input->post('sub_district'),
            'postcode'        =>  $this->input->post('postcode'),
            'default_address' =>  1,
          );
          print_r($updateProfile);
          $this->mhome->updateData(array('id' => $id_customerDetail), $updateProfile, 'tm_customer_detail');
          redirect('home/profilePage');
        }else{
          $id_userlogin = $this->session->userdata('uId');
          $data['profile'] = $this->mhome->getProducts(array('id_userlogin' => $id_userlogin, 'default_address' => 1), NULL, 'tm_customer_detail', TRUE);
          $data['provinces'] = $this->mhome->getProducts(NULL, NULL, 'provinsi', FALSE);
          // $this->session->set_flashdata('error', validation_errors());

            $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

            $this->load->view('include/header2', $brands);
          $this->load->view('page-profile-settings', $data);
          $this->load->view('include/footer');
        }
      } else {
        $this->form_validation->set_rules('current_password', 'Current Password',
          'required|callback_checkingCurrentPass');
        $this->form_validation->set_rules('password', 'New Password', 'required');
        $this->form_validation->set_rules('confirm_password', 'Re-type New Password',
          'required|matches[password]');

        if ($this->form_validation->run() === TRUE) {
          $new_password = $this->input->post('password');
          $id_userlogin = $this->session->userdata('uId');
          $new_pass = array(
            'password' => password_hash($new_password, PASSWORD_DEFAULT)
          );
          print_r($new_pass);echo "</br></br>";
          print_r($id_userlogin);

          $this->mhome->updateData(array('user_id' => $id_userlogin), $new_pass, 'user_login');
          redirect('home/profilePage');
        }else{
          $id_userlogin = $this->session->userdata('uId');
          $data['profile'] = $this->mhome->getProducts(array('id_userlogin' => $id_userlogin, 'default_address' => 1), NULL, 'tm_customer_detail', TRUE);
          $data['provinces'] = $this->mhome->getProducts(NULL, NULL, 'provinsi', FALSE);
          // $this->session->set_flashdata('error', validation_errors());

            $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

            $this->load->view('include/header2', $brands);
          $this->load->view('page-profile-settings', $data);
          $this->load->view('include/footer');
        }
      }
    } else {
      redirect();
    }
  }

  public function checkingCurrentPass($current_password){
    $id_userlogin = $this->session->userdata('uId');
    $currentPass = $this->mhome->getProducts(array('user_id' => $id_userlogin),
    array('passwordField' => 'password'), 'user_login', TRUE);

    if (password_verify($current_password, $currentPass['password'])) {
      return TRUE;
    }else{
      $this->session->set_flashdata('error', 'Wrong Password');
      return FALSE;
    }
  }

  public function bed_linen($brand = NULL){
    if ($brand == NULL) {
      $data['brand'] = array('id' => NULL, 'name' => 'Bed Linens');
      $data['products'] = $this->mhome->bed_linenProducts();
    } else {
      $data['brand'] = $this->mhome->getProducts(array('id' => $brand), array('idField' => 'id', 'nameField' => 'name'),
        'tm_brands', TRUE);
      $data['products'] = $this->mhome->bed_linenProducts($brand);
    }
    $data['brands'] = $this->mhome->bed_linenBrands();
    $data['bestSellers'] = $this->mhome->topthree_bestSeller();

      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('bed_linen', $data);
    $this->load->view('include/footer');
  }

  public function bedding_Acc($brand = NULL, $category = NULL){
    if ($brand === NULL && $category === NULL) {
      // select all product which the category aren't mattress neither bed linen

      $data['brand'] = array('id' => 0, 'name' => 'Bedding Accessories');
      $data['products'] = $this->mhome->beddingACC();
      $data['category'] = $this->mhome->beddingACC_Categories();
      $data['brands'] = $this->mhome->beddingACC_Brands();
    } elseif ($brand !== NULL && $category === NULL) {
      // select all product with specific brand which the category aren't mattress neither bed linen

      if ($brand == 0) {
        // select all product with specific category which the category aren't mattress neither bed linen

        $data['brand'] = array('id' => 0, 'name' => 'Bedding Accessories');
        $data['products'] = $this->mhome->beddingAcc();
        $data['category'] = $this->mhome->beddingACC_Categories();
        $data['brands'] = $this->mhome->beddingACC_Brands();
      } else {
        // select all product with specific brand and with specific category which the category aren't mattress neither bed linen

        $data['brand'] = $this->mhome->getProducts(array('id' => $brand), array('idField' => 'id', 'nameField' => 'name'),
          'tm_brands', TRUE);
        $data['products'] = $this->mhome->beddingAcc($brand);
        $data['category'] = $this->mhome->beddingACC_Categories($brand);
        $data['brands'] = $this->mhome->beddingACC_Brands();
      }
    } else {
      // select all product with specific brand and specific category which the category aren't mattress neither bed linen

      if ($brand == 0) {
        // select all product with specific category which the category aren't mattress neither bed linen

        $data['brand'] = array('id' => 0, 'name' => 'Bedding Accessories');
        $data['products'] = $this->mhome->beddingAcc(NULL, $category);
        $data['category'] = $this->mhome->beddingACC_Categories();
        $data['brands'] = $this->mhome->beddingACC_Brands();
      } else {
        // select all product with specific brand and with specific category which the category aren't mattress neither bed linen

        $data['brand'] = $this->mhome->getProducts(array('id' => $brand), array('idField' => 'id', 'nameField' => 'name'),
          'tm_brands', TRUE);
        $data['products'] = $this->mhome->beddingAcc($brand, $category);
        $data['category'] = $this->mhome->beddingACC_Categories($brand, $category);
        $data['brands'] = $this->mhome->beddingACC_Brands();
      }
    }

      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('bedding_acc', $data);
    $this->load->view('include/footer');
  }
  public function subscribe(){
      $email = $this->input->post('email');
      $data = array(
          'email'   =>  $email

      );
      $this->mhome->addNewsLetter($data);
      redirect('/');
  }

  public function store_lookup()
	{
		if (!$this->input->is_ajax_request()) die('Direct access not allowed');

    $latitude = $this->input->get('lat', TRUE);
    $longitude = $this->input->get('lng', TRUE);
    $distance = $this->input->get('distance', TRUE);

		if (is_null($latitude)) {

			// give them the widget
			$this->load->view('store-lookup');

		} else if (is_null($longitude)) {

			// must have latitude and longitude
			$this->output->set_status_header(403);

		} else {

      if (is_null($distance)) {
        $distance = 10;
      }

			// get boundary and search store inside it
			echo json_encode($this->mhome->findNearestStoreByLatLng($latitude, $longitude, $distance));

		}
	}

  public function specialPackage() {
    $data['special_packages'] = $this->mhome->getProducts(array('active' => 1, 'brand_id' => 0, 'cat_id' => 0),
      array('idField' => 'id', 'nameField' => 'name', 'img' => 'image'), 'tm_product', FALSE);

      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('special_package', $data);
    $this->load->view('include/footer');
  }

  public function detailSpecial($idSpecialPckg) {
    $data['specialPckg'] = $this->mhome->prime_specialPKG($idSpecialPckg);
    $data['details'] = $this->mhome->detail_specialPackage($idSpecialPckg);
    $data['bestSellers'] = $this->mhome->topthree_bestSeller();
    $data['reviews'] = $this->mhome->getProducts(array('prod_id' => $idSpecialPckg, 'display' => 1), array('nameField' => 'name',
    'data_attemptF' => 'date_attempt', 'starsF' => 'stars', 'commentF' => 'comment'), 'tm_review', FALSE);
    $data['provinces'] = $this->mhome->getProducts(NULL, array('id_provField' => 'id_prov', 'nameProv' => 'nama'),
      'provinsi', FALSE);

      $brands['brands'] = $this->mhome->getProducts(array('id !=' => 0, 'deleted' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);

      $this->load->view('include/header2', $brands);
    $this->load->view('detail_special', $data);
    $this->load->view('include/footer');
  }

  public function check_voucher($voucher) {
      $voucherDetail = $this->mhome->getProducts(array('kode_voucher' => $voucher, 'jumlah !=' => 0, 'active' => 1 ), NULL, 'tm_voucher', TRUE);
      if($voucherDetail != NULL) {
          $data = array(
              "status" => 1,
              "discount" => $voucherDetail['discount']
          );
      } else {
          $data = array(
              "status" => 0
          );
      }

      print_r(json_encode($data));
  }

  function search_keyword($brand = NULL, $category = NULL)
  {
      $keyword = $this->input->post('keyword');
      $data['products'] = $this->mhome->search($keyword);
      // $data['products'] = $this->mhome->getShop_product($brand, $category);
      $data['brand'] = $this->mhome->getProducts(array('id' => $brand), array('idField' => 'id','nameField' => 'name'), 'tm_brands', TRUE);
      $data['category'] = $this->mhome->brand_categories($brand);
      $data['bestSellers'] = $this->mhome->topthree_bestSeller();
      // $data['image'] = $this->mhome->getProducts(array('id_prod'=>$data['products']['id']), NULL, 'tr_product_image', TRUE);
      // print_r($data);
      // print_r($this->db->last_query());
      $this->load->view('include/header2');
      $this->load->view('search_result', $data);
      $this->load->view('include/footer');
  }

}
