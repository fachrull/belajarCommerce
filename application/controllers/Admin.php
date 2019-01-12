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

  public function sa_brand($link = FALSE, $add = FALSE){
    if ($this->session->userdata('uType') == 1) {
      if ($link === FALSE) {
        $data['brands'] = $this->madmin->getProducts(NULL, NULL, 'tm_brand', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/sa_brand', $data);
        $this->load->view('include/admin/footer');
      }elseif($add === FALSE){
        $test=[];
        $data['brand'] = $this->madmin->getProducts(array('id' => $link),
          array('nameField' => 'name', 'idField' => 'id'), 'tm_brand', TRUE);
        $dBrand['id'] = $this->madmin->getProducts(array('brand_id' => $link),
          array('catIdField' => 'cat_id'), 'relation_brand_category', FALSE);
        foreach ($dBrand['id'] as $id) {
          $tst = $this->madmin->getProducts(array('id' => $id['cat_id']),
            array('nameField' => 'name'), 'tm_category', TRUE);
          $test[] = $tst['name'];
        }
        $data['category'] = $test;
        $true = substr(password_hash('true', PASSWORD_DEFAULT),7);
        $data['add'] = 'true';

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/detail_brand', $data);
        $this->load->view('include/admin/footer');
      }else{
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('cat', 'Category', 'required|callback_checkingRel');
        $this->form_validation->set_rules('brand', 'Brand', 'required');

        if ($this->form_validation->run() == FALSE) {
          $data['brand'] = $this->madmin->getProducts(array('id' => $link),
            array('nameField' => 'name', 'idField' => 'id'), 'tm_brand', TRUE);
          $data['add'] = 'true';
          $data['cat'] = $this->madmin->getProducts(NULL,
            array('idCat' => 'id', 'nameCat' => 'name'), 'tm_category', FALSE);

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/relation', $data);
          $this->load->view('include/admin/footer');
        }else{
          $item = array(
            'brand_id'  => $this->input->post('brand'),
            'cat_id'    => $this->input->post('cat'),
            'user_id'   => $this->session->userdata('uId')
          );
          $table = 'relation_brand_category';
          $this->madmin->inputData($table, $item);
          redirect('admin/sa_brand/'.$link);
        }
      }
    }else{
      $this->load->view('include/header');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingRel($rel) {
    $relCat = $this->madmin->getProducts(array('brand_id' => $this->input->post('brand'), 'cat_id' => $this->input->post('cat')),
      array('catIDField' => 'cat_id'), 'relation_brand_category', TRUE);
    if (isset($relCat)) {
      $this->session->set_flashdata('error', 'The category has already been added');
      return FALSE;
    }else {
      return TRUE;
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
        $this->load->view('include/admin/footer');
      }else{
        $this->madmin->createItems('tm_brand');
        redirect('admin/sa_brand');
      }
    }else{
      $this->load->view('include/header');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingBrand($brand){
    $has_brand = $this->madmin->getProducts(array('name' => $brand),
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
      $data['categories'] = $this->madmin->getProducts(NULL, NULL, 'tm_category', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_cat', $data);
      $this->load->view('include/admin/footer');
    }else {
      $this->load->view('include/header');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
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
        $this->load->view('include/admin/footer');
      }else{
        $this->madmin->createItems('tm_category');
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

  public function allProd($link = FALSE){
    if ($this->session->userdata('uType') == 1) {
      if ($link === FALSE) {
        $data['products'] = $this->madmin->getProducts(NULL, NULL, 'tm_product', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/allProd', $data);
        $this->load->view('include/admin/footer');
      }else{
        $data['product'] = $this->madmin->getProducts(array('id' => $link),
          NULL, 'tm_product', TRUE);
        $stat = $this->madmin->getProducts(array('id' => $link),
          array('statField' => 'status'), 'tm_product', TRUE);
        $rel = $this->madmin->getProducts(array('id' => $stat['status']),
          array('idBrand' => 'brand_id', 'idCat' => 'cat_id'), 'relation_brand_category', TRUE);
        $data['brand'] = $this->madmin->getProducts(array('id' => $rel['brand_id']),
          array('nameField' => 'name'), 'tm_brand', TRUE);
        $data['cat'] = $this->madmin->getProducts(array('id' => $rel['cat_id']),
          array('nameField' => 'name'), 'tm_category', TRUE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/prodDetail', $data);
        $this->load->view('include/admin/footer');
      }
    }else{
      $this->load->view('include/header');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function addProd(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('brand', 'Brand', 'required');
      $this->form_validation->set_rules('cat', 'Category', 'required');
      $this->form_validation->set_rules('pName', 'Product Name', 'required');
      $this->form_validation->set_rules('price', 'Price', 'required');
      $this->form_validation->set_rules('sPrice', 'Sub Price', 'required');
      $this->form_validation->set_rules('quantity', 'Quantity', 'required');
      $this->form_validation->set_rules('desc', 'Description', 'required');
      $this->form_validation->set_rules('comfort', 'Comfort Level', 'required');
      $this->form_validation->set_rules('tickness', 'Mattress Tickness', 'required');
      $this->form_validation->set_rules('ht', 'Headboard Type', 'required');
      $this->form_validation->set_rules('ft', 'Foundation Type', 'required');
      $this->form_validation->set_rules('size', 'Mattress Size', 'required');

      if ($this->form_validation->run() === TRUE) {
        $bName = $this->madmin->getProducts(array('id' => $this->input->post('brand')),
          array('nameField' => 'name'), 'tm_brand', TRUE);
        $cName = $this->madmin->getProducts(array('id' => $this->input->post('cat')),
          array('nameField' => 'name'), 'tm_category', TRUE);
        $file_name = strtolower($bName['name'].'-'.$cName['name'].'-'.$this->input->post('pName'));

        $config['upload_path'] = './asset/upload/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name']  = $file_name;

        $this->load->library('upload',$config);
        if(! $this->upload->do_upload('productPict')){
          $data['brands'] = $this->madmin->getProducts(NULL, array('idField' => 'id',
            'nameField' => 'name'), 'tm_brand', FALSE);
          $data['cats'] = $this->madmin->getProducts(NULL, array('idField' => 'id',
            'nameField' => 'name'), 'tm_category', FALSE);

          $this->session->set_flashdata('error', $this->upload->display_errors());

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/addProd', $data);
          $this->load->view('include/admin/footer');
        }else {
          // $data = array('upload_data' => $this->upload->data());
          $pName = $this->upload->data();
          $relId = $this->madmin->getProducts(array('brand_id' => $this->input->post('brand'),
            'cat_id' => $this->input->post('cat')), array('idField' => 'id'), 'relation_brand_category', TRUE);
          $items = array(
            'name'        => $this->input->post('pName'),
            'price'       => $this->input->post('price'),
            'sub_price'   => $this->input->post('sPrice'),
            'quantity'    => $this->input->post('quantity'),
            'description' => $this->input->post('desc'),
            'comfort_lvl' => $this->input->post('comfort'),
            'tickness'    => $this->input->post('tickness'),
            'headboard'   => $this->input->post('ht'),
            'foundation'  => $this->input->post('ft'),
            'size'        => $this->input->post('size'),
            'pict'        => $pName['orig_name'],
            'status'      => $relId['id']
          );
          $this->madmin->inputData('tm_product', $items);
          redirect('admin/allProd');
        }
      }else{
        $data['brands'] = $this->madmin->getProducts(NULL, array('idField' => 'id',
          'nameField' => 'name'), 'tm_brand', FALSE);
        $data['cats'] = $this->madmin->getProducts(NULL, array('idField' => 'id',
          'nameField' => 'name'), 'tm_category', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addProd', $data);
        $this->load->view('include/admin/footer');
      }
    }else{
      $this->load->view('include/header');
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
        $this->load->view('include/header');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
    }
  }

  public function addPedia(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('content', 'Content', 'required');

      if ($this->form_validation->run() === TRUE) {
        $file_name = strtolower('agm_pedia-'.$this->input->post('title'));

        $config['upload_path'] = './asset/upload/';
        $config['allowed_types'] = 'jpg|jpeg|png';
        $config['file_name'] = $file_name;

        $this->load->library('upload', $config);
        if (! $this->upload->do_upload('photo')) {
          $this->session->set_flashdata('error', $this->upload->display_errors());

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/addPedia');
          $this->load->view('include/admmin/footer');
        }else{
          $pName = $this->upload->data();

          $items = array(
            'title'   => $this->input->post('title'),
            'content' => $this->input->post('content'),
            'date'    => date('Ymd'),
            'photo'   => $pName['orig_name'],
            'user_id' => $this->session->userdata('uId')
          );
          $this->madmin->inputData('tm_agmpedia', $items);
          redirect('admin/sa_agmpedia');
        }
      }else{
        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addPedia');
        $this->load->view('include/admin/footer');
      }
    }else{
      $this->load->view('include/header');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }
}
