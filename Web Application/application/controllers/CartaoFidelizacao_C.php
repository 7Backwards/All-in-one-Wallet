<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CartaoFidelizacao_C extends CI_Controller {
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
		$this->load->view('CartaoFidelizacao_V');
		$this->load->view('Footer_V');
	}

	public function update()
	{
		if($this->input->post('ganharpontos_input') != $this->session->userdata('estabelecimento_ganharpontos')) {
			$this->form_validation->set_rules('ganharpontos_input', 'Ganhar Pontos', 'required|numeric');
		}

		if($this->input->post('usarpontos_input') != $this->session->userdata('estabelecimento_usarpontos')) {	
			$this->form_validation->set_rules('usarpontos_input', 'Usar Pontos', 'required|numeric');
		}

		$config['upload_path']='./LogotipoEstabelecimento';
		$config['allowed_types']='png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('Logotipo',FALSE))
		{
			//$errorLogotipo = array('error' => $this->upload->display_errors());

		}
		else {
			$fd_Logotipo=$this->upload->data();
			$fn_Logotipo=$fd_Logotipo['file_name'];
			$this->Geral_model->UpdateLogotipo($fn_Logotipo);
		}


		
	if($this->form_validation->run())
		{
			if($this->input->post('ganharpontos_input') != $this->session->userdata('estabelecimento_ganharpontos')) {	
				$this->Geral_model->UpdateGanharPontos($this->input->post('ganharpontos_input'));
			}
			if($this->input->post('usarpontos_input') != $this->session->userdata('estabelecimento_usarpontos')) {	
				$this->Geral_model->UpdateUsarPontos($this->input->post('usarpontos_input'));
			}

			
			
			
			
			
			redirect('CartaoFidelizacao_C');
		}
		else {
			$this->load->view('Header_V');		
			$this->load->view('CartaoFidelizacao_V');
			$this->load->view('Footer_V');
		}
		

	}
}
?>