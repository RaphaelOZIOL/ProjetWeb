<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ADMINISTRATOR_Controller extends CI_Controller {

    private $_cookie = array(
                   // 'name'   => '',
                   // 'value'  => '',
                   'expire' => '86500',
                   // 'domain' => '.some-domain.com',
                   'path'   => '/',
                   // 'prefix' => '',
               );

    private $is_Admin;
    private $_cookie_id_name = "189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD"; // nom d'un cookie
    private $_cookie_id_password = "1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS"; // nom d'un cookie

    function __construct()
    {
        parent::__construct();
        $this->load->helper('cookie');
        $this->load->library('encrypt');
        $this->load->model('administrator_model');

        if ($this->input->post('identifiant', TRUE) && $this->input->post('password', TRUE))
        {
            /*DO ADMIN MODE*/
            if ($this->administrator_model->validate($this->input->post('identifiant'), $this->input->post('password')))
            {
                $cookies_identifiant = $this->_cookie;
                $cookies_identifiant['name'] = $this->_cookie_id_name;
                $cookies_identifiant['value'] = $this->encrypt->encode($this->input->post('identifiant'));
                // $cookies_identifiant['domain'] = "";
                $cookies_identifiant['prefix'] = $this->config->item('cookie_prefix');
                set_cookie($cookies_identifiant);

                $cookies_password = $this->_cookie;
                $cookies_password['name'] = $this->_cookie_id_password;
                $cookies_password['value'] = $this->encrypt->encode($this->input->post('password'));
                // $cookies_identifiant['domain'] = "";
                $cookies_password['prefix'] = $this->config->item('cookie_prefix');
                set_cookie($cookies_password);

                // Tout est ok, ont redirige vers la page d'accueil de l'admin
                $this->is_Admin=1;
                redirect(site_url("product"));
            }
            else
            {
                $this->is_Admin=0;
                // Mauvais identifiant, ont redirige vers la page de connexion
                redirect(site_url("connexion"));

            }
        }
        elseif (get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_name, TRUE) &&
                get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_password, TRUE))
        {
            $mail = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_name));
            $password = $this->encrypt->decode(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_password));
            $this->is_Admin=1;

            if ($this->administrator_model->validate($mail, $password) == FALSE){
                $this->is_Admin=0;
                redirect(site_url("connexion")); // Mauvais identifiant, ont redirige vers la page de connexion
              }

        }
        //if rout is LamiDuPain/product and cookies are active
        elseif (($this->router->fetch_class() == "product") && !(get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_name, TRUE) &&
                get_cookie($this->config->item('cookie_prefix').$this->_cookie_id_password, TRUE)))
        {
            $this->is_Admin=0;
        }
    }

    public function get_is_Admin(){
        return $this->is_Admin;
    }
}
