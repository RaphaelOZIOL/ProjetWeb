<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
    $this->load->model('product_model');
	}

  public function index()
	{
    $this->load->view('header');
		$this->welcome();
	}

  public function welcome()
	{
    $this->load->view('welcomePage');
	}


  public function list_product(){
    $produits=array();
		$produits= $this->product_model->get_list_product();
    echo json_encode($produits);
  }

  public function product_info($idProd){
    $produit= $this->product_model->get_product_Id($idProd);
    echo json_encode($produit);
  }

  public function afficher_idProd(){
    echo json_encode($_GET['id_Prod']);
  }


/*  public function descriptionProduit($idProduit){
    $this->load->model('product_model');
    $produits=array();
		$produits['product'] = $this->product_model->get_list_product();
    $nbProduit=$this->product_model->countProduct();

    if($nbProduit>=4){
      $produits['nbProd']=$nbProduit/4;
    }
    else{
      $produits['nbProd']=1;
    }
    $this->load->view('listProduct',$produits);
  }
  */
}
