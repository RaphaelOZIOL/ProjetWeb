<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');

class Book extends ADMINISTRATOR_Controller
{

  public function __construct()
	{
		parent::__construct();
    $this->load->model('book_model');
	}

public function index(){
  $data['isAdmin']=parent::get_is_Admin();
  if($data['isAdmin']==1){
    $this->list_book();
  }
  else if($data['isAdmin']==2){
    $this->list_book_all_admin();
  }
  else{
    redirect(site_url("connexion"));
  }
}

public function book_product(){
  //var_dump($_POST);
  $data1['isAdmin']=parent::get_is_Admin();
      if(!isset($_POST['idProd'])){
        redirect(site_url("connexion"));
      }
      else{
        $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
        if($mail==null){
          redirect(site_url("connexion"));
        }

        $idProd = htmlspecialchars($_POST['idProd']);
        $data= $this->book_model->book_product($mail,$idProd);
        //$this->list_book();


      }
      echo json_encode($data1);
}

  public function list_book(){
    $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
    if($mail==null){
      redirect(site_url("connexion"));
    }
    else{
      $data['list_book']= $this->book_model->get_book_user($mail);

      $data1['isAdmin']=parent::get_is_Admin();

      $this->load->view("header",$data1);

      $this->load->view("list_book",$data);
    }
  }

  public function list_book_all_admin(){
    $data1['isAdmin']=parent::get_is_Admin();
    $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
    if($mail==null && $data1['isAdmin']!=2){
      redirect(site_url("connexion"));
    }
    else{
      $data['list_book']= $this->book_model->get_book_all_user();

// A CHANGER HEADER
      $this->load->view("header",$data1);
      $this->load->view("list_book_admin",$data);
    }
  }


/*  public function list_product(){
    $produits=array();
		$produits[0]= $this->product_model->get_list_product();
    $produits[1]=parent::get_is_Admin();

    echo json_encode($produits,JSON_UNESCAPED_SLASHES);
  }
*/
/*
  public function product_info($idProd){
    $produit= $this->product_model->get_product_Id($idProd);
    echo json_encode($produit,JSON_UNESCAPED_SLASHES);
  }

  public function afficher_idProd(){
    echo json_encode($_GET['id_Prod'],JSON_UNESCAPED_SLASHES);
  }
*/


}
