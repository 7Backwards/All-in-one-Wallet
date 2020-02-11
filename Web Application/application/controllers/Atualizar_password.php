<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atualizar_password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		$this->load->helper('form');
		$this->load->model('geral_model');
	}
	public function index()
	{
		$this->load->view('inicio');
	}	

	
	function change_password()	
	{
		$this->form_validation->set_rules('password_cliente', 'Paswword', 'required');
		$this->form_validation->set_rules('confirm_password_cliente', 'Confirmação Password', 'required');
		if($this->form_validation->run())
		{
			$encrypted_password = md5($this->input->post('password_cliente'));
			$key=$this->uri->segment(3);
			
			if (strcmp ( $this->input->post('password_cliente') , $this->input->post('confirm_password_cliente') ) !=0) {
				$data['message'] = '<h4  style="color:red" align="center">Verifique os seus campos novamente</h4>';
				$this->load->view('mudar_password_view',$data);
			}else{
				$this->geral_model->update($encrypted_password,$key);
				if ($this->geral_model->update($encrypted_password,$key)==true) {
					$data['message_passwordreset'] = '<h1 align="center">Password Atualizada Com Sucesso!</h1>';
					$this->load->view('inicio',$data);
				}
			}
		}
		else
		{
			$data['message'] = '';
			$this->load->view('mudar_password_view',$data);	
		}
		$this->load->view('inicio');	
	}
	

}

/* End of file mudar_password.php */
/* Location: ./application/controllers/mudar_password.php */