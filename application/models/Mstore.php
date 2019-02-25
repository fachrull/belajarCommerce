<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * This Model for Store owner only
 */
class Mstore extends CI_Model{

  function __construct(){
    parent::__construct();

    $this->load->database();
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

  public function updateData($id, $data, $table){
    $this->db->where($id);
    $this->db->set($data);
    $this->db->update($table);
  }

  public function deletePedia($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('tm_agmpedia');
  }

  public function inputData($table, $items){
    return $this->db->insert($table, $items);
  }

  public function productAcceptStore($store_id){
    $this->db->select('*');
    $this->db->join('tm_product b', 'b.id = a.id_product', 'left');
    $this->db->from('tr_product a');
    $where = array('a.id_store'=>$store_id);
    $this->db->where($where);
    $query = $this->db->get();
    if($query->num_rows() != 0){
      return $query->result_array();
    }else{
      return FALSE;
    }
  }

  public function detailProd($idStore, $idProd){
    $this->db->select('*');
    $this->db->from('tm_product a');
    $this->db->join('tr_product b', 'b.id_product = a.id', 'left');
    $where = array('b.id_product' => $idProd,'b.id_store'=>$idStore, 'b.new'=>0);
    $this->db->where($where);
    $query = $this->db->get();
    if($query->num_rows() != 0){
      return $query->result_array();
    }else{
      return FALSE;
    }
  }

  public function detailProdBrand($idProd){
    $this->db->select('a.name as brand_name, c.name as cat_name');
    $this->db->from('tm_brands a');
    $this->db->join('tm_product b', 'b.brand_id = a.id', 'left');
    $this->db->join('tm_category c', 'c.id = b.cat_id', 'left');
    $where = array('b.id' => $idProd);
    $this->db->where($where);
    $query = $this->db->get();
    if($query->num_rows() != 0){
      return $query->result_array();
    }else{
      return FALSE;
    }
  }

  public function detailProdSpec($idProd){
    $this->db->select('a.name as spec_name');
    $this->db->from('tm_spec as a');
    $this->db->join('tr_product_spec b', 'b.spec_id = a.id', 'left');
    $where = array('b.prod_id' => $idProd);
    $this->db->where($where);
    $query = $this->db->get();
    if($query->num_rows() != 0){
      return $query->result_array();
    }else{
      return FALSE;
    }
  }
}
