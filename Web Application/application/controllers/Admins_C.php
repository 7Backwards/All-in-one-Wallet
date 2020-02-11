<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins_C extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) {
			redirect('Ctr_geral');
		}
		else{
			$this->load->model('Admin_model');
            $this->Admin_model->SetSessionInfo();
			$this->load->view('Header_V');
            $this->load->view('Footer_V');
			
		}
       
	}

	public function index() 
	{
		$data['Admins']=$this->Admin_model->getAdmins();
		
        $this->load->view('Admins_V',$data);
     
    }


    
    function enviarMailAdmin()
	{
		
		$this->form_validation->set_rules('nomeA', 'Nome Empregado', 'required');
		$this->form_validation->set_rules('emailA', 'email Empregado', 'trim|required|valid_email|is_unique[comerciantes.EMAIL_COMERCIANTE]|is_unique[administradores.EMAIL_ADMIN]|is_unique[empregados.EMAIL_EMPREGADO]');
        
		if($this->form_validation->run())
		{
			$reset_key=md5(uniqid());
			if($this->Admin_model->verificaAdmin($reset_key))
			{  
				$subject = "All-in-one-Wallet Adicionar Administrador";
				$message = "
				<p>Ol&aacute; ".$this->input->post('nomeA').",</p> 
				<p>Isto &eacute; um email gerado autom&aacute;ticamente para poder se registar nos nossos servi&ccedil;os.</p>
				<p>Para tal clique neste <a href='".site_url()."/ConfirmRegistoAdmin_C/index/".$reset_key."'>link</a>.</p>
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
				$this->email->to($this->input->post('emailA'));
				$this->email->subject($subject);
				$this->email->message($message);
			
		
			if($this->email->send())
			{
                $data['msg'] = '<div class="text-success" style="font-size:1em">Mensagem enviado para ' .$this->input->post('emailA') .' ,contacte '.$this->input->post('nomeA') .' para completar o seu registo. </div>';
                $data['Admins']=$this->Admin_model->getAdmins();
                $this->load->view('Admins_V',$data);
               
			}
			else
			{   $data['msg']='<div style="font-size:1em;color:red"> Erro inesperado! Lamentamos, tente porfavor mais tarde </div>';
				$data['Admins']=$this->Admin_model->getAdmins();
		        $this->load->view('Admins_V',$data);
			}	
		}
	}
		else
		{
            $data['msg']='<div style="font-size:1em; color:red">Erro no formulário, verifique se todos os campos estão bem preenchidos e/ou se o Email já está em uso </div>';
			$data['Admins']=$this->Admin_model->getAdmins();
		    $this->load->view('Admins_V',$data);
		}
    }
}