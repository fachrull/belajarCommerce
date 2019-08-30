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

    // function for list of admin
    public function listAdmin($link = FALSE){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          // checking parameter
            if ($link === FALSE) {
              // if parameter false get all of admin
                $data['posts'] = $this->madmin->getProducts(NULL, NULL, 'tm_super_admin', FALSE);

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/home_admin', $data);
                $this->load->view('include/admin/footer');

            }else{
              // get specify detail of admin
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

    // function for reset password (admin)
    public function resetPassword($idUserlogin){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            // set default password
            $resetPass = "admin_agm";
            // hash default password
            $newPassword = array(
                'password' => password_hash(($resetPass), PASSWORD_DEFAULT),
                'newer'    => 1
            );
            // updating default pass for specific admin
            $this->madmin->updateData(array('user_id' => $idUserlogin), 'user_login', $newPassword);
            redirect('admin/listAdmin/'.$idUserlogin);
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function for list of store owners
    public function listStoreOwner(){
      // checking usertype (super admin or admin or neither)
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2 ) {
          // get all store owner detail
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

    // function for list of brand
    public function sa_brand(){
      // checking usertype(super admin or not)
        if ($this->session->userdata('uType') == 1) {
          // get all brand that are not deleted
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


    // function for detail brand
    public function infoBrand($slugsBrand){
      // checking usertype (super admin or not)
      if ($this->session->userdata('uType') == 1) {
        // get detail brand
        $data['brand'] = $this->madmin->getProducts(array('slugs' => $slugsBrand), NULL, 'tm_brands', TRUE);

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

    // function for adding new brand
    public function addBrand(){
      // checking usertype (store owner or not)
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
            $this->form_validation->set_rules('items', 'Brand Name', 'required|callback_checkingBrand');
            $this->form_validation->set_rules('desc', 'Brand Description', 'required');

            if ($this->form_validation->run() == TRUE) {
              // set file name of brand logo
                $file_name = strtolower('brand-logo-'.$this->input->post('items'));

                // rules of logo
                $config['upload_path'] = './asset/brands/';
                $config['allowed_types'] = 'jpg|jpeg|png|svg';
                $config['file_name']  = $file_name;

                $this->load->library('upload', $config);
                // checking if logo are uploaded or not
                if (! $this->upload->do_upload('brandPict')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    $this->load->view('include/admin/header');
                    $this->load->view('include/admin/left-sidebar');
                    $this->load->view('admin/addBrands');
                    $this->load->view('include/admin/footer');
                }else{
                  // get data logo uploaded
                    $pName = $this->upload->data();
                    // set slugs
                    $slugs = str_replace(' ', '-', strtolower($this->input->post('items')));
                    // data brand and input it
                    $items = array(
                        'name'          => $this->input->post('items'),
                        'slugs'         => $slugs,
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

    // function callback for checking brand name
    public function checkingBrand($brand){
      // checking brand name is there the same name on db or not
        $has_brand = $this->madmin->getProducts(array('name' => $brand),
            array('nameField' => 'name'), 'tm_brands', TRUE);
        // set error message if there is tbe same name
        if(isset($has_brand)){
            $this->session->set_flashdata('error', 'Brand has already been created');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    // function for active or inactive brand
    public function activeBrand($brandSlugs){
      // checking usertype (super admin or not)
        if($this->session->userdata('uType') == 1){
          // get status active by its slugs
            $stat = $this->madmin->getProducts(array('slugs' => $brandSlugs), array('statField' => 'status'), 'tm_brands',TRUE);
            // updating status active or inactive
            if($stat['status'] == 1){
                $items = array('status' => 0);
                $this->madmin->updateData(array('slugs' => $brandSlugs), 'tm_brands', $items);
                redirect('admin/sa_brand', 'refresh');
            }else{
                $items = array('status' => 1);
                $this->madmin->updateData(array('slugs' => $brandSlugs), 'tm_brands', $items);
                redirect('admin/sa_brand', 'refresh');
            }
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function for delete brand
    public function deleteBrand($brandSlugs){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            // updating status deleted to be true
            $this->madmin->updateData(array('slugs' => $brandSlugs), 'tm_brands', array('deleted' => 1));
            redirect('admin/sa_brand', 'refresh');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function for edit brand
    public function editBrand($slugsBrand){
      // checking usertype (super admin or not)
      if ($this->session->userdata('uType') == 1) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        // set rules
        $this->form_validation->set_rules('items', 'Brand Name', 'required|callback_checkingEditBrand');
        $this->form_validation->set_rules('desc', 'Brand Description', 'required');

        if ($this->form_validation->run() === FALSE) {
          // get detail data of brand
            $data['brand'] = $this->madmin->getProducts(array('slugs' => $slugsBrand), NULL, 'tm_brands', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/editBrand', $data);
            $this->load->view('include/admin/footer');
          }else {
            // checking is there file to upload
            if ($_FILES['brandPict']['size'] != 0) {
              // set file name and rules of uploaded file
                $file_name = strtolower('brand-logo-'.$this->input->post('items'));
                $config['upload_path'] = './asset/brands/';
                $config['allowed_types'] = 'jpg|jpeg|png|svg';
                $config['file_name']  = $file_name;
                $config['overwrite']        = true;

                $this->load->library('upload', $config);
                // checking uploaded file
                if (! $this->upload->do_upload('brandPict')) {
                  // set message error if there some issues
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    $data['brand'] = $this->madmin->getProducts(array('id' => $idBrand), NULL, 'tm_brands', TRUE);
                    $this->load->view('include/admin/header');
                    $this->load->view('include/admin/left-sidebar');
                    $this->load->view('admin/editBrand', $data);
                    $this->load->view('include/admin/footer');
                }else{
                  // get file upload data
                    $pName = $this->upload->data();
                    // set slugs if there is some change on brand name
                    $slugsEditBrand = str_replace(' ', '-', strtolower($this->input->post('items')));
                    // update brand
                    $items = array(
                        'name'          => $this->input->post('items'),
                        'slugs'         => $slugsEditBrand,
                        'logo'          => $pName['orig_name'],
                        'description'   => $this->input->post('desc'),
                        'status' => 1,
                    );
                    $this->madmin->updateData(array('slugs' => $slugsBrand), 'tm_brands', $items);
                    redirect('admin/sa_brand','refresh');
                }
            } else {
              // set slugs if there is some change on brand name
                $slugsEditBrand = str_replace(' ', '-', strtolower($this->input->post('items')));
                // update brand
                $items = array(
                    'name'          => $this->input->post('items'),
                    'slugs'         => $slugsEditBrand,
                    'description'   => $this->input->post('desc'),
                    'status' => 1,
                );
                $this->madmin->updateData(array('slugs' => $slugsBrand), 'tm_brands', $items);
                redirect('admin/sa_brand','refresh');
            }
          }
      }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }
    }

    // function callback to check brand name
    public function checkingEditBrand($editBrandName){
      // get id brand
      $idBrand = $this->input->post('idBrand');
      // get name (is there the same name with new edit name)
      $hasEditBrandName = $this->madmin->getProducts(array('id !=' => $idBrand, 'name' => $editBrandName), array('nameF' => 'name'), 'tm_brands', TRUE);
      if (isset($hasEditBrandName)) {
        $this->session->set_flashdata('error', 'Brand has already been created');
        return FALSE;
      }else {
        return TRUE;
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

    // function for list of categories
    public function sa_cat(){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          // get list of categories
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

    // function for add new category
    public function addCat(){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
            $this->form_validation->set_rules('items', 'Category', 'required|callback_checkingCat');
            $this->form_validation->set_rules('desc', 'Description', 'required');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/addCats');
                $this->load->view('include/admin/footer');
            }else{
              // set slugs for new category
                $slugsCat = str_replace(' ','-', strtolower($this->input->post('items')));
                // input new category
                $items = array(
                    'name'        => $this->input->post('items'),
                    'slugs'       => $slugsCat,
                    'description' => $this->input->post('desc'),
                    'status'      => 1
                );
                $this->madmin->inputData('tm_category', $items);
                redirect('admin/sa_cat');
            }
        }
    }

    // callback function for checking name of category
    public function checkingCat($category){
      // check is there the same name category on DB
        $has_cat = $this->madmin->getProducts(array('name' => $category),
            array('nameField' => 'name'), 'tm_category', TRUE);
        if(isset($has_cat)){
          // set error message
            $this->session->set_flashdata('error', 'Category has already been created');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    // function for active or inactive category
    public function activeCat($cat){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          // get status of category
            $stat = $this->madmin->getProducts(array('slugs' => $cat), array('statField' => 'status'), 'tm_category',TRUE);
            // change status active or in active
            if($stat['status'] == 1){
                $items = array('status' => 0);
                $this->madmin->updateData(array('slugs' => $cat), 'tm_category', $items);
                redirect('admin/sa_cat');
            }else{
                $items = array('status' => 1);
                $this->madmin->updateData(array('slugs' => $cat), 'tm_category', $items);
                redirect('admin/sa_cat');
            }
        }else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function for delete category
    public function deleteCat($cat){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          // update status delete to be true
            $this->madmin->updateData(array('slugs' => $cat), 'tm_category', array('deleted' => 1));
            redirect('admin/sa_cat', 'refresh');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function for detail of category
    public function infoCat($slugsCat){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1 ){
          // get detail data of category
            $data['cat'] = $this->madmin->getProducts(array('slugs' => $slugsCat), NULL, 'tm_category', TRUE);

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

    // function for edit category
    public function editCat($slugsCat){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          $this->load->helper('form');
          $this->load->library('form_validation');

          // set rules
          $this->form_validation->set_rules('items', 'Category Name', 'required|callback_checkingEditCatName');
          $this->form_validation->set_rules('desc', 'Category Description', 'required');

          if ($this->form_validation->run() === FALSE) {
            // get detail data of category
            $data['cat'] = $this->madmin->getProducts(array('slugs' => $slugsCat), NULL, 'tm_category', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/editCat', $data);
            $this->load->view('include/admin/footer');
          }else {
            // set new slugs for category
            $catSlug = str_replace(' ', '-', strtolower($this->input->post('items')));
            // updating category
              $items = array(
                  'name'          => $this->input->post('items'),
                  'slugs'         => $catSlug,
                  'description'   => $this->input->post('desc'),
                  'status'        => 1,
              );
              $this->madmin->updateData(array('slugs' => $slugsCat), 'tm_category', $items);
              redirect('admin/sa_cat', 'refresh');

          }
        }else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
        }
      }

    // function callback for checking name of edit category
    public function checkingEditCatName($editCatName){
      // get id of category
      $idCat = $this->input->post('idCat');
      // checking category name is there the same on DB
      $hasEditCatName = $this->madmin->getProducts(array('id !=' => $idCat, 'name' => $editCatName),
       array('nameF' => 'name'), 'tm_category', TRUE);

      if (isset($hasEditCatName)) {
        // set error message
        $this->session->set_flashdata('error', 'Category has already been created');
        return FALSE;
      }else{
        return TRUE;
      }
    }

    // function for list of all
    public function allProd(){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules for searching specific brand or category
            $this->form_validation->set_rules('brand', 'Brand', 'required');
            $this->form_validation->set_rules('cat', 'Category', 'required');

            if ($this->form_validation->run() == FALSE){
              // get list of all products
              $data['products'] = $this->madmin->listProduct();
              // get list of all brand that are not deleted and active
              $data['brands'] = $this->madmin->getProducts(array('id !=' => 0, 'status' => 1), NULL, 'tm_brands', FALSE);
              // get list of all category that are not deleted and active
              $data['cats'] = $this->madmin->getProducts(array('id !=' => 0, 'status' => 1), NULL, 'tm_category', FALSE);

              $this->load->view('include/admin/header');
              $this->load->view('include/admin/left-sidebar');
              $this->load->view('admin/allProd', $data);
              $this->load->view('include/admin/footer');
            }else{
                // get brand id
                $idBrand = $this->input->post('brand');
                // get category id
                $idCat = $this->input->post('cat');
                // get products by it brand or category or both
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
                // get list of all brand that are not deleted and active
                $data['brands'] = $this->madmin->getProducts(array('status' => 1), NULL, 'tm_brands', FALSE);
                // get list of all category that are not deleted and active
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

    // function for add product
    public function addProd(){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
            $this->form_validation->set_rules('brand', 'Brand', 'required');
            // $this->form_validation->set_rules('cat', 'Category', 'required');
            $this->form_validation->set_rules('pName', 'Product Name', 'required|callback_checkingProdName');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('size[]', 'Size', 'required');
            $this->form_validation->set_rules('price[]', 'Price', 'required');
            $this->form_validation->set_rules('sku[]', 'SKU', 'required');


            if ($this->form_validation->run() === TRUE) {
              // get brand id
                $brand_id = $this->input->post('brand');
                // get category id
                $cat_id = $this->input->post('cat');
                // set max position product
                $max_position_prod = $this->madmin->getProducts(array('brand_id' => $brand_id),
                    array('pos' => 'MAX(position) as position'), 'tm_product', TRUE);
                $max_position_prod['position'] = $max_position_prod['position'] + 1;

                // set slugs
                $slugsProd = str_replace(' ', '-', strtolower($this->input->post('pName')));
                $slugsProd = str_replace('%', '', $slugsProd);

                $items = array(
                    'brand_id'    => $brand_id,
                    'cat_id'      => $cat_id,
                    'name'        => $this->input->post('pName'),
                    'slugs'       => $slugsProd,
                    'description' => $this->input->post('desc'),
                    'image'       => "/path/to/file/",
                    'stars'       => 0,
                    'position'    => $max_position_prod['position'],
                    'created_at'  => date('Ymd')
                );

                // input data above to database
                $this->madmin->inputData('tm_product', $items);

                // get product id
                $idProd = $this->madmin->getProducts($items, array('idField' => 'id'), 'tm_product', TRUE);
                $cat_id = $this->input->post('cat');

                // checking product category is it bed linen or bedding accessories
                if ($cat_id == 2) {
                  // set position on bed linen
                    $max = $this->madmin->maxPosition_BedLinen();
                    $max['position'] = $max['position'] + 1;
                    print_r($max);

                    // input product to bed linen list
                    $data_BedLinen = array(
                        'prod_id'   =>  $idProd['id'],
                        'position'  =>  $max['position']
                    );

                    $this->madmin->inputData('tr_product_bed_linen', $data_BedLinen);


                }else if ($cat_id > 2) {
                    echo $cat_id;
                    // set position of bedding accessories
                    $max = $this->madmin->maxPosition_BeddingAcc();
                    $max['position'] = $max['position'] + 1;
                    print_r($max);

                    // input product to bedding accessories list
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
                if ($cat_id == 1) {
                    $data = array('spec' => $this->input->post('spec[]'));
                    foreach($data['spec'] as $spec){
                        $prodSpec = array(
                            'prod_id' => $prod['id'],
                            'spec_id' => $spec
                        );
                        $this->madmin->inputData('tr_product_spec', $prodSpec);
                    }
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

                for ($i = 0; $i < 3; $i++) {
                    $file_name = strtolower($bName['name'].'-'.$cName['name'].'-'.$this->input->post('pName').'-'.uniqid());
                    $file_name = str_replace("%", "", $file_name);
                    $config['file_name']  = $file_name;
                    $this->upload->initialize($config);

                    $_FILES['image']['name']     = $_FILES['productPict']['name'][$i];
                    $_FILES['image']['type']     = $_FILES['productPict']['type'][$i];
                    $_FILES['image']['tmp_name'] = $_FILES['productPict']['tmp_name'][$i];
                    $_FILES['image']['error']     = $_FILES['productPict']['error'][$i];
                    $_FILES['image']['size']     = $_FILES['productPict']['size'][$i];

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
                       array_push($fileNames, $uploadData['orig_name']);
                    }
                }

                $imageData = array(
                    'id_prod' => $idProd['id'],
                    'image_1' => $fileNames[0],
                    'image_2' => $fileNames[1],
                    'image_3' => $fileNames[2]
                );
                $this->madmin->inputData('tr_product_image', $imageData);

                redirect('admin/allProd');

            }else{
              // get brand with active status
                $data['brands'] = $this->madmin->getProducts(array('id !=' => 0, 'status' => 1), array('idField' => 'id',
          'nameField' => 'name'), 'tm_brands', FALSE);
              // get category with active status
                $data['cats'] = $this->madmin->getProducts(array('id !=' => 0, 'status' => 1), array('idField' => 'id',
          'nameField' => 'name'), 'tm_category', FALSE);
              // get spec with active status
                $data['specs'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
                    'nameField' => 'name'), 'tm_spec', FALSE);
              // get size with active status
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

    // callback function for checking  product name
    public function checkingProdName($prodName){
      // checking product name is there the same as in DB
      $hasProdName = $this->madmin->getProducts(array('name' => $prodName), array('nameF' => 'name'), 'tm_product', TRUE);
      if (isset($hasProdName)) {
        // set message error
        $this->session->set_flashdata('error', 'Product has already been created');
        return FALSE;
      }else {
        return TRUE;
      }
    }

    // function for edit product
    public function editProd($productSlugs){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
            $this->form_validation->set_rules('brand', 'Brand', 'required');
            $this->form_validation->set_rules('cat', 'Category', 'required');
            $this->form_validation->set_rules('pName', 'Product Name', 'required|callback_checkingEditProdName');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('size[]', 'Size', 'required');
            $this->form_validation->set_rules('price[]', 'Price', 'required');
            $this->form_validation->set_rules('star', 'Star', 'required');


            if ($this->form_validation->run() === TRUE) {
              // get product id
                $productId = $this->input->post('idProd');
                // get brand id
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
                $cat_id = $this->input->post('cat');
                if ($cat_id == 1) {
                    $data = array('spec' => $this->input->post('spec[]'));
                    foreach ($data['spec'] as $spec) {
                        $prodSpec = array(
                            'prod_id' => $productId,
                            'spec_id' => $spec
                        );
                        $this->madmin->inputData('tr_product_spec', $prodSpec);
                    }
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

                // update position product
                $this->madmin->updateData(array('id' => $productId), 'tm_product', array('position' => $position));

                // get brand name
                $bName = $this->madmin->getProducts(array('id' => $this->input->post('brand')),
                    array('nameField' => 'name'), 'tm_brands', TRUE);
                // get category name
                $cName = $this->madmin->getProducts(array('id' => $this->input->post('cat')),
                    array('nameField' => 'name'), 'tm_category', TRUE);
                $config['upload_path'] = './asset/upload/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $this->load->library('upload',$config);

                $images = $this->madmin->getProducts(array('id_prod' => $productId), NULL, 'tr_product_image', TRUE);
                $imageData = array('id_prod' => $productId);

                // upload 3 images of product
                for ($i = 0; $i < 3; $i++) {
                    $file_name = strtolower($bName['name'].'-'.$cName['name'].'-'.$this->input->post('pName').'-'.uniqid());
                    $file_name = str_replace("%", "", $file_name);
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
              // get detail data of product
                $prod = $this->madmin->getProducts(array('slugs' => $productSlugs), array('idF' => 'id'), 'tm_product', TRUE);
                $productId = $prod['id'];
                $data['products'] = $this->madmin->getDetailProduct($productId);
                $data['brands'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
                    'nameField' => 'name'), 'tm_brands', FALSE);
                $data['cats'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
                    'nameField' => 'name'), 'tm_category', FALSE);
                $data['specs'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
                    'nameField' => 'name'), 'tm_spec', FALSE);
                $data['sizes'] = $this->madmin->getProducts(array('status' => 1), array('idField' => 'id',
                    'nameField' => 'name', 'sizeField' => 'size'), 'tm_size', FALSE);
                $data['images'] = $this->madmin->getProducts(array('id_prod' => $productId), NULL, 'tr_product_image', TRUE);

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

    // function callback for checking product name
    public function checkingEditProdName($editProdName){
      // get product id
      $idProd = $this->input->post('idProd');
      // checking name of edit product name is there the same on DB
      $hasEditProd = $this->madmin->getProducts(array('id !=' => $idProd, 'name' => $editProdName), array('nameF' => 'name'), 'tm_product', TRUE);
      if(isset($hasEditProd)){
        // set error message
        $this->session->set_flashdata('error', 'Product Name has already been created');
        return FALSE;
      }else {
        return TRUE;
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

    // function detail product
    public function detailProd($slugsProd){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            $specs = array();
            $prices = array();
            $sizes = array();
            // data detail product
            $data['product'] = $this->madmin->getProducts(array('slugs' => $slugsProd), NULL, 'tm_product', TRUE);
            $prod = $this->madmin->getProducts(array('slugs' => $slugsProd), array('idF' => 'id'), 'tm_product', TRUE);
            $idProd = $prod['id'];
            // data detail brand of product
            $data['brand'] = $this->madmin->getProducts(array('id' => $data['product']['brand_id']),
                array('nameField' => 'name'), 'tm_brands', TRUE);
            // data detail category of product
            $data['category'] = $this->madmin->getProducts(array('id' => $data['product']['cat_id']),
                array('nameField' => 'name'), 'tm_category', TRUE);
            // get id spec of product
            $idSpec = $this->madmin->getProducts(array('prod_id' => $idProd),
                array('idField' => 'spec_id'), 'tr_product_spec', FALSE);
            // get id size of product
            $idSize = $this->madmin->getProducts(array('prod_id' => $idProd),
                array('idField' => 'size_id', 'priceField' => 'price'), 'tr_product_size', FALSE);
            // data detail of image product
            $data['image'] = $this->madmin->getProductImage($idProd);

            // get detail spec of product
            for ($i=0; $i < count($idSpec) ; $i++) {
                array_push($specs, $this->madmin->getProducts(array('id' => $idSpec[$i]['spec_id']),
                    array('nameField' => 'name'), 'tm_spec', TRUE));
            }
            $data['specs'] = $specs;

            // get detail size of product
            for ($i=0; $i < count($idSize); $i++) {
                array_push($prices, $idSize[$i]['price']);
            }
            $data['prices'] = $prices;

            // get detail size of product
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

    // function for set status delete of specific product
    public function deleteProd($slugsProd){
        if ($this->session->userdata('uType') == 1) {
//            $this->madmin->deleteData(array('prod_id' => $idProd), 'tr_product_spec');
//            $this->madmin->deleteData(array('prod_id' => $idProd), 'tr_product_size');
//            $this->madmin->deleteData(array('id' => $idProd), 'tm_product');
            // update delete status product to be true
            $this->madmin->updateData(array('slugs' => $slugsProd), 'tm_product', array('deleted' => 1));
            redirect('admin/allProd');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function for list of agmpedias
    public function sa_agmpedia(){
      // checking usertype (super admin or admin or neither)
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
          // get data pedias
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

    // function for add new pedia
    public function addPedia(){
      // checking usertype (super admin or admin or neither)
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
            $this->form_validation->set_rules('title', 'Title', 'required|callback_checkingPediaTitle');
            $this->form_validation->set_rules('sContent', 'Sub news', 'required|max_length[125]|');
            $this->form_validation->set_rules('content', 'News', 'required');

            if ($this->form_validation->run() === TRUE) {
              // set rules of upload images
                $config['upload_path'] = './asset/upload/pedia/';
                $config['allowed_types'] = 'jpg|jpeg|png';
                $config['max_size'] = 2048;

                $this->load->library('upload', $config);
                // checking images upload
                if ( empty($this->upload->do_upload('photo')) || empty($this->upload->do_upload('thumbnail')) ) {
                  // set message error
                    $this->session->set_flashdata('error', $this->upload->display_errors());

                    $this->load->view('include/admin/header');
                    $this->load->view('include/admin/left-sidebar');
                    $this->load->view('admin/addPedia');
                    $this->load->view('include/admin/footer');
                }else{
                    // get data uploaded (images)
                    $this->upload->do_upload('photo');
                    $photos = $this->upload->data();
                    $this->upload->do_upload('thumbnail');
                    $thumbnails = $this->upload->data();
                    // set slugs pedia
                    $slugs_pedia = str_replace(' ', '-', strtolower($this->input->post('title')));

                    // input new pedia
                    $items = array(
                        'title'       => $this->input->post('title'),
                        'slugs'       => $slugs_pedia,
                        'sub_content' => $this->input->post('sContent'),
                        'content'     => $this->input->post('content'),
                        'date'        => date('Ymd'),
                        'thumbnail'   => $thumbnails['orig_name'],
                        'photo'       => $photos['orig_name'],
                        'status'      => 1,
                        'user_id'     => $this->session->userdata('uId')
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

    // function callback for checking pedia title
    public function checkingPediaTitle($titlePedia){
      // checking pedia title is there the same as in DB
      $hasTitlePedia = $this->madmin->getProducts(array('title' => $titlePedia), array('titleF' => 'title'), 'tm_agmpedia', TRUE);
      if (isset($hasTitlePedia)) {
        // set message error
        $this->session->set_flashdata('error', 'Title name has already been created');
        return FALSE;
      }else{
        return TRUE;
      }
    }

    // function for detail pedia (view)
    public function detailPedia($articleSlugs) {
      // checking usertype (super admin or admin or neither)
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
          // data of detail pedia
            $data['article'] = $this->madmin->getProducts(array('slugs' => $articleSlugs), NULL, 'tm_agmpedia', TRUE);

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

    // function for active or inactive pedia
    public function activePedia($slugsPedia){
      // checking usertype (super admin or admin or neither)
      if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
        // get pedia status
        $pedia = $this->madmin->getProducts(array('slugs' => $slugsPedia), array('stats' => 'status'),
          'tm_agmpedia', TRUE);
        // set active or inactive status pedia
        if ($pedia['status'] == 1) {
          $this->madmin->updateData(array('slugs' => $slugsPedia),'tm_agmpedia',
            array('status' => 0));
        }else{
          $this->madmin->updateData(array('slugs' => $slugsPedia),'tm_agmpedia',
            array('status' => 1));
        }
        redirect('admin/sa_agmpedia');
      }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }
    }

    // function for set delete status pedia
    public function deletePedia($slugsPedia){
      // checking usertype (super admin or admin or neither)
      if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
//        $file = $this->madmin->getProducts(array('id' => $idPedia), array('thumb' => 'thumbnail',
//          'photos' => 'photo'), 'tm_agmpedia', TRUE);
//        $file_path_thumbnail = 'asset/upload/pedia/'.$file['thumbnail'];
//        $file_path_photo = 'asset/upload/pedia/'.$file['photo'];
//        unlink($file_path_thumbnail);
//        unlink($file_path_photo);
//        print_r($file_path);
//        $this->madmin->deleteData(array('id' => $idPedia), 'tm_agmpedia');

        // update status delete to be true
        $this->madmin->updateData(array('slugs' => $slugsPedia), 'tm_agmpedia', array('deleted' => 1));
        redirect('admin/sa_agmpedia');
      }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }
    }

    // function for edit pedia
    public function editPedia($slugsPedia) {
      // data detail pedia
        $data['article'] = $this->madmin->getProducts(array('slugs' => $slugsPedia), NULL,'tm_agmpedia', TRUE);
        global $photos;
        global $thumbnails;
        global $thumbnailUploadStatus;
        global $photoUploadStatus;

        // checking usertype (super admin or admin or neither)
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
            $this->form_validation->set_rules('title', 'Title', 'required|callback_checkingEditTitlePedia');
            $this->form_validation->set_rules('sContent', 'Sub news', 'required|max_length[125]');
            $this->form_validation->set_rules('content', 'News', 'required');

            if ($this->form_validation->run() === FALSE) {

                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/editPedia', $data);
                $this->load->view('include/admin/footer');
            } else {
              // checking is there some file to upload (thumbnail)
                if ($_FILES['thumbnail']['error'] == 0) {
                  // set file name
                    $file_name = strtolower('thumbnail-image-'.uniqid());

                    $config['upload_path'] = './asset/upload/pedia/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 2048;
                    $config['file_name']  = $file_name;
                    $this->load->library('upload', $config);
                    if (! $this->upload->do_upload('thumbnail')) {
                      // set error message
                        $this->session->set_flashdata('error', $this->upload->display_errors());

                        $this->load->view('include/admin/header');
                        $this->load->view('include/admin/left-sidebar');
                        $this->load->view('admin/editPedia');
                        $this->load->view('include/admin/footer');
                    } else {
                      // get file upload (thumbnail)
                        $thumbnailUploadStatus = 1;
                        $thumbnails = $this->upload->data();
                    }


                }

                // checking is there some file to upload (main photo of pedia)
                if ($_FILES['photo']['error'] == 0) {
                  // set file name
                    $file_name = strtolower('photo-image-'.uniqid());

                    $config['upload_path'] = './asset/upload/pedia/';
                    $config['allowed_types'] = 'jpg|jpeg|png';
                    $config['max_size'] = 2048;
                    $config['file_name']  = $file_name;
                    $this->load->library('upload', $config);
                    if (! $this->upload->do_upload('photo')) {
                      // set message error
                        $this->session->set_flashdata('error', $this->upload->display_errors());

                        $this->load->view('include/admin/header');
                        $this->load->view('include/admin/left-sidebar');
                        $this->load->view('admin/editPedia');
                        $this->load->view('include/admin/footer');
                    } else {
                      // get upload file (main photo of pedia)
                        $photoUploadStatus = 1;
                        $photos = $this->upload->data();
                    }
                }

                // updating if there some image to upload
                if ($photoUploadStatus === 1 && $thumbnailUploadStatus === 1) {
                  // get pedia name
                  $idArticle = $this->input->post('idArticle');
                  // set slugs for pedia
                  $editSlugs = str_replace(' ', '-', strtolower($this->input->post('title')));
                  // update pedia
                    $items = array(
                        'title' => $this->input->post('title'),
                        'slugs' => $editSlugs,
                        'sub_content' => $this->input->post('sContent'),
                        'content' => $this->input->post('content'),
                        'thumbnail' => $thumbnails['file_name'],
                        'photo' => $photos['file_name'],
                        'status' => 1,
                        'user_id' => $this->session->userdata('uId')
                    );
                    $this->madmin->updateData(array('id' => $idArticle), 'tm_agmpedia', $items);
                    redirect('admin/sa_agmpedia', 'refresh');

                // checking if only main photos update
                } else if ($photoUploadStatus === 1) {
                    // get id pedia
                    $idArticle = $this->input->post('idArticle');
                    // set slugs
                    $editSlugs = str_replace(' ', '-', strtolower($this->input->post('title')));
                    // update pedia
                    $items = array(
                        'title' => $this->input->post('title'),
                        'slugs' => $editSlugs,
                        'sub_content' => $this->input->post('sContent'),
                        'content' => $this->input->post('content'),
                        'photo' => $photos['orig_name'],
                        'status' => 1,
                        'user_id' => $this->session->userdata('uId')
                    );
                    $this->madmin->updateData(array('id' => $idArticle), 'tm_agmpedia', $items);
                    redirect('admin/sa_agmpedia', 'refresh');

                // checking if only thumbnail photo update
                } else if ($thumbnailUploadStatus === 1) {
                  // get id pedia
                  $idArticle = $this->input->post('idArticle');
                  // set slugs
                  $editSlugs = str_replace(' ', '-', strtolower($this->input->post('title')));
                  // update pedia
                    $items = array(
                        'title' => $this->input->post('title'),
                        'slugs' => $editSlugs,
                        'sub_content' => $this->input->post('sContent'),
                        'content' => $this->input->post('content'),
                        'thumbnail' => $thumbnails['orig_name'],
                        'status' => 1,
                        'user_id' => $this->session->userdata('uId')
                    );
                    $this->madmin->updateData(array('id' => $idArticle), 'tm_agmpedia', $items);
                    redirect('admin/sa_agmpedia', 'refresh');

                // checking if no photos update
                } else {
                  // get id pedia
                  $idArticle = $this->input->post('idArticle');
                  // set slugs
                  $editSlugs = str_replace(' ', '-', strtolower($this->input->post('title')));
                  // update pedia
                    $items = array(
                        'title' => $this->input->post('title'),
                        'slugs' => $editSlugs,
                        'sub_content' => $this->input->post('sContent'),
                        'content' => $this->input->post('content'),
                        'status' => 1,
                        'user_id' => $this->session->userdata('uId')
                    );
                    $this->madmin->updateData(array('id' => $idArticle), 'tm_agmpedia', $items);
                    redirect('admin/sa_agmpedia', 'refresh');
                }

            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function callback for edit title pedia
    public function checkingEditTitlePedia($editTitlePedia){
      // get id pedia
      $idArticle = $this->input->post('idArticle');
      // checking pedia title is there the same as in DB
      $hasEditTitlePedia = $this->madmin->getProducts(array('id !=' => $idArticle, 'title' => $editTitlePedia), array('titleF' => 'title'), 'tm_agmpedia', TRUE);
      if (isset($hasEditTitlePedia)) {
        // set error message
        $this->session->set_flashdata('error', 'Title name has already been created');
        return FALSE;
      }else {
        return TRUE;
      }
    }

    public function getItem($id) {
        $result = $this->madmin->getProductItem($id);
        echo json_encode($result);
    }

    // function for add product to store
    public function storeProd($idSO){
      // checking usertype (super admin or admin or neither)
        if ($this->session->userdata('uType') == 2 || $this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
            $this->form_validation->set_rules('product', 'Product', 'required|callback_checkingSProd');

            if ($this->form_validation->run() === FALSE) {
              // get id store
                $idStore = array('idStore' => $idSO);
                $data['storeId'] = $idStore;
                // get products which store have
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

    // function for add special package to store
    public function addStore_SpecialPackage($idStoreOwner){
      // checking id store owner
      if ($idStoreOwner == NULL) {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }else{
        // checking if id is in DB
        $hasStoreOwner = $this->madmin->getProducts(array('id' => $idStoreOwner), array('idF' => 'id'), 'tm_store_owner', TRUE);
        if (!isset($hasStoreOwner)) {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
        }else{
          // checking usertype (super admin or admin or neither)
          if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
              $this->load->helper('form');
              $this->load->library('form_validation');

              // set rules
              $this->form_validation->set_rules('specialPackage', 'Special Package', 'required|callback_checkingSpecialPackage');

              if ($this->form_validation->run() === FALSE) {
                // get data of special package
                $data['id_store'] = $idStoreOwner;
                $data['special_packages'] = $this->madmin->getProducts(NULL, array('idField' => 'id', 'nameField' => 'name'), 'tm_special_package', FALSE);

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
      }
  }

  // function for delete product on store
  public function deleteStoreProd($idStore ,$idProd_store){
    // checking usertype (super admin or admin or neither)
    if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
      // delete product in store owner
      $this->madmin->deleteData(array('id' => $idProd_store, 'id_store' => $idStore), 'tr_product');
      redirect('admin/stores/'.$idStore);
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  // function callback for add special package to store
    public function checkingSpecialPackage($idSpecialPckg){
      // checking id special package has been already added to store or not
        $alreadyAssgn = $this->madmin->getProducts(array('id_store_owner' => $this->input->post('idStore'), 'id_special_package' => $idSpecialPckg),
            NULL, 'tr_storeowner_special_package', TRUE);
        if (isset($alreadyAssgn)) {
          // set error message
            $this->session->set_flashdata('error', 'Special package has already been added to store');
            return FALSE;
        }else {
            return TRUE;
        }
    }

    // function for get product size
    public function getIdProduct($idProd){
      // get product size and its price and change to JSON
        $sizes = $this->madmin->joinSizeProduct($idProd);
        if($sizes) {
            print_r(json_encode($sizes));
        } else {
            echo "Something went wrong";
        }
    }

    // function callback for add product to store
    public function checkingSProd($prod){
      // checking product has been added or not
        $alreadyAssgn = $this->madmin->getProducts(array('id_product' => $prod, 'id_store' => $this->input->post('idStore')),
            NULL, 'tr_product', TRUE);
        if (isset($alreadyAssgn)) {
          // set error message
            $this->session->set_flashdata('error', 'Product has already been added to store');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    // function for add quantity product
    /*
    * This function was not used anymore
    */
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

    // function for list of slider
    public function sa_slider(){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          // get slides data
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

    // function for add new slider
    public function addSlider(){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            // set rules of file upload
            $config['upload_path'] = './asset/upload/';
            $config['allowed_types'] = 'jpg|jpeg|png';

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('sliderPict')) {
              // set error message
                $this->session->set_flashdata('error', $this->upload->display_errors());
                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/addSlider');
                $this->load->view('include/admin/footer');
            }else{
              // get data of file upload
                $pName = $this->upload->data();
                // set identifier of slide
                $coverIdentifier = 1;
                // input slider
                $items = array(
                    'slide'       => $pName['orig_name'],
                    'created_at'  => date('Ymd'),
                    'cover'       =>  $coverIdentifier,
                    'bannerlink'        => $this->input->post('link')
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

    // function for delete slider
    public function deleteSlider($idSlider){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          // get slide file name
            $file = $this->madmin->getProducts(array('id' => $idSlider), array('slideField' => 'slide'), 'tm_cover', TRUE);
            // delete slide image from directory
            $file_path = 'asset/upload/best-seller-cover/'.$file['slide'];
            unlink($file_path);
            print_r($file_path);
            // delete slider
            $this->madmin->deleteData(array('id' => $idSlider), 'tm_cover');
            redirect('admin/sa_slider');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function for list of specs
    public function sa_spec(){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          // get data of all sspecs
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

    // function for add spec
    public function addSpec(){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
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

                // set slugs
                $slugs = str_replace(' ', '-', $this->input->post('name'));
                // input new spec
                $items = array(
                    'name'        => $this->input->post('name'),
                    'slugs'       => $slugs,
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

    // function callback for add spec
    public function checkingSpec($spec){
      // checking is spec name has already been created or not
        $specName = $this->madmin->getProducts(array('name' => $spec), array('nameField' => 'name'), 'tm_spec', TRUE);

        if(isset($specName)){
          // set error message
            $this->session->set_flashdata('error', 'Spec has already been created');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    // function delete spec
    public function deleteSpec($specSlugs){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
//            $this->madmin->deleteData(array('id' => $specId), 'tm_spec');

            // update delete status spec to be true
            $this->madmin->updateData(array('slugs'=>$specSlugs), 'tm_spec', array('deleted' => 1));
            redirect('admin/sa_spec');
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    // function for detail spec
    public function infoSpec($slugsSpec){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          // get detail data of specific spec
          $data['spec'] = $this->madmin->getProducts(array('slugs' => $slugsSpec), NULL, 'tm_spec', TRUE);

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


    // function for edit spec
    public function editSpec($slugsSpec){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
          $this->load->helper('form');
          $this->load->library('form_validation');

          // set rules
          $this->form_validation->set_rules('items', 'Spec Name', 'required|callback_checkingEditSpec');

          if ($this->form_validation->run() === FALSE) {
            // get detail data of specific spec
            $data['spec'] = $this->madmin->getProducts(array('slugs' => $slugsSpec), NULL, 'tm_spec', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/editSpec', $data);
            $this->load->view('include/admin/footer');
          }else {
            // checking is there file to upload
              if ($_FILES['specPict']['size'] != 0) {
                  $config['upload_path'] = './asset/spec/';
                  $config['allowed_types'] = 'jpg|jpeg|png|svg';
                  $config['overwrite']        = true;

                  $this->load->library('upload', $config);
                  if (! $this->upload->do_upload('specPict')) {
                    // set error message
                      $this->session->set_flashdata('error', $this->upload->display_errors());
                      $data['spec'] = $this->madmin->getProducts(array('slugs' => $slugsSpec), NULL, 'tm_spec', TRUE);
                      $this->load->view('include/admin/header');
                      $this->load->view('include/admin/left-sidebar');
                      $this->load->view('admin/editSpec', $data);
                      $this->load->view('include/admin/footer');
                  }else{
                    // get detail file upload
                      $pName = $this->upload->data();
                      // set new slugs
                      $editSlugsSpec = str_replace(' ', '-', strtolower($this->input->post('items')));
                      // update new spec
                      $items = array(
                          'name'          => $this->input->post('items'),
                          'slugs'         => $editSlugsSpec,
                          'icon'          => $pName['orig_name'],
                          'status' => 1,
                      );
                      $this->madmin->updateData(array('slugs' => $slugsSpec), 'tm_spec', $items);
                      redirect('admin/sa_spec','refresh');
                  }

              // checking if there isn't file to upload
              } else {
                // set new slugs
                  $editSlugsSpec = str_replace(' ', '-', strtolower($this->input->post('items')));
                  // update new spec
                  $items = array(
                      'name'   => $this->input->post('items'),
                      'slugs'  => $editSlugsSpec,
                      'status' => 1,
                  );
                  $this->madmin->updateData(array('slugs' => $slugsSpec), 'tm_spec', $items);
                  redirect('admin/sa_spec','refresh');
              }

          }
        }else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
        }
      }

    // function callback for edit spec
    public function checkingEditSpec($editSpecName){
      // get id spec
      $idSpec = $this->input->post('idSpec');
      // checking is there the same name spec in DB
      $hasSpecName = $this->madmin->getProducts(array('id !=' => $idSpec, 'name' => $editSpecName), array('nameF' => 'name'), 'tm_spec', TRUE);
      if (isset($hasSpecName)) {
        // set error message
        $this->session->set_flashdata('error', 'Spec name has already been created');
        return FALSE;
      }else{
        return TRUE;
      }
    }

    // function for list of size
    public function sa_size(){
      // checking usertype (superadmin or not)
        if ($this->session->userdata('uType') == 1) {
          // get data of all sizes
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

    // function for add new size
    public function addSize(){
      // checking usertype (super admin or not)
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            // set rules
            $this->form_validation->set_rules('name', 'Size name', 'required|callback_checkingSizeName');
            $this->form_validation->set_rules('size', 'Size', 'required|callback_checkingSize');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('include/admin/header');
                $this->load->view('include/admin/left-sidebar');
                $this->load->view('admin/addSize');
                $this->load->view('include/admin/footer');
            }else{
              // set slugs
                $slugs = str_replace(' ', '-', strtolower($this->input->post('name')));
                // input new size
                $items = array(
                    'name'       => $this->input->post('name'),
                    'slugs'      => $slugs,
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

    // function callback for add new Size
    public function checkingSizeName($name){
      // checking size name is there the same as in DB
        $sizeName = $this->madmin->getProducts(array('name' => $name), array('nameField' => 'name'), 'tm_size', TRUE);

        if (isset($sizeName)) {
          // set error message
            $this->session->set_flashdata('error', 'Size name has already been created');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    // function callback for checking detail size
    public function checkingSize($size){
      // checking back size name on function callback checkingSizeName
        if ($this->checkingSizeName($this->input->post('name'))) {
          // get detail size
            $size = $this->madmin->getProducts(array('size' => $size), array('sizeField' => 'size'), 'tm_size', TRUE);
            if (isset($size)) {
              // set message error
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

    public function deleteSize($sizeSlugs){
        if ($this->session->userdata('uType') == 1) {
//            $this->madmin->deleteData(array('id' => $sizeId), 'tm_size');
            $this->madmin->updateData(array('slugs' => $sizeSlugs), 'tm_size', array('deleted' => 1));
            redirect('admin/sa_size');
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function infoSize($slugsSize){
        if ($this->session->userdata('uType') == 1) {
          $data['size'] = $this->madmin->getProducts(array('slugs' => $slugsSize), NULL, 'tm_size', TRUE);

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

    public function editSize($slugsSize){
        if ($this->session->userdata('uType') == 1) {
          $this->load->helper('form');
          $this->load->library('form_validation');

          $this->form_validation->set_rules('items', 'Size Name', 'required|callback_checkingEditSizeName');
          $this->form_validation->set_rules('size', 'Size', 'required|callback_checkingEditSizeDetail');

          if ($this->form_validation->run() === FALSE) {
            $data['size'] = $this->madmin->getProducts(array('slugs' => $slugsSize), NULL, 'tm_size', TRUE);

            $this->load->view('include/admin/header');
            $this->load->view('include/admin/left-sidebar');
            $this->load->view('admin/editSize', $data);
            $this->load->view('include/admin/footer');
          }else {
              $slugs = str_replace(' ', '-', strtolower($this->input->post('items')));
              $items = array(
                  'name'   => $this->input->post('items'),
                  'slugs'  => $slugs,
                  'size'   => $this->input->post('size'),
                  'status' => 1,
              );
              $this->madmin->updateData(array('slugs' => $slugsSize), 'tm_size', $items);
              redirect('admin/sa_size', 'refresh');
          }
        }else {
          $this->load->view('include/header2');
          $this->load->view('un-authorise');
          $this->load->view('include/footer');
        }
      }


    public function checkingEditSizeName($editSizeName){
      $idSize = $this->input->post('idSize');
      $hasSizeName = $this->madmin->getProducts(array('id !=' => $idSize, 'name' => $editSizeName), array('nameF' => 'name'), 'tm_size', TRUE);
      if (isset($hasSizeName)) {
        $this->session->set_flashdata('error', 'Size name has already been created');
        return FALSE;
      }else {
        return TRUE;
      }
    }

    public function checkingEditSizeDetail($editSizeDetail){
      $idSize = $this->input->post('idSize');
      $hasSizeName = $this->madmin->getProducts(array('id !=' => $idSize, 'size' => $editSizeDetail), array('nameF' => 'size'), 'tm_size', TRUE);
      if (isset($hasSizeName)) {
        $this->session->set_flashdata('error', 'Size detail has already been created');
        return FALSE;
      }else {
        return TRUE;
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

            $this->form_validation->set_rules('name', 'Name', 'required|callback_checkingPromotionName');
            $this->form_validation->set_rules('kVoucher', 'Kode Voucher', 'required');
            $this->form_validation->set_rules('jumlah', 'Limit Voucher', 'required');
            $this->form_validation->set_rules('discount', 'Discount', 'required');
            $this->form_validation->set_rules('start', 'Start Period', 'required');
            $this->form_validation->set_rules('end', 'End Period', 'required');
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
                    $slugs = str_replace(' ', '-', strtolower($this->input->post('name')));
                    $promotion = array(
                        'name'          => $this->input->post('name'),
                        'slugs'         => $slugs,
                        'description'   => $this->input->post('desc'),
                        'start_date'    => $this->input->post('start'),
                        'end_date'      => $this->input->post('end'),
                        'image'         => $image['orig_name'],
                        'status'        => 1
                    );
                    $this->madmin->inputData('tm_promotion', $promotion);

                    $idProm = $this->madmin->getProducts($promotion, array('idF' => 'id'), 'tm_promotion', TRUE);

                    $voucher = array(
                      'kode_voucher'  => $this->input->post('kVoucher'),
                      'id_promotion'  => $idProm['id'],
                      'discount'      => $this->input->post('discount'),
                      'jumlah'        => $this->input->post('jumlah'),
                      'active'        => 1
                    );
                    $this->madmin->inputData('tm_voucher', $voucher);

                    redirect('admin/promotions', 'refresh');
                }
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function checkingPromotionName($nameProm){
      $promotion_name = $this->madmin->getProducts(array('name' => $nameProm), array('nameF' => 'name'), 'tm_promotion', TRUE);
      if (isset($promotion_name)) {
        $this->session->set_flashdata('error', 'Promotion name has already been created');
        return FALSE;
      }else{
        return TRUE;
      }
    }

    public function detailPromotion($slugs) {
        if ($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2) {
            $data['promotion'] = $this->madmin->detailPromotion($slugs);
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

    public function activePromotion($slugs) {
        if($this->session->userdata('uType') == 1 || $this->session->userdata('uType') == 2){
            $stat = $this->madmin->getProducts(array('slugs' => $slugs), array('statField' => 'status'), 'tm_promotion',TRUE);
            if($stat['status'] == 1){
                $items = array('status' => 0);
                $this->madmin->updateData(array('slugs' => $slugs), 'tm_promotion', $items);
                redirect('admin/promotions', 'refresh');
            }else{
                $items = array('status' => 1);
                $this->madmin->updateData(array('slugs' => $slugs), 'tm_promotion', $items);
                redirect('admin/promotions', 'refresh');
            }
        }else{
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function editPromotion($slugs) {
        if ($this->session->userdata('uType') == 1) {
            $this->load->helper('form');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('name', 'Name', 'required|callback_checkingEditNameProm');
            $this->form_validation->set_rules('desc', 'Description', 'required');
            $this->form_validation->set_rules('start', 'Start Period', 'required');
            $this->form_validation->set_rules('end', 'End Period', 'required');
            $data['promotion'] = $this->madmin->detailPromotion($slugs);
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
                        $id = $this->input->post('idProm');
                        $slug = str_replace(' ', '-', strtolower($this->input->post('name')));
                        $promotion = array(
                            'name'         => $this->input->post('name'),
                            'slugs'        => $slug,
                            'description'  => $this->input->post('desc'),
                            'start_date'   => $this->input->post('start'),
                            'end_date'     => $this->input->post('end'),
                            'image'        => $image['orig_name'],
                            'status'       => 1
                        );
                        $this->madmin->updateData(array('id' => $id),'tm_promotion', $promotion);

                        $edit_voucher = array(
                          'kode_voucher'  => $this->input->post('kVoucher'),
                          'id_promotion'  => $id,
                          'discount'      => $this->input->post('discount'),
                          'jumlah'        => $this->input->post('jumlah'),
                          'active'        => 1
                        );
                        $this->madmin->updateData(array('id_promotion' => $id), 'tm_voucher', $edit_voucher);

                        redirect('admin/promotions', 'refresh');
                    }
                } else {
                  $id = $this->input->post('idProm');
                  $slug = str_replace(' ', '-', strtolower($this->input->post('name')));
                  $promotion = array(
                      'name'         => $this->input->post('name'),
                      'slugs'        => $slug,
                      'description'  => $this->input->post('desc'),
                      'start_date'   => $this->input->post('start'),
                      'end_date'     => $this->input->post('end'),
                      'status'       => 1
                  );
                  $this->madmin->updateData(array('id' => $id),'tm_promotion', $promotion);

                  $edit_voucher = array(
                    'kode_voucher'  => $this->input->post('kVoucher'),
                    'id_promotion'  => $id,
                    'discount'      => $this->input->post('discount'),
                    'jumlah'        => $this->input->post('jumlah'),
                    'active'        => 1
                  );
                  $this->madmin->updateData(array('id_promotion' => $id), 'tm_voucher', $edit_voucher);

                    redirect('admin/promotions', 'refresh');
                }
            }
        } else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }
    }

    public function checkingEditNameProm($editNameProm){
      $idProm = $this->input->post('idProm');
      $prom_name = $this->madmin->getProducts(array('name' => $editNameProm, 'id !=' => $idProm), array('nameF' => 'name'), 'tm_promotion', TRUE);
      if (isset($prom_name)) {
        $this->session->set_flashdata('error', 'Promotion name has already been created');
        return FALSE;
      }else {
        return TRUE;
      }
    }

    public function deletePromotion($slugs) {
        if ($this->session->userdata('uType') == 1) {
//            $data = $this->madmin->getProducts(array('id' => $id), NULL,'tm_promotion', TRUE);
//            $this->madmin->deleteData(array('id' => $id), 'tm_promotion');
//            unlink('./asset/upload/'.$data['image']);
            $this->madmin->updateData(array('slugs' => $slugs), 'tm_promotion', array('deleted' => 1));
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
              $data['specialPackages'] = $this->madmin->getProducts(array('deleted !=' => 1), NULL, 'tm_special_package', FALSE);
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
            // $this->form_validation->set_rules('mainProd', 'Main Product of Special Package', 'required|callback_checkingMainProd');
            $this->form_validation->set_rules('sizeSpcl[]', 'Special Package Products', 'required');

            if ($this->form_validation->run() === FALSE) {
              $data['products'] = $this->madmin->getMainProd_SP();

              $this->load->view('include/admin/header');
              $this->load->view('include/admin/left-sidebar');
              $this->load->view('admin/addSpecial_Package', $data);
              $this->load->view('include/admin/footer');
            }else {
              $name = $this->input->post('name');
              $slugs = str_replace(' ', '-', strtolower($name));
              $desc = $this->input->post('desc');
              $sku = $this->input->post('sku');
              $size = 0;
              $prod_PKG = $this->input->post('sizeSpcl[]');
              $prod_qty = $this->input->post('qtySpcl[]');
              $prod_prc = $this->input->post('prcSpcl[]');

              $file_name = strtolower('special_package-'.$name);

              $config['upload_path'] = './asset/upload/special-package';
              $config['allowed_types'] = 'jpg|jpeg|png|svg';
              $config['file_name'] = $file_name;

              $this->load->library('upload', $config);

              if (! $this->upload->do_upload('imageSP')) {
                $this->session->set_flashdata('errorSpecialPackage', $this->upload->display_errors());
                redirect('admin/addSpecial_Package');
              }else {
                $upload_name = $this->upload->data('file_name');
                $total  = 0;
                foreach ($prod_prc as $price) {
                  $total += $price;
                }
                $data_main_sp = array(
                  'name'          => $name,
                  'slugs'         => $slugs,
                  'image'         => $upload_name,
                  'description'   => $desc,
                  'active'        => 1,
                  'total'         => $total
                );
                $this->madmin->inputData('tm_special_package', $data_main_sp);

                $idSP = $this->madmin->getProducts($data_main_sp, array('idField' => 'id'), 'tm_special_package', TRUE);

                $data_tr_prod_size = array(
                  'sku'     => $sku,
                  'prod_id' => $idSP['id'],
                  'special' => $idSP['id'],
                  'size_id' => $size,
                  'price'   => $total
                );
                $this->madmin->inputData('tr_product_size', $data_tr_prod_size);

                $sumProd_SP = count($prod_PKG);
                for ($i=0; $i < $sumProd_SP; $i++) {
                  $data_prod_sp = array(
                    'id_specialPkg' => $idSP['id'],
                    'id_prod_package' => $prod_PKG[$i],
                    'quantity'        => $prod_qty[$i],
                    'subtotal'        => $prod_prc[$i]
                  );

                  $this->madmin->inputData('tr_special_package', $data_prod_sp);
                }

                // update product as main product special Package
                // $update_as_main_product = array(
                //   'main_sp' => 1,
                // );
                // $this->madmin->updateData(array('id' => $mainProd), 'tm_product', $update_as_main_product);

                redirect('admin/special_package');
              }
            }
          }else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
          }
    }

    public function priceProd_Size($id_mainProd){
      if ($this->session->userdata('uType') == 1) {
        $size_mainProd = $this->madmin->getProducts(array('id' => $id_mainProd),
         array('prc' => 'price', 'sbprc' => 'sub_price'), 'tr_product_size', TRUE);
        $price_mainProd = array();
        if ($size_mainProd['sub_price'] != NULL) {
          $price_mainProd['price'] = "Rp ".number_format(floatval($size_mainProd['sub_price']), 0, ',', '.');
        }else{
          $price_mainProd['price'] = "Rp ".number_format(floatval($size_mainProd['price']), 0, ',', '.');
        }

        if ($price_mainProd) {
          print_r(json_encode($price_mainProd));
        }else {
          echo "Something went wrong";
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

  public function activeSpecialPackage($slugsSP){
    if ($this->session->userdata('uType') == 1) {
      $isActive = $this->madmin->getProducts(array('slugs' => $slugsSP), array('activeField' => 'active'), 'tm_special_package', TRUE);
      if ($isActive['active'] == 1) {
        echo "this is active";
        $item = array('active' => 0);
        $this->madmin->updateData(array('slugs' => $slugsSP), 'tm_special_package', $item);
        // $this->madmin->updateData(array('id' => $isActive['main_product']), 'tm_product',
        //  array('main_sp' => 0));
      } else {
        echo "this is inactive";
        $item = array('active' => 1);
        $this->madmin->updateData(array('slugs' => $slugsSP), 'tm_special_package', $item);
        // $this->madmin->updateData(array('id' => $isActive['main_product']), 'tm_product',
        //  array('main_sp' => 1));
      }
      redirect('admin/special_package');
    } else {
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function deleteSpecialPackage($slugSP){
    if ($this->session->userdata('uType') == 1) {
      $id_mainSP = $this->madmin->getProducts(array('slugs' => $slugsSP), array('deleted' => 'deleted'),
        'tm_special_package', TRUE);

      $this->madmin->updateData(array('slugs' => $slugsSP), 'tm_special_package', array('deleted' => 1));
      redirect('admin/special_package');
    }else {
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

    public function edit_bed_linen($slugsBedLinen){
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
          $positionProduct_lastdestination = $this->madmin->getProducts(array('slugs' => $slugsBedLinen),
            array('positionField' => 'position'), 'tr_product_bed_linen', TRUE);

          // print_r($positionProduct_lastdestination);exit();

          // data new stars and new position for idBedLinen
          $data_newDestination = array('position'  => $position);
          $this->madmin->updateData(array('slugs' => $slugsBedLinen), 'tr_product_bed_linen', $data_newDestination);

          $data_ProdLastDestination = array('position'  => $positionProduct_lastdestination['position']);
          $this->madmin->updateData(array('id' => $positionProduct_destination['id']),
           'tr_product_bed_linen', $data_ProdLastDestination);

           redirect('admin/bed_linen');
          } else {
            $data['product_bedlinen'] = $this->madmin->detail_prod_bed_linen($slugsBedLinen);
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

  public function detailSpecialPackage($slugsSpecialPckg){
    if ($this->session->userdata('uType') == 1) {
      $hasSP = $this->madmin->getProducts(array('slugs' => $slugsSpecialPckg), array('idF' => 'id', 'deletedF' => 'deleted'), 'tm_special_package', TRUE);
      if ($hasSP['id'] != NULL && $hasSP['deleted'] != TRUE) {
        $data['detail_SpclPckg'] = $this->madmin->prime_specialPKG($hasSP['id']);
        $data['prod_SpclPckg'] = $this->madmin->detail_specialPackage($hasSP['id']);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/detailSpecialPackage', $data);
        $this->load->view('include/admin/footer');
      }else {
        $this->load->view('include/header2');
        $this->load->view('un-authorise');
        $this->load->view('include/footer');
      }
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function edit_special($slugsSpecialPkg){
    if ($this->session->userdata('uType') == 1) {
      $hasSP = $this->madmin->getProducts(array('slugs' => $slugsSpecialPkg), array('idF' => 'id', 'deletedF' => 'deleted'), 'tm_special_package', TRUE);
      if ($hasSP['id'] != NULL && $hasSP['deleted'] != TRUE) {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('name', 'Special Package Name', 'required|callback_checkingEditSPName');
        $this->form_validation->set_rules('desc', 'Special Package Description', 'required');

        if ($this->form_validation->run() === FALSE) {
          $data['detail_SP'] = $this->madmin->prime_specialPKG($hasSP['id']);
          $data['prod_SP'] = $this->madmin->detail_specialPackage($hasSP['id']);
          $currentBonus = $this->madmin->current_bonus($hasSP['id']);
          $data['addBonus'] = $this->madmin->add_bonus($currentBonus);


          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/edit_special', $data);
          $this->load->view('include/admin/footer');
        }else {
          $imageSP = $this->input->post('imageSP');
          $name_SP = $this->input->post('name');
          $slugs_SP = str_replace(' ', '-', strtolower($name_SP));
          $sku_SP = $this->input->post('sku');
          $desc_SP = $this->input->post('desc');

          $idProdBonus_SP = $this->input->post('bonusSP[]');
          $idtrSP = $this->input->post('idtrSP[]');
          $idProdSize_SP = $this->input->post('prodSizeSP[]');
          $qty_SP = $this->input->post('qtySP[]');
          $price_SP = $this->input->post('priceSP[]');
          $delete_SP = $this->input->post('deleteBonus[]');
          // 4 yang  baru di apus

          echo "id tr special package: ";print_r($idtrSP);echo "</br></br>";
          echo "id product size: ";print_r($idProdSize_SP);echo "</br></br>";
          echo "delete bonus: ";print_r($delete_SP);echo "</br></br>";
          echo "price bonus: ";print_r($price_SP);echo "</br></br>";
          // exit();
          $length_idtrSP = count($idtrSP);
          $length_priceSP = count($price_SP);
          $total = 0;
          for ($i=0; $i < $length_idtrSP; $i++) {
            $alreadyAssgn_SP = $this->madmin->getProducts(array('id' => $idtrSP[$i]), NULL, 'tr_special_package', TRUE);
            if (! isset($alreadyAssgn_SP)) {
              $addNewBonus = array(
                'id_specialPkg'   => $idSpecialPkg,
                'id_prod_package' => $idProdSize_SP[$i],
                'quantity'        => $qty_SP[$i],
                'subtotal'        => $price_SP[$i]
              );
              $this->madmin->inputData('tr_special_package', $addNewBonus);
            }else{
              if ($delete_SP[$i] == 1) {
                $this->madmin->deleteData(array('id' => $idtrSP[$i]), 'tr_special_package');
              }else{
                $updateBonus = array(
                  'id_specialPkg'   => $idSpecialPkg,
                  'id_prod_package' => $idProdSize_SP[$i],
                  'quantity'        => $qty_SP[$i],
                  'subtotal'        => $price_SP[$i]
                );
                $this->madmin->updateData(array('id' => $idtrSP[$i]), 'tr_special_package', $updateBonus);
              }
            }
          }

          for ($i=0; $i < $length_priceSP; $i++) {
            if ( $delete_SP[$i] != 1) {
              $total += $price_SP[$i];
            }
          }
          $this->madmin->updateData(array('id' => $idSpecialPkg), 'tm_special_package', array('total' => $total));

          $hasImg_SP = $this->madmin->getProducts(array('id' => $idSpecialPkg), array('img' => 'image'), 'tm_special_package', TRUE);
          if ($hasImg_SP['image'] != NULL) {
            $update_SP = array(
              'name'        => $name_SP,
              'slugs'       => $slugs_SP,
              'description' => $desc_SP
              // 'active'
              // 'deleted'
              // 'Total'
            );
            $this->madmin->updateData(array('id' => $idSpecialPkg), 'tm_special_package', $update_SP);
            $this->madmin->updateData(array('special' => $idSpecialPkg), 'tr_product_size', array('sku' => $sku_SP));
            redirect('admin/detailSpecialPackage/'.$idSpecialPkg);
          }else {
            $file_name = strtolower('special_package-'.$name_SP);

            $config['upload_path'] = './asset/upload/special-package';
            $config['allowed_types'] = 'jpg|jpeg|png|svg';
            $config['file_name']  = $file_name;

            $this->load->library('upload', $config);

            if (! $this->upload->do_upload('imageSP')) {
              $this->session->set_flashdata('error', $this->upload->display_errors());
              redirect('admin/edit_special/'.$idSpecialPkg);
            }else{
              $upload_name = $this->upload->data('file_name');
              $update_SP = array(
                'name'        => $name_SP,
                'slugs'       => $slugs_SP,
                'image'       => $upload_name,
                'description' => $desc_SP
                // 'active'
                // 'deleted'
                // 'Total'
              );
              $this->madmin->updateData(array('id' => $idSpecialPkg), 'tm_special_package', $update_SP);
              $this->madmin->updateData(array('special' => $idSpecialPkg), 'tr_product_size', array('sku' => $sku_SP));
              redirect('admin/detailSpecialPackage/'.$idSpecialPkg);
            }
          }
          exit();
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
    }else{
      $this->load->view('include/header2');
      $this->load->view('un-authorise');
      $this->load->view('include/footer');
    }
  }

  public function checkingEditSPName($editSPName){
    $idSP = $this->input->post('idSP');
    $hasEditSPName = $this->madmin->getProducts(array('id !=' => $idSP, 'name' => $editSPName), array('nameF' => 'name'), 'tm_special_package', TRUE);
    if (isset($hasEditSPName)) {
      $this->session->set_flashdata('error', 'Special Package name has already been created');
      return FALSE;
    }else {
      return TRUE;
    }
  }

  // public function checkingSPName($name){
  //   if ($this->session->userdata('uType') == 1) {
  //     $idSP = $this->input->post('idSP');
  //     $SP_name = $this->madmin->getProducts(array('id !=' => $idSP, 'name' => $name), array('nameField' => 'name'),
  //       'tm_product', TRUE);
  //     if (isset($SP_name)) {
  //       $this->session->set_flashdata('error',
  //       'Special package name has already been created or special package name sam as product name');
  //       return FALSE;
  //     }else {
  //       return TRUE;
  //     }
  //   }
  // }

  public function deleteSP_img($idSpecialPkg){
    if ($this->session->userdata('uType') == 1) {
      $img = $this->madmin->getProducts(array('id' => $idSpecialPkg), array('img' => 'image'),
        'tm_special_package', TRUE);
      if (isset($img)) {
        $this->madmin->updateData(array('id' => $idSpecialPkg), 'tm_special_package', array('image' => NULL));
        unlink('./asset/upload/special-package/'.$img['image']);
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
    $id_store = $this->session->userdata('uId');

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

    public function delete_prod_image($img, $id) {
        if ($this->session->userdata('uType') == 1) {
            $image_data = $this->madmin->getProducts(array('id_prod' => $id), array('img' => $img),
                'tr_product_image', TRUE);
            if (isset($img)) {
                $this->madmin->updateData(array('id_prod' => $id), 'tr_product_image', array($img => NULL));
//                unlink('./asset/upload/special-package/'.$image_data['image']);
                redirect('admin/editProd/'.$id);
            }
        }else {
            $this->load->view('include/header2');
            $this->load->view('un-authorise');
            $this->load->view('include/footer');
        }

        $this->madmin->updateData(array('id_prod' => $id), 'tr_product_image', array($img => 'NULL'));
//        switch ($img) {
//            case "image_1":
//                $this->madmin->updateData(array('id_prod' => $id), 'tr_product_image', array($img => 'NULL'));
//                break;
//            case "image_2":
//                $this->madmin->updateData(array('id_prod' => $id), 'tr_product_image', array($img => 'NULL'));
//                break;
//            case "image_3":
//                $this->madmin->updateData(array('id_prod' => $id), 'tr_product_image', array($img => 'NULL'));
//                break;
//        }
    }

    public function delete_best_seller($id) {
		if ($this->session->userdata('uType') == 1) {
			$this->madmin->deleteData(array('id' => $id), 'tr_product_best_seller');
			redirect('admin/bestSeller');
		}else{
			$this->load->view('include/header2');
			$this->load->view('un-authorise');
			$this->load->view('include/footer');
		}
	}

}
