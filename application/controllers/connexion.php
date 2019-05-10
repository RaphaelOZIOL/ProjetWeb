<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php'); 
class Connexion extends ADMINISTRATOR_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('product_model');

    }

    function index(){
        $this->load->view('connexion');
        var_dump(parent::get_is_Admin());
    }

    public function encrypter(){
        $mdp = $this->encrypt->encode("azer");
        die($mdp);
    }

    public function deconnecter(){
        $data['isAdmin']=parent::get_is_Admin();
        delete_cookie("189CDS8CSDC98JCPDSCDSCDSCDSD8C9SD");
        delete_cookie("1C89DS7CDS8CD89CSD7CSDDSVDSIJPIOCDS");
        $this->load->view('welcomePage',$data);
    }
}
