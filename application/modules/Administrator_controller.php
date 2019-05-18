<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator_controller extends CI_Controller {


    private $_cookie_shopper = array(
                   // 'name'   => '',
                   // 'value'  => '',
                   'expire' => '86500',
                   // 'domain' => '.some-domain.com',
                   'path'   => '/',
                   // 'prefix' => '',
               );

    private $_cookie_admin = array(
                // 'name'   => '',
                // 'value'  => '',
                'expire' => '86500',
                // 'domain' => '.some-domain.com',
                'path'   => '/',
                // 'prefix' => '',
          );

    private $is_Admin; //0 for not connected --- 1 for standart user ---- 2 for admin user
    private $_cookie_id_shopper_name = "743RUT7TF0DLZ0EODKC8CJ294FEDJ34JXWZ";
    private $_cookie_id_shopper_password = "ORP02ESDD6453HCN4BF3KDK3FIZA2DM049C";

    private $_cookie_id_admin_name = "KSF394FJ48CJA03L58UC75NKSIA8C7263NF";
    private $_cookie_id_admin_password = "AM05L9FJ5CKK75639FKTPC039VT95JDL24FG";

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('encryption');
        $this->load->library('form_validation');

        $this->load->model('administrator_model');
        $this->load->model('shopper_model');

        /*IF WE ARE ON CONNECTING PAGE */

        if ($this->input->post('identifiant', TRUE) && $this->input->post('password', TRUE))
        {
            /* ADMIN MODE*/
            if ($this->administrator_model->validate($this->input->post('identifiant'), $this->input->post('password')))
            {
              $cookies_identifiant_admin = $this->_cookie_admin;
              $cookies_identifiant_admin['name'] = $this->_cookie_id_admin_name;
              $cookies_identifiant_admin['value'] = $this->encryption->encrypt($this->input->post('identifiant'));
              // $cookies_identifiant['domain'] = "";
              $cookies_identifiant_admin['prefix'] = $this->config->item('cookie_prefix');
              set_cookie($cookies_identifiant_admin);

              $cookies_password_admin = $this->_cookie_admin;
              $cookies_password_admin['name'] = $this->_cookie_id_admin_password;
              $cookies_password_admin['value'] = $this->encryption->encrypt($this->input->post('password'));
              // $cookies_identifiant['domain'] = "";
              $cookies_password_admin['prefix'] = $this->config->item('cookie_prefix');
              set_cookie($cookies_password_admin);

              $this->is_Admin=2;
              redirect(site_url("product"));
            }

                                    /*SHOPPER MODE*/
            else if ($this->shopper_model->validate($this->input->post('identifiant'), $this->input->post('password')))
            {
              $cookies_identifiant_shopper = $this->_cookie_shopper;
              $cookies_identifiant_shopper['name'] = $this->_cookie_id_shopper_name;
              $cookies_identifiant_shopper['value'] = $this->encryption->encrypt($this->input->post('identifiant'));
              // $cookies_identifiant['domain'] = "";
              $cookies_identifiant_shopper['prefix'] = $this->config->item('cookie_prefix');
              set_cookie($cookies_identifiant_shopper);

              $cookies_password_shopper = $this->_cookie_shopper;
              $cookies_password_shopper['name'] = $this->_cookie_id_shopper_password;
              $cookies_password_shopper['value'] = $this->encryption->encrypt($this->input->post('password'));
              // $cookies_identifiant['domain'] = "";
              $cookies_password_shopper['prefix'] = $this->config->item('cookie_prefix');
              set_cookie($cookies_password_shopper);

              $this->is_Admin=1;
              redirect(site_url("product"));
            }
            /*Not connected*/
            else
            {
                $this->is_Admin=0;
                redirect(site_url("connexion"));
            }
        }

        /*IF WE ARE ON OTHER PAGE */
        /*ADMIN MODE*/
        elseif (get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_admin_name, TRUE) &&
                get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_admin_password, TRUE))
        {
            $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_admin_name));
            $password = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_admin_password));
            $this->is_Admin=2;

           if ($this->administrator_model->validate($mail, $password) == FALSE){
                $this->is_Admin=0;
                //redirect(site_url("connexion"));
              }

        }

        /*SHOPPER MODE*/
        elseif (get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_shopper_name, TRUE) &&
                get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_shopper_password, TRUE))
        {
            $mail = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_shopper_name));
            $password = $this->encryption->decrypt(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_shopper_password));
            $this->is_Admin=1;

            if ($this->shopper_model->validate($mail, $password) == FALSE){
                $this->is_Admin=0;
              //redirect(site_url("connexion"));
              }

        }

        //if rout is LamiDuPain/product and cookies are not active
        elseif (($this->router->fetch_class() == "product") && ((get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_shopper_name, FALSE) &&
                get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_shopper_password, FALSE)) || (get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_admin_name, FALSE) &&
                get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_admin_password, FALSE))))
        {
            $this->is_Admin=0;
        }

    }


    public function delete_cookie_shopper(){
      delete_cookie("743RUT7TF0DLZ0EODKC8CJ294FEDJ34JXWZ");
      delete_cookie("ORP02ESDD6453HCN4BF3KDK3FIZA2DM049C");
      $this->is_Admin=0;
    }

    public function delete_cookie_admin(){

      delete_cookie("KSF394FJ48CJA03L58UC75NKSIA8C7263NF");
      delete_cookie("AM05L9FJ5CKK75639FKTPC039VT95JDL24FG");
      $this->is_Admin=0;
    }

    public function get_is_Admin(){
        return $this->is_Admin;
    }

    public function get_cookie_shopper_name(){
      return $this->_cookie_id_shopper_name;
    }

    public function get_cookie_shopper_password(){
      return $this->_cookie_id_shopper_password;
    }

    public function get_cookie_admin_name(){
      return $this->_cookie_id_admin_name;
    }

    public function get_cookie_admin_password(){
      return $this->_cookie_id_admin_password;
    }

}
