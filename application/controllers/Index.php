<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include(APPPATH . 'modules/Administrator_controller.php'); // chemin vers le controlleur parent
class Index extends Administrator_controller {

    function __construct() {
        parent::__construct(); // On appel le constructeur de Administrator_controller car
                                       // c'est lui qui va vérifier les données et accepter la page appelée ou non.
    }

    function index() {
        $this->load->view('index');
    }
}
