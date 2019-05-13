<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');

class Profile extends ADMINISTRATOR_Controller
{

  public function __construct()
	{
		parent::__construct();
    $this->load->model('administrator_model');
    $this->load->model('shopper_model');
    $data['isAdmin']=parent::get_is_Admin();
    $this->load->view('header',$data);
	}

  public function index()
	{
		$this->profile_info();
	}

  public function profile_info()
	{
    $data['isAdmin']=parent::get_is_Admin();
    if(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name(), TRUE) &&
            get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_password(), TRUE)){

          $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
          $data['profile_info']= $this->shopper_model->_getUser_info($mail);
          $this->load->view('profile',$data);
    }

    else if(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name(), TRUE) &&
            get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_password(), TRUE)){

              $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
              $data['profile_info']= $this->administrator_model->_getUser_info($mail);
              $this->load->view('profile',$data);
     }
     else{
       echo 'Pas connecté';
     }
	}

  public function update_info(){
      $data['isAdmin']=parent::get_is_Admin();

      if($data['isAdmin']==1){
        if (htmlspecialchars($_POST['newpass'])!=null || htmlspecialchars($_POST['email'])!=null){
          $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));

          $result = $this->shopper_model->update_shopper_user($mail);
          if($result != false){
               parent::delete_cookie_shopper();
               redirect(site_url("product"));
          }
        }
        else{
          $this->profile_info();
        }
      }

      else if($data['isAdmin']==2){
        if (htmlspecialchars($_POST['newpass'])!=null || htmlspecialchars($_POST['email'])!=null){
          $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
          $id=$this->administrator_model->_getUser_id($mail);
          $id=intval($id->IdUser);
          $result = $this->administrator_model->update_admin_user($id);
          if($result != false){
               parent::delete_cookie_shopper();
               redirect(site_url("product"));
          }
        }
        else{
          $this->profile_info();
        }
      }
  }


  public function test()
  {
    $this->load->view('test');

  }

}
