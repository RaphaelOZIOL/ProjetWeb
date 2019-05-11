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

  public function create_category($nameCat){
    return $this->db->set('nameCat',$nameCat)
				->insert($this->table);
  }

  public function update_category_Name($idCat, $nameCat = null)
	{
		//	Il n'y a rien à éditer
		if($nameCat == null )
		{
			return false;
		}

		if($nameCat != null)
		{
			$this->db->set('nameCat', $nameCat);
		}
  }

  public function countCategory($where = array())
	{
		return (int) $this->db->where($where)
				      ->count_all_results($this->table);
	}
}
