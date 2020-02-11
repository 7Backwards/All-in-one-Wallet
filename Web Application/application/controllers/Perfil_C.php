<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perfil_C extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('comerciante_id')) {
			redirect('Ctr_geral');
		}
		else{
			$this->load->model('Geral_model');
			$this->load->model('Comerciante_model');
			$this->Geral_model->SetSessionInfo();

			
		}
		

	}

	public function index() {
		
		$areasinteresse=$this->Geral_model->ReturnAreasInteresse_Estabelecimento($this->session->userdata('estabelecimento_id'));
		$i=0;
		$cleanarray = array();
		if($areasinteresse->num_rows() > 0) {
			foreach($areasinteresse->result() as $row) {
			   $NomeAreaInteresse=$this->Geral_model->ReturnNomeAreaInteresse($row->ID_AREAINTERESSE);
			   $cleanarray[$i] = $NomeAreaInteresse;
			   $i++;                 
			}
			$data['AreasInteresse'] = $cleanarray;
			$data['nomeplano']=$this->Comerciante_model->getInfoPlanos();
			$data['diasfalta']=$this->Comerciante_model->getRestDays();
		
	
			$this->load->view('Header_V');		
			$this->load->view('Perfil_V',$data);
			$this->load->view('Footer_V');
			
		}
		else{
			$this->load->view('Header_V');		
			$this->load->view('Perfil_V');
			$this->load->view('Footer_V');
		}
	}

	public function update()
	{
		if($this->input->post('comerciante_email') != $this->session->userdata('comerciante_email')) {
			$this->form_validation->set_rules('comerciante_email', 'Email', 'trim|required|valid_email|is_unique[empregados.email_empregado]|is_unique[comerciantes.EMAIL_COMERCIANTE]|is_unique[administradores.EMAIL_ADMIN]');
		}

		if($this->input->post('comerciante_telemovel') != $this->session->userdata('comerciante_telemovel')) {	
			$this->form_validation->set_rules('comerciante_telemovel', 'Telemóvel', 'required|numeric|max_length[9]|regex_match[/^[0-9]{9}$/]');
		}

		if($this->input->post('comerciante_password') != $this->session->userdata('comerciante_password')) {	
			$this->form_validation->set_rules('comerciante_password', 'Password', 'required');
		}
		
		if($this->input->post('estabelecimento_nome') != $this->session->userdata('estabelecimento_nome')) {	
			$this->form_validation->set_rules('estabelecimento_nome', 'Nome Estabelecimento', 'required');
		}

		if($this->input->post('estabelecimento_morada') != $this->session->userdata('estabelecimento_morada')) {	
			$this->form_validation->set_rules('estabelecimento_morada', 'Morada Estabelecimento', 'required');
		}

		if($this->input->post('estabelecimento_cidade') != $this->session->userdata('estabelecimento_cidade')) {	
			$this->form_validation->set_rules('estabelecimento_cidade', 'Cidade Estabelecimento', 'required');
		}

		if($this->input->post('estabelecimento_codigopostal') != $this->session->userdata('estabelecimento_codigopostal')) {	
			$this->form_validation->set_rules('estabelecimento_codigopostal', 'Código Postal Estabelecimento', 'required');
		}

		if($this->input->post('estabelecimento_descricao') != $this->session->userdata('estabelecimento_descricao')) {	
			$this->form_validation->set_rules('estabelecimento_descricao', 'Descrição Estabelecimento', 'required');
		}
		if($this->input->post('areainteressebtn') != $this->session->userdata('estabelecimento_areasinteresse')) {	
			$this->form_validation->set_rules('areainteressebtn', 'Áreas Interesse Estabelecimento', 'required');
		}

		
		
	if($this->form_validation->run())
		{
			if($this->input->post('comerciante_email') != $this->session->userdata('comerciante_email')) {
				$verification_key = md5(rand());
				$this->Geral_model->UpdateVerificationKey($verification_key);
				$subject = "Please verify email for Email Changing";
		$message = "
		<p>Ol&aacute; ".$this->session->userdata('comerciante_nome') ."</p>
		<p>Isto &eacute; um email gerado autom&aacute;ticamente para poder confirmar a sua conta.</p>
		<p>Para tal clique aqui neste <a href='".base_url()."index.php/MudarEmail/verify_email_change_email_comerciante/".$verification_key."/".$this->input->post('comerciante_email')."/".$this->session->userdata('comerciante_email')."'>link</a>.</p>
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
		$this->email->to($this->input->post('comerciante_email'));
		$this->email->subject($subject);
		$this->email->message($message);
	if($this->email->send())
	{

	}
	else {
		echo $this->email->print_debugger();
		$this->load->view('Header_V');		
		$this->load->view('Perfil_V');
		$this->load->view('Footer_V');
	}
			}
	
			if($this->input->post('comerciante_telemovel') != $this->session->userdata('comerciante_telemovel')) {	
				$this->Geral_model->UpdateTelemovelComerciante($this->input->post('comerciante_telemovel'));
			}
	
			if($this->input->post('estabelecimento_nome') != $this->session->userdata('estabelecimento_nome')) {	
				$this->Geral_model->UpdateNomeEstabelecimento($this->input->post('estabelecimento_nome'));
			}
	
			if($this->input->post('estabelecimento_morada') != $this->session->userdata('estabelecimento_morada')) {	
				$this->Geral_model->UpdateMoradaEstabelecimento($this->input->post('estabelecimento_morada'));
			}
	
			if($this->input->post('estabelecimento_cidade') != $this->session->userdata('estabelecimento_morada')) {	
				$this->Geral_model->UpdateCidadeEstabelecimento($this->input->post('estabelecimento_cidade'));
			}
	
			if($this->input->post('estabelecimento_codigopostal') != $this->session->userdata('estabelecimento_codigopostal')) {	
				$this->Geral_model->UpdateCodigoPostalEstabelecimento($this->input->post('estabelecimento_codigopostal'));
			}
	
			if($this->input->post('estabelecimento_descricao') != $this->session->userdata('estabelecimento_descricao')) {	
				$this->Geral_model->UpdateDescricaoEstabelecimento($this->input->post('estabelecimento_descricao'));
			}

			if(md5($this->input->post('comerciante_password')) != $this->session->userdata('comerciante_password') && ($this->input->post('comerciante_password') != 'examplePassword')) {		
				$this->Geral_model->UpdatePasswordComerciante($this->input->post('comerciante_password'));
			}

			if($this->input->post('areainteressebtn') != $this->session->userdata('estabelecimento_areasinteresse')) {
				$keywords = explode(' ', $this->input->post('areainteressebtn'));
				$this->Geral_model->DeleteAreasInteresse_estabelecimento();
				foreach ($keywords as $keyword)
				{
					$keyword = trim($keyword);
					$this->Geral_model->insertAreasInteresse($keyword,$this->session->userdata('estabelecimento_id'));
				}	
					
				}
			
			redirect('Perfil_C');
		}
		else {
			$this->load->view('Header_V');		
			$this->load->view('Perfil_V');
			$this->load->view('Footer_V');
		}
		

	}
	
	public function comprarPremium()
	{
		$id_estabelecimento= $this->session->userdata('estabelecimento_id');
		$resultado=$this->Comerciante_model->checkplanoPremium($id_estabelecimento);
		if($resultado)
		{	$data['nomeplano']=$this->Comerciante_model->getInfoPlanos();
			$data['msg']="<div style='color:red; size:0.5em'> Já Possui um plano neste momento </div>";
			$data['diasfalta']=$this->Comerciante_model->getRestDays();
			$this->load->view('Header_V');		
			$this->load->view('Perfil_V',$data);
			$this->load->view('Footer_V');
		}
		else
		{
			$this->Comerciante_model->compraplanoPremium($id_estabelecimento);
			$data['nomeplano']=$this->Comerciante_model->getInfoPlanos();
			$data['msg']="<div style='color:green; size:0.5em'>Comprou o plano Premium com sucesso! </div>";
			$data['diasfalta']=$this->Comerciante_model->getRestDays();
			$this->load->view('Header_V');		
			$this->load->view('Perfil_V',$data);
			$this->load->view('Footer_V');
		}


	}

	public function comprarPro()
	{
		$id_estabelecimento= $this->session->userdata('estabelecimento_id');
		$resultado=$this->Comerciante_model->checkplanoPremium($id_estabelecimento);
		if($resultado)
		{
			$data['msg']="<div style='color:red; size:0.5em'> Já Possui um plano neste momento </div>";
			$data['nomeplano']=$this->Comerciante_model->getInfoPlanos();
			$data['diasfalta']=$this->Comerciante_model->getRestDays();
			$this->load->view('Header_V');		
			$this->load->view('Perfil_V',$data);
			$this->load->view('Footer_V');
		}
		else
		{
			$this->Comerciante_model->compraplanoPro($id_estabelecimento);
			$data['msg']="<div style='color:green; size:0.5em'>Comprou o plano Pro com sucesso! </div>";
			$data['nomeplano']=$this->Comerciante_model->getInfoPlanos();
			$data['diasfalta']=$this->Comerciante_model->getRestDays();
			$this->load->view('Header_V');		
			$this->load->view('Perfil_V',$data);
			$this->load->view('Footer_V');
		}
	}
		
	

		

}
?>