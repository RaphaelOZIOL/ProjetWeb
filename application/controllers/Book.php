<?php
defined('BASEPATH') OR exit('No direct script access allowed');



include(APPPATH . 'modules/Administrator_controller.php');

class Book extends Administrator_controller
{

  private $reservation_canceled=false;
  private $reservation_admin_done=false;

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
    redirect(site_url("connection"));
  }
}

public function book_product(){
  //var_dump($_POST);
  $data1['isAdmin']=parent::get_is_Admin();

      $this->form_validation->set_rules('quantityProduct', 'Quantité', 'trim|htmlspecialchars|required|numeric');
      $this->form_validation->set_rules('dateDay', 'Jour', 'trim|htmlspecialchars|required');
      $this->form_validation->set_rules('dateHour', 'Heure', 'trim|htmlspecialchars|required');
      $this->form_validation->set_rules('comment', 'Commentaire pour la réservation', 'trim|htmlspecialchars|alpha_numeric_spaces');

      if ($this->form_validation->run() == FALSE)
      {
        echo json_encode("false",JSON_UNESCAPED_SLASHES);
      }
      else{
          $_POST['quantityProduct']= $this->security->xss_clean($_POST['quantityProduct']);
          $_POST['dateDay']= $this->security->xss_clean($_POST['dateDay']);
          $_POST['dateHour']= $this->security->xss_clean($_POST['dateHour']);
          $_POST['comment']= $this->security->xss_clean($_POST['comment']);

          $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
          if($mail!=null && $data1['isAdmin']==1){
            //redirect(site_url("connexion"));
              $date = mktime(0, 0, 0, date("m")  , date("d"), date("Y"));
              $seven_day  = mktime(0, 0, 0, date("m")  , date("d")+7, date("Y"));
              $date_end_post = $_POST['dateDay'];
              if($seven_day < strtotime($date_end_post)){
                $data1['TooLate']=true;
                echo json_encode($data1);
              }
              else if($date<strtotime($date_end_post)){
                $data1['TooLate']=false;
                $idProd = htmlspecialchars($_POST['idProd']);
                $data= $this->book_model->book_product($mail,$idProd);
                echo json_encode($data1);
              }
              else{
                $data1['before_book_impossible']=true;
                echo json_encode($data1);
              }
            }
            //Not shopper
            else{
              $data1['not_shopper']=true;
              echo json_encode($data1);
            }

      }
}

  public function list_book(){
    $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
    if($mail==null){
      redirect(site_url("connection"));
    }
    else{
      $data['list_book']= $this->book_model->get_book_user($mail);
      $data['reservation_canceled']=$this->reservation_canceled;
      $data1['isAdmin']=parent::get_is_Admin();

      $this->load->view("header",$data1);

      $this->load->view("list_book",$data);
    }
  }

  public function list_book_all_admin(){
    $data1['isAdmin']=parent::get_is_Admin();
    $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
    if($mail==null && $data1['isAdmin']!=2){
      redirect(site_url("connection"));
    }
    else{
      $data['list_book']= $this->book_model->get_book_all_user();
      $data['reservation_admin_done']=$this->reservation_admin_done;

      $this->load->view("header",$data1);
      $this->load->view("list_book_admin",$data);
    }
  }

  public function delete_book($idBook){
    $data['isAdmin']=parent::get_is_Admin();
    $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
    if($mail!=null && $data['isAdmin']==1){
        $result= $this->book_model->delete_book(intval($idBook));
        if($result==true){
          $this->reservation_canceled=true;
          $this->list_book();
          //redirect(site_url());
        }
    }
    else{
      redirect(site_url('connection'));
    }
  }

  public function delete_book_admin($idBook){
    $data['isAdmin']=parent::get_is_Admin();
    $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
    if($mail!=null && $data['isAdmin']==2){
        $result= $this->book_model->delete_book(intval($idBook));
        if($result==true){
          $this->reservation_admin_done=true;
          $this->list_book_all_admin();
          //redirect(site_url());
        }
    }
    else{
      redirect(site_url('connection'));
    }
  }



}
