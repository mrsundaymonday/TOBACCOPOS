<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	function __construct(){
		Parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->helper(array('form', 'url'));
        $this->load->model(array('User_model'));
        $this->load->library(array('form_validation','session'));   
	}

  public function index()
    {
        $this->load->view('login_new');
    }

  public function loginint()
    {
        $this->load->view('logininternal');
    }

  public function loginext()
    {
        $this->load->view('loginexternal');
    }

    function Checklogin(){
        header('Access-Control-Allow-Origin: *');
        $username = addslashes($this->input->post('username'));
        $password = addslashes($this->input->post('password'));
        $hashed=sha1($password.$this->config->item('binary_salt'));
        $result = $this->User_model->login($username,$hashed);
        $data=array();
        if($result){                
            $data=array(
                'id' => $result->id,
                'username' => $result->username,
                'fullname' => $result->fullname,
                'email'    => $result->email_user,
                'kodedept' => $result->dept,
                'level'    => $result->level,
                'aktif'    => $result->aktif,
                'approver' => $result->approver,
                'ttd_name' => $result->ttd_name,
                'isLoggedIn'=> TRUE
            );
            echo "internal";
            }else{
            echo 'Username atau password salah !';            
        }
      

    $this->session->set_userdata($data); 
}



    function logout(){        
        $this->session->sess_destroy();
        redirect('home');
    }

}
