<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empregados_Campanhas_C extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('estabelecimento_id')) {
			redirect('Ctr_geral');
		}
		else{
            $this->load->model('Geral_model');
			$this->load->model('Empregados_model');            
			$this->Empregados_model->SetSessionInfo();
		}
       
	}
	public function Mostrar() {
	
		$data['Campanhas'] = $this->Geral_model->getCampanhas();
		$this->load->view('Header_V');		
		$this->load->view('Empregados_Campanhas_V',$data);
		$this->load->view('Footer_V');
		
	}
	
}
?>