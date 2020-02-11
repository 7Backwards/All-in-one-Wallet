<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estatisticas_C extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('comerciante_id')) {
			redirect('Ctr_geral');
		}
		else{
			$this->load->model('Charts_model');
			$this->load->model('Geral_model');
			$this->load->model('Comerciante_model');
			$this->load->library('form_validation');
			$this->load->helper('form');
			$this->Geral_model->SetSessionInfo();
		}
       
	}
	public function index() 
	{
		$data['v_janeiro']=$this->Charts_model->tran_janeiro();
		$data['v_fevereiro']=$this->Charts_model->tran_fevereiro();
		$data['v_marco']=$this->Charts_model->tran_marco();
		$data['v_abril']=$this->Charts_model->tran_abril();
		$data['v_maio']=$this->Charts_model->tran_maio();
		$data['v_junho']=$this->Charts_model->tran_junho();
		$data['v_julho']=$this->Charts_model->tran_julho();
		$data['v_agosto']=$this->Charts_model->tran_agosto();
		$data['v_setembro']=$this->Charts_model->tran_setembro();
		$data['v_outubro']=$this->Charts_model->tran_outubro();
		$data['v_novembro']=$this->Charts_model->tran_novembro();
		$data['v_dezembro']=$this->Charts_model->tran_dezembro();

		$data['horas_manha']=$this->Charts_model->horas_manha();
		$data['horas_almoco']=$this->Charts_model->horas_almoco();
		$data['horas_tarde']=$this->Charts_model->horas_tarde();

		$data['c_janeiro']=$this->Charts_model->c_janeiro();
		$data['c_fevereiro']=$this->Charts_model->c_fevereiro();
		$data['c_marco']=$this->Charts_model->c_marco();
		$data['c_abril']=$this->Charts_model->c_abril();
		$data['c_maio']=$this->Charts_model->c_maio();
		$data['c_junho']=$this->Charts_model->c_junho();
		$data['c_julho']=$this->Charts_model->c_julho();
		$data['c_agosto']=$this->Charts_model->c_agosto();
		$data['c_setembro']=$this->Charts_model->c_setembro();
		$data['c_outubro']=$this->Charts_model->c_outubro();
		$data['c_novembro']=$this->Charts_model->c_novembro();
		$data['c_dezembro']=$this->Charts_model->c_dezembro();

		$data['total_clientes_site']=$this->Geral_model->get_countClientesSite();
		$data['total_clientes']=$this->Geral_model->get_countClientes();

		$data['totalcamapnhasativas']=$this->Charts_model->get_count_Campanhas_Ativas();
		$data['totalcamapnhasnativas']=$this->Charts_model->get_count_Campanhas_Nativas();

		$data['campanhasAtivas']=$this->Geral_model->get_countCamapanhas();
		$data['totalClientes']=$this->Geral_model->get_countClientes();
		$data['totalExpirarC']=$this->Geral_model->get_countExpirarC();
		$this->load->view('Header_V');		
		$this->load->view('Estatisticas_V',$data);
		$this->load->view('Footer_V');	
	}

	function teste()
	{
		$this->load->view('teste');
	}
	function enviarMailEmpregado()
	{
		$this->form_validation->set_rules('tipo', 'Tipo Empregado', 'required');
		$this->form_validation->set_rules('nome', 'Nome Empregado', 'required');
		$this->form_validation->set_rules('email', 'email Empregado', 'trim|required|valid_email|is_unique[comerciantes.EMAIL_COMERCIANTE]|is_unique[administradores.EMAIL_ADMIN]');

		if($this->form_validation->run())
		{
			$reset_key=md5(uniqid());
			if($this->Comerciante_model->verificaEmpregado($reset_key))
			{  
				$subject = "All-in-one-Wallet Adicionar Empregado";
				$message = "
				<p>Ol&aacute; ".$this->input->post('email').",</p> 
				<p>Isto &eacute; um email gerado autom&aacute;ticamente para poder se registar nos nossos serviçoes.</p>
				<p>Para tal clique aqui neste <a href='".site_url()."/Estatisticas_C/mostraInformacaoEmpregado/".$reset_key."'>link</a>.</p>
				<p>Assim que clicar no link ser&aacute; redirecionado para outra p&aacute;gina.</p>
				<p>Obrigado,</p>
				<p>Equipa All-in-one-Wallet</p>";			
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
				$this->email->to($this->input->post('email'));
				$this->email->subject($subject);
				$this->email->message($message);
			
		
			if($this->email->send())
			{
				$data['mensagem'] = 'Mensagem enviado para ' .$this->input->post('email') .' verifique o seu email para poder se registar no sistema';
				$this->load->view('teste',$data);
			}
			else
			{
				echo "Erro inesperado!";
			}	
		}
	}
		else
		{
			echo "Erro No formulário, talvez esse mail já exista.";
		}
	}

	public function mostraInformacaoEmpregado()
	{
		if($this->uri->segment(3))
		{
		$creation_key = $this->uri->segment(3);
		$result=$this->Comerciante_model->empregadoInfo($creation_key);
		if($result)
		{
			$data['cenas']=$result;
			$this->load->view('RegistoEmpregado',$data);
			return;
		}
		else
		{
			$data['cenas'] = '<h1 align="center">Erro ao listar informacao</h1>';
			$this->load->view('RegistoEmpregado',$data);
			return;
		}
		
		}	
	}
	public function AdicionarEmpregado()
	{
		$this->form_validation->set_rules('password', 'Palavra Passe', 'required');
		//$this->form_validation->set_rules('confirm_password', 'Confirmação Palavra Passe', 'required||matches[password]');
		//$this->form_validation->set_rules('data_nascimento', 'Data de Nascimento', 'required');
		//$this->form_validation->set_rules('sexo', 'Sexo', 'required');
		//$this->form_validation->set_rules('cidade', 'Cidade', 'required');
		
		if($this->form_validation->run())
		{
			$encrypted_password = md5($this->input->post('password'));
			$creation_key=$this->uri->segment(3);
			
			
			
			$result=$this->Comerciante_model->updateInfoComerciante($encrypted_password,$creation_key);
				if ($result)
				 {
					$data['msgR'] = '<h1 align="center">Registo Efetuado Com Sucesso!</h1>';
					$this->load->view('teste3',$data);
				}
				else
				{
					$data['msgR'] = '<h1 align="center">Erro Inesperado a Efetuar Registo</h1>';
					$this->load->view('teste3',$data);
				}
		}
		else
				{
					$data['msgR'] = '<h1 align="center">Dados Por Preencher</h1>';
					$this->load->view('teste3',$data);
				}

	}
		
	
}
?>