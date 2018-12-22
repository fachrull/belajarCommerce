<?php defined('BASEPATH') or Exit('No direct script access allowed');
/**
 * this is class for authinfication
 */
class Mauth extends CI_Model{

  function __construct(){
    $this->load->database();
  }

  // public function createDummyUser(){
  //   $data = array(
  //     'username'      => 'admin',
  //     'password'      => password_hash('cr34t3p4ssw0rd', PASSWORD_DEFAULT),
  //     'email'         => 'admin@keraton.com',
  //     'company_name'  => 'keraton',
  //     'user_type'     => '1',
  //   );
  //   $this->db->insert('user',$data);
  // }

  public function getData($condition=NULL, $selection=NULL, $singleRowResult = FALSE){

    // if we are selecting some condition
    if ($condition != NULL) {
      foreach($condition as $key => $value){
        $this->db->where($key, $value);
      }
    }

    // if we are selection some http_post_fields
    if ($selection != NULL) {
      foreach ($selection as $key => $value) {
        $this->db->select($value);
      }
    }

    $query = $this->db->get('user');

    if ($singleRowResult === TRUE) {
      return $query->row();
    } else {
      return $query->result();
    }
  }

  public function regis(){
    if ($this->session->userdata('uType') == NULL) {
      $uType = 3;
      $data = array(
        'username'      => $this->input->post('uname'),
        'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        'email'         => $this->input->post('email'),
        'company_name'  => $this->input->post('company'),
        'user_type'     => $uType
      );
      return $this->db->insert('user', $data);
    } elseif($this->session->userdata('uType') == 1) {
        $uType = 2;
        $data = array(
          'username'      => $this->input->post('uname'),
          'password'      => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'email'         => $this->input->post('email'),
          'company_name'  => $this->input->post('company'),
          'user_type'     => $uType,
          'user_add1'     => $this->input->post('add1'),
          'user_add2'     => $this->input->post('add2'),
          'postcode'      => $this->input->post('pCode'),
          'city'          => $this->input->post('city'),
          'province'      => $this->input->post('province'),
          'country'       => $this->input->post('country'),
          'region'        => $this->input->post('region'),
          'phone1'        => $this->input->post('phone1'),
          'phone2'        => $this->input->post('phone2')
        );
        return $this->db->insert('user', $data);
    }
  }
}
