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
          $id_userLogin = $this->session->userdata('uId');
          $data['post'] = $this->mhome->getDataIndex($link);
          $data['prime'] = $this->mhome->dataPrime($id_userLogin);

          $this->load->view('include/admin/header');
          $this->load->view('include/admin/left-sidebar');
          $this->load->view('admin/detail_store', $data);
          $this->load->view('include/admin/footer');
        }
      }
    } elseif ($this->session->userdata('uType') == 3) {
      if ($this->session->userdata('uNew') == 1) {
        $this->load->view('include/header');
        $this->load->view('new_user');
        $this->load->view('include/footer');
      }else{
        $this->load->view('include/header');
        $this->load->view('store');
        $this->load->view('include/footer');
      }
    } elseif ($this->session->userdata('uType') == 4) {
      $this->load->view('include/header');
      $this->load->view('home');
      $this->load->view('include/footer');
    } elseif ($this->session->userdata('uType') == NULL) {
      $this->load->view('include/header');
      $this->load->view('home');
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
      show_404();
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
      show_404();
    }
  }

  public function sa_brand($link = FALSE, $add = FALSE){
    if ($this->session->userdata('uType') == 1) {
      if ($link === FALSE) {
        $data['brands'] = $this->mhome->getProducts(NULL, NULL, 'tm_brand', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/sa_brand', $data);
        $this->load->view('include/admin/footer');
      }elseif($add === FALSE){
        $test=[];
        $data['brand'] = $this->mhome->getProducts(array('id' => $link),
          array('nameField' => 'name', 'idField' => 'id'), 'tm_brand', TRUE);
        $dBrand['id'] = $this->mhome->getProducts(array('brand_id' => $link),
          array('catIdField' => 'cat_id'), 'relation_brand_category', FALSE);
        foreach ($dBrand['id'] as $id) {
          $tst = $this->mhome->getProducts(array('id' => $id['cat_id']),
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
          $data['brand'] = $this->mhome->getProducts(array('id' => $link),
            array('nameField' => 'name', 'idField' => 'id'), 'tm_brand', TRUE);
          $data['add'] = 'true';
          $data['cat'] = $this->mhome->getProducts(NULL,
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
          $this->mhome->inputData($table, $item);
          redirect('home/sa_brand/'.$link);
        }
      }
    }else{
      show_404();
    }
  }

  public function checkingRel($rel) {
    $relCat = $this->mhome->getProducts(array('brand_id' => $this->input->post('brand'), 'cat_id' => $this->input->post('cat')),
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
        $this->mhome->createItems('tm_brand');
        redirect('home/sa_brand');
      }
    }else{
      show_404();
    }
  }

  public function checkingBrand($brand){
    $has_brand = $this->mhome->getProducts(array('name' => $brand),
      array('nameField' => 'name'), 'tm_brand', TRUE);
    if(isset($has_brand)){
      $this->session->set_flashdata('error', 'Brand has already been created');
      return FALSE;
    }else{
      return TRUE;
    }
  }

  public function sa_agmpedia()
  {
    if ($this->session->userdata('uType') == 1) {
      $data['pedia'] = $this->mhome->getPedia();

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_agmpedia', $data);
      $this->load->view('include/admin/footer');  
      }else {
        show_404();
       } 
  }

  public function addPedia()
  {
    if ($this->session->userdata('uType')== 1) {
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/addPedia');
      $this->load->view('include/admin/footer');
    } else {
      show_404();
    }
  }

  public function pediaInputProcess()
  {
    if ($this->session->userdata('uType')== 1) {
      $config['upload_path']          = './uploads/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 10240;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('photo'))
                {
                        $this->session->set_flashdata('error', $this->upload->display_errors());

                        redirect(base_url('home/addPedia'));
                }
                else
                {
                    $data = array(
            'title'=>$this->input->post('title'),
            'content'=>$this->input->post('content'),
            'date'=>date('Ymd'),
            'photo'=>$this->upload->data('file_name')
          );

          $this->mhome->pediaInput($data);

          $this->session->set_flashdata('success','Data saved successfully!');
          redirect(base_url('home/sa_agmpedia'));
                }
    } else {
      show_404();
    }
  }

  public function editPedia($id)
  {
    if ($this->session->userdata('uType')== 1) {
      $data['pedia'] = $this->mhome->getPediaByID($id);
      $this->load->helper('form');
      $this->load->library('form_validation');

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/editPedia',$data);
      $this->load->view('include/admin/footer');
    } else {
      show_404();
    }
  }

  public function pediaEditProcess($id)
  {
    if ($this->session->userdata('uType')==1) {
      $config['upload_path']          = './uploads/';
      $config['allowed_types']        = 'gif|jpg|png';
      $config['max_size']             = 10240;
         
          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload('photo'))
          {
            $data = array(
              'title'=>$this->input->post('title'),
              'content'=>$this->input->post('content'),
              'date'=>date('Ymd'),
              'photo'=>$this->input->post('oldPhoto')
            );

          $this->mhome->updatePedia($id,$data);
          $this->session->set_flashdata('success','Data successfully updated!');
          redirect(base_url('home/sa_agmpedia'));
          }
          else
          {
            $data = array(
              'title'=>$this->input->post('title'),
              'content'=>$this->input->post('content'),
              'date'=>date('Ymd'),
              'photo'=>$this->upload->data('file_name')
            );

          $this->mhome->updatePedia($id,$data);

          $this->session->set_flashdata('success','Data successfully updated!');
          redirect(base_url('home/sa_agmpedia'));
                }
    } else {
      show_404();
    }
  }

  public function deletePedia($id)
  {
    if ($this->session->userdata('uType')== 1 ) {
      $photo = $this->mhome->getPediaByID($id);
      foreach ($photo->result() as $row) {
        echo $nm_photo = $row->photo;
      }

      unlink("uploads/".$nm_photo."");
      
      $this->mhome->deletePedia($id);

      $this->session->set_flashdata('success','Data deleted successfully!');

      redirect(base_url('home/sa_agmpedia'));
    } else {
      show_404();
    }    
  }

  public function agmpedia()
  {
    $data['pedia'] = $this->mhome->getPedia();
    $this->load->view('include/header');
    $this->load->view('agmpedia',$data);
    $this->load->view('include/footer');
  }

  public function sa_cat(){
    if ($this->session->userdata('uType') == 1) {
      $data['categories'] = $this->mhome->getProducts(NULL, NULL, 'tm_category', FALSE);

      $this->load->view('include/admin/header');
      $this->load->view('include/admin/left-sidebar');
      $this->load->view('admin/sa_cat', $data);
      $this->load->view('include/admin/footer');
    }else {
      show_404();
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
        $this->mhome->createItems('tm_category');
        redirect('home/sa_cat');
      }
    }
  }

  public function checkingCat($category){
    $has_cat = $this->mhome->getProducts(array('name' => $category),
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
        $data['products'] = $this->mhome->getProducts(NULL, NULL, 'tm_product', FALSE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/allProd', $data);
        $this->load->view('include/admin/footer');
      }else{
        $data['product'] = $this->mhome->getProducts(array('id' => $link),
          NULL, 'tm_product', TRUE);

        $this->load->view('include/admin/header');
        $this->load->view('include/admin/left-sidebar');
        $this->load->view('admin/prodDetail', $data);
        $this->load->view('include/admin/footer');
      }
    }else{
      show_404();
    }
  }
  // public function addProd(){
  //   if ($this->session->userdata('uType') = 1) {
  //     $this->load->helper('form');
  //     $this->load->library('form_validation');
  //
  //     $this->form_validation->set_rules();
  //     $this->form_validation->set_rules();
  //     $this->form_validation->set_rules();
  //     $this->form_validation->set_rules();
  //     $this->form_validation->set_rules();
  //     $this->form_validation->set_rules();
  //
  //     if ($this->form_validation->run() === FALSE) {
  //       $this->load->view('include/admin/header');
  //       $this->load->view('include/admin/left-sidebar');
  //       $this->load->view('admin/addProd');
  //       $this->load->view('include/admin/footer');
  //     }else{
  //       $config['upload_path']    = './asset/upload/';
  //       $config['allowed_types']  = 'jpg|jpeg|png|JPG|JPEG|PNG';
  //       $config['max_size']       = '100000';
  //       $config['file_ext_tolower']   = TRUE;
  //       // $config['file_name']
  //       $this->load->helper('upload');
  //     }
  //   }else{
  //     show_404();
  //   }
  // }

}
