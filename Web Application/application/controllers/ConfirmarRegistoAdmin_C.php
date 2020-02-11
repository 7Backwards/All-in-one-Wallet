<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfirmarRegistoAdmin_C extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('admin_id')) {
			redirect('Ctr_geral');
		}
		else{
			$this->load->model('Admin_model');
			$this->Admin_model->SetSessionInfo();
		}
       
	}

public function index()
	{
		$data['Informacao']=$this->Admin_model->getComprovarComerciante();
		if($data['Informacao']==false) {
			$this->load->view('Header_V');
			$this->load->view('NaoExistemComprovativosAdmin_V');
			$this->load->view('Footer_V');
		}
		else {
		$areasinteresse=$this->Admin_model->ReturnAreasInteresse_Estabelecimento($data['Informacao'][0]->ID_ESTABELECIMENTO);
		$i=0;
		$cleanarray = array();
        $info='';
		if($areasinteresse->num_rows() > 0) {
			foreach($areasinteresse->result() as $row) {
			   $NomeAreaInteresse=$this->Admin_model->ReturnNomeAreaInteresse($row->ID_AREAINTERESSE);
			   $cleanarray[$i] = $NomeAreaInteresse;
			   $i++;                 
			}
		$d=0;
		
		while(isset($cleanarray[$d])) {
			$info .= $cleanarray[$d] . ' ' ;	
			$d++;
		}
		$data['Areas_de_interesse']=$info;
		$this->load->view('Header_V',$data);
		$this->load->view('ConfirmarRegistoAdmin_V',$data);
		$this->load->view('Footer_V',$data);
	}
    }
    
}

public function aceitar() {
	
	$id_comerciante= $this->uri->segment(3,0);
	$this->Admin_model->AceitarRegisto($id_comerciante);
	$email_comerciante=$this->Admin_model->getEmailComerciante($id_comerciante);
	$subject = "All-in-one-Wallet Registo Comprovado";
	$message = "
	<p>Ol&aacute; ".$email_comerciante."</p> 
	<p>Os seus dados foram comprovados, poder&aacute; iniciar sess&atilde;o na nossa plataforma!</p>
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
		$this->email->to($email_comerciante);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	redirect('ConfirmarRegistoAdmin_C');
}

public function recusar() {
	$this->form_validation->set_rules('Razao_input', 'Razão de Recusa', 'required');
	if($this->form_validation->run()) {
	$id_comerciante= $this->uri->segment(3,0);
	$this->Admin_model->RecusarRegisto($id_comerciante);
	$email_comerciante=$this->Admin_model->getEmailComerciante($id_comerciante);
	$subject = "All-in-one-Wallet Registo Não Comprovado";
	$message = "
		<p>Ol&aacute; ".$email_comerciante."</p> 
		<p>Os seus dados não foram comprovados, a razão encontra-se a seguir:</p>
		<p> <br>".$this->input->post('Razao_input')."<br></p>
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
		$this->email->to($email_comerciante);
		$this->email->subject($subject);
		$this->email->message($message);
		$this->email->send();
	redirect('ConfirmarRegistoAdmin_C');
	}
	else{
	redirect('ConfirmarRegistoAdmin_C');
	}
	
}
}

?>