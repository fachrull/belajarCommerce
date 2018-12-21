<?php defined('BASEPATH') or Exit('No direct script access allowed');

/**
 * this is class model for home
 */
class Mhome extends CI_Model{

  function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function dataStores($id = FALSE){
    if($id === FALSE){
      $query = $this->db->get_where('user', array('user_type' => 2));
      return $query->result_array();
    }else{
      $query = $this->db->get_where('user', array('user_id' => $id));
      return $query->row_array();
    }
  }
}
