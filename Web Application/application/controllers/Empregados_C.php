<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empregados_C extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('comerciante_id')) {
			redirect('Ctr_geral');
		}
		else{
            $this->load->model('Geral_model');
			$this->load->model('Comerciante_model');
			$this->load->library('form_validation');
			$this->load->helper('form','url');
            $this->Geral_model->SetSessionInfo();
            $this->load->view('Header_V');
            $this->load->view('Footer_V');
		}
       
	}

	public function index() 
	{
        $data['Empregados'] = $this->Geral_model->get_empregados();	
		$this->load->view('Empregados_V',$data);

      
    }

    function enviarMailEmpregado()
	{
		$this->form_validation->set_rules('tipo', 'Tipo Empregado', 'required');
		$this->form_validation->set_rules('nome', 'Nome Empregado', 'required');
		$this->form_validation->set_rules('email', 'email Empregado', 'trim|required|valid_email|is_unique[comerciantes.EMAIL_COMERCIANTE]|is_unique[administradores.EMAIL_ADMIN]|is_unique[empregados.EMAIL_EMPREGADO]');
        
		if($this->form_validation->run())
		{
			$reset_key=md5(uniqid());
			if($this->Comerciante_model->verificaEmpregado($reset_key))
			{  
				$subject = "All-in-one-Wallet Adicionar Empregado";
				$message = "
				<p>Ol&aacute; ".$this->input->post('nome').",</p> 
				<p>Isto &eacute; um email gerado autom&aacute;ticamente para poder se registar nos nossos servi&ccedil;os.</p>
				<p>Para tal clique aqui neste <a href='".site_url()."/ConfirmRegistoEmpregado_C/index/".$reset_key."'>link</a>.</p>
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
				$data['Empregados'] = $this->Geral_model->get_empregados();
                $data['msg'] = '<div class="text-success">Mensagem enviado para ' .$this->input->post('email') .' ,contacte '.$this->input->post('nome') .' para completar o seu registo.</div>';
                $this->load->view('Empregados_V',$data);
               
			}
			else
			{   
				$data['Empregados'] = $this->Geral_model->get_empregados();
				$data['msg'] = '<h4 style="color:red">Erro inesperado, por favor tente mais tarde </h4';
		        $this->load->view('Empregados_V',$data);
				
			}	
		}
	}
		else
		{
            $data['Empregados'] = $this->Geral_model->get_empregados();	
			$this->load->view('Empregados_V',$data);
		}
    }
    
    

	public function Editar($ID_EMPREGADO = 0) {
		if($_SERVER['REQUEST_METHOD'] != 'POST'){

		$data['info'] = $this->Comerciante_model->mostrarDados($ID_EMPREGADO);
		$this->load->view('Editar_Empregado_V',$data);
		} 
		else
		 {
			
		// foi feito post do formulário de edição
		$this->Comerciante_model->editar();
		// refresh a tabela dos dados
		$this->index();
		}	

	}

	public function Remover($ID_EMPREGADO) {

		$this->Comerciante_model->eliminarEmpregado($ID_EMPREGADO);
		
		$this->index();
		
	}






}

?>