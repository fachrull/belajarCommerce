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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2 ) {
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

    public function sa_brand(){
        if ($this->session->userdata('uType') == 1) {
            $data['brands'] = $this->madmin->getProducts(array('id !=' => 0, 'deleted' => 0), NULL, 'tm_brands', FALSE);

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


    public function infoBrand($idBrand){
      if ($this->session->userdata('uType') == 1) {
        $data['brand'] = $this->madmin->getProducts(array('id' => $idBrand), NULL, 'tm_brands', TRUE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/detail_brand', $data);
        $this->load->view('include/admin/footer');
      }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }
    }

    public function addBrand(){
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('items', 'Brand Name', 'required|callback_checkingBrand');
            $this->form_validation->set_rules('desc', 'Brand Description', 'required');

            if ($this->form_validation->run() == TRUE) {
                $file_name = strtolower('brand-logo-'.$this->input->post('items'));

                $config['upload_path'] = './asset/brands/';
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
//            $this->madmin->deleteData(array('id' => $brand), 'tm_brands');
            $this->madmin->updateData(array('id' => $brand), 'tm_brands', array('deleted' => 1));
            redirect('admin/sa_brand', 'refresh');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function editBrand($idBrand){
      if ($this->session->userdata('uType') == 1) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('items', 'Brand Name', 'required');
        $this->form_validation->set_rules('desc', 'Brand Description', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['brand'] = $this->madmin->getProducts(array('id' => $idBrand), NULL, 'tm_brands', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/editBrand', $data);
            $this->load->view('include/admin/footer');
          }else {
            if ($_FILES['brandPict']['size'] != 0) {
                $file_name = strtolower('brand-logo-'.$this->input->post('items'));
                $config['upload_path'] = './asset/brands/';
                $config['allowed_types'] = 'jpg|jpeg|png|svg';
                $config['file_name']  = $file_name;
                $config['overwrite']        = true;

                $this->load->library('upload', $config);
                if (! $this->upload->do_upload('brandPict')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $data['brand'] = $this->madmin->getProducts(array('id' => $idBrand), NULL, 'tm_brands', TRUE);
                    $this->load->view('include/admin/header');
                    $this->load->view('include/admin/left-sidebar');
                    $this->load->view('admin/editBrand', $data);
                    $this->load->view('include/admin/footer');
                }else{
                    $pName = $this->upload->data();
                    $items = array(
                        'name'          => $this->input->post('items'),
                        'logo'          => $pName['orig_name'],
                        'description'   => $this->input->post('desc'),
                        'status' => 1,
                    );
                    $this->madmin->updateData(array('id' => $idBrand), 'tm_brands', $items);
                    redirect('admin/sa_brand','refresh');
                }
            } else {
                $items = array(
                    'name'          => $this->input->post('items'),
                    'description'   => $this->input->post('desc'),
                    'status' => 1,
                );
                $this->madmin->updateData(array('id' => $idBrand), 'tm_brands', $items);
                redirect('admin/sa_brand','refresh');
            }
          }
      }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }
    }

    // public function editBrand($idBrand){
    //     if ($this->session->userdata('uType') == 1) {
    //       $this->load->helper('form');
    //       $this->load->library('form_validation');

    //       $this->form_validation->set_rules('items', 'Brand Name', 'required|callback_checkingBrand');
    //       $this->form_validation->set_rules('desc', 'Brand Description', 'required');

    //       if ($this->form_validation->run() === FALSE) {
    //         $data['brand'] = $this->madmin->getProducts(array('id' => $idBrand), NULL, 'tm_brands', TRUE);

    //         $this->load->view('include/admin/header');
    //         $this->load->view('include/admin/left-sidebar');
    //         $this->load->view('admin/editBrand', $data);
    //         $this->load->view('include/admin/footer');
    //       }else {
    //           $items = array(
    //               'name'          => $this->input->post('items'),
    //               'description'   => $this->input->post('desc'),
    //               'status' => 1,
    //           );
    //           $this->madmin->updateData(array('id' => $idBrand), 'tm_brands', $items);
    //           redirect('admin/sa_brand', 'refresh');

    //       }
    //     }else {
    //       $this->load->view('include/header2');
    //       $this->load->view('un-authorise');
    //       $this->load->view('include/footer');
    //     }
    //   }

    public function sa_cat(){
        if ($this->session->userdata('uType') == 1) {
            $data['categories'] = $this->madmin->getProducts(array('id !=' => 0, 'deleted' => 0), NULL, 'tm_category', FALSE);

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
//            $this->madmin->deleteData(array('id' => $cat), 'tm_category');
            $this->madmin->updateData(array('id' => $cat), 'tm_category', array('deleted' => 1));
            redirect('admin/sa_cat', 'refresh');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function infoCat($idCat){
        if ($this->session->userdata('uType') == 1 ){
            $data['cat'] = $this->madmin->getProducts(array('id' => $idCat), NULL, 'tm_category', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/detail_cat', $data);
            $this->load->view('include/admin/footer');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function editCat($idCat){
        if ($this->session->userdata('uType') == 1) {
          $this->load->helper('form');
          $this->load->library('form_validation');

          $this->form_validation->set_rules('items', 'Category Name', 'required');
          $this->form_validation->set_rules('desc', 'Category Description', 'required');

          if ($this->form_validation->run() === FALSE) {
            $data['cat'] = $this->madmin->getProducts(array('id' => $idCat), NULL, 'tm_category', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/editCat', $data);
            $this->load->view('include/admin/footer');
          }else {
              $items = array(
                  'name'          => $this->input->post('items'),
                  'description'   => $this->input->post('desc'),
                  'status' => 1,
              );
              $this->madmin->updateData(array('id' => $idCat), 'tm_category', $items);
              redirect('admin/sa_cat', 'refresh');

          }
        }else {
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
        $data['brands'] = $this->madmin->getProducts(array('id !=' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);
        $data['cats'] = $this->madmin->getProducts(array('id !=' => 0, 'status' => 1), NULL, 'tm_category', FALSE);

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/allProd', $data);
                $this->load->view('include/admin/footer');
            }else{
                $idBrand = $this->input->post('brand');
                $idCat = $this->input->post('cat');
                if ($idBrand != 0 && $idCat != 0) {
                    $data['products'] = $this->madmin->listProduct(array('a.brand_id' => $idBrand,
                        'a.cat_id' => $idCat));
                }elseif($idBrand != 0 && $idCat == 0){
                    $data['products'] = $this->madmin->listProduct(array('a.brand_id' => $idBrand));
                }elseif ($idBrand == 0 && $idCat != 0) {
                    $data['products'] = $this->madmin->listProduct(array('a.cat_id' => $idCat));
                }elseif ($idBrand == 0 && $idCat == 0) {
                    $data['products'] = $this->madmin->listProduct();
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
            $this->form_validation->set_rules('sku[]', 'SKU', 'required');


            if ($this->form_validation->run() === TRUE) {
                $brand_id = $this->input->post('brand');
                $cat_id = $this->input->post('cat');
                $max_position_prod = $this->madmin->getProducts(array('brand_id' => $brand_id),
                    array('pos' => 'MAX(position) as position'), 'tm_product', TRUE);

                $max_position_prod['position'] = $max_position_prod['position'] + 1;

                $items = array(
                    'brand_id'    => $brand_id,
                    'cat_id'      => $cat_id,
                    'name'        => $this->input->post('pName'),
                    'description' => $this->input->post('desc'),
                    'image'       => "/path/to/file/",
                    'stars'       => 0,
                    'position'    => $max_position_prod['position'],
                    'created_at'  => date('Ymd')
                );

                // input data above to database
                $this->madmin->inputData('tm_product', $items);

                $idProd = $this->madmin->getProducts($items, array('idField' => 'id'), 'tm_product', TRUE);
                $cat_id = $this->input->post('cat');

                if ($cat_id == 2) {
                    $max = $this->madmin->maxPosition_BedLinen();
                    $max['position'] = $max['position'] + 1;
                    print_r($max);

                    $data_BedLinen = array(
                        'prod_id'   =>  $idProd['id'],
                        'position'  =>  $max['position']
                    );

                    $this->madmin->inputData('tr_product_bed_linen', $data_BedLinen);
                }else if ($cat_id > 2) {
                    echo $cat_id;
                    $max = $this->madmin->maxPosition_BeddingAcc();
                    $max['position'] = $max['position'] + 1;
                    print_r($max);

                    $data_Bedding = array(
                        'prod_id'   =>  $idProd['id'],
                        'position'  =>  $max['position']
                    );

                    $this->madmin->inputData('tr_product_bedding_acc', $data_Bedding);
                }

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
                    'sku'=> $this->input->post('sku[]'),
                    'size' => $this->input->post('size[]'),
                    'price' => $this->input->post('price[]')
                );
                for ($i=0; $i < $count_SizePrice; $i++) {
                    $prodSizePrice = array(
                        'sku'=> $data_SizePrice['sku'][$i],
                        'prod_id' => $prod['id'],
                        'size_id' => $data_SizePrice['size'][$i],
                        'price'   => $data_SizePrice['price'][$i]
                    );
                    // input size and price
                    $this->madmin->inputData('tr_product_size', $prodSizePrice);
                }

                // Start Upload image
                $images = $this->input->post('productPict[]');
                $bName = $this->madmin->getProducts(array('id' => $this->input->post('brand')),
                    array('nameField' => 'name'), 'tm_brands', TRUE);
                $cName = $this->madmin->getProducts(array('id' => $this->input->post('cat')),
                    array('nameField' => 'name'), 'tm_category', TRUE);
                $config['upload_path'] = './asset/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload',$config);

                $fileNames = array();
                $imageData = array('id_prod' => $prod['id']);
                for ($i = 0; $i < 3; $i++) {
                    $file_name = strtolower($bName['name'].'-'.$cName['name'].'-'.$this->input->post('pName').'-'.uniqid());
                    $config['file_name']  = $file_name;
                    $this->upload->initialize($config);

                    $_FILES['image']['name']     = $_FILES['productPict']['name'][$i];
                    $_FILES['image']['type']     = $_FILES['productPict']['type'][$i];
                    $_FILES['image']['tmp_name'] = $_FILES['productPict']['tmp_name'][$i];
                    $_FILES['image']['error']     = $_FILES['productPict']['error'][$i];
                    $_FILES['image']['size']     = $_FILES['productPict']['size'][$i];

                    if ($_FILES['image']['size'] != 0) {
                        if(! $this->upload->do_upload('image')){
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
                            break;
                        }else {
                            $uploadData = $this->upload->data();
                            $imageData['image_'.($i+1)] = $uploadData['orig_name'];
                            $file_path = './asset/upload/'.$images['image_'.($i+1)];
                            unlink($file_path);
                        }
                    } else {
                        continue;
                    }

                }

                $this->madmin->inputData('tr_product_image', $imageData);

                redirect('admin/allProd');

            }else{
                $data['brands'] = $this->madmin->getProducts(array('id !=' => 0, 'status' => 1), array('idField' => 'id',
          'nameField' => 'name'), 'tm_brands', FALSE);
        $data['cats'] = $this->madmin->getProducts(array('id !=' => 0, 'status' => 1), array('idField' => 'id',
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

    public function editProd($productId){
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('brand', 'Brand', 'required');
            $this->form_validation->set_rules('cat', 'Category', 'required');
            $this->form_validation->set_rules('pName', 'Product Name', 'required');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('spec[]', 'Specification', 'required');
            $this->form_validation->set_rules('size[]', 'Size', 'required');
            $this->form_validation->set_rules('price[]', 'Price', 'required');
            $this->form_validation->set_rules('star', 'Star', 'required');


            if ($this->form_validation->run() === TRUE) {
                $brand = $this->input->post('brand');

                // data for input tm_product
                $items = array(
                    'brand_id'    => $brand,
                    'cat_id'      => $this->input->post('cat'),
                    'name'        => $this->input->post('pName'),
                    'stars'       => $this->input->post('star'),
                    'description' => $this->input->post('desc')
//                        'image'       => $pName['orig_name'],
//                        'created_at'  => date('Ymd')
                );

                // update data above to database
                $this->madmin->updateData(array('id' => $productId), 'tm_product', $items);

                // delete product spec & size
                $this->madmin->deleteData(array('prod_id' => $productId), 'tr_product_spec');
//                $this->madmin->deleteData(array('prod_id' => $productId), 'tr_product_size');
//                    exit();

                // input for each spec id
                $data = array('spec' => $this->input->post('spec[]'));
                foreach($data['spec'] as $spec){
                    $prodSpec = array(
                        'prod_id' => $productId,
                        'spec_id' => $spec
                    );
                    $this->madmin->inputData('tr_product_spec', $prodSpec);
                }

                // input for each size and price
                $numItem = count($this->input->post('item[]'));
                $data_SizePrice = array(
//                        'sku'=> $this->input->post('sku[]'),
                    'size' => $this->input->post('size[]'),
                    'id' => $this->input->post('item[]'),
                    'price' => $this->input->post('price[]'),
                    'subprice' => $this->input->post('subprice[]')
                );
                for ($i=0; $i < $numItem; $i++) {
                    $subPrice = $data_SizePrice['subprice'][$i] == '-' ? NULL : $data_SizePrice['subprice'][$i];
                    $prodSizePrice = array(
//                            'sku'=> $data_SizePrice['sku'][$i],
                        'id'    => $data_SizePrice['id'][$i],
                        'prod_id' => $productId,
                        'size_id' => $data_SizePrice['size'][$i],
                        'price'   => $data_SizePrice['price'][$i],
                        'sub_price' => $subPrice
                    );

                    //check new item
                    $item = $this->madmin->getProducts(array('id' => $data_SizePrice['id'][$i]), NULL,
                        'tr_product_size', TRUE);

                    if ($item != NULL) {
                        $this->madmin->updateData(array('id' => $data_SizePrice['id'][$i]), 'tr_product_size', $prodSizePrice);
                    } else {
                        $prodSizePrice = array(
//                            'sku'=> $data_SizePrice['sku'][$i],
                            'prod_id' => $productId,
                            'size_id' => $data_SizePrice['size'][$i],
                            'price'   => $data_SizePrice['price'][$i],
                            'sub_price' => $subPrice
                        );
                        $this->madmin->inputData('tr_product_size', $prodSizePrice);
                    }


//                        print_r($prodSizePrice);
                }

                // change position
                $position = $this->input->post('position');

                // search id from new position
                $productByDestPos = $this->madmin->getProducts(array('position' => $position, 'brand_id' => $brand),
                    array('idField' => 'id'), 'tm_product', TRUE);

                // switch product position
                if ($productByDestPos != NULL) {
                    // recent product position
                    $recentPosition = $this->madmin->getProducts(array('id' => $productId),
                        array('positionField' => 'position'), 'tm_product', TRUE);

                    if ($recentPosition['position'] != $position) {
                        $this->madmin->updateData(array('id' => $productByDestPos['id']),
                            'tm_product', array('position' => $recentPosition['position']));
                    }
                }

                $this->madmin->updateData(array('id' => $productId), 'tm_product', array('position' => $position));

                $bName = $this->madmin->getProducts(array('id' => $this->input->post('brand')),
                    array('nameField' => 'name'), 'tm_brands', TRUE);
                $cName = $this->madmin->getProducts(array('id' => $this->input->post('cat')),
                    array('nameField' => 'name'), 'tm_category', TRUE);
                $config['upload_path'] = './asset/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload',$config);

                $images = $this->madmin->getProducts(array('id_prod' => $productId), NULL, 'tr_product_image', TRUE);
                $imageData = array('id_prod' => $productId);

                for ($i = 0; $i < 3; $i++) {
                    $file_name = strtolower($bName['name'].'-'.$cName['name'].'-'.$this->input->post('pName').'-'.uniqid());
                    $config['file_name']  = $file_name;
                    $this->upload->initialize($config);

                    $_FILES['image']['name']     = $_FILES['productPict']['name'][$i];
                    $_FILES['image']['type']     = $_FILES['productPict']['type'][$i];
                    $_FILES['image']['tmp_name'] = $_FILES['productPict']['tmp_name'][$i];
                    $_FILES['image']['error']     = $_FILES['productPict']['error'][$i];
                    $_FILES['image']['size']     = $_FILES['productPict']['size'][$i];

                    if ($_FILES['image']['size'] != 0) {
                        if(! $this->upload->do_upload('image')){
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
                            break;
                        }else {
                            $uploadData = $this->upload->data();
                            $imageData['image_'.($i+1)] = $uploadData['orig_name'];
                            $file_path = './asset/upload/'.$images['image_'.($i+1)];
                            unlink($file_path);
                        }
                    } else {
                        continue;
                    }

                }

                $this->madmin->updateData(array('id_prod' => $productId), 'tr_product_image', $imageData);
                redirect('admin/allProd');

            }else{
                $data['products'] = $this->madmin->getDetailProduct($productId);
                $data['brands'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
                    'nameField' => 'name'), 'tm_brands', FALSE);
                $data['cats'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
                    'nameField' => 'name'), 'tm_category', FALSE);
                $data['specs'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
                    'nameField' => 'name'), 'tm_spec', FALSE);
                $data['sizes'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
                    'nameField' => 'name', 'sizeField' => 'size'), 'tm_size', FALSE);

                $idSpec = $this->madmin->getProducts(array('prod_id' => $productId),
                    array('idField' => 'spec_id'), 'tr_product_spec', FALSE);

                $data['productSpecs'] = $idSpec;
//                print_r($data['productSpecs']);
//                exit();
                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/editProd', $data);
                $this->load->view('include/admin/footer');
            }
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function test(){
        redirect('admin/bestSeller');
        exit();
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
            $specs = array();
            $prices = array();
            $sizes = array();
            $data['product'] = $this->madmin->getProducts(array('id' => $idProd), NULL, 'tm_product', TRUE);
            $data['brand'] = $this->madmin->getProducts(array('id' => $data['product']['brand_id']),
                array('nameField' => 'name'), 'tm_brands', TRUE);
            $data['category'] = $this->madmin->getProducts(array('id' => $data['product']['cat_id']),
                array('nameField' => 'name'), 'tm_category', TRUE);
            $idSpec = $this->madmin->getProducts(array('prod_id' => $idProd),
                array('idField' => 'spec_id'), 'tr_product_spec', FALSE);
            $idSize = $this->madmin->getProducts(array('prod_id' => $idProd),
                array('idField' => 'size_id', 'priceField' => 'price'), 'tr_product_size', FALSE);

            $data['image'] = $this->madmin->getProductImage($idProd);

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
//            $this->madmin->deleteData(array('prod_id' => $idProd), 'tr_product_spec');
//            $this->madmin->deleteData(array('prod_id' => $idProd), 'tr_product_size');
//            $this->madmin->deleteData(array('id' => $idProd), 'tm_product');
            $this->madmin->updateData(array('id' => $idProd), 'tm_product', array('deleted' => 1));
            redirect('admin/allProd');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function sa_agmpedia(){
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $data['pedias'] = $this->madmin->getProducts(array('deleted' => 0), NULL, 'tm_agmpedia', FALSE);

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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
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

    public function detailPedia($articleId) {
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $data['article'] = $this->madmin->getProducts(array('id' => $articleId), NULL, 'tm_agmpedia', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/article', $data);
            $this->load->view('include/admin/footer');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function activePedia($idPedia){
      if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
        $pedia = $this->madmin->getProducts(array('id' => $idPedia), array('stats' => 'status'),
          'tm_agmpedia', TRUE);
        if ($pedia['status'] == 1) {
          $this->madmin->updateData(array('id' => $idPedia),'tm_agmpedia',
            array('status' => 0));
        }else{
          $this->madmin->updateData(array('id' => $idPedia),'tm_agmpedia',
            array('status' => 1));
        }
        redirect('admin/sa_agmpedia');
      }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }
    }

    public function deletePedia($idPedia){
      if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
//        $file = $this->madmin->getProducts(array('id' => $idPedia), array('thumb' => 'thumbnail',
//          'photos' => 'photo'), 'tm_agmpedia', TRUE);
//        $file_path_thumbnail = 'asset/upload/pedia/'.$file['thumbnail'];
//        $file_path_photo = 'asset/upload/pedia/'.$file['photo'];
//        unlink($file_path_thumbnail);
//        unlink($file_path_photo);
//        print_r($file_path);
//        $this->madmin->deleteData(array('id' => $idPedia), 'tm_agmpedia');
          $this->madmin->updateData(array('id' => $idPedia), 'tm_agmpedia', array('deleted' => 1));
        redirect('admin/sa_agmpedia');
      }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }
    }

    public function editPedia($id) {
        $data['article'] = $this->madmin->getProducts(array('id' => $id), NULL,'tm_agmpedia', TRUE);
        global $photos;
        global $thumbnails;
        global $thumbnailUploadStatus;
        global $photoUploadStatus;

        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('sContent', 'Sub news', 'required|max_length[125]');
            $this->form_validation->set_rules('content', 'News', 'required');

            if ($this->form_validation->run() === FALSE) {

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/editPedia', $data);
                $this->load->view('include/admin/footer');
            } else {
                if ($_FILES['thumbnail']['error'] == 0) {
                    $file_name = strtolower('thumbnail-image-'.uniqid());

                    $config['upload_path'] = './asset/upload/pedia/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 2048;
                    $config['file_name']  = $file_name;
                    $this->load->library('upload', $config);
                    if (! $this->upload->do_upload('thumbnail')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());

                        $this->load->view('include/admin/header');
                        $this->load->view('include/admin/left-sidebar');
                        $this->load->view('admin/editPedia');
                        $this->load->view('include/admin/footer');
                    } else {
                        $thumbnailUploadStatus = 1;
                        $thumbnails = $this->upload->data();
                    }


                }

                if ($_FILES['photo']['error'] == 0) {
                    $file_name = strtolower('photo-image-'.uniqid());

                    $config['upload_path'] = './asset/upload/pedia/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 2048;
                    $config['file_name']  = $file_name;
                    $this->load->library('upload', $config);
                    if (! $this->upload->do_upload('photo')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());

                        $this->load->view('include/admin/header');
                        $this->load->view('include/admin/left-sidebar');
                        $this->load->view('admin/editPedia');
                        $this->load->view('include/admin/footer');
                    } else {
                        $photoUploadStatus = 1;
                        $photos = $this->upload->data();
                    }
                }

                if ($photoUploadStatus === 1 && $thumbnailUploadStatus === 1) {
                    $items = array(
                        'title' => $this->input->post('title'),
                        'sub_content' => $this->input->post('sContent'),
                        'content' => $this->input->post('content'),
                        'thumbnail' => $thumbnails['file_name'],
                        'photo' => $photos['file_name'],
                        'status' => 1,
                        'user_id' => $this->session->userdata('uId')
                    );
                    $this->madmin->updateData(array('id' => $id), 'tm_agmpedia', $items);
                    redirect('admin/sa_agmpedia', 'refresh');

                } else if ($photoUploadStatus === 1) {
                    $items = array(
                        'title' => $this->input->post('title'),
                        'sub_content' => $this->input->post('sContent'),
                        'content' => $this->input->post('content'),
                        'photo' => $photos['orig_name'],
                        'status' => 1,
                        'user_id' => $this->session->userdata('uId')
                    );
                    $this->madmin->updateData(array('id' => $id), 'tm_agmpedia', $items);
                    redirect('admin/sa_agmpedia', 'refresh');
                } else if ($thumbnailUploadStatus === 1) {
                    $items = array(
                        'title' => $this->input->post('title'),
                        'sub_content' => $this->input->post('sContent'),
                        'content' => $this->input->post('content'),
                        'thumbnail' => $thumbnails['orig_name'],
                        'status' => 1,
                        'user_id' => $this->session->userdata('uId')
                    );
                    $this->madmin->updateData(array('id' => $id), 'tm_agmpedia', $items);
                    redirect('admin/sa_agmpedia', 'refresh');
                } else {
                    $items = array(
                        'title' => $this->input->post('title'),
                        'sub_content' => $this->input->post('sContent'),
                        'content' => $this->input->post('content'),
                        'status' => 1,
                        'user_id' => $this->session->userdata('uId')
                    );
                    $this->madmin->updateData(array('id' => $id), 'tm_agmpedia', $items);
                    redirect('admin/sa_agmpedia', 'refresh');
                }

            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function getItem($id) {
        $result = $this->madmin->getProductItem($id);
        echo json_encode($result);
    }

    public function storeProd($idSO){
        if ($this->session->userdata('uType') == 2 || $this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('product', 'Product', 'required|callback_checkingSProd');

            if ($this->form_validation->run() === FALSE) {
                $idStore = array('idStore' => $idSO);
                $data['storeId'] = $idStore;
                $data['products'] = $this->madmin->product_list();

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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('specialPackage', 'Special Package', 'required|callback_checkingSpecialPackage');

      if ($this->form_validation->run() === FALSE) {
        $data['id_store'] = $idStoreOwner;
        $data['special_packages'] = $this->madmin->getProducts(array('brand_id' => 0, 'cat_id' => 0), array('idField' => 'id', 'nameField' => 'name'), 'tm_product', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addStore_SpecialPackage', $data);
        $this->load->view('include/admin/footer');
      }else{
        // id product (special package) from input
        $id_prod = $this->input->post('specialPackage');

        // id super admin who's input this data
        $idAdmin = $this->session->userdata('uId');

        // search id product (special package) from table tr_product_size
        $id_prod_size = $this->madmin->getProducts(array('prod_id' => $id_prod), array('idField' => 'id'), 'tr_product_size', TRUE);

        // this array are set to fill tr_product table (assign special package to store)
        $dataStore_SpclPckg = array(
          'id_store'        =>  $idStoreOwner,
          'id_product'      =>  $id_prod,
          'id_product_size' => $id_prod_size['id'],
          'quantity'        =>  0,
          'new'             =>  0,
          'id_admin'        =>  $idAdmin
        );
        $this->madmin->inputData('tr_product', $dataStore_SpclPckg);

        redirect('admin/stores/'.$idStoreOwner);
      }
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function deleteStoreProd($idStore ,$idProd_store){
    if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
      $this->madmin->deleteData(array('id' => $idProd_store, 'id_store' => $idStore), 'tr_product');
      redirect('admin/stores/'.$idStore);
    }else{
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
            $data['slides'] = $this->madmin->getProducts(array('cover' => 1), NULL, 'tm_cover', FALSE);

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
                $coverIdentifier = 1;
                $items = array(
                    'slide'       => $pName['orig_name'],
                    'created_at'  => date('Ymd'),
                    'cover'       =>  $coverIdentifier
                );
                $this->madmin->inputData('tm_cover', $items);
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
            $file = $this->madmin->getProducts(array('id' => $idSlider), array('slideField' => 'slide'), 'tm_cover', TRUE);
            $file_path = 'asset/upload/best-seller-cover/'.$file['slide'];
            unlink($file_path);
            print_r($file_path);
            $this->madmin->deleteData(array('id' => $idSlider), 'tm_cover');
            redirect('admin/sa_slider');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function sa_spec(){
        if ($this->session->userdata('uType') == 1) {
            $data['specs'] = $this->madmin->getProducts(array('deleted' => 0), NULL, 'tm_spec', FALSE);

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
//            $this->madmin->deleteData(array('id' => $specId), 'tm_spec');
            $this->madmin->updateData(array('id'=>$specId), 'tm_spec', array('deleted' => 1));
            redirect('admin/sa_spec');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function infoSpec($idSpec){
        if ($this->session->userdata('uType') == 1) {
          $data['spec'] = $this->madmin->getProducts(array('id' => $idSpec), NULL, 'tm_spec', TRUE);

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/detail_spec', $data);
          $this->load->view('include/admin/footer');
        }else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
        }
      }

    public function editSpec($idSpec){
        if ($this->session->userdata('uType') == 1) {
          $this->load->helper('form');
          $this->load->library('form_validation');

          $this->form_validation->set_rules('items', 'Spec Name', 'required');

          if ($this->form_validation->run() === FALSE) {
            $data['spec'] = $this->madmin->getProducts(array('id' => $idSpec), NULL, 'tm_spec', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/editSpec', $data);
            $this->load->view('include/admin/footer');
          }else {
              $items = array(
                  'name'          => $this->input->post('items'),
                  'status' => 1,
              );
              $this->madmin->updateData(array('id' => $idSpec), 'tm_spec', $items);
              redirect('admin/sa_spec', 'refresh');

          }
        }else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
        }
      }

    public function sa_size(){
        if ($this->session->userdata('uType') == 1) {
            $data['sizes'] = $this->madmin->getProducts(array('deleted' => 0), NULL,'tm_size', FALSE);

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
//            $this->madmin->deleteData(array('id' => $sizeId), 'tm_size');
            $this->madmin->updateData(array('id' => $sizeId), 'tm_size', array('deleted' => 1));
            redirect('admin/sa_size');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function infoSize($idSize){
        if ($this->session->userdata('uType') == 1) {
          $data['size'] = $this->madmin->getProducts(array('id' => $idSize), NULL, 'tm_size', TRUE);

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/detail_size', $data);
          $this->load->view('include/admin/footer');
        }else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
        }
      }

    public function editSize($idSize){
        if ($this->session->userdata('uType') == 1) {
          $this->load->helper('form');
          $this->load->library('form_validation');

          $this->form_validation->set_rules('items', 'Size Name', 'required');
          $this->form_validation->set_rules('size', 'Size', 'required');

          if ($this->form_validation->run() === FALSE) {
            $data['size'] = $this->madmin->getProducts(array('id' => $idSize), NULL, 'tm_size', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/editSize', $data);
            $this->load->view('include/admin/footer');
          }else {
              $items = array(
                  'name'          => $this->input->post('items'),
                  'size'   => $this->input->post('size'),
                  'status' => 1,
              );
              $this->madmin->updateData(array('id' => $idSize), 'tm_size', $items);
              redirect('admin/sa_size', 'refresh');
          }
        }else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
        }
      }

    public function stores($link = FALSE){
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2 ) {
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
                $data['post'] = $this->madmin->getProducts(array('id' => $link),
                 NULL, 'tm_store_owner', TRUE);
                $data['prime'] = $this->madmin->emailStore($link);
                $data['storeId'] = $idStore;
                $data['products'] = $this->madmin->joinStoreProd($link);
                $data['clusters'] = $this->madmin->detailCluster($link);

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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('sub_district', 'Kecamatan', 'required|callback_checkingClusterSub');

            if ($this->form_validation->run() == FALSE) {
                $data['id_store'] = $idStore;
                $data['address'] = $this->madmin->detailAddress_store($idStore);
                $data['sub_districts'] = $this->madmin->getProducts(array('id_kab' => $data['address']['city']),
                    array('id_kecField' => 'id_kec', 'namaField' => 'nama'), 'kecamatan', FALSE);
                $data['provinces'] = $this->madmin->getProducts(NULL, NULL, 'provinsi', FALSE);


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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
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
            $file_name = strtolower('best-seller-cover-'.uniqid());

            $config['upload_path'] = './asset/upload/best-seller-cover/';
            $config['allowed_types'] = 'jpg|jpeg|png|svg';
            $config['file_name'] = $file_name;

      $this->load->library('upload', $config);
      if (! $this->upload->do_upload('cover_bestSeller')) {
          $this->session->set_flashdata('error', $this->upload->display_errors());
          $data['best_seller'] = $this->madmin->best_seller();
          $data['slides'] = $this->madmin->getProducts(array('cover' => 2), array('idField' => 'id', 'slideField' => 'slide'),
            'tm_cover', TRUE);

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/best_seller', $data);
                $this->load->view('include/admin/footer');
            } else {
                $coverName = $this->upload->data();
                $coverIdentifier = 2; // 1 = header, 2 = best seller, 3 = special package, 4 = bed linen, 5 = bedding accessories
                $items = array(
                    'slide'       =>  $coverName['orig_name'],
                    'created_at'  =>  date('Ymd'),
                    'cover'       =>  $coverIdentifier
                );

                $this->madmin->inputData('tm_cover', $items);
                redirect('admin/bestSeller');
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

  public function addBestSeller(){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('product', 'Product', 'required|callback_checkingProd_BestSeller');

      if ($this->form_validation->run() === FALSE) {
        $data['products'] = $this->madmin->sortingProduct_AscName();

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/addBest_seller', $data);
        $this->load->view('include/admin/footer');
      }else{
        $max = $this->madmin->maxPosition_BestSeller();
        $max['position'] = $max['position'] + 1;
        print_r($max['position']);

        $data_bestSeller = array(
          'prod_id'   =>  $this->input->post('product'),
          'position'  =>  $max['position']
        );

        echo "</br></br>";print_r($data_bestSeller);
        $this->madmin->inputData('tr_product_best_seller', $data_bestSeller);
        redirect('admin/bestSeller');
      }
    }else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingProd_BestSeller($idProduct){
    if ($this->session->userdata('uType') == 1) {
      $prod = $this->madmin->getProducts(array('prod_id' => $idProduct), NULL, 'tr_product_best_seller', TRUE);

      if (isset($prod)) {
        $this->session->set_flashdata('error', 'Product has been added to best seller');
        return FALSE;
      }else {
        return TRUE;
      }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function delete_cover_bestSeller($idSlider){
    if ($this->session->userdata('uType') == 1) {
      $file = $this->madmin->getProducts(array('id' => $idSlider), array('slideField' => 'slide'), 'tm_cover', TRUE);
      $file_path = 'asset/upload/best-seller-cover/'.$file['slide'];
      unlink($file_path);
      print_r($file_path);
      $this->madmin->deleteData(array('id' => $idSlider), 'tm_cover');
      redirect('admin/bestSeller');
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

    public function edit_best_seller($idBestSeller){
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

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

        // data new position for idBestSeller
        $data_newDestination = array(
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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $data['promotion'] = $this->madmin->getProducts(array('deleted' => 0), NULL,'tm_promotion', FALSE);

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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $data['promotion'] = $this->madmin->getProducts(array('id' => $id), NULL,'tm_promotion', TRUE);
            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/detailPromotion', $data);
            $this->load->view('include/admin/footer');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function activePromotion($id) {
        if($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2){
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
            $data['promotion'] = $this->madmin->getProducts(array('id' => $id), NULL,'tm_promotion', TRUE);
            if ($this->form_validation->run() === FALSE) {

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/editPromotion', $data);
                $this->load->view('include/admin/footer');
            } else {
                if ($_FILES['promotionImage']['size'] != 0) {
                    $file_name = strtolower('promotion-image-'.uniqid());
                    $config['upload_path'] = './asset/upload/';
                    $config['allowed_types'] = 'jpg|jpeg|png|svg';
                    $config['file_name']  = $file_name;
                    $this->load->library('upload', $config);
                    if (! $this->upload->do_upload('promotionImage')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());

                        $this->load->view('include/admin/header');
                        $this->load->view('include/admin/left-sidebar');
                        $this->load->view('admin/editPromotion', $data);
                        $this->load->view('include/admin/footer');
                    } else {
                        $file = './asset/upload/' . $data['promotion']['image'];
                        unlink($file);
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
//            $data = $this->madmin->getProducts(array('id' => $id), NULL,'tm_promotion', TRUE);
//            $this->madmin->deleteData(array('id' => $id), 'tm_promotion');
//            unlink('./asset/upload/'.$data['image']);
            $this->madmin->updateData(array('id' => $id), 'tm_promotion', array('deleted' => 1));
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
            $file_name = strtolower('special-package-cover-'.uniqid());

            $config['upload_path'] = './asset/upload/special-package/cover/';
            $config['allowed_types'] = 'jpg|jpeg|png|svg';
            $config['file_name'] = $file_name;

            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('cover_spPackage')) {
              $this->session->set_flashdata('error', $this->upload->display_errors());
              $data['specialPackages'] = $this->madmin->listSpecialPackage();
              $data['slides'] = $this->madmin->getProducts(array('cover' => 3), array('idField' => 'id', 'slideField' => 'slide'),
              'tm_cover', TRUE);

                      $this->load->view('include/admin/header');
                      $this->load->view('include/admin/left-sidebar');
                      $this->load->view('admin/specialPackage', $data);
                      $this->load->view('include/admin/footer');
            } else {
              $coverName = $this->upload->data();
              $coverIdentifier = 3; // 1 = header, 2 = best seller, 3 = special package, 4 = bed linen, 5 = bedding accessories
              $items = array(
                          'slide'       =>  $coverName['orig_name'],
                          'created_at'  =>  date('Ymd'),
                          'cover'       =>  $coverIdentifier
                      );

                      $this->madmin->inputData('tm_cover', $items);
                      redirect('admin/special_package');
            }
          } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
          }
        }

    public function delete_cover_spPackage($idSlider){
        if ($this->session->userdata('uType') == 1) {
            $file = $this->madmin->getProducts(array('id' => $idSlider), array('slideField' => 'slide'), 'tm_cover', TRUE);
            $file_path = 'asset/upload/special-package/cover/'.$file['slide'];
            unlink($file_path);
            print_r($file_path);
            $this->madmin->deleteData(array('id' => $idSlider), 'tm_cover');
            redirect('admin/special_package');
        }else{
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
            $this->form_validation->set_rules('mainProd', 'Main Product of Special Package', 'required|callback_checkingMainProd');
            $this->form_validation->set_rules('sizeSpcl[]', 'Special Package Products', 'required');

            if ($this->form_validation->run() === FALSE) {
              $data['mainProd'] = $this->madmin->getMainProd_SP();

              $this->load->view('include/admin/header');
              $this->load->view('include/admin/left-sidebar');
              $this->load->view('admin/addSpecial_Package', $data);
              $this->load->view('include/admin/footer');
            }else {
              $name = $this->input->post('name');
              $desc = $this->input->post('desc');
              $mainProd = $this->input->post('mainProd');
              $prod_PKG = $this->input->post('sizeSpcl[]');
              $prod_qty = $this->input->post('qtySpcl[]');

              $file_name = strtolower($name.'-'.$mainProd);

              $config['upload_path'] = './asset/upload/special-package';
              $config['allowed_types'] = 'jpg|jpeg|png|svg';
              $config['file_name'] = $file_name;

              $this->load->library('upload', $config);

              if (! $this->upload->do_upload('imageSP')) {
                $this->session->set_flashdata('errorSpecialPackage', $this->upload->display_errors());
                redirect('admin/addSpecial_Package');
              }else {
                $upload_name = $this->upload->data('file_name');
                $data_main_sp = array(
                  'name'          => $name,
                  'image'         => $upload_name,
                  'description'   => $desc,
                  'active'        => 1,
                  'main_product'  => $mainProd
                );
                $this->madmin->inputData('tm_special_package', $data_main_sp);

                $idSP = $this->madmin->getProducts($data_main_sp, array('idField' => 'id'), 'tm_special_package', TRUE);

                $sumProd_SP = count($prod_PKG);
                for ($i=0; $i < $sumProd_SP; $i++) {
                  $data_prod_sp = array(
                    'id_specialPkg' => $idSP['id'],
                    'id_prod_package' => $prod_PKG[$i],
                    'quantity'        => $prod_qty[$i]
                  );

                  $this->madmin->inputData('tr_special_package', $data_prod_sp);
                }

                // update product as main product special Package
                $update_as_main_product = array(
                  'main_sp' => 1,
                );
                $this->madmin->updateData(array('id' => $mainProd), 'tm_product', $update_as_main_product);

                redirect('admin/special_package');
              }
            }
          }else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
          }
    }

    public function addProdSP($idMainProd){
      if ($this->session->userdata('uType') == 1) {
        $product_SP = $this->madmin->prodSP($idMainProd);
        if ($product_SP) {
          print_r(json_encode($product_SP));
        }else {
          echo "Something went wrong";
        }
      }else{
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
        $specialPackage_name = $this->madmin->getProducts(array('name'=>$nameSP), array('nameField' => 'name'),
         'tm_special_package', TRUE);
        if (isset($specialPackage_name)) {
            $this->session->set_flashdata('errorSpecialPackage', 'Special package name has already been created');
            return FALSE;
        } else {
            return TRUE;
        }
    }

  public function checkingMainProd($main_prod){
    $already_as_sp = $this->madmin->getProducts(array('id' => $main_prod), array('mainSP' => 'main_sp'),
      'tm_product', TRUE);
    if($already_as_sp['main_sp'] == TRUE){
      $this->session->set_flashdata('errorSpecialPackage', 'Main product has already been created');
      return FALSE;
    }else {
      return TRUE;
    }
  }

  public function activeSpecialPackage($idSP){
    if ($this->session->userdata('uType') == 1) {
      $isActive = $this->madmin->getProducts(array('id' => $idSP), array('activeField' => 'active'),
       'tm_special_package', TRUE);
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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
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
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $data['voucher'] = $this->madmin->getProducts(array('id' => $idVoucher), NULL, 'tm_voucher', TRUE);
//            $data['detail_voucher'] = $this->madmin->detail_voucher($idVoucher);
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
            $file_name = strtolower('bed-linen-cover-'.uniqid());

            $config['upload_path'] = './asset/upload/bed-linen-cover/';
            $config['allowed_types'] = 'jpg|jpeg|png|svg';
            $config['file_name'] = $file_name;

      $this->load->library('upload', $config);
      if (! $this->upload->do_upload('cover_bedLinen')) {
        $this->session->set_flashdata('error', $this->upload->display_errors());
        $data['product_bedlinen'] = $this->madmin->product_bed_linen();
        $data['slides'] = $this->madmin->getProducts(array('cover' => 4),
          array('idField' => 'id', 'slideField' => 'slide'), 'tm_cover', TRUE);

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/bed_linen', $data);
                $this->load->view('include/admin/footer');
            } else {
                $coverName = $this->upload->data();
                $coverIdentifier = 4; // 1 = header, 2 = best seller, 3 = special package, 4 = bed linen, 5 = bedding accessories
                $items = array(
                    'slide'       => $coverName['orig_name'],
                    'created_at'  => date('Ymd'),
                    'cover'       => $coverIdentifier
                );

                $this->madmin->inputData('tm_cover', $items);
                redirect('admin/bed_linen');
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function delete_cover_bedLinen($idSlider){
        if ($this->session->userdata('uType') == 1) {
            $file = $this->madmin->getProducts(array('id' => $idSlider), array('slideField' => 'slide'), 'tm_cover', TRUE);
            $file_path = 'asset/upload/special-package/cover/'.$file['slide'];
            unlink($file_path);
            print_r($file_path);
            $this->madmin->deleteData(array('id' => $idSlider), 'tm_cover');
            redirect('admin/bed_linen');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function edit_bed_linen($idBedLinen){
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

      $this->form_validation->set_rules('position', 'Position', 'required');

      if ($this->form_validation->run() == TRUE) {
        // new position
        $position = $this->input->post('position');

        // search id from new position
        $positionProduct_destination = $this->madmin->getProducts(array('position' => $position),
          array('idField' => 'id'), 'tr_product_bed_linen', TRUE);
        // search last position from idBedLinen
        $positionProduct_lastdestination = $this->madmin->getProducts(array('id' => $idBedLinen),
          array('positionField' => 'position'), 'tr_product_bed_linen', TRUE);

        // print_r($positionProduct_lastdestination);exit();

        // data new stars and new position for idBedLinen
        $data_newDestination = array(
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
            $file_name = strtolower('bedding-accessories-cover-'.uniqid());

            $config['upload_path'] = './asset/upload/bedding-acc-cover/';
            $config['allowed_types'] = 'jpg|jpeg|png|svg';
            $config['file_name'] = $file_name;

            $this->load->library('upload', $config);
            if (! $this->upload->do_upload('cover_beddingAcc')) {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $data['product_bedAcc'] = $this->madmin->beddingAcc();
                $data['slides'] = $this->madmin->getProducts(array('cover' => 5), array('idField' => 'id', 'slideField' => 'slide'),
                    'tm_cover', TRUE);

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/bedding_accessories', $data);
                $this->load->view('include/admin/footer');
            } else {
                $coverName = $this->upload->data();
                $coverIdentifier = 5; // 1 = header, 2 = best seller, 3 = special package, 4 = bed linen, 5 = bedding accessories
                $items = array(
                    'slide'       => $coverName['orig_name'],
                    'created_at'  => date('Ymd'),
                    'cover'       => $coverIdentifier
                );

                $this->madmin->inputData('tm_cover', $items);
                redirect('admin/beddingAcc');
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function delete_cover_beddingAcc($idSlider){
        if ($this->session->userdata('uType') == 1) {
            $file = $this->madmin->getProducts(array('id' => $idSlider), array('slideField' => 'slide'), 'tm_cover', TRUE);
            $file_path = 'asset/upload/special-package/cover/'.$file['slide'];
            unlink($file_path);
            print_r($file_path);
            $this->madmin->deleteData(array('id' => $idSlider), 'tm_cover');
            redirect('admin/bed_linen');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function edit_bedding_acc($idBeddingACC){
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

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
      $data['detail_SpclPckg'] = $this->madmin->prime_specialPKG($idSpecialPckg);
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

  public function edit_special($idSpecialPkg){
    if ($this->session->userdata('uType') == 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->form_validation->set_rules('name', 'Special Package Name', 'required|callback_checkingSPName');
      $this->form_validation->set_rules('desc', 'Special Package Description', 'required');

      if ($this->form_validation->run() === FALSE) {
        $data['detail_SP'] = $this->madmin->prime_specialPKG($idSpecialPkg);
        $data['prod_SP'] = $this->madmin->detail_specialPackage($idSpecialPkg);
        $data['products'] = $this->madmin->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name'), 'tm_product', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/edit_special', $data);
        $this->load->view('include/admin/footer');
      }else {
        $imageSP = $this->input->post('imageSP');
        if ($imageSP != NULL) {
          echo "Ada upload gambar";
        }else {
          $SPkg_name = $this->input->post('name');
          $SPkg_desc = $this->input->post('desc');
          $SPkg_id   = $this->input->post('idSP');

          $edit_SP = array(
            'name'        =>  $SPkg_name,
            'description' =>  $SPkg_desc
          );
          print_r($edit_SP);echo "</br></br>";

          $SPkg_sizes  = $this->input->post('sizeSpcl[]');
          $SPkg_qty    = $this->input->post('qtySpcl[]');
          $SPkg_prices = $this->input->post('priceSpcl[]');
          $countProd = count($SPkg_sizes);

          for ($i=0; $i < $countProd; $i++) {
            $detailSP = array(
              'id_prod_spclPkg' => $SPkg_id,
              'size_spclPkg'    => $SPkg_sizes[$i],
              'quantity'        => $SPkg_qty[$i],
              'priceSpcl'       => $SPkg_prices[$i]
            );

            $has_detailSP = $this->madmin->getProducts($detailSP, NULL, 'tr_special_package', TRUE);
            if (isset($has_detailSP)) {
              echo "Data sudah ada";echo "</br></br>";
              print_r($detailSP);echo "</br></br>";
              print_r($has_detailSP);echo "</br></br><hr>";
            }else {
              echo "Data baru";echo "</br></br>";
              print_r($detailSP);echo "</br></br><hr>";
            }
          }
        }
      }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingSPName($name){
    if ($this->session->userdata('uType') == 1) {
      $idSP = $this->input->post('idSP');
      $SP_name = $this->madmin->getProducts(array('id !=' => $idSP, 'name' => $name), array('nameField' => 'name'),
        'tm_product', TRUE);
      if (isset($SP_name)) {
        $this->session->set_flashdata('error',
        'Special package name has already been created or special package name sam as product name');
        return FALSE;
      }else {
        return TRUE;
      }
    }
  }

  public function deleteSP_img($idSpecialPkg){
    if ($this->session->userdata('uType') == 1) {
      $img = $this->madmin->getProducts(array('id_prod' => $idSpecialPkg), array('img' => 'image_1'),
        'tr_product_image', TRUE);
      if (isset($img)) {
        $this->madmin->updateData(array('id_prod' => $idSpecialPkg), 'tr_product_image', array('image_1' => NULL));
        redirect('admin/edit_special/'.$idSpecialPkg);
      }
    }else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function historyTransaction(){
      $data['transactions'] = $this->madmin->order_list();
    $this->load->view('include/admin/header');
    $this->load->view('include/admin/left-sidebar');
    $this->load->view('admin/sa_historyTransaction', $data);
    $this->load->view('include/admin/footer');
  }

    public function detailTransaction($idOrder){
        $this->load->view('include/admin/header');
        $data['detailOrder'] = $this->madmin->getDetailOrder($idOrder);
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/detail-transaction', $data);
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

    public function changePassword()
    {
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('current', 'Current password', 'required');
            $this->form_validation->set_rules('new', 'New password', 'required');
            $this->form_validation->set_rules('confirm', 'Confirm password', 'required');

            if ($this->form_validation->run() == TRUE) {
                $this->load->model('Mauth', 'mauth');
                $id = $this->session->userdata('uId');
                $currentPassword = $this->input->post('current');
                $userData = $this->mauth->getData(array('user_id' => $id), array('password' => 'password'), TRUE);

                if (!password_verify($currentPassword, $userData->password)) {
                    $this->session->set_flashdata('error', 'Current password salah');
                    redirect('admin/changePassword');
                } else {
                    $newPassword = $this->input->post('new');
                    $confirmPassword = $this->input->post('confirm');
                    if ($confirmPassword === $newPassword) {
                        $data = array(
                            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
                        );
                        $this->madmin->updateData(array('user_id' => $id), 'user_login', $data);
                        redirect('admin/profile');

                    } else {
                        $this->session->set_flashdata('error', 'Password yang diinput tidak sama');
                        redirect('admin/changePassword');
                    }
                }

            } else {
                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/changePassword');
                $this->load->view('include/admin/footer');
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function profile()
    {
        if ($this->session->userdata('uType') == 1) {
            $id = $this->session->userdata('uId');
            $data['detail_admin'] = $this->madmin->detail_admin($id);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/detailAdmin', $data);
            $this->load->view('include/admin/footer');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function mail() {
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('host', 'Host', 'required');
            $this->form_validation->set_rules('port', 'Port', 'required');

            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('id');
                $email = $this->input->post('email');
                $password = base64_encode($this->input->post('password'));
                $host = $this->input->post('host');
                $port = $this->input->post('port');

                $mailConfig = array(
                    'email' => $email,
                    'password' => $password,
                    'host' => $host,
                    'port' => $port
                );

                $priorConfig = $this->madmin->getProducts(array('id' => $id), NULL, 'mail_config', TRUE);
                if ($priorConfig == NULL) {
                    $this->madmin->inputData('mail_config', $mailConfig);
                } else {
                    $this->madmin->updateData(array('id' => $id), 'mail_config', $mailConfig);
                }

                $this->session->set_flashdata('success', 'Mail configuration saved');

                redirect('admin/mail');

            } else {
                $data['mailConfig'] = $this->madmin->getProducts(NULL, NULL, 'mail_config', TRUE);

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/mail_config', $data);

                $this->load->view('include/admin/footer');
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function exportCSV(){

        if ($this->session->userdata('uType') == 1) {
            // file name
            $filename = 'subscriber_'.date('Ymd').'.csv';
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$filename");
            header("Content-Type: application/csv; ");

            // get data
            $subscribersData = $this->madmin->getProducts(NULL,array('email'=>'email', 'subscribe_date'=>'subscribe_date'),'tm_newsletter', FALSE);

            // file creation
            $file = fopen('php://output', 'w');

            $header = array("Email","subscribe date");
            fputcsv($file, $header);
            foreach ($subscribersData as $key=>$line){
                fputcsv($file,$line);
            }
            fclose($file);
            exit;
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }

    }

    public function midtrans() {
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('serverkey', 'Server Key', 'required');
            $this->form_validation->set_rules('clientkey', 'Client Key', 'required');

            if ($this->form_validation->run() == TRUE) {
                $id = $this->input->post('id');
                $serverKey = $this->input->post('serverkey');
                $clientKey = $this->input->post('clientkey');
                $production = $this->input->post('production');

                $midtransConfig = array(
                    'server_key' => $serverKey,
                    'client_key' => $clientKey,
                    'production' => $production

                );

                $priorConfig = $this->madmin->getProducts(array('id' => $id), NULL, 'midtrans_config', TRUE);
                if ($priorConfig == NULL) {
                    $this->madmin->inputData('midtrans_config', $midtransConfig);
                } else {
                    $this->madmin->updateData(array('id' => $id), 'midtrans_config', $midtransConfig);
                }

                $this->session->set_flashdata('success', 'midtrans configuration saved');

                redirect('admin/midtrans');

            } else {
                $data['midtransConfig'] = $this->madmin->getProducts(NULL, NULL, 'midtrans_config', TRUE);

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/midtrans_config', $data);

                $this->load->view('include/admin/footer');
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

}
