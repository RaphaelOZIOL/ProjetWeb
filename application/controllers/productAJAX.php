<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');

class ProductAJAX extends ADMINISTRATOR_Controller
{

  public function __construct()
	{
		parent::__construct();
    $this->load->model('product_model');
	}

/* ---------- Functions AJAX -----------*/
  public function list_product(){
    $produits=array();
		$produits[0]= $this->product_model->get_list_product();
    $produits[1]=parent::get_is_Admin();

    echo json_encode($produits,JSON_UNESCAPED_SLASHES);
  }

  public function product_info($idProd){
    $produit= $this->product_model->get_product_Id($idProd);
    echo json_encode($produit,JSON_UNESCAPED_SLASHES);
  }

  public function afficher_idProd(){
    echo json_encode($_GET['id_Prod'],JSON_UNESCAPED_SLASHES);
  }



}
