<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Campanhas_C extends CI_Controller {
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
	public function Mostrar() {

		$data['Campanhas'] = $this->Geral_model->getCampanhas();
		$this->load->view('Header_V');		
		$this->load->view('Campanhas_V',$data);
		$this->load->view('Footer_V');

	}
	public function Criar() {

		$this->load->view('Header_V');		
		$this->load->view('CriarCampanha_V');
		$this->load->view('Footer_V');

	}
	
	public function AdicionarCampanha() {
			$this->form_validation->set_rules('NomeCampanha', 'Nome da Campanha', 'required');
			$this->form_validation->set_rules('AreaInteresseCampanha', 'Área de Interesse', 'required');
			$this->form_validation->set_rules('datainicio_campanha', 'Data Ínicio Campanha', 'required');
			$this->form_validation->set_rules('DescricaoCampanha', 'Descrição de Campanha', 'required');
			
			
			$data_fim=$this->input->post('datafim_campanha');
			if(!($this->input->post('semfim_campanha')) && !($this->input->post('datafim_campanha'))) {
		        $this->load->view('Header_V');		
				$this->load->view('Campanhas_V');
				$this->load->view('Footer_V');
				return;
			}
			else {
				if($this->input->post('semfim_campanha') == 1) {
					$data_fim=NULL;
					
				}
				else {
					if($this->input->post('datainicio_campanha')>= $this->input->post('datafim_campanha')){
						$this->load->view('Header_V');		
						$this->load->view('Campanhas_V');
						$this->load->view('Footer_V');
						return;
					}
					
				}

			}
		

		


		
	if($this->form_validation->run())
		{
			$fn_Logotipo= NULL;
			$config['upload_path']='./LogotipoCampanhas';
			$config['allowed_types']='png|jpg|jpeg';
			$config['encrypt_name'] = TRUE;
			$this->load->library('upload',$config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('ImagemCampanha',FALSE))
			{
				/*$errorLogotipo = array('error' => $this->upload->display_errors());
				foreach($errorLogotipo as $erro) {
					echo $erro, '<br>';
				}
				$this->load->view('fewfdsfew');
				return;*/
			}
			else {
				$fd_Logotipo=$this->upload->data();
				$fn_Logotipo=$fd_Logotipo['file_name'];
			}
			

			//Introduzir dados da campanha
		$dados_campanha = array(
			'ID_ESTABELECIMENTO' => $this->session->userdata('estabelecimento_id'),
			'FILENAME_LOGOTIPO_CAMPANHA' => $fn_Logotipo,
			'DESCRICAO_CAMPANHA' => $this->input->post('DescricaoCampanha'),
			'DATA_INICIO_CAMPANHA' => $this->input->post('datainicio_campanha'),
			'DATA_FIM_CAMPANHA' => $data_fim,
			'NOME_CAMPANHA' => $this->input->post('NomeCampanha'),
			'ESTADO_PUBLICACAO_CAMPANHA' =>  '0'
			);
			$id_campanha=$this->Geral_model->insertCampanha($dados_campanha);
			//Introduzir Areas de Interesse
			$this->Geral_model->adicionarAreaInteresse_campanhas($id_campanha,$this->input->post('AreaInteresseCampanha'));
			redirect('Campanhas_C/Criar');	
		}
		else {
			$this->load->view('Header_V');		
			$this->load->view('Campanhas_V');
			$this->load->view('Footer_V');
		}
		

	}
	
	public function Remover() {
		$id=$this->input->get('id'); //Recebe o id do input através da view
		$this->Geral_model->removerCampanha($id);
		redirect('Campanhas_C/Mostrar');
		}

	public function publicar() {
		$id=$this->input->get('id'); //Recebe o id do input através da view
		$this->Geral_model->publicarCampanha($id);
		redirect('Campanhas_C/Mostrar');
	}
	
}
?>