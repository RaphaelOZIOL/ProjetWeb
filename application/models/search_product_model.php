<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_product_model extends CI_Model
{
  protected $table = 'product';

  public function search_product($write){
    $this->db->select('*');
    $this->db->from('product');
    $this->db->like('nameProd', $write, 'after');
    $result = $this->db->get();
    return $result->result();
  }
  public function search_all_product(){
    $this->db->select('*');
    $this->db->from('product');
    $result = $this->db->get();
    return $result->result();
  }

}
