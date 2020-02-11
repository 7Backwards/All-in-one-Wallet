 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConfirmRegistoAdmin_C extends CI_Controller {
    public function __construct()
	{
		parent::__construct();
		        
			$this->load->model('Admin_model');
			$this->load->library('form_validation');
			$this->load->helper('form');           
            $this->load->view('Header_V');
            $this->load->view('Footer_V');
		
       
	}

	public function index() 
	{
        if($this->uri->segment(3))
		{
		$creation_key = $this->uri->segment(3);
		$result=$this->Admin_model->AdminInfo($creation_key);
		if($result)
		{
			$data['dados']=$result;
			$this->load->view('RegistoAdmin_V',$data);
			return;
		}
		else
		{
			$data['dados'] = '<h4 align="center">Erro ao listar informacao</h4>';
			$this->load->view('RegistoAdmin_V',$data);
			return;
		}
		
		}	
    }

    public function AdicionarAdmin()
	{
		$this->form_validation->set_rules('password', 'Palavra Passe', 'required');
		$this->form_validation->set_rules('confirm_password', 'Confirmação Palavra Passe', 'required|matches[password]');
		$this->form_validation->set_rules('telemovel', 'Número Telefone', 'required');
		
		if($this->form_validation->run())
		{
			$encrypted_password = md5($this->input->post('password'));
			$creation_key=$this->uri->segment(3);
			
			
			
			$result=$this->Admin_model->updateInfoAdmin($encrypted_password,$creation_key);
				if ($result)
				 {
					$data['sucesso'] = '<h4 class="text-success" align="center">Registo Efetuado Com Sucesso!</h4>';
					$this->load->view('inicio',$data);
					
				}
				else
				{
					$data['message_verificardados'] = '<h4 align="center">Erro Inesperado, Tente Novamente Mais Tarde!</h4>';
					$this->load->view('inicio',$data);
				}
		}
		else
				{
					$data['message_verificardados'] = '<h4 align="center">Erro nos seus dados, confira o  Email</h4>';
					$this->load->view('inicio',$data);
					
				}

	}
}