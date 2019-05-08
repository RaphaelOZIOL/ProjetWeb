<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller
{
  public function __construct()
	{
		parent::__construct();
    $this->load->view('header');
	}

  public function index()
	{
    //FAIRE LES loads header et footer
		$this->accueil();
	}

  public function accueil(){
    $this->load->model('product_model');
    $produits=array();
		$produits['list_product'] = $this->product_model->get_list_product();
    $nbProduit=$this->product_model->countProduct();

    //Pour permettre une bonne structuration de 4 produits par ligne sur la view
    if($nbProduit>=4){
      $produits['nbProd']=$nbProduit/4;
    }
    else{
      $produits['nbProd']=1;
    }
    $this->load->view('listProduct',$produits);
  }



}
