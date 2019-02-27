<?php defined('BASEPATH') or Exit('No direct script access allowed');

/**
 * this is class model for home
 */
class Mhome extends CI_Model{

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function getDataIndex($id = FALSE){
    if($this->session->userdata('uType') == 1){
      if($id === FALSE){
        $query = $this->db->get('tm_super_admin');
        return $query->result_array();
      }else{
        $query = $this->db->get_where('tm_super_admin', array('id' => $id));
        return $query->row_array();
      }
    } elseif ($this->session->userdata('uType') == 2) {
      if($id === FALSE){
        $query = $this->db->get('tm_store_owner');
        return $query->result_array();
      }else{
        $query = $this->db->get_where('tm_store_owner', array('id' => $id));
        return $query->row_array();
      }
    }
  }

  public function dataPrime($id = NULL){
    $this->db->select(array('emailField' => 'email'));
    $query = $this->db->get_where('user_login', array('user_id' =>$id));
    return $query->row_array();
  }

  public function getProducts($condition = NULL, $selection = NULL, $table, $singleRowResult =  FALSE){
    if ($condition != NULL) {
      foreach ($condition as $key => $value) {
        $this->db->where($key, $value);
      }
    }

    if ($selection != NULL) {
      foreach ($selection as $key => $value) {
        $this->db->select($value);
      }
    }

    $query =  $this->db->get($table);

    if ($singleRowResult === TRUE) {
      return $query->row_array();
    }else {
      return $query->result_array();
    }
  }

  public function createItems($table){
    $id_creator = $this->session->userdata('uId');
    $items = array(
      'name'            => $this->input->post('items'),
      'id_super_admin'  => $id_creator
    );
    return $this->db->insert($table, $items);
  }

  public function getPedia()
  {
    return $this->db->get('tm_agmpedia');
  }

  public function pediaInput($data)
  {
    $this->db->insert('tm_agmpedia',$data);
  }

  public function getPediaByID($id)
  {
    $this->db->where('id',$id);
    return $this->db->get('tm_agmpedia');
  }

  public function updatePedia($id,$data)
  {
    $this->db->where('id',$id);
    $this->db->set($data);
    $this->db->update('tm_agmpedia');
  }

  public function updateData($condition, $data, $table){
    if ($condition != NULL) {
      foreach ($condition as $key => $value) {
        $this->db->where($key, $value);
      }
    }
    $this->db->set($data);

    return $this->db->update($table);
  }

  public function deletePedia($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('tm_agmpedia');
  }

  public function inputData($table, $items){
    return $this->db->insert($table, $items);
  }

  public function joinStoreProd($store_id){
    $this->db->select('*');
    $this->db->from('tm_product a');
    $this->db->join('tr_product b', 'b.id_product = a.id', 'left');
    $where = array('b.id_store'=>$store_id, 'b.new'=>1);
    $this->db->where($where);
    $query = $this->db->get();
    if($query->num_rows() != 0){
      return $query->result_array();
    }else{
      return FALSE;
    }
  }

  public function brand_categories($brand){
    $this->db->select('a.id, a.name');
    $this->db->from('tm_category a');
    $this->db->join('tm_product b', 'b.cat_id = a.id', 'left');
    $where = array('b.brand_id' => $brand);
    $this->db->where($where);
    $this->db->group_by('b.cat_id');
    $query = $this->db->get();
    if ($query->num_rows() != 0) {
      return $query->result_array();
    } else {
      return FALSE;
    }
  }

  public function getProduct_price($brand, $category){
    $this->db->select('MAX(a.price) as max_price, MIN(a.price)as min_price, b.name, b.id, b.image');
    $this->db->from('tr_product_size a');
    $this->db->join('tm_product b', 'b.id = a.prod_id', 'left');
    $where = array('b.brand_id' => $brand, 'b.cat_id' => $category);
    $this->db->where($where);
    $this->db->group_by('a.prod_id');
    $query = $this->db->get();
    if ($query->num_rows() != 0) {
      return $query->result_array();
    } else {
      return FALSE;
    }
  }

