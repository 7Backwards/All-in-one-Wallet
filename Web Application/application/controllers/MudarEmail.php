<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MudarEmail extends CI_Controller {

    public function __construct()
	{
		
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('Geral_model');
		$this->load->model('Empregados_model');
		//mudar para o home page desejado da area privada
		if ($this->session->userdata('comerciante_id')) {
			session_destroy();
		}
	}
    
    
    public function index()
	{
		
	}
	
    function verify_email_change_email_comerciante()
	{

		if($this->uri->segment(3) && ($this->uri->segment(4)))
	{
		$verification_key = $this->uri->segment(3);
		$email_novo= $this->uri->segment(4);
		$email_atual= $this->uri->segment(5);
	if($this->Geral_model->verify_email_verificationKey($verification_key))
	{
		$this->Geral_model->UpdateEmailComerciante($email_novo,$email_atual);
		$data['message_mudar_email'] = 'O seu Email foi alterado com sucesso';
		$this->load->view('inicio',$data);
	}
	else
	{
		$data['message_mudar_email'] = 'Link inválido';
		$this->load->view('inicio',$data);

	}
		
	}
	else {
		$data['message_mudar_email'] = 'Erro inesperado, por favor tente mais tarde';
		$this->load->view('inicio',$data);
	}
	
	}

	function verify_email_change_email_empregado()
	{

		if($this->uri->segment(3) && ($this->uri->segment(4)))
	{
		$verification_key = $this->uri->segment(3);
		$email_novo= $this->uri->segment(4);
		$email_atual= $this->uri->segment(5);
	if($this->Empregados_model->verify_email_verificationKey($verification_key))
	{
		$this->Empregados_model->UpdateEmailEmpregado($email_novo,$email_atual);
		$data['message_mudar_email'] = 'O seu Email foi alterado com sucesso';
		$this->load->view('inicio',$data);
	}
	else
	{
		$data['message_mudar_email'] = 'Link inválido';
		$this->load->view('inicio',$data);

	}
		
	}
	else {
		$data['message_mudar_email'] = 'Erro inesperado, por favor tente mais tarde';
		$this->load->view('inicio',$data);
	}
	
	}
}
