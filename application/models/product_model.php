<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product_model extends CI_Model
{
  protected $table = 'product';

	public function get_list_product()
	{

    return $this->db->select('*')
				->from($this->table)
				->order_by('idProd', 'desc')
				->get()
				->result();
	}

  public function create_product($namePro,$price,$quantity,$compoProd,$idCat){
    return $this->db->set('nameProd',$namePro)
				->set('price',$price)
				->set('quantity',$quantity)
				->set('compoProd',$compoProd)
        ->set('idCat',$idCat)
				->insert($this->table);
  }

  public function update_product_Name($idProd, $nameProd = null)
	{
		//	Il n'y a rien à éditer
		if($nameProd == null )
		{
			return false;
		}

		if($nameProd != null)
		{
			$this->db->set('nameProd', $nameProd);
		}
  }

  public function update_product_price($idProd, $price = null)
	{
		//	Il n'y a rien à éditer
		if($price == null)
		{
			return false;
		}

		if($price != null)
		{
			$this->db->set('price', $price);
		}
  }

  public function update_product_quantity($idProd, $quantity = null)
	{
		//	Il n'y a rien à éditer
		if($quantity == null )
		{
			return false;
		}

		if($quantity != null)
		{
			$this->db->set('quantity', $quantity);
		}
  }

  public function update_product_compoProd($idProd, $compoProd = null)
	{
		//	Il n'y a rien à éditer
		if($compoProd == null )
		{
			return false;
		}

		if($compoProd != null)
		{
			$this->db->set('compoProd', $compoProd);
		}
  }

  public function update_product_IdCat($idProd, $idCat = null)
	{
		//	Il n'y a rien à éditer
		if($idCat == null )
		{
			return false;
		}

		if($idCat != null)
		{
			$this->db->set('IdCat', $idCat);
		}
  }

  public function countProduct($where = array())
	{
		return (int) $this->db->where($where)
				      ->count_all_results($this->table);
	}
}
