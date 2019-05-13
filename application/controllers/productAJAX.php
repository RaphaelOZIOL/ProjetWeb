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

  public function create_product(){
    $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
    if($mail==null){
      redirect(site_url("connexion"));
    }
    $result = $this->product_model->create_product();
    echo json_encode($result,JSON_UNESCAPED_SLASHES);
  }

}
