<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empregados_Perfil_C extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('empregado_id')) {
			redirect('Ctr_geral');
		}
		else{
            $this->load->model('Empregados_model');
			$this->Empregados_model->SetSessionInfo();

			
		}
		

	}

	public function index() {
		$areasinteresse=$this->Empregados_model->ReturnAreasInteresse_Estabelecimento($this->session->userdata('estabelecimento_id'));
		$i=0;
		$cleanarray = array();
		if($areasinteresse->num_rows() > 0) {
			foreach($areasinteresse->result() as $row) {
			   $NomeAreaInteresse=$this->Empregados_model->ReturnNomeAreaInteresse($row->ID_AREAINTERESSE);
			   $cleanarray[$i] = $NomeAreaInteresse;
			   $i++;                 
			}
			$data['AreasInteresse'] = $cleanarray;
			$this->load->view('Header_V');		
			$this->load->view('Empregados_Perfil_V',$data);
			$this->load->view('Footer_V');
			
		}
		else{
			$this->load->view('Header_V');		
			$this->load->view('Empregados_Perfil_V');
			$this->load->view('Footer_V');
		}
	}

	public function update()
	{
		if($this->input->post('empregado_email') != $this->session->userdata('empregado_email')) {
			$this->form_validation->set_rules('empregado_email', 'Email', 'trim|required|valid_email|is_unique[empregados.email_empregado]|is_unique[comerciantes.EMAIL_COMERCIANTE]|is_unique[administradores.EMAIL_ADMIN]');
		}

		if($this->input->post('empregado_password') != $this->session->userdata('empregado_password')) {	
			$this->form_validation->set_rules('empregado_password', 'Password', 'required');
		}
		
		
		
	if($this->form_validation->run())
		{
			if($this->input->post('empregado_email') != $this->session->userdata('empregado_email')) {
				$verification_key = md5(rand());
				$this->Empregados_model->UpdateVerificationKey($verification_key);
				$subject = "Please verify email for Email Changing";
		$message = "
		<p>Ol&aacute;, </p>
		<p>Isto &eacute; um email gerado autom&aacute;ticamente para poder confirmar a sua conta.</p>
		<p>Para tal clique aqui neste <a href='".base_url()."index.php/MudarEmail/verify_email_change_email_empregado/".$verification_key."/".$this->input->post('empregado_email')."/".$this->session->userdata('empregado_email')."'>link</a>.</p>
		<p>Assim que clicar no link ser&aacute; redirecionado para outra p&aacute;gina.</p>
		<p>Obrigado,</p>
		<p>Equipa All-in-one-Wallet</p>";
		$config = array(
		'protocol'  => 'smtp',
		'smtp_host' => 'ssl://smtp.gmail.com',
		'smtp_port' =>  465,
		'smtp_user'  => 'ipvpint@gmail.com',
		'smtp_pass'  => 'cortisolshot',
		 'charset'    => 'utf-8',
		'mailtype'  => 'html',
		'charset'    => 'iso-8859-1',
		'wordwrap'   => TRUE
		);
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->initialize($config);
		$this->email->from('ipvpint@gmail.com');
		$this->email->to($this->input->post('empregado_email'));
		$this->email->subject($subject);
		$this->email->message($message);
	if($this->email->send())
	{

	}
	else {
		echo $this->email->print_debugger();
		$this->load->view('Header_V');		
		$this->load->view('Empregados_Perfil_V');
		$this->load->view('Footer_V');
	}
			}

			if(md5($this->input->post('empregado_password')) != $this->session->userdata('empregado_password') && ($this->input->post('empregado_password') != 'examplePassword')) {		
				$this->Empregados_model->UpdatePasswordempregado($this->input->post('empregado_password'));
			}


			redirect('Empregados_Perfil_C');
		}
		else {
			$this->load->view('Header_V');		
			$this->load->view('Empregados_Perfil_V');
			$this->load->view('Footer_V');
		}
		

	}

		
	

		

}
?>