  public function getProduct_MaxMinPrice($idProduct){
    $this->db->select('MAX(a.price) as max_price, MIN(a.price) as min_price, b.name, b.id, b.brand_id, b.cat_id,
      b.description, b.image');
    $this->db->from('tr_product_size a');
    $this->db->join('tm_product b', 'b.id = a.prod_id', 'left');
    $this->db->where('b.id', $idProduct);
    $query = $this->db->get();
    if ($query->num_rows() != 0) {
      return $query->row_array();
    } else {
      return FALSE;
    }
  }

  public function fetch_kabupaten($idProvince){
    $this->db->where('id_prov', $idProvince);
    $query = $this->db->get('kabupaten');
    $output = '<option value="">Pilih Kabupaten</option>';
    foreach ($query->result() as $row) {
      $output .= '<option value="'.$row->id_kab.'">'.$row->nama.'</option>';
    }
    return $output;
  }

  public function checkStock_by_Distcit($idProd, $idDistrict){
      $this->db->select('a.id_store, a.id_product, a.id_product_size, d.id, a.quantity, c.price, d.name, d.size');
      $this->db->from('tr_product a');
      $this->db->join('tm_store_owner b', 'b.id = a.id_store', 'left');
      $this->db->join('tr_product_size c', 'c.id = a.id_product_size', 'left');
      $this->db->join('tm_size d', 'd.id = c.size_id', 'left');
      $this->db->group_by('a.id_product_size');
      $where = array('b.sub_district' => $idDistrict, 'a.id_product' => $idProd);
      $this->db->where($where);
      $query = $this->db->get();
    if ($query->num_rows() != 0) {
      return $query->result_array();
    } else {
      return FALSE;
    }
  }

  public function sizeStock($id_stock_tr){
      $this->db->select('a.name as name_size, a.size as detail_size');
      $this->db->from('tm_size a');
      $this->db->join('tr_product_size c', 'c.size_id = a.id', 'left');
      $this->db->where('c.id', $id_stock_tr);
      $query = $this->db->get();
      if($query->num_rows()!=0){
          return $query->result_array();
      }else{
          return FALSE;
      }
  }

  public function listOrderCustomer($idUserLogin){
    $this->db->select('a.id, a.order_number, a.quantity, a.total, a.order_date, c.name, c.image, d.class, d.status');
    $this->db->from('tm_order a');
    $this->db->join('tr_product b', 'b.id = a.id_trProduct', 'left');
    $this->db->join('tm_product c', 'c.id = b.id_product', 'left');
    $this->db->join('tm_status_order d', 'd.id = a.status_order', 'left');
    $where = array('id_userlogin' => $idUserLogin);
    $this->db->where($where);
    $query = $this->db->get();
    if ($query->num_rows() != 0) {
      return $query->result_array();
    } else {
      return FALSE;
    }
  }

  public function detailOrder($idOrder, $idCustomer){
    $this->db->select('a.id, a.order_number, a.quantity, a.total, a.order_date, c.name, c.image, d.class, d.status,
      f.username, f.company_name, f.phone, f.address, f.postcode, g.nama as provinsi, h.nama as kabupaten, i.nama as kecamatan,
      k.name as size_name, k.size');

    $this->db->from('tm_order a');
    $this->db->join('tr_product b', 'b.id = a.id_trProduct', 'left');
    $this->db->join('tm_product c', 'c.id = b.id_product', 'left');
    $this->db->join('tm_status_order d', 'd.id = a.status_order', 'left');
    $this->db->join('tm_customer_detail f', 'f.id = a.address_detail', 'left');
    $this->db->join('provinsi g', 'g.id_prov = f.province', 'left');
    $this->db->join('kabupaten h', 'h.id_kab = f.city', 'left');
    $this->db->join('kecamatan i', 'i.id_kec = f.sub_district', 'left');
    $this->db->join('tr_product_size j', 'j.id = b.id_product_size', 'left');
    $this->db->join('tm_size k', 'k.id = j.size_id', 'left');
    $where = array('a.id' => $idOrder, 'a.id_userLogin' => $idCustomer);
    $this->db->where($where);
    $query = $this->db->get();
    if ($query->num_rows() != 0) {
      return $query->row_array();
    } else {
      return FALSE;
    }
  }
}
