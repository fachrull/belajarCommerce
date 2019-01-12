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

  public function deletePedia($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('tm_agmpedia');
  }

  public function inputData($table, $items){
    return $this->db->insert($table, $items);
  }
}
