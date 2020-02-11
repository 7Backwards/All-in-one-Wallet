<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email_C extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('comerciante_id')) {
			redirect('Ctr_geral');
		}
		else{
			$this->load->model('Geral_model');
			$this->Geral_model->SetSessionInfo();
		}
       
    }
    public function index()
	{
		$this->load->view('Header_V');		
		$this->load->view('Email_V');
		$this->load->view('Footer_V');		
	}	
	
	function sendemail()
		{
			$this->form_validation->set_rules('titulo','Titulo','required');
			$this->form_validation->set_rules('texto','Texto','required');


			if($this->form_validation->run())
			{
				foreach ($this->Geral_model->emailtestes() as $row)
				{
					$titulo=$this->input->post('titulo');
					$texto=$this->input->post('texto');
						
					$config = array(
						'protocol'  => 'smtp',
						'smtp_host' => 'ssl://smtp.gmail.com',
						'smtp_port' =>  465,
						'smtp_user'  => 'ipvpint@gmail.com',
						'smtp_pass'  => 'cortisolshot',
						'charset'    => 'iso-8859-1',
						'mailtype'  => 'html',
						'wordwrap'   => TRUE
						);
			
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->initialize($config);
					$this->email->from('ipvpint@gmail.com');
					$this->email->to($row->EMAIL_CLIENTE);
					$this->email->subject('All-in-one-Wallet ->Comerciante: '.$this->session->userdata('estabelecimento_nome').' ->Assunto: '.$titulo);
					$this->email->message($texto);

					if($this->email->send())
					{
						
					}
					else
					{
						$data['msg']= "Erro inesperado!";
						$this->load->view('Header_V');	
						$this->load->view('Email_V',$data);
						$this->load->view('Footer_V');
						return;
					}		
				}
						$data['msg']= "Email Enviado Com Sucesso!";
						$this->load->view('Header_V');	
						$this->load->view('Email_V',$data);
						$this->load->view('Footer_V');
						
			}
		}

		
		function contactaradmin()
		{
			$this->form_validation->set_rules('tituloa','Titulo','required');
			$this->form_validation->set_rules('textoa','Texto','required');


			if($this->form_validation->run())
			{
					$tituloa=$this->input->post('tituloa');
					$textoa=$this->input->post('textoa');
						
					$config = array(
						'protocol'  => 'smtp',
						'smtp_host' => 'ssl://smtp.gmail.com',
						'smtp_port' =>  465,
						'smtp_user'  => 'ipvpint@gmail.com',
						'smtp_pass'  => 'cortisolshot',
						'charset'    => 'iso-8859-1',
						'mailtype'  => 'html',
						'wordwrap'   => TRUE
						);
			
					$this->load->library('email', $config);
					$this->email->set_newline("\r\n");
					$this->email->initialize($config);
					$this->email->from('ipvpint@gmail.com');
					$this->email->to('ipvpint@gmail.com');
					$this->email->subject('All-in-one-Wallet ->Mensagem de: '.$this->session->userdata('comerciante_email').' ->Assunto: '.$tituloa);
					$this->email->message($textoa);

					if($this->email->send())
					{
						$data['msga']= "Email Enviado Com Sucesso!";
						$this->load->view('Header_V');	
						$this->load->view('Email_V',$data);
						$this->load->view('Footer_V');
					}
					else
					{
						$data['msga']= "Erro inesperado!";
						$this->load->view('Header_V');	
						$this->load->view('Email_V',$data);
						$this->load->view('Footer_V');
						return;
					}		
				
						
						
			}
		}

}
?>