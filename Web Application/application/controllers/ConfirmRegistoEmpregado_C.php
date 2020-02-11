<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfirmRegistoEmpregado_C extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		        
			$this->load->model('Comerciante_model');
			$this->load->library('form_validation');
			$this->load->helper('form');           
            $this->load->view('Header_V');
            $this->load->view('Footer_V');
		
       
	}

	public function index() 
	{
        if($this->uri->segment(3))
		{
		$creation_key = $this->uri->segment(3);
		$result=$this->Comerciante_model->empregadoInfo($creation_key);
		if($result)
		{
			$data['valor']=$result;
			$this->load->view('RegistoEmpregado',$data);
			return;
		}
		else
		{
			$data['valor'] = '<h1 align="center">Erro ao listar informacao</h1>';
			$this->load->view('RegistoEmpregado',$data);
			return;
		}
		
		}	
    }

    public function AdicionarEmpregado()
	{
		$this->form_validation->set_rules('password', 'Palavra Passe', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirmação Palavra-Passe', 'required|matches[password]');
		$this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required');
		$this->form_validation->set_rules('sexo', 'Sexo', 'required');
		$this->form_validation->set_rules('cidade', 'Cidade', 'required');
		
		if($this->form_validation->run())
		{
			$encrypted_password = md5($this->input->post('password'));
			$creation_key=$this->uri->segment(3);
			
			
			
			$result=$this->Comerciante_model->updateInfoComerciante($encrypted_password,$creation_key);
				if ($result)
				 {
					$data['sucesso'] = '<h4 class="text-success" align="center">Registo Efetuado Com Sucesso!</h4>';
					$this->load->view('inicio',$data);
				}
				else
				{
					$data['message_verificardados'] = '<h4 align="center">Erro Inesperado, Tente Novamente Mais Tarde!</h4>';
					$this->load->view('inicio',$data);
				}
		}
		else
				{
					$data['message_verificardados'] = '<h4 align="center">Dados Por Preencher, confira o seu Email</h4>';
					$this->load->view('inicio',$data);
				}

	}
}