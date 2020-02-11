<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empregados_Transacoes_C extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('empregado_id')) {
			redirect('Ctr_geral');
		}
		else{
			$this->load->model('Empregados_model');
			$this->load->model('Geral_model');
			$this->Empregados_model->SetSessionInfo();
			$this->load->view('Header_V');
			$this->load->view('Footer_V');		
		}
       
	}
	public function index() 
	{
		$data['usar_pontos'] = $this->session->userdata('estabelecimento_usarpontos');
		$data['ganhar_pontos'] = $this->session->userdata('estabelecimento_ganharpontos');
		$data['Clientes'] = $this->Empregados_model->get_clientes();
		$data['Transacoes'] = $this->Empregados_model->get_transacoes();
		$data['Campanhas'] = $this->Empregados_model->getCampanhasDisponiveis();		
		$this->load->view('Empregados_Transacoes_V',$data);
	}

	public function registo() {
		$this->form_validation->set_rules('id_cartao', 'ID do Cartão', 'required|trim');
		$this->form_validation->set_rules('Pontos_do_cliente', 'Pontos do Cliente', 'required');
		$this->form_validation->set_rules('total_pagar', 'Total a Pagar', 'required');
		if($this->input->post('Pontos_do_cliente')== null){ //quer dizer que o cartao ou nao existe ou nao está associado ao estabelecimento do empregado
			$data['usar_pontos'] = $this->session->userdata('estabelecimento_usarpontos');
			$data['ganhar_pontos'] = $this->session->userdata('estabelecimento_ganharpontos');
			$data['Clientes'] = $this->Empregados_model->get_clientes();
			$data['Transacoes'] = $this->Empregados_model->get_transacoes();
			$data['Campanhas'] = $this->Empregados_model->getCampanhasDisponiveis();
			$data['cliente_nao_existe']='Cartão não existente';	
			$this->load->view('Empregados_Transacoes_V',$data);
			return;
		}
		if($this->form_validation->run())
		{
			$pontos_no_fim_da_compra=$this->input->post('Pontos_do_cliente');
			$pontos_descontados= $this->Geral_model->getpontos($this->input->post('id_cartao')) - $pontos_no_fim_da_compra;
			$pontos_ganhos= $this->input->post('total_pagar') * $this->session->userdata('estabelecimento_ganharpontos');
			$dados_transacao = array (
				'ID_CARTAO' => $this->input->post('id_cartao'),
				'VALOR_TRANSACAO' => $this->input->post('total_pagar'),
				'PONTOS_GANHOS' => $pontos_ganhos,
				'PONTOS_DESCONTADOS' => $pontos_descontados,
				'NOME_RESPONSAVEL' => $this->session->userdata('empregado_nome')

			);
			$this->Geral_model->insertTransacao($dados_transacao);
			$this->Geral_model->updatePontos($pontos_no_fim_da_compra,$pontos_ganhos,$this->input->post('id_cartao'));
			redirect('Empregados_Transacoes_C');
		}
		else {
			$data['usar_pontos'] = $this->session->userdata('estabelecimento_usarpontos');
			$data['ganhar_pontos'] = $this->session->userdata('estabelecimento_ganharpontos');
			$data['Clientes'] = $this->Empregados_model->get_clientes();
			$data['Transacoes'] = $this->Empregados_model->get_transacoes();
			$data['Campanhas'] = $this->Empregados_model->getCampanhasDisponiveis();	
			$this->load->view('Empregados_Transacoes_V',$data);
		
	}
	    
	}


}
?>