<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EstatisticasAdmin_C extends CI_Controller {
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
		$data['c_janeiro']=$this->Admin_model->c_janeiro();
		$data['c_fevereiro']=$this->Admin_model->c_fevereiro();
		$data['c_marco']=$this->Admin_model->c_marco();
		$data['c_abril']=$this->Admin_model->c_abril();
		$data['c_maio']=$this->Admin_model->c_maio();
		$data['c_junho']=$this->Admin_model->c_junho();
		$data['c_julho']=$this->Admin_model->c_julho();
		$data['c_agosto']=$this->Admin_model->c_agosto();
		$data['c_setembro']=$this->Admin_model->c_setembro();
		$data['c_outubro']=$this->Admin_model->c_outubro();
		$data['c_novembro']=$this->Admin_model->c_novembro();
		$data['c_dezembro']=$this->Admin_model->c_dezembro();

		$data['v_janeiro']=$this->Admin_model->c_c_janeiro();
		$data['v_fevereiro']=$this->Admin_model->c_c_fevereiro();
		$data['v_marco']=$this->Admin_model->c_c_marco();
		$data['v_abril']=$this->Admin_model->c_c_abril();
		$data['v_maio']=$this->Admin_model->c_c_maio();
		$data['v_junho']=$this->Admin_model->c_c_junho();
		$data['v_julho']=$this->Admin_model->c_c_julho();
		$data['v_agosto']=$this->Admin_model->c_c_agosto();
		$data['v_setembro']=$this->Admin_model->c_c_setembro();
		$data['v_outubro']=$this->Admin_model->c_c_outubro();
		$data['v_novembro']=$this->Admin_model->c_c_novembro();
		$data['v_dezembro']=$this->Admin_model->c_c_dezembro();

		$data['planoFree']=$this->Admin_model->planoFree();
		$data['planoPro']=$this->Admin_model->planoPro();
		$data['planoPremium']=$this->Admin_model->planoPremium();

		$data['totalComerciantes']=$this->Admin_model->get_totalComerciantes();
		$data['totalClientes']=$this->Admin_model->get_total_clientes();
		$data['totalCampanhas']=$this->Admin_model->get_total_campanhas();
		$data['totalRegistoComerciantes']=$this->Admin_model->get_total_registoPor_verificar();
		$this->load->view('Header_V');
		$this->load->view('EstatisticasAdmin_V',$data);
		$this->load->view('Footer_V');
	}

}

?>