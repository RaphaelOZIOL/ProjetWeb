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


public function book_product(){
      if(!isset($_POST['idProd'])){
        redirect(site_url("connexion"));
      }
      else{
        $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
        if(!isset($mail)){
          redirect(site_url("connexion"));
        }
        $idUser=$this->shopper_model->_getUser_id($mail);
        $idUser=intval($idUser->IdUser);

        $idProd = htmlspecialchars($_POST['idProd']);

        $data= $this->book_model->book_product($idUser,$idProd);
        $this->list_book();
      }
}

  public function list_book(){
    $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
    if($mail==null){
      redirect(site_url("connexion"));
    }
    else{
      $idUser=$this->shopper_model->_getUser_id($mail);
      $idUser=intval($idUser->IdUser);
      $data['list_book']= $this->book_model->get_book_user($idUser);

      $data1['isAdmin']=parent::get_is_Admin();

      $this->load->view("header",$data1);

      $this->load->view("list_book",$data);
    }
  }

  public function list_book_all_admin(){
    $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
    if($mail==null){
      redirect(site_url("connexion"));
    }
    else{
      $data['list_book']= $this->book_model->get_book_user($idUser);

      $data1['isAdmin']=parent::get_is_Admin();

      $this->load->view("header",$data1);

      $this->load->view("list_book",$data);
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
