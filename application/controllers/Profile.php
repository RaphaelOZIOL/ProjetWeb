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
    $this->load->library('form_validation');
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

          $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
          $data['profile_info']= $this->shopper_model->_getUser_info($mail);
          $this->load->view('profile',$data);
    }

    else if(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name(), TRUE) &&
            get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_password(), TRUE)){

              $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
              $data['profile_info']= $this->administrator_model->_getUser_info($mail);
              $this->load->view('profile',$data);
     }
     else{
       redirect("connection");
     }
	}

  public function update_info(){
      $data['isAdmin']=parent::get_is_Admin();


      if($data['isAdmin']==1){

        $this->form_validation->set_rules('firstName', 'Prénom', 'trim|htmlspecialchars|required|alpha');
                $this->form_validation->set_rules('lastName', 'Nom', 'trim|htmlspecialchars|required|alpha');
                $this->form_validation->set_rules('email', 'Email', 'trim|htmlspecialchars|required|valid_email');
                $this->form_validation->set_rules('phoneNumber', 'Numéro de téléphone', 'trim|required|htmlspecialchars|exact_length[10]|numeric');
                $this->form_validation->set_rules('yearBirth', 'Date de naissance', 'trim|htmlspecialchars|required');
                $this->form_validation->set_rules('street', 'Adresse', 'trim|htmlspecialchars|required|alpha_numeric_spaces');
                $this->form_validation->set_rules('postalCode', 'Code postal', 'trim|htmlspecialchars|required|exact_length[5]|numeric');
                $this->form_validation->set_rules('city', 'Ville', 'trim|htmlspecialchars|required');

        if ($this->form_validation->run() == FALSE)
                {
                      if(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name(), TRUE) &&
                          get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_password(), TRUE)){

                          $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
                          $data['profile_info']= $this->shopper_model->_getUser_info($mail);
                          $this->load->view('profile',$data);
                      }

                       else{
                         redirect("connection");
                       }
                }


        else if (htmlspecialchars($_POST['email'])!=null){
          $_POST['email']= $this->security->xss_clean($_POST['email']);
          $_POST['firstName']= $this->security->xss_clean($_POST['firstName']);
          $_POST['lastName']= $this->security->xss_clean($_POST['lastName']);
          $_POST['phoneNumber']= $this->security->xss_clean($_POST['phoneNumber']);
          $_POST['yearBirth']= $this->security->xss_clean($_POST['yearBirth']);
          $_POST['street']= $this->security->xss_clean($_POST['street']);
          $_POST['postalCode']= $this->security->xss_clean($_POST['postalCode']);
          $_POST['postalCode']= $this->security->xss_clean($_POST['postalCode']);


          $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
          if(htmlspecialchars($_POST['email'])==$mail){
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

        $this->form_validation->set_rules('firstName', 'Prénom', 'trim|htmlspecialchars|required|alpha');
                $this->form_validation->set_rules('lastName', 'Nom', 'trim|htmlspecialchars|required|alpha');
                $this->form_validation->set_rules('email', 'Email', 'trim|htmlspecialchars|required|valid_email');
                $this->form_validation->set_rules('phoneNumber', 'Numéro de téléphone', 'trim|htmlspecialchars|required|exact_length[10]|numeric');
                $this->form_validation->set_rules('yearBirth', 'Date de naissance', 'trim|htmlspecialchars|required');
                $this->form_validation->set_rules('street', 'Adresse', 'trim|htmlspecialchars|required|alpha_numeric_spaces');
                $this->form_validation->set_rules('postalCode', 'Code postal', 'trim|htmlspecialchars|required|exact_length[5]|numeric');
                $this->form_validation->set_rules('city', 'Ville', 'trim|htmlspecialchars|required');

        if ($this->form_validation->run() == FALSE)
                {

                      if(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name(), TRUE) &&
                              get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_password(), TRUE)){

                                $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
                                $data['profile_info']= $this->administrator_model->_getUser_info($mail);

                                $this->load->view('profile',$data);
                       }
                       else{
                         redirect("connection");
                       }

                }


        else if (htmlspecialchars($_POST['email'])!=null){

          $_POST['email']= $this->security->xss_clean($_POST['email']);
          $_POST['firstName']= $this->security->xss_clean($_POST['firstName']);
          $_POST['lastName']= $this->security->xss_clean($_POST['lastName']);
          $_POST['phoneNumber']= $this->security->xss_clean($_POST['phoneNumber']);
          $_POST['yearBirth']= $this->security->xss_clean($_POST['yearBirth']);
          $_POST['street']= $this->security->xss_clean($_POST['street']);
          $_POST['postalCode']= $this->security->xss_clean($_POST['postalCode']);
          $_POST['postalCode']= $this->security->xss_clean($_POST['postalCode']);


          $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
          if(htmlspecialchars($_POST['email'])==$mail){
            $result = $this->administrator_model->update_admin_user($mail);
            if($result != false){
              $this->profile_info();

            }
            else{
              $this->profile_info();
            }
          }
          else{
            redirect("connection");
          }
        }
        else{
          $this->profile_info();
        }
      }
      else{
        redirect("connection");
      }
  }

  public function update_info_pwd_view(){
    $this->load->view("update_password");
  }

  public function update_info_pwd(){
      $data['isAdmin']=parent::get_is_Admin();


      if($data['isAdmin']==1){

        $_POST['newPass']= $this->security->xss_clean($_POST['newPass']);
        $_POST['confirmPassword']= $this->security->xss_clean($_POST['confirmPassword']);

        if ((get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name(), TRUE) &&
                get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_password(), TRUE))
                || htmlspecialchars($_POST['newPass'])!=null || htmlspecialchars($_POST['confirmPassword'])!=null){
          if(htmlspecialchars($_POST['newPass'])==htmlspecialchars($_POST['confirmPassword'])){
            $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_shopper_name()));
            $result = $this->shopper_model->update_shopper_user_only_pwd($mail);
            if($result != false){
                   $this->disconnect();
                   $data['isAdmin']=parent::get_is_Admin();
                   $data['pwd_updated']=true;
                   $this->load->view("connexion",$data);

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

        $_POST['newPass']= $this->security->xss_clean($_POST['newPass']);
        $_POST['confirmPassword']= $this->security->xss_clean($_POST['confirmPassword']);

        if ((get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name(), TRUE) &&
                get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_password(), TRUE))
                 || htmlspecialchars($_POST['newPass'])!=null || htmlspecialchars($_POST['confirmPassword'])!=null){
          if(htmlspecialchars($_POST['newPass'])==htmlspecialchars($_POST['confirmPassword'])){
            $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').parent::get_cookie_admin_name()));
              $result = $this->administrator_model->update_admin_user_only_pwd($mail);
              if($result != false){
                   //parent::delete_cookie_admin();
                   $this->disconnect();
                   $data['isAdmin']=parent::get_is_Admin();
                   $data['pwd_updated']=true;
                   $this->load->view("connexion",$data);
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

public function disconnect(){
    $data['isAdmin']=parent::get_is_Admin();
    if($data['isAdmin']==1){
      parent::delete_cookie_shopper();
    }
    else if($data['isAdmin']==2){
      parent::delete_cookie_admin();
    }
}

public function disconnect_to_welcome_page(){
    $this->disconnect();
    redirect(site_url(''));
}

}
