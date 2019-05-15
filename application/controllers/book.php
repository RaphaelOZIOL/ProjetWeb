<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');

class Book extends ADMINISTRATOR_Controller
{

  public function __construct()
	{
		parent::__construct();
    $this->load->model('book_model');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
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
        //redirect(site_url("connexion"));
        echo json_encode($data1);

      }
      else{

        /*$rules = array(
            array(
                'field' => 'quantityProduct',
                'label' => 'Quantité à réserver :',
                'rules' => 'min=1'
            )

        );

        $this->form_validation->set_rules($rules);


        if ($this->form_validation->run() == FALSE)
        {
          $data1['form_not_valid']=true;
          echo json_encode($data1);
        }*/
        //else{
          $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
          if($mail!=null && $data1['isAdmin']==1){
            //redirect(site_url("connexion"));
              $date = new DateTime();
              $seven_day  = mktime(0, 0, 0, date("m")  , date("d")+7, date("Y"));
              $date_end_post = $_POST['dateDay'];
              if($seven_day < strtotime($date_end_post)){
                $data1['TooLate']=true;
                echo json_encode($data1);
              }
              else{
                $data1['TooLate']=false;
                $idProd = htmlspecialchars($_POST['idProd']);
                $data= $this->book_model->book_product($mail,$idProd);
                echo json_encode($data1);

              }
            }
            //Not shopper
            echo json_encode($data1);

      //  }

        //$this->list_book();
      }
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

  public function delete_book($data_book){
    var_dump($data_book);
  }



}
