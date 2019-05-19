<?php
defined('BASEPATH') OR exit('No direct script access allowed');



include(APPPATH . 'modules/Administrator_controller.php');

class Category extends Administrator_controller
{

  public function __construct()
	{
		parent::__construct();
    $this->load->model('category_model');
    $data['isAdmin']=parent::get_is_Admin();
    $this->load->view('header',$data);
	}

  public function index()
	{
		$this->list_category();
	}



  public function update_category(){

    $data['isAdmin']=parent::get_is_Admin();

    $this->form_validation->set_rules('nameCat', 'Nom de la catégorie', 'trim|htmlspecialchars|required|alpha_numeric_spaces');

    if ($this->form_validation->run() == FALSE)
    {
      $data['bad_name']=true;
      $this->load->view('welcomePage', $data);
    }

    else if($data['isAdmin']==2){

      $_POST['nameCat']= $this->security->xss_clean($_POST['nameCat']);

      $file = $_FILES['srcImg'];
      if ($this->security->xss_clean($file, TRUE) === FALSE){
        $result[0]= $this->category_model->update_category_only_name($_POST['IdCat']);
        $this->load->view('welcomePage', $data);
      }

      else{


            $result[0]= $this->category_model->update_category($_POST['IdCat']);

            $config['upload_path']          = './assets/images/category/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100000;
            $config['max_width']            = 20000;
            $config['max_height']           = 20000;
            $config['remove_spaces']        = TRUE;
            $config['detect_mime']          = TRUE;
            $config['mod_mime_fix']         = TRUE;
            $config['file_name']         = $_POST['IdCat'];
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

    else{
        redirect(site_url('connection'));
    }

}

public function create_category(){

    $data['isAdmin']=parent::get_is_Admin();

    $this->form_validation->set_rules('nameCat', 'Nom de la catégorie', 'trim|htmlspecialchars|required|alpha_numeric_spaces');

    if ($this->form_validation->run() == FALSE)
    {
      $data['bad_name']=true;
      $this->load->view('welcomePage', $data);
    }

    else if($data['isAdmin']==2){
      $_POST['nameCat']= $this->security->xss_clean($_POST['nameCat']);

      $file = $_FILES['srcImg'];
      if ($this->security->xss_clean($file, TRUE) === FALSE){
        $result[0]= $this->category_model->create_category();
        $this->load->view('welcomePage', $data);
      }

      else {

            $result[0]= $this->category_model->create_category();
            $idCat = $this->category_model->get_category_only_id();
            $this->category_model->update_category_only_img(intval($idCat[0]->IdCat));
            $id=$idCat[0]->IdCat;


            $config['upload_path']          = './assets/images/category/';
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

          //$this->do_upload($id);

      }

    else{
      redirect(site_url('connection'));
    }
}

  public function do_upload($id){
    $config['upload_path']          = './assets/images/category/';
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



  public function test1(){
    $data['isAdmin']=parent::get_is_Admin();
    $this->load->view('header',$data);
    $this->load->view('add_category_admin');
  }

}
