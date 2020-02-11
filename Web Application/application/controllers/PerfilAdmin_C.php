<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PerfilAdmin_C extends CI_Controller {
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
		$this->load->view('Header_V');
		$this->load->view('PerfilAdmin_V');
		$this->load->view('Footer_V');
	}
	
public function update() {
	if($this->input->post('admin_nome') != $this->session->userdata('admin_nome')) {
			$this->form_validation->set_rules('admin_nome', 'Nome', 'required');
	}

	if($this->input->post('admin_email') != $this->session->userdata('admin_email')) {	
		$this->form_validation->set_rules('admin_email', 'Email', 'trim|required|valid_email|is_unique[comerciantes.email_comerciante]|is_unique[administradores.email_admin]');
	}

	if(md5($this->input->post('admin_password')) != $this->session->userdata('admin_password') && ($this->input->post('comerciante_password') != 'examplePassword')) {	
		$this->form_validation->set_rules('admin_password', 'Password', 'required');
	}
	
	if($this->input->post('admin_telemovel') != $this->session->userdata('admin_telemovel')) {	
		$this->form_validation->set_rules('admin_telemovel', 'Telemóvel', 'required|numeric|max_length[9]|regex_match[/^[0-9]{9}$/]');
	}

	if($this->form_validation->run()) {
		if($this->input->post('admin_nome') != $this->session->userdata('admin_nome')) {
			$this->Admin_model->UpdateNomeAdmin($this->input->post('admin_nome'));
		}

		if($this->input->post('admin_email') != $this->session->userdata('admin_email')) {	
			$this->Admin_model->UpdateEmailAdmin($this->input->post('admin_email'));
		}

		if(md5($this->input->post('admin_password')) != $this->session->userdata('admin_password') && ($this->input->post('comerciante_password') != 'examplePassword')) {	
			$this->Admin_model->UpdatePasswordAdmin($this->input->post('admin_password'));
		}
	
		if($this->input->post('admin_telemovel') != $this->session->userdata('admin_telemovel')) {	
			$this->Admin_model->UpdateTelemovelAdmin($this->input->post('admin_telemovel'));
		}
		redirect('PerfilAdmin_C');
	}
	else
	$this->load->view('Header_V');
	$this->load->view('PerfilAdmin_V');
	$this->load->view('Footer_V');
}
	
	
    
}

?>