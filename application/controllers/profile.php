<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_controller.php');

class Profile extends Administrator_controller
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

  public function update_info($email){
      $data['isAdmin']=parent::get_is_Admin();

      if($data['isAdmin']==1){
        if ($email!=null){
          $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
          if($email==$mail){
            $result = $this->shopper_model->update_shopper_user_no_pwd($mail);

            if($result != false){
              $this->profile_info();

            }
            else{
              $this->profile_info();
            }
          }
          else{
            $this->load->view("connexion");

          }
        }
        else{
           $this->load->view("connexion");
        }
      }

      else if($data['isAdmin']==2){
        if ($email!=null){
          $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
          if($email==$mail){
            $result = $this->administrator_model->update_admin_user($mail);
            if($result != false){
              $this->profile_info();

            }
            else{
              $this->profile_info();
            }
          }
          else{
            $this->load->view("connexion");
          }
        }
        else{
          $this->profile_info();
        }
      }
      else{
        redirect("connexion");
      }
  }

  public function update_info_pwd_view(){
    $this->load->view("update_password");
  }

  public function update_info_pwd(){
      $data['isAdmin']=parent::get_is_Admin();


      if($data['isAdmin']==1){
        if ((get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name(), TRUE) &&
                get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_password(), TRUE))
                || htmlspecialchars($_POST['newPass'])!=null || htmlspecialchars($_POST['confirmPassword'])!=null){
          if(htmlspecialchars($_POST['newPass'])==htmlspecialchars($_POST['confirmPassword'])){
            $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
            $result = $this->shopper_model->update_shopper_user_only_pwd($mail);
            if($result != false){
                   parent::delete_cookie_shopper();
                   $data['isAdmin']=parent::get_is_Admin();
                   $this->load->view("header",$data);
                   $this->load->view("success");

            }

            else{
              $data['err_database']=true;
                $this->profile_info($data);
            }
          }
          else{
              $data['pwd_not_same']=true;
              $this->load->view("update_password",$data);
          }
        }
        else{
            $data['not_connected']=true;
            $this->load->view("connexion",$data);
        }
      }

      else if($data['isAdmin']==2){
        if ((get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name(), TRUE) &&
                get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_password(), TRUE))
                 || htmlspecialchars($_POST['newPass'])!=null || htmlspecialchars($_POST['confirmPassword'])!=null){
          if(htmlspecialchars($_POST['newPass'])==htmlspecialchars($_POST['confirmPassword'])){
            $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
              $result = $this->administrator_model->update_admin_user_only_pwd($mail);
              if($result != false){
                   parent::delete_cookie_admin();
                   $data['isAdmin']=parent::get_is_Admin();
                   $this->load->view("header",$data);
                   $this->load->view("success");
              }

            else{
              $data['err_database']=true;
                $this->profile_info($data);

            }
        }
        else{
          $data['pwd_not_same']=true;
          $this->load->view("update_password",$data);
        }
      }
      else{
        $data['not_connected']=true;
        $this->load->view("connexion",$data);
      }
  }
  else{
    $data['not_connected']=true;
    $this->load->view("connexion",$data);

  }
}


  public function test()
  {
    $this->load->view('test');

  }

}
