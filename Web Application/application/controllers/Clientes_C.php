<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes_C extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if (!$this->session->userdata('comerciante_id')) {
			redirect('Ctr_geral');
		}
		else{
			$this->load->model('Geral_model');
			$this->load->model('Charts_model');
			$this->Geral_model->SetSessionInfo();
		}
       
	}
	public function index() 
	{
		$data['janeiro']=$this->Charts_model->janeiro();
		$data['fevereiro']=$this->Charts_model->fevereiro();
		$data['marco']=$this->Charts_model->marco();
		$data['abril']=$this->Charts_model->abril();
		$data['maio']=$this->Charts_model->maio();
		$data['junho']=$this->Charts_model->junho();
		$data['julho']=$this->Charts_model->julho();
		$data['agosto']=$this->Charts_model->agosto();
		$data['setembro']=$this->Charts_model->setembro();
		$data['outubro']=$this->Charts_model->outubro();
		$data['novembro']=$this->Charts_model->novembro();
		$data['dezembro']=$this->Charts_model->dezembro();
		$data['Clientes'] = $this->Geral_model->get_clientes();
		$data['lastmonth'] = $this->Geral_model->get_numbLastMonthC();
		$data['lastsixmonth'] = $this->Geral_model->get_numbLastSixMonthC();
		$data['totalclientes'] = $this->Geral_model->get_countClientes();
		$data['totallastweek'] = $this->Geral_model->get_numbLastWeekC();
		$this->load->view('Header_V');		
		$this->load->view('Clientes_V',$data);
		$this->load->view('Footer_V');
	}
}