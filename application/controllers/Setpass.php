<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setpass extends CI_Controller {
	function __construct() {   	
   	parent::__construct();		
   	
   		//include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		$this->load->helper(array('url','form','file'));	
		$this->load->library(array('upload','form_validation','Pdf'));
		$this->load->model(array('User_model'));
		//$this->load->library("excel");
		$this->isLoggedIn(FALSE);
	}
	
	public function index()
	{		
		$data['content'] = 'admin/setpass';
        $this->load->view('admin/include/template', $data);	
	}

function ubahpass(){
	$hashed=sha1($this->input->post('password').$this->config->item('binary_salt'));
    $data=array('password'=>$hashed);

	$setpass = $this->User_model->update_pass(array('nik' => $this->session->userdata('nik')), $data);
	if ($setpass) {
		 $this->session->set_flashdata('success','password berhasil dirubah, silahkan login kembali dengan password baru');
		$data=array(
                'username' => $this->session->userdata('username'),
                'level' => $this->session->userdata('level'),
                'nik' => $this->session->userdata('nik'),
                'password' => $this->session->userdata($this->input->post('password')),
                'aktif' => $this->session->userdata('aktif'),
                'isLoggedIn'=>TRUE
            );
         $this->session->set_userdata($data); 
		echo json_encode(array("status" => TRUE));
	}else{
		$this->session->set_flashdata('error','password tidak boleh sama dengan yang sebelumnya');
		echo json_encode(array("status" => FALSE));
	}
}
	public function reset($id)
	{		
		$data=array(
			'password'=>sha1('rahasia'.$this->config->item('binary_salt'))
		);
		$query=$this->User_model->resetpass(array('id' => $id), $data);
		if ($query) {
			$this->session->set_flashdata('success', 'password berhasil direset ke password default');
		}else{
			$this->session->set_flashdata('error', 'Oops password gagal direset');
		}
		$data['user']=$this->User_model->getall();
		$data['content'] = 'admin/recoverpass';
	    $this->load->view('admin/include/template', $data);	
	}
	
function isLoggedIn(){
		$isLoggedIn = $this->session->userdata('isLoggedIn');
		if(!isset($isLoggedIn) || $isLoggedIn != true)
		{
	   	$this->session->set_flashdata('error','You dont have permission to access previous page, please login here..');
		redirect('home');
		}		
	}

}
