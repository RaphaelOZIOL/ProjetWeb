<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include(APPPATH . 'modules/ADMINISTRATOR_Controller.php');

class Product extends ADMINISTRATOR_Controller
{


  public function __construct()
	{
		parent::__construct();
    $this->load->model('product_model');
    $data['isAdmin']=parent::get_is_Admin();
    $this->load->view('header',$data);
    $this->load->helper("file");
	}

  public function index()
	{
		$this->welcome();
	}

  public function welcome()
	{
    $data['isAdmin']=parent::get_is_Admin();
    $this->load->view('welcomePage',$data);
	}

  public function test()
  {
    $this->load->view('test');

  }

  public function update_product(){

    $data['isAdmin']=parent::get_is_Admin();
    if($data['isAdmin']==2){
      $file = $_FILES['srcImg'];
      if ($file['type']==null){
        $result[0]= $this->product_model->update_product_without_img($_POST['IdProd']);
        $this->load->view('welcomePage', $data);
      }

        else if(htmlspecialchars($_POST['nameProd'])!=null ){
          $result[0]= $this->product_model->update_product($_POST['IdProd']);

          $config['upload_path']          = './assets/images/product/';
          $config['allowed_types']        = 'gif|jpg|png';
          $config['max_size']             = 100000;
          $config['max_width']            = 20000;
          $config['max_height']           = 20000;
          $config['remove_spaces']        = TRUE;
          $config['detect_mime']          = TRUE;
          $config['mod_mime_fix']         = TRUE;
          $config['file_name']         = $_POST['IdProd'];
          $config['overwrite']         = TRUE;


          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload('srcImg'))
          {
                  $error = array('error' => $this->upload->display_errors());
                  $this->load->view('welcomePage', $data);
          }
          else
          {
                  $data1 = array('upload_data' => $this->upload->data());
                  $this->load->view('welcomePage', $data);
          }
        }

   }

}

public function create_product(){

    $data['isAdmin']=parent::get_is_Admin();
    if($data['isAdmin']==2){
      if (htmlspecialchars($_POST['nameProd'])!=null){
        $result[0]= $this->product_model->create_product();
        $idProd = $this->product_model->get_product_only_id();
        $this->product_model->update_product_only_img(intval($idProd[0]->IdProd));
        $id=$idProd[0]->IdProd;

        $this->do_upload($id);

      }
    }
    else{
      redirect(site_url('connexion'));
    }
}

  public function do_upload($id){
    $config['upload_path']          = './assets/images/product/';
    $config['allowed_types']        = 'gif|jpg|png';
    $config['max_size']             = 100000;
    $config['max_width']            = 20000;
    $config['max_height']           = 20000;
    $config['remove_spaces']        = TRUE;
    $config['detect_mime']          = TRUE;
    $config['mod_mime_fix']         = TRUE;
    $config['file_name']         = $id;
    $config['overwrite']         = TRUE;

    $this->load->library('upload', $config);

    if ( ! $this->upload->do_upload('srcImg'))
    {
            $error = array('error' => $this->upload->display_errors());
            $data['isAdmin']=parent::get_is_Admin();
            $this->load->view('welcomePage', $data);
    }
    else
    {
            $data1 = array('upload_data' => $this->upload->data());
            $data['isAdmin']=parent::get_is_Admin();
            $this->load->view('welcomePage', $data);
    }
  }

  public function delete_product($idProd){
    $data['isAdmin']=parent::get_is_Admin();
    if($data['isAdmin']==2){
        $result= $this->product_model->delete_product(intval($idProd));
        if($result==true){
          $path='assets/images/product/'.$idProd.'.png';
          unlink($path);
        }
        //redirect(site_url());
    }
    else{
      redirect(site_url('connexion'));
    }
  }


}
