<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Super admin and admin controller
 */
class Admin extends CI_Controller {

  function __construct(){
    parent::__construct();

    $this->load->helper('url');
    $this->load->model('Madmin', 'madmin');
  }

  public function listAdmin($link = FALSE){
      if ($this->session->userdata('uType') == 1) {
        if ($link === FALSE) {
          $data['posts'] = $this->madmin->getProducts(NULL, NULL, 'tm_super_admin', FALSE);

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/home_admin', $data);
          $this->load->view('include/admin/footer');
        }else{
          $data['detail_admin'] = $this->madmin->detail_admin($link);

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/detailAdmin', $data);
          $this->load->view('include/admin/footer');
        }
      }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }
  }

  public function resetPassword($idUserlogin){
    if ($this->session->userdata('uType') == 1) {
      $resetPass = "admin_agm";
      $newPassword = array(
        'password' => password_hash(($resetPass), PASSWORD_DEFAULT),
        'newer'    => 1
      );
      $this->madmin->updateData(array('user_id' => $idUserlogin), 'user_login', $newPassword);
      redirect('admin/listAdmin/'.$idUserlogin);
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function listStoreOwner(){
      if ($this->session->userdata('uType') == 1) {
          $data['posts'] = $this->madmin->joinDetailStore();

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/listStoreOwner', $data);
          $this->load->view('include/admin/footer');
      }else{
       $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
      }
  }

  public function sa_brand($link = FALSE, $add = FALSE){
    if ($this->session->userdata('uType') == 1) {
      $data['brands'] = $this->madmin->getProducts(NULL, NULL, 'tm_brands', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_brand', $data);
      $this->load->view('include/admin/footer');

    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addBrand(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('items', 'Brand', 'required|callback_checkingBrand');
      $this->form_validation->set_rules('desc', 'Description', 'required');

      if ($this->form_validation->run() == TRUE) {
        $file_name = strtolower('brand-logo-'.$this->input->post('items'));

        $config['upload_path'] = './asset/upload/';
        $config['allowed_types'] = 'jpg|jpeg|png|svg';
        $config['file_name']  = $file_name;

        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('brandPict')) {
          $this->session->set_flashdata('error', $this->upload->display_errors());

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/addBrands');
          $this->load->view('include/admin/footer');
        }else{
          $pName = $this->upload->data();
          $items = array(
            'name'          => $this->input->post('items'),
            'logo'          => $pName['orig_name'],
            'description'   => $this->input->post('desc'),
            'status' => 1,
          );
          $this->madmin->inputData('tm_brands', $items);
          redirect('admin/sa_brand');
        }
      }else{
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addBrands');
        $this->load->view('include/admin/footer');
      }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingBrand($brand){
    $has_brand = $this->madmin->getProducts(array('name' => $brand),
      array('nameField' => 'name'), 'tm_brands', TRUE);
    if(isset($has_brand)){
      $this->session->set_flashdata('error', 'Brand has already been created');
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function activeBrand($brand){
    if($this->session->userdata('uType') == 1){
      $stat = $this->madmin->getProducts(array('id' => $brand), array('statField' => 'status'), 'tm_brands',TRUE);
      if($stat['status'] == 1){
        $items = array('status' => 0);
        $this->madmin->updateData(array('id' => $brand), 'tm_brands', $items);
        redirect('admin/sa_brand', 'refresh');
      }else{
        $items = array('status' => 1);
        $this->madmin->updateData(array('id' => $brand), 'tm_brands', $items);
        redirect('admin/sa_brand', 'refresh');
      }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function deleteBrand($brand){
    if ($this->session->userdata('uType') == 1) {
      $this->madmin->deleteData(array('id' => $brand), 'tm_brands');
      redirect('admin/sa_brand', 'refresh');
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function sa_cat(){
    if ($this->session->userdata('uType') == 1) {
      $data['categories'] = $this->madmin->getProducts(NULL, NULL, 'tm_category', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_cat', $data);
      $this->load->view('include/admin/footer');
    }else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addCat(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('items', 'Category', 'required|callback_checkingCat');
      $this->form_validation->set_rules('desc', 'Description', 'required');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addCats');
        $this->load->view('include/admin/footer');
      }else{
        $items = array(
          'name'        => $this->input->post('items'),
          'description' => $this->input->post('desc'),
          'status'      => 1
        );
        $this->madmin->inputData('tm_category', $items);
        redirect('admin/sa_cat');
      }
    }
  }

  public function checkingCat($category){
    $has_cat = $this->madmin->getProducts(array('name' => $category),
      array('nameField' => 'name'), 'tm_category', TRUE);
    if(isset($has_cat)){
      $this->session->set_flashdata('error', 'Category has already been created');
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function activeCat($cat){
    if ($this->session->userdata('uType') == 1) {
      $stat = $this->madmin->getProducts(array('id' => $cat), array('statField' => 'status'), 'tm_category',TRUE);
      if($stat['status'] == 1){
        $items = array('status' => 0);
        $this->madmin->updateData(array('id' => $cat), 'tm_category', $items);
        redirect('admin/sa_cat');
      }else{
        $items = array('status' => 1);
        $this->madmin->updateData(array('id' => $cat), 'tm_category', $items);
        redirect('admin/sa_cat');
      }
    }else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function deleteCat($cat){
    if ($this->session->userdata('uType') == 1) {
      $this->madmin->deleteData(array('id' => $cat), 'tm_category');
      redirect('admin/sa_cat', 'refresh');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function allProd(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('brand', 'Brand', 'required');
      $this->form_validation->set_rules('cat', 'Category', 'required');

      if ($this->form_validation->run() == FALSE){
        $data['products'] = $this->madmin->listProduct();
        $data['brands'] = $this->madmin->getProducts(array('status' => 1), NULL, 'tm_brands', FALSE);
        $data['cats'] = $this->madmin->getProducts(array('status' => 1), NULL, 'tm_category', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/allProd', $data);
        $this->load->view('include/admin/footer');
      }else{
        $idBrand = $this->input->post('brand');
        $idCat = $this->input->post('cat');
        if ($idBrand != 0 && $idCat != 0) {
          $data['products'] = $this->madmin->allProducts(array('brand_id' => $idBrand,
          'cat_id' => $idCat), NULL, 'tm_product', FALSE);
        }elseif($idBrand != 0 && $idCat == 0){
          $data['products'] = $this->madmin->allProducts(array('brand_id' => $idBrand), NULL, 'tm_product', FALSE);
        }elseif ($idBrand == 0 && $idCat != 0) {
          $data['products'] = $this->madmin->allProducts(array('cat_id' => $idCat), NULL, 'tm_product', FALSE);
        }elseif ($idBrand == 0 && $idCat == 0) {
          $data['products'] = $this->madmin->allProducts(NULL, NULL, 'tm_product', FALSE);
        }
        $data['brands'] = $this->madmin->getProducts(array('status' => 1), NULL, 'tm_brands', FALSE);
        $data['cats'] = $this->madmin->getProducts(array('status' => 1), NULL, 'tm_category', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/allProd', $data);
        $this->load->view('include/admin/footer');
      }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addProd(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('brand', 'Brand', 'required');
      // $this->form_validation->set_rules('cat', 'Category', 'required');
      $this->form_validation->set_rules('pName', 'Product Name', 'required');
      $this->form_validation->set_rules('desc', 'Description', 'required');
      $this->form_validation->set_rules('spec[]', 'Specification', 'required');
      $this->form_validation->set_rules('size[]', 'Size', 'required');
      $this->form_validation->set_rules('price[]', 'Price', 'required');

      if ($this->form_validation->run() === TRUE) {
        $bName = $this->madmin->getProducts(array('id' => $this->input->post('brand')),
          array('nameField' => 'name'), 'tm_brands', TRUE);
        $cName = $this->madmin->getProducts(array('id' => $this->input->post('cat')),
          array('nameField' => 'name'), 'tm_category', TRUE);
        $file_name = strtolower($bName['name'].'-'.$cName['name'].'-'.$this->input->post('pName'));

        $config['upload_path'] = './asset/upload/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name']  = $file_name;

        $this->load->library('upload',$config);
        if(! $this->upload->do_upload('productPict')){
          $data['brands'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
            'nameField' => 'name'), 'tm_brands', FALSE);
          $data['cats'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
            'nameField' => 'name'), 'tm_category', FALSE);
          $data['specs'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
            'nameField' => 'name'), 'tm_spec', FALSE);
          $data['sizes'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
            'nameField' => 'name', 'sizeField' => 'size'), 'tm_size', FALSE);

          $this->session->set_flashdata('error', $this->upload->display_errors());

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/addProd-2', $data);
          $this->load->view('include/admin/footer');
        }else {
          // $data = array('upload_data' => $this->upload->data());
          $pName = $this->upload->data();

          // data for input tm_product
          $items = array(
            'brand_id'    => $this->input->post('brand'),
            'cat_id'      => $this->input->post('cat'),
            'name'        => $this->input->post('pName'),
            'description' => $this->input->post('desc'),
            'image'       => $pName['orig_name'],
            'created_at'  => date('Ymd')
          );

          // input data above to database
          $this->madmin->inputData('tm_product', $items);

          // select id from product
          $prod = $this->madmin->getProducts(array('name' => $this->input->post('pName')),
            array('idField' => 'id'), 'tm_product', TRUE);

          // input for each spec id
          $data = array('spec' => $this->input->post('spec[]'));
          foreach($data['spec'] as $spec){
            $prodSpec = array(
              'prod_id' => $prod['id'],
              'spec_id' => $spec
            );
            $this->madmin->inputData('tr_product_spec', $prodSpec);
          }

          // input for each size and price
          $count_SizePrice = count($this->input->post('size[]'));
          $data_SizePrice = array(
            'size' => $this->input->post('size[]'),
            'price' => $this->input->post('price[]')
          );
          for ($i=0; $i < $count_SizePrice; $i++) {
            $prodSizePrice = array(
              'prod_id' => $prod['id'],
              'size_id' => $data_SizePrice['size'][$i],
              'price'   => $data_SizePrice['price'][$i]
            );
            // input size and price
            $this->madmin->inputData('tr_product_size', $prodSizePrice);
          }
          redirect('admin/allProd');
        }
      }else{
        $data['brands'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
          'nameField' => 'name'), 'tm_brands', FALSE);
        $data['cats'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
          'nameField' => 'name'), 'tm_category', FALSE);
        $data['specs'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
          'nameField' => 'name'), 'tm_spec', FALSE);
        $data['sizes'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
          'nameField' => 'name', 'sizeField' => 'size'), 'tm_size', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addProd-2', $data);
        $this->load->view('include/admin/footer');
      }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function test(){
    $data = $this->madmin->getProducts(NULL, array('idField' => 'id'), 'tm_product', FALSE);
    // foreach ($data as $data) {
    //   print_r($no);
    //   echo "</br>";
    // }
    $no=1;foreach ($data as $key => $value) {
      $data_bs = array(
        'stars'     => 5,
        'position'  => $no
      );
      $this->madmin->updateData(array('id' => $value['id']), 'tm_product', $data_bs);
      $no++;
    }
    exit();
    $dataBL = $this->madmin->getProducts(NULL, NULL, 'tr_product_best_seller', FALSE);
    foreach ($dataBL as $dataBL) {
      print_r($dataBL);echo "</br>";
    }
  }

  public function detailProd($idProd){
    if ($this->session->userdata('uType') == 1) {
      $specs = [];
      $prices = [];
      $sizes = [];
      $data['product'] = $this->madmin->getProducts(array('id' => $idProd), NULL, 'tm_product', TRUE);
      $data['brand'] = $this->madmin->getProducts(array('id' => $data['product']['brand_id']),
       array('nameField' => 'name'), 'tm_brands', TRUE);
      $data['category'] = $this->madmin->getProducts(array('id' => $data['product']['cat_id']),
       array('nameField' => 'name'), 'tm_category', TRUE);
      $idSpec = $this->madmin->getProducts(array('prod_id' => $idProd),
       array('idField' => 'spec_id'), 'tr_product_spec', FALSE);
      $idSize = $this->madmin->getProducts(array('prod_id' => $idProd),
       array('idField' => 'size_id', 'priceField' => 'price'), 'tr_product_size', FALSE);

      for ($i=0; $i < count($idSpec) ; $i++) {
        array_push($specs, $this->madmin->getProducts(array('id' => $idSpec[$i]['spec_id']),
         array('nameField' => 'name'), 'tm_spec', TRUE));
      }
      $data['specs'] = $specs;

      for ($i=0; $i < count($idSize); $i++) {
        array_push($prices, $idSize[$i]['price']);
      }
      $data['prices'] = $prices;

      for ($i=0; $i < count($idSize); $i++) {
        array_push($sizes, $this->madmin->getProducts(array('id' => $idSize[$i]['size_id']),
         array('nameField' => 'name', 'sizeField' => 'size'), 'tm_size', FALSE));
      }
      $data['sizes'] = $sizes;

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/prodDetail', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }

  }

  public function deleteProd($idProd){
    if ($this->session->userdata('uType') == 1) {
      $this->madmin->deleteData(array('prod_id' => $idProd), 'tr_product_spec');
      $this->madmin->deleteData(array('prod_id' => $idProd), 'tr_product_size');
      $this->madmin->deleteData(array('id' => $idProd), 'tm_product');
      redirect('admin/allProd');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function sa_agmpedia(){
    if ($this->session->userdata('uType') == 1) {
      $data['pedias'] = $this->madmin->getProducts(NULL, NULL, 'tm_agmpedia', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_agmpedia', $data);
      $this->load->view('include/admin/footer');
    }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
    }
  }

  public function addPedia(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('sContent', 'Sub news', 'required|max_length[125]');
      $this->form_validation->set_rules('content', 'News', 'required');

      if ($this->form_validation->run() === TRUE) {
        $config['upload_path'] = './asset/upload/pedia/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['max_size'] = 2048;

        $this->load->library('upload', $config);
        if ( empty($this->upload->do_upload('photo')) || empty($this->upload->do_upload('thumbnail')) ) {
          $this->session->set_flashdata('error', $this->upload->display_errors());

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/addPedia');
          $this->load->view('include/admin/footer');
        }else{
          $this->upload->do_upload('photo');
          $photos = $this->upload->data();
          $this->upload->do_upload('thumbnail');
          $thumbnails = $this->upload->data();

          $items = array(
            'title' => $this->input->post('title'),
            'sub_content' => $this->input->post('sContent'),
            'content' => $this->input->post('content'),
            'date'  => date('Ymd'),
            'thumbnail' => $thumbnails['orig_name'],
            'photo' => $photos['orig_name'],
            'status' => 1,
            'user_id' => $this->session->userdata('uId')
          );
          $this->madmin->inputData('tm_agmpedia', $items);
          redirect('admin/sa_agmpedia');
        }
      } else {
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addPedia');
        $this->load->view('include/admin/footer');
      }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function storeProd($idSO){
    if ($this->session->userdata('uType') == 2 || $this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('product', 'Product', 'required|callback_checkingSProd');

      if ($this->form_validation->run() === FALSE) {
           $idStore = array('idStore' => $idSO);
           $data['storeId'] = $idStore;
        $data['products'] = $this->madmin->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name'),
         'tm_product', FALSE);

         $this->load->view('include/admin/header');
         $this->load->view('include/admin/left-sidebar');
         $this->load->view('admin/storeProd', $data);
         $this->load->view('include/admin/footer');
       }else{
         // input for each size and price
          $count_SizePrice = count($this->input->post('size[]'));
          $data_SizePrice = array(
            'size' => $this->input->post('size[]'),
          );
          for ($i=0; $i < $count_SizePrice; $i++) {
            $prodSizePrice = array(
              'id_store'           => $idSO,
              'id_product'         => $this->input->post('product'),
              'id_product_size'    => $data_SizePrice['size'][$i],
              'new'                => 1,
              'id_admin'           => $this->session->userdata('uId')
            );
            // input size and price
            $this->madmin->inputData('tr_product', $prodSizePrice);
          }
         redirect('admin/stores/'.$idSO);
       }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addStore_SpecialPackage($idStoreOwner){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('specialPackage', 'Special Package', 'required|callback_checkingSpecialPackage');

      if ($this->form_validation->run() === FALSE) {
        $data['id_store'] = $idStoreOwner;
        $data['special_packages'] = $this->madmin->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name'), 'tm_special_package', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addStore_SpecialPackage', $data);
        $this->load->view('include/admin/footer');
      }else{
        $dataStore_SpclPckg = array(
          'id_special_package'  =>  $this->input->post('specialPackage'),
          'id_store_owner'      =>  $idStoreOwner,
          'quantity'            =>  0
        );

        $this->madmin->inputData('tr_storeowner_special_package', $dataStore_SpclPckg);
        redirect('admin/stores/'.$idStoreOwner);
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingSpecialPackage($idSpecialPckg){
    $alreadyAssgn = $this->madmin->getProducts(array('id_store_owner' => $this->input->post('idStore'), 'id_special_package' => $idSpecialPckg),
      NULL, 'tr_storeowner_special_package', TRUE);
    if (isset($alreadyAssgn)) {
      $this->session->set_flashdata('error', 'Special package has already been added to store');
      return FALSE;
    }else {
      return TRUE;
    }
  }

  public function getIdProduct($idProd){
      $sizes = $this->madmin->joinSizeProduct($idProd);
       if($sizes) {
        print_r(json_encode($sizes));
    } else {
        echo "Something went wrong";
    }
  }

  public function checkingSProd($prod){
    $alreadyAssgn = $this->madmin->getProducts(array('id_product' => $prod, 'id_store' => $this->input->post('idStore')),
     NULL, 'tr_product', TRUE);
    if (isset($alreadyAssgn)) {
      $this->session->set_flashdata('error', 'Product has already been added to store');
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function addQuan(){
    if ($this->session->userdata('uType') == 2) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('quan', 'Quantity', 'required');

      $data['quantity'] = $this->madmin->getProducts(array('id' => $this->session->userdata('idProd')),
        array('quantityField' => 'quantity'), 'tm_product', TRUE);

      if ($this->form_validation->run() == FALSE) {
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/prodQuantity', $data);
        $this->load->view('include/admin/footer');
      }else{
        if ($this->input->post('quan') > $data['quantity']) {
          $this->session->set_flashdata('error', 'Quantity must be at least same from current quantity');
          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/prodQuantity', $data);
          $this->load->view('include/admin/footer');
        }else{
          $items = array(
            'id_store' => $this->session->userdata('idStore'),
            'id_product' => $this->session->userdata('idProd'),
            'quantity' => $this->input->post('quan'),
            'id_admin' => $this->session->userdata('uId')
          );
          $this->madmin->inputData('tr_product', $items);
          $newQuan = $data['quantity'] - $this->input->post('quan');
          $new_quantity = array(
            'quantity' => $newQuan
          );
          $this->madmin->updateData(array('id' => $this->session->userdata('idProd')),
            'tr_product', $new_quantity);
          $this->session->unset_userdata('idProd');
          $this->session->unset_userdata('idStore');
          redirect();
        }
      }
    }else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function sa_slider(){
    if ($this->session->userdata('uType') == 1) {
      $data['slides'] = $this->madmin->getProducts(NULL, NULL, 'tm_slide', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_slider', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addSlider(){
    if ($this->session->userdata('uType') == 1) {

      $config['upload_path'] = './asset/upload/';
      $config['allowed_types'] = 'jpg|jpeg|png';

      $this->load->library('upload', $config);

      if (! $this->upload->do_upload('sliderPict')) {
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addSlider');
        $this->load->view('include/admin/footer');
      }else{
        $pName = $this->upload->data();
        $items = array(
          'slide'       => $pName['orig_name'],
          'created_at'  => date('Ymd'),
        );
        $this->madmin->inputData('tm_slide', $items);
        redirect('admin/sa_slider');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function deleteSlider($idSlider){
    if ($this->session->userdata('uType') == 1) {
      $this->madmin->deleteData(array('id' => $idSlider), 'tm_slide');
      redirect('admin/sa_slider');
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function sa_spec(){
    if ($this->session->userdata('uType') == 1) {
      $data['specs'] = $this->madmin->getProducts(NULL, NULL, 'tm_spec', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_spec', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addSpec(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('name', 'Spec name', 'required|callback_checkingSpec');

      if ($this->form_validation->run() === TRUE) {
        // $file_name = strtolower('spec-'.$this->input->post('name'));
        //
        // $config['upload_path'] = './asset/upload/';
        // $config['allowed_types'] = 'jpg|jpeg|png';
        // $config['file_name'] = $file_name;
        //
        // $this->load->library('upload', $config);
        // if (! $this->upload->do_upload('specPict')) {
        //   $this->session->set_flashdata('error', $this->upload->display_errors());
        //
        //   $this->load->view('include/admin/header');
        //   $this->load->view('include/admin/left-sidebar');
        //   $this->load->view('admin/addSpec');
        //   $this->load->view('include/admin/footer');
        // }else{
        //   $pName = $this->upload->data();

          $items = array(
            'name'        => $this->input->post('name'),
            // 'image'       => $pName['orig_name'],
            'created_at'  => date('Ymd')
          );
          $this->madmin->inputData('tm_spec', $items);
          redirect('admin/sa_spec');
        // }
      }else{
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addSpec');
        $this->load->view('include/admin/footer');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingSpec($spec){
    $specName = $this->madmin->getProducts(array('name' => $spec), array('nameField' => 'name'), 'tm_spec', TRUE);

    if(isset($specName)){
      $this->session->set_flashdata('error', 'Spec has already been created');
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function deleteSpec($specId){
    if ($this->session->userdata('uType') == 1) {
      $this->madmin->deleteData(array('id' => $specId), 'tm_spec');
      redirect('admin/sa_spec');
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function sa_size(){
    if ($this->session->userdata('uType') == 1) {
      $data['sizes'] = $this->madmin->getProducts(NULL, NULL,'tm_size', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_size', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }

  }

  public function addSize(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('name', 'Size name', 'required|callback_checkingSizeName');
      $this->form_validation->set_rules('size', 'Size', 'required|callback_checkingSize');

      if ($this->form_validation->run() === FALSE) {
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addSize');
        $this->load->view('include/admin/footer');
      }else{
        $items = array(
          'name'       => $this->input->post('name'),
          'size'       => $this->input->post('size'),
          'created_at' => date('Ymd'),
          'status'     => 1
        );
        $this->madmin->inputData('tm_size', $items);
        redirect('admin/sa_size');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingSizeName($name){
    $sizeName = $this->madmin->getProducts(array('name' => $name), array('nameField' => 'name'), 'tm_size', TRUE);

    if (isset($sizeName)) {
      $this->session->set_flashdata('error', 'Size name has already been created');
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function checkingSize($size){
    if ($this->checkingSizeName($this->input->post('name'))) {
      $size = $this->madmin->getProducts(array('size' => $size), array('sizeField' => 'size'), 'tm_size', TRUE);
      if (isset($size)) {
        $this->session->set_flashdata('error', 'Size has already been created');
        return FALSE;
      }else{
        return TRUE;
      }
    }else{
      $this->session->set_flashdata('error', 'Size name has already been created');
      return FALSE;
    }
  }

  public function deleteSize($sizeId){
    if ($this->session->userdata('uType') == 1) {
      $this->madmin->deleteData(array('id' => $sizeId), 'tm_size');
      redirect('admin/sa_size');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function stores($link = FALSE){
    if ($this->session->userdata('uType') == 1) {
      if($link === FALSE){
        $data['provinces'] = [];
        $data['cities'] = [];
        $data['sub_districts'] = [];
        $data['posts'] = $this->madmin->getProducts(NULL, NULL, 'tm_store_owner', FALSE);
        foreach ($data['posts'] as $store) {
          $provinsi = $this->madmin->joinStoreProv($store['id']);
          $kabupaten = $this->madmin->jointStoreKab($store['id']);
          $kecamatan = $this->madmin->jointStoreKec($store['id']);
          array_push($data['provinces'], $provinsi);
          array_push($data['cities'], $kabupaten);
          array_push($data['sub_districts'], $kecamatan);
        }

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/stores', $data);
        $this->load->view('include/admin/footer');
      } else {
        $idStore = array('idStore' => $link);
        $id = $this->madmin->getProducts(array('id' => $link),
          array('idUserLogin' => 'id_userlogin'), 'tm_store_owner', TRUE);
        $data['post'] = $this->madmin->getProducts(array('id' => $link),NULL, 'tm_store_owner', TRUE);
        $data['prime'] = $this->madmin->emailStore($link);
        $data['storeId'] = $idStore;
        $data['products'] = $this->madmin->joinStoreProd($link);
        $data['clusters'] = $this->madmin->detailCluster($link);
        $data['special_packages'] = $this->madmin->store_specialPackage($link);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/detail_store', $data);
        $this->load->view('include/admin/footer');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addCluster($idStore){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('sub_district', 'Kecamatan', 'required|callback_checkingClusterSub');

      if ($this->form_validation->run() == FALSE) {
        $data['id_store'] = $idStore;
        $data['address'] = $this->madmin->detailAddress_store($idStore);
        $data['sub_districts'] = $this->madmin->getProducts(array('id_kab' => $data['address']['city']),
          array('id_kecField' => 'id_kec', 'namaField' => 'nama'), 'kecamatan', FALSE);


        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addCluster', $data);
        $this->load->view('include/admin/footer');
      } else {
        $dataCluster = array(
          'id_store'      => $this->input->post('id_store'),
          'province'      => $this->input->post('province'),
          'city'          => $this->input->post('city'),
          'sub_district'  => $this->input->post('sub_district')
        );
        print_r($dataCluster);
        $this->madmin->inputData('tr_store_owner_cluster', $dataCluster);
        redirect('admin/stores/'.$idStore);
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function deleteCluster_Store($idStore, $sub){
    if ($this->session->userdata('uType') == 1) {
      $dataCluster_Store = array(
        'id_store'      => $idStore,
        'sub_district'  => $sub
      );
      $this->madmin->deleteData($dataCluster_Store, 'tr_store_owner_cluster');
      redirect('admin/stores/'.$idStore);
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingClusterSub($subDistrict){
    if ($this->session->userdata('uType') == 1) {
      $idStore = $this->input->post('id_store');
      $hasSub = $this->madmin->getProducts(array('sub_district' => $subDistrict), array('subField' => 'sub_district'),
        'tr_store_owner_cluster', TRUE);
      if (isset($hasSub)) {
        $this->session->set_flashdata('error', 'Kecamatan sudah ditambahkan atau terdapat pada cluster toko lain');
        return FALSE;
      } else {
        return TRUE;
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function bestSeller(){
    if ($this->session->userdata('uType') == 1) {
      $data['best_seller'] = $this->madmin->best_seler();

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/best_seller', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function edit_best_seller($idBestSeller){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('stars', 'Stars', 'required');
      $this->form_validation->set_rules('position', 'Position', 'required');

      if ($this->form_validation->run() == TRUE) {
        // new stars
        $stars = $this->input->post('stars');
        // new position
        $position = $this->input->post('position');

        // search id from new position
        $positionProduct_destination = $this->madmin->getProducts(array('position' => $position), array('idField' => 'id'),
          'tr_product_best_seller', TRUE);
        // search last position from idBeddingACC
        $positionProduct_lastdestination = $this->madmin->getProducts(array('id' => $idBestSeller), array('positionField' => 'position'),
          'tr_product_best_seller', TRUE);

        // data new stars and new position for idBedLinen
        $data_newDestination = array(
          'stars'     => $stars,
          'position'  => $position
        );
        $this->madmin->updateData(array('id' => $idBestSeller), 'tr_product_best_seller', $data_newDestination);

        $data_ProdLastDestination = array(
          'position'  => $positionProduct_lastdestination['position']
        );
        $this->madmin->updateData(array('id' => $positionProduct_destination['id']), 'tr_product_best_seller', $data_ProdLastDestination);

        redirect('admin/bestSeller');
      } else {
        $data['best_seller'] = $this->madmin->detail_prod_best_seller($idBestSeller);
        $maxPosition = $this->madmin->getProducts(NULL, array('positionField' => 'position'), 'tr_product_best_seller', FALSE);
        $data['maxPosition'] = array('max' => count($maxPosition));

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/edit_best_seller', $data);
        $this->load->view('include/admin/footer');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function sa_promotion()
  {
    $this->load->view('include/admin/header');
    $this->load->view('include/admin/left-sidebar');
    $this->load->view('admin/sa_promotion');
    $this->load->view('include/admin/footer');
  }

  public function promotions() {
      if ($this->session->userdata('uType') == 1) {
          $data['promotion'] = $this->madmin->getProducts(NULL, NULL,'tm_promotion', FALSE);

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/promotions', $data);
          $this->load->view('include/admin/footer');
      } else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
      }
  }

    public function addPromotion(){
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('start', 'Start Period', 'required');
            $this->form_validation->set_rules('end', 'End Period', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/addPromotion');
                $this->load->view('include/admin/footer');
            } else {
                $file_name = strtolower('promotion-image-'.uniqid());

                $config['upload_path'] = './asset/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png|svg';
                $config['file_name']  = $file_name;
                $this->load->library('upload', $config);
                if (! $this->upload->do_upload('promotionImage')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    $this->load->view('include/admin/header');
                    $this->load->view('include/admin/left-sidebar');
                    $this->load->view('admin/addPromotion');
                    $this->load->view('include/admin/footer');
                } else {
                    $image = $this->upload->data();
                    $promotion = array(
                        'name'         => $this->input->post('name'),
                        'description'  => $this->input->post('desc'),
                        'start_date'     => $this->input->post('start'),
                        'end_date'       => $this->input->post('end'),
                        'image'       => $image['orig_name'],
                        'status'       => 1
                    );
                    $this->madmin->inputData('tm_promotion', $promotion);

                    redirect('admin/promotions', 'refresh');
                }
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function detailPromotion($id) {
        if ($this->session->userdata('uType') == 1) {
            $data['promotion'] = $this->madmin->getProducts(array('id' => $id), NULL,'tm_promotion', TRUE);
            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/detailpromotion', $data);
            $this->load->view('include/admin/footer');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function activePromotion($id) {
        if($this->session->userdata('uType') == 1){
            $stat = $this->madmin->getProducts(array('id' => $id), array('statField' => 'status'), 'tm_promotion',TRUE);
            if($stat['status'] == 1){
                $items = array('status' => 0);
                $this->madmin->updateData(array('id' => $id), 'tm_promotion', $items);
                redirect('admin/promotions', 'refresh');
            }else{
                $items = array('status' => 1);
                $this->madmin->updateData(array('id' => $id), 'tm_promotion', $items);
                redirect('admin/promotions', 'refresh');
            }
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function editPromotion($id) {
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('start', 'Start Period', 'required');
            $this->form_validation->set_rules('end', 'End Period', 'required');

            if ($this->form_validation->run() === FALSE) {
                $data['promotion'] = $this->madmin->getProducts(array('id' => $id), NULL,'tm_promotion', TRUE);
                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/editPromotion', $data);
                $this->load->view('include/admin/footer');
            } else {
                if ($this->input->post('promotionImage') !== NULL) {
                    $file_name = strtolower('promotion-image-'.uniqid());

                    $config['upload_path'] = './asset/upload/';
                    $config['allowed_types'] = 'jpg|jpeg|png|svg';
                    $config['file_name']  = $file_name;
                    $this->load->library('upload', $config);
                    if (! $this->upload->do_upload('promotionImage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());

                        $this->load->view('include/admin/header');
                        $this->load->view('include/admin/left-sidebar');
                        $this->load->view('admin/addPromotion');
                        $this->load->view('include/admin/footer');
                    } else {
                        $image = $this->upload->data();
                        $promotion = array(
                            'name'         => $this->input->post('name'),
                            'description'  => $this->input->post('desc'),
                            'start_date'     => $this->input->post('start'),
                            'end_date'       => $this->input->post('end'),
                            'image'       => $image['orig_name'],
                            'status'       => 1
                        );
                        $this->madmin->updateData(array('id' => $id),'tm_promotion', $promotion);

                        redirect('admin/promotions', 'refresh');
                    }
                } else {
                    $promotion = array(
                        'name'         => $this->input->post('name'),
                        'description'  => $this->input->post('desc'),
                        'start_date'     => $this->input->post('start'),
                        'end_date'       => $this->input->post('end'),
                        'status'       => 1
                    );
                    $this->madmin->updateData(array('id' => $id),'tm_promotion', $promotion);

                    redirect('admin/promotions', 'refresh');
                }
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function deletePromotion($id) {
        if ($this->session->userdata('uType') == 1) {
            $data = $this->madmin->getProducts(array('id' => $id), NULL,'tm_promotion', TRUE);
            $this->madmin->deleteData(array('id' => $id), 'tm_promotion');
            unlink('./asset/upload/'.$data['image']);
            redirect('admin/promotions', 'refresh');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

  public function sizeNameStore($idSize){
      $sizeName = $this->madmin->getSizeName($idSize);
      if($sizeName) {
        print_r(json_encode($sizeName));
      } else {
        echo "Something went wrong";
      }
  }

  public function sizeNameProduct($idSize){
      $sizeName = $this->madmin->getSizeNameProduct($idSize);
      if($sizeName) {
        print_r(json_encode($sizeName));
      } else {
        echo "Something went wrong";
      }
  }

  public function special_package(){
    if ($this->session->userdata('uType') == 1) {
      $data['specialPackages'] = $this->madmin->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name',
       'priceField' => 'price', 'activeField' => 'active'), 'tm_special_package', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/specialPackage', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addSpecial_package(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('name', 'Special Package Name', 'required|callback_checkingSPackage');
      $this->form_validation->set_rules('desc', 'Special Package Description', 'required');
      // $this->form_validation->set_rules('promo_date');
      // $this->form_validation->set_rules('price', 'Special Package Price', 'required');
      // $this->form_validation->set_rules('product[]', 'Special Package Products', 'required');

      if ($this->form_validation->run() === TRUE) {
        $file_name = strtolower('special_package-'.$this->input->post('name'));

        $config['upload_path'] = './asset/upload/special-package/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('imageSP')) {
          $data['products'] = $this->madmin->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name'), 'tm_product', FALSE);

          $this->session->set_flashdata('error', $this->upload->display_errors());

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/addSpecial_Package', $data);
          $this->load->view('include/admin/footer');
        } else {
          $sp_name = $this->upload->data();
          $priceSpcl = $this->input->post('priceSpcl[]');
          $total_priceSpcl = array_sum($priceSpcl);

          $data = array(
            'name'        => $this->input->post('name'),
            'image'       => $sp_name['orig_name'],
            'description' => $this->input->post('desc'),
            'active'      => 1,
            'price'       => $total_priceSpcl
          );

          $this->madmin->inputData('tm_special_package', $data);

          $idSP = $this->madmin->getProducts(array('name' => $this->input->post('name')), array('idField' => 'id'), 'tm_special_package', TRUE);
          // print_r($idSP);
          // exit();

          $prods = count($this->input->post('sizeSpcl[]'));
          $sizeSpcl = $this->input->post('sizeSpcl[]');
          $qtySpcl = $this->input->post('qtySpcl[]');
          $priceSpcl = $this->input->post('priceSpcl[]');
          for ($i=0; $i < $prods; $i++) {
            $dataRelation_SpecialPackage = array(
              'id_special_package' => $idSP['id'],
              'id_tr_prod_size'    => $sizeSpcl[$i],
              'priceSpcl'          => $priceSpcl[$i],
              'quantity'           => $qtySpcl[$i]
            );
            $this->madmin->inputData('tr_special_package', $dataRelation_SpecialPackage);
          }
          redirect('admin/special_package');
        }
      } else {
        $data['products'] = $this->madmin->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name'), 'tm_product', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addSpecial_Package', $data);
        $this->load->view('include/admin/footer');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkProdSize($idProduct){
    $sizeProduct = $this->madmin->product_size($idProduct);
    if ($sizeProduct) {
      print_r(json_encode($sizeProduct));
    }else{
      echo "Something went wrong";
    }
  }

  public function check_tr_prod_size($idprod_size){
    $productSize = $this->madmin->checkprod_size($idprod_size);
    if ($productSize) {
      print_r(json_encode($productSize));
    }else {
      echo "Something went wrong";
    }
  }

  public function checkingSPackage($nameSP){
    $specialPackage_name = $this->madmin->getProducts(array('name'=>$nameSP), array('nameField' => 'name'), 'tm_special_package', TRUE);
    if (isset($specialPackage_name)) {
      $this->session->set_flashdata('error', 'Special package name has already been created');
      return FALSE;
    } else {
      return TRUE;
    }
  }

  public function activeSpecialPackage($idSP){
    if ($this->session->userdata('uType') == 1) {
      $isActive = $this->madmin->getProducts(array('id' => $idSP), array('activeField' => 'active'), 'tm_special_package', TRUE);
      if ($isActive['active'] == 1) {
        echo "this is active";
        $item = array('active' => 0);
        $this->madmin->updateData(array('id' => $idSP), 'tm_special_package', $item);
      } else {
        echo "this is inactive";
        $item = array('active' => 1);
        $this->madmin->updateData(array('id' => $idSP), 'tm_special_package', $item);
      }
      redirect('admin/special_package');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function allVoucher(){
    if ($this->session->userdata('uType') == 1) {
      $data['vouchers'] = $this->madmin->getProduct_orderBy(NULL, NULL, 'tm_voucher', 'kode_voucher', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/allVoucher', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addVoucher(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('kVoucher', 'Kode Voucher', 'required');
      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('desc', 'Description', 'required');
      $this->form_validation->set_rules('jumlah', 'Limit Voucher', 'required');

      if ($this->form_validation->run() === FALSE) {
        $data['products'] = $this->madmin->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name'), 'tm_product', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addVoucher', $data);
        $this->load->view('include/admin/footer');
      } else {
        $bonus = $this->input->post('bonus[]');
        $primeVoucher = array(
          'kode_voucher' => $this->input->post('kVoucher'),
          'name'         => $this->input->post('name'),
          'description'  => $this->input->post('desc'),
          'discount'     => $this->input->post('discount'),
          'jumlah'       => $this->input->post('jumlah'),
          'active'       => 1
        );
        $this->madmin->inputData('tm_voucher', $primeVoucher);
        print_r($primeVoucher);
        echo "</br></br>";
        echo "<hr>";
        $kode_voucher = $this->input->post('kVoucher');
        $idVoucher = $this->madmin->getProducts(array('kode_voucher' => $kode_voucher), array('idField' => 'id'),
          'tm_voucher', TRUE);
        foreach ($bonus as $bonus) {
          $dataBonus = array(
            'id_voucher'  =>  $idVoucher['id'],
            'bonus'       =>  $bonus
          );
          print_r($dataBonus);
          echo "</br></br>";
          echo "<hr>";
          $this->madmin->inputData('tr_bonus_voucher', $dataBonus);
        }
        redirect('admin/allVoucher');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function active_voucher($idVoucher, $active){
    if ($this->session->userdata('uType') == 1) {
      if ($active == 1) {
        $items = array('active' => 0);
        $this->madmin->updateData(array('id' => $idVoucher), 'tm_voucher', $items);
      } else {
        $items = array('active' => 1);
        $this->madmin->updateData(array('id' => $idVoucher), 'tm_voucher', $items);
      }
      redirect('admin/allVoucher');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }
  public function detail_voucher($idVoucher){
    if ($this->session->userdata('uType') == 1) {
      $data['voucher'] = $this->madmin->getProducts(array('id' => $idVoucher), NULL, 'tm_voucher', TRUE);
      $data['detail_voucher'] = $this->madmin->detail_voucher($idVoucher);
      // print_r($data['voucher']);
      // exit();

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/detail_voucher', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function bed_linen(){
    if ($this->session->userdata('uType') == 1) {
      $data['product_bedlinen'] = $this->madmin->product_bed_linen();

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/bed_linen', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function edit_bed_linen($idBedLinen){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('stars', 'Stars', 'required');
      $this->form_validation->set_rules('position', 'Position', 'required');

      if ($this->form_validation->run() == TRUE) {
        // new stars
        $stars = $this->input->post('stars');
        // new position
        $position = $this->input->post('position');

        // search id from new position
        $positionProduct_destination = $this->madmin->getProducts(array('position' => $position), array('idField' => 'id'),
          'tr_product_bed_linen', TRUE);
        // search last position from idBedLinen
        $positionProduct_lastdestination = $this->madmin->getProducts(array('id' => $idBedLinen), array('positionField' => 'position'),
          'tr_product_bed_linen', TRUE);

        // data new stars and new position for idBedLinen
        $data_newDestination = array(
          'stars'     => $stars,
          'position'  => $position
        );
        $this->madmin->updateData(array('id' => $idBedLinen), 'tr_product_bed_linen', $data_newDestination);

        $data_ProdLastDestination = array(
          'position'  => $positionProduct_lastdestination['position']
        );
        $this->madmin->updateData(array('id' => $positionProduct_destination['id']), 'tr_product_bed_linen', $data_ProdLastDestination);

        redirect('admin/bed_linen');
      } else {
        $data['product_bedlinen'] = $this->madmin->detail_prod_bed_linen($idBedLinen);
        $maxPosition = $this->madmin->getProducts(NULL, array('positionField' => 'position'), 'tr_product_bed_linen', FALSE);
        $data['maxPosition'] = array('max' => count($maxPosition));

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/edit_bed_linen', $data);
        $this->load->view('include/admin/footer');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function beddingAcc(){
    if ($this->session->userdata('uType') == 1) {
      $data['product_bedAcc'] = $this->madmin->beddingAcc();

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/bedding_accessories', $data);
      $this->load->view('include/admin/footer');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function edit_bedding_acc($idBeddingACC){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('stars', 'Stars', 'required');
      $this->form_validation->set_rules('position', 'Position', 'required');

      if ($this->form_validation->run() == TRUE) {
        // new stars
        $stars = $this->input->post('stars');
        // new position
        $position = $this->input->post('position');

        // search id from new position
        $positionProduct_destination = $this->madmin->getProducts(array('position' => $position), array('idField' => 'id'),
          'tr_product_bedding_acc', TRUE);
        // search last position from idBeddingACC
        $positionProduct_lastdestination = $this->madmin->getProducts(array('id' => $idBeddingACC), array('positionField' => 'position'),
          'tr_product_bedding_acc', TRUE);

        // data new stars and new position for idBedLinen
        $data_newDestination = array(
          'stars'     => $stars,
          'position'  => $position
        );
        $this->madmin->updateData(array('id' => $idBeddingACC), 'tr_product_bedding_acc', $data_newDestination);

        $data_ProdLastDestination = array(
          'position'  => $positionProduct_lastdestination['position']
        );
        $this->madmin->updateData(array('id' => $positionProduct_destination['id']), 'tr_product_bedding_acc', $data_ProdLastDestination);

        redirect('admin/beddingAcc');
      } else {
        $data['product_bedAcc'] = $this->madmin->detail_prod_bedding_acc($idBeddingACC);
        $maxPosition = $this->madmin->getProducts(NULL, array('positionField' => 'position'), 'tr_product_bedding_acc', FALSE);
        $data['maxPosition'] = array('max' => count($maxPosition));

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/edit_bedding_acc', $data);
        $this->load->view('include/admin/footer');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function reviews($link = FALSE){
    if ($this->session->userdata('uType') == 1) {
      if ($link === FALSE) {
        $data['reviews'] = $this->madmin->listReview();

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/reviews', $data);
        $this->load->view('include/admin/footer');
      } else {
        $data['review'] = $this->madmin->specific_review($link);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/detail-review', $data);
        $this->load->view('include/admin/footer');
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function displayReview($idReview){
    if ($this->session->userdata('uType') == 1) {
      $display = $this->madmin->getProducts(array('id' => $idReview), array('displayF' => 'display'), 'tm_review', TRUE);
      if ($display['display'] == 0) {
        $this->madmin->updateData(array('id' => $idReview), 'tm_review', array('display' => 1));
      }else{
        $this->madmin->updateData(array('id' => $idReview), 'tm_review', array('display' => 0));
      }
      redirect('admin/reviews');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function detailSpecialPackage($idSpecialPckg){
    if ($this->session->userdata('uType') == 1) {
      $data['detail_SpclPckg'] = $this->madmin->getProducts(array('id' => $idSpecialPckg), array('nameField' => 'name',
        'img' => 'image', 'desc' => 'description', 'priceField' => 'price'), 'tm_special_package', TRUE);
      $data['prod_SpclPckg'] = $this->madmin->detail_specialPackage($idSpecialPckg);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/detailSpecialPackage', $data);
      $this->load->view('include/admin/footer');
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }
  public function historyTransaction(){
    $this->load->view('include/admin/header');
    $this->load->view('include/admin/left-sidebar');
    $this->load->view('admin/sa_historyTransaction');
    $this->load->view('include/admin/footer');
  }

    public function editVoucher($idVoucher){
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('kVoucher', 'Kode Voucher', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('jumlah', 'Limit Voucher', 'required');

            if ($this->form_validation->run() === FALSE) {
                $data['voucher'] = $this->madmin->getProducts(array('id' => $idVoucher), NULL, 'tm_voucher', TRUE);

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/editVoucher', $data);
                $this->load->view('include/admin/footer');
            } else {
                $primeVoucher = array(
                    'kode_voucher' => $this->input->post('kVoucher'),
                    'name'         => $this->input->post('name'),
                    'description'  => $this->input->post('desc'),
                    'discount'     => $this->input->post('discount'),
                    'jumlah'       => $this->input->post('jumlah'),
                    'active'       => 1
                );
                if ($this->madmin->updateData(array('id' => $idVoucher),'tm_voucher', $primeVoucher)){
                    redirect('admin/allVoucher');
//                    print_r($this->db->last_query());
                } else {
                    $this->db->_error_message();
                }


            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }
    public function listSubscriber(){
        if ($this->session->userdata('uType') == 1) {
            $data['subscribers'] = $this->madmin->listSubscriber();

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/listallnewsletter', $data);
            $this->load->view('include/admin/footer');
        }else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }
    public function deleteSubscriber($subscriber){
        if ($this->session->userdata('uType') == 1) {
            $this->madmin->deleteData(array('id' => $subscriber), 'tm_newsletter');
            redirect('admin/listSubscriber', 'refresh');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }
}
