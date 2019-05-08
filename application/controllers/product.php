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
		$this->welcome();
	}

  public function welcome()
	{
    $this->load->view('welcomePage');
	}


  public function list_product(){
    $this->load->model('product_model');
    $produits=array();
		$produits['list_product'] = $this->product_model->get_list_product();
    $nbProduit=$this->product_model->countProduct();

    if($nbProduit>=4){
      $produits['nbProd']=$nbProduit/4;
    }
    else{
      $produits['nbProd']=1;
    }
    $this->load->view('listProduct',$produits);
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
