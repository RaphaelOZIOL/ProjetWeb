<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_controller.php');

class Productajax extends Administrator_controller
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

  public function product_info_admin()
	{
    $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
    if($mail==null){
      redirect(site_url("connexion"));
    }
    //$result;
    //if(isset($_GET['IdCat'])){intval($_GET['IdCat'])
  		$result= $this->product_model->get_product_cat(intval($_GET['IdProd']));
    //}

    echo json_encode($result,JSON_UNESCAPED_SLASHES);

	}


  public function afficher_idProd(){
    echo json_encode($_GET['id_Prod'],JSON_UNESCAPED_SLASHES);
  }



}
