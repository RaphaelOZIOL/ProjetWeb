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

  public function get_product_Id($idProd)
	{
    $this->db->select('*');
    $this->db->from('product');
    $this->db->where(array('IdProd' => $idProd));
    $query = $this->db->get()->result();
    return $query;
	}

  public function get_product_cat($idProd)
	{
    $this->db->select('*');
    $this->db->from('product');
    $this->db->join('category', 'category.IdCat = product.IdCat');
    $this->db->where(array('product.IdProd' => $idProd));
    $query = $this->db->get()->result();
    return $query;
	}

  public function get_product_only_id()
	{
    $this->db->select('IdProd');
    $this->db->from('product');
    $this->db->where(array('nameProd' => $_POST['nameProd'],
                            'compoProd' => $_POST['compoProd']));
    $query = $this->db->get()->result();
    return $query;

	}

  public function create_product(){
    $data = array(
            'nameProd'  => htmlspecialchars($_POST['nameProd']),
            'price'  => htmlspecialchars($_POST['price']),
            'quantityStock' => htmlspecialchars($_POST['quantityStock']),
            'compoProd' => htmlspecialchars($_POST['compoProd']),
            //'srcImg'  => base_url()."assets/images/product/".$idProd.".png",
            'IdCat' => htmlspecialchars($_POST['IdCat']),
        );
    $result=$this->db->insert($this->table,$data);
    return $result;
  }

  public function update_product_only_img($idProd)
  {
    $data = array(
      'srcImg'  => base_url()."assets/images/product/".$idProd.".png",
        );
    $this->db->where('IdProd', $idProd);
    $result=$this->db->update($this->table,$data);
    if(isset($result)){
        return $result;
    }
    return false;
  }

  public function update_product_without_img($idProd)
  {
    $data = array(
      'nameProd'  => htmlspecialchars($_POST['nameProd']),
      'price'  => htmlspecialchars($_POST['price']),
      'quantityStock' => htmlspecialchars($_POST['quantityStock']),
      'compoProd' => htmlspecialchars($_POST['compoProd']),
      'IdCat' => htmlspecialchars($_POST['IdCat']),
        );
    $this->db->where('IdProd', $idProd);
    $result=$this->db->update($this->table,$data);
    if(isset($result)){
        return $result;
    }
    return false;
  }

  public function update_product($idProd)
	{
    $data = array(
            'nameProd'  => htmlspecialchars($_POST['nameProd']),
            'price'  => htmlspecialchars($_POST['price']),
            'quantityStock' => htmlspecialchars($_POST['quantityStock']),
            'compoProd' => htmlspecialchars($_POST['compoProd']),
            'IdCat' => htmlspecialchars($_POST['IdCat']),
            'srcImg'  => base_url()."assets/images/product/".$idProd.".png",
        );
    $this->db->where('IdProd', $idProd);
    $result=$this->db->update($this->table,$data);
    if(isset($result)){
        return $result;
    }
    return false;
  }

  public function delete_product($idProd){
    $this->db->where('IdProd', $idProd);
    $result =$this->db->delete('product');
    if(isset($result)){
        return $result;
    }
    return false;
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
			$this->db->set('quantityStock', $quantity);
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
