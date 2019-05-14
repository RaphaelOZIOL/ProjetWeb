<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category_model extends CI_Model
{
  protected $table = 'category';

	public function get_list_category()
	{
    return $this->db->select('*')
				->from($this->table)
				->order_by('nameCat', 'desc')
				->get()
				->result();
	}

  public function get_category_by_id($idCat)
	{
    $this->db->select('*');
    $this->db->from('category');
    $this->db->where(array('IdCat' => $idCat));
    $result = $this->db->get()->result();
    if(isset($result)){
        return $result;
    }
    return false;

	}

  public function create_category(){
    $data = array(
            'nameCat'  => htmlspecialchars($_POST['nameCat']),
            'imgSrc'  => base_url()."assets/images/category/".$idCat.".png",
        );
    $result=$this->db->insert($this->table,$data);
    return $result;
  }

  public function update_category_only_name($idCat)
  {
    $data = array(
            'nameCat'  => htmlspecialchars($_POST['nameCat']),
        );
    $this->db->where('IdCat', $idCat);
    $result=$this->db->update($this->table,$data);
    if(isset($result)){
        return $result;
    }
    return false;
  }

  public function update_category($idCat)
	{
    $data = array(
            'nameCat'  => htmlspecialchars($_POST['nameCat']),
            'imgSrc'  => base_url()."assets/images/category/".$idCat.".png",
        );
    $this->db->where('IdCat', $idCat);
    $result=$this->db->update($this->table,$data);
    if(isset($result)){
        return $result;
    }
    return false;
  }

  public function countCategory($where = array())
	{
		return (int) $this->db->where($where)
				      ->count_all_results($this->table);
	}
}
