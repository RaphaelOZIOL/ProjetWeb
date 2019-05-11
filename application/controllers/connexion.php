<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');
class Connexion extends ADMINISTRATOR_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('product_model');

    }

    function index(){
        $data['isAdmin']=parent::get_is_Admin();
        $this->load->view('header',$data);
        $this->load->view('connexion');
    }


    public function encrypter(){
        $mdp = $this->encrypt->encode("azer");
        die($mdp);
    }

    public function deconnecter(){
        $data['isAdmin']=parent::get_is_Admin();
        if($data['isAdmin']==1){
          parent::delete_cookie_shopper();
        }
        else if($data['isAdmin']==2){
          parent::delete_cookie_admin();
        }

      //  $this->load->view('header',$data);
        redirect(site_url('product'));
        //$this->load->view('welcomePage',$data);
    }
}
