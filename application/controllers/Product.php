<?php
defined('BASEPATH') OR exit('No direct script access allowed');



include(APPPATH . 'modules/Administrator_controller.php');

class Product extends Administrator_controller
{


  public function __construct()
	{
		parent::__construct();
    $this->load->model('product_model');
    $this->load->model('book_model');

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

    $this->form_validation->set_rules('nameProd', 'Nom du produit', 'trim|htmlspecialchars|required|alpha_numeric_spaces');
    $this->form_validation->set_rules('price', 'Prix', 'trim|htmlspecialchars|required|numeric');
    $this->form_validation->set_rules('quantityStock', 'quantité en stock', 'trim|htmlspecialchars|required|numeric');
    $this->form_validation->set_rules('compoProd', 'Composition du produit', 'trim|htmlspecialchars|alpha_numeric_spaces');

    if ($this->form_validation->run() == FALSE)
    {
      $data['bad_form']=true;
      $this->load->view('welcomePage', $data);
    }

    else if($data['isAdmin']==2){

      $_POST['nameProd']= $this->security->xss_clean($_POST['nameProd']);
      $_POST['price']= $this->security->xss_clean($_POST['price']);
      $_POST['quantityStock']= $this->security->xss_clean($_POST['quantityStock']);
      $_POST['compoProd']= $this->security->xss_clean($_POST['compoProd']);

      $file = $_FILES['srcImg'];
      if ($this->security->xss_clean($file, TRUE) === FALSE){
        $data['product_updated']= $this->product_model->update_product_without_img($_POST['IdProd']);
        $this->load->view('welcomePage', $data);
      }

        else{
          $data['product_updated']= $this->product_model->update_product($_POST['IdProd']);

          $config['upload_path']          = './assets/images/';
          $config['allowed_types']        = 'jpg|png';
          $config['max_size']             = 10000;
          $config['max_width']            = 2000;
          $config['max_height']           = 20000;
          $config['file_name']         = "product".$_POST['IdProd'];
          $config['overwrite']         = TRUE;


          $this->load->library('upload', $config);

          if ( ! $this->upload->do_upload('srcImg'))
          {
                  $error = array('error' => $this->upload->display_errors());
                  $data['product_updated_but_img_err']=true;
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

    $this->form_validation->set_rules('nameProd', 'Nom du produit', 'trim|htmlspecialchars|required|alpha_numeric_spaces');
    $this->form_validation->set_rules('price', 'Prix', 'trim|htmlspecialchars|required|numeric');
    $this->form_validation->set_rules('quantityStock', 'quantité en stock', 'trim|htmlspecialchars|required|numeric');
    $this->form_validation->set_rules('compoProd', 'Composition du produit', 'trim|htmlspecialchars|alpha_numeric_spaces');

    if ($this->form_validation->run() == FALSE)
    {
      $data['bad_form']=true;
      $this->load->view('welcomePage', $data);
    }

    else if($data['isAdmin']==2){

        $_POST['nameProd']= $this->security->xss_clean($_POST['nameProd']);
        $_POST['price']= $this->security->xss_clean($_POST['price']);
        $_POST['quantityStock']= $this->security->xss_clean($_POST['quantityStock']);
        $_POST['compoProd']= $this->security->xss_clean($_POST['compoProd']);

        $file = $_FILES['srcImg'];
        if ($this->security->xss_clean($file, TRUE) === FALSE){
          $result[0]= $this->product_model->create_product();
          $this->load->view('welcomePage', $data);

        }
        else{
          $result[0]= $this->product_model->create_product();
          $idProd = $this->product_model->get_product_only_id();

          $data['product_created'] = $this->product_model->update_product_only_img(intval($idProd[0]->IdProd));
          $id=$idProd[0]->IdProd;



            $config['upload_path']          = './assets/images/';
            $config['allowed_types']        = 'png';
            $config['max_size']             = 10000;
            $config['max_width']            = 2000;
            $config['max_height']           = 2000;
            $config['file_name']         = "product".$id;
            $config['overwrite']         = TRUE;


            $this->load->library('upload', $config);

            if ( !$this->upload->do_upload('srcImg'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    $data['product_created_but_img_err']=true;
                    $this->load->view('welcomePage', $data);
            }
            else
            {
                    $data1 = array('upload_data' => $this->upload->data());
                    $this->load->view('welcomePage', $data);
            }
          }

      }

    else{
      redirect(site_url('connection'));
    }
}

/*  public function do_upload($id){
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
  }*/

  public function delete_product($idProd){
    $data['isAdmin']=parent::get_is_Admin();
    if($data['isAdmin']==2){
        $nbrBook=$this->book_model->count_book_by_prod(intval($idProd));
        //var_dump(intval($nbrBook));
        //die;
        if($nbrBook==null){
          //var_dump(intval($nbrBook));
          //die;
              $result= $this->product_model->delete_product(intval($idProd));
              if($result==true){
                //$path='assets/images/product/'.$idProd.'.png';
                //unlink($path);
                $data['product_deleted']=true;
                $this->load->view('welcomePage', $data);

              }
              else{
                $data['product_deleted']=false;
                $this->load->view('welcomePage', $data);
              }
        }
        else{

          $data['book_already_prod']=true;

          $this->load->view('welcomePage', $data);
        }

    }
    else{
      $data['not_connected']=true;
      $this->load->view('connexion', $data);
    }
  }


}
