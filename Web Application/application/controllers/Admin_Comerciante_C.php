<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Comerciante_C extends CI_Controller {
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
		$data['Comerciantes']=$this->Admin_model->getComerciantes();
        $this->load->view('Admin_Comerciante_V',$data);
     
    }

    

	public function Editar($ID_COMERCIANTE = 0) {
		if($_SERVER['REQUEST_METHOD'] != 'POST'){

        $data['dados'] = $this->Admin_model->mostrarDados($ID_COMERCIANTE);
        $data['Comerciantes']=$this->Admin_model->getComerciantes();
		$this->load->view('Admin_Comerciante_V',$data);
		} 
		else
		 {
			
		// foi feito post do formulário de edição
		$this->Admin_model->editar();
		// refresh a tabela dos dados
		$this->index();
		}	

	}

	


}
    ?>