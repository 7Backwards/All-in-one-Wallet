
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ctr_geral extends CI_Controller {
	
		public function __construct()
	{
		
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encryption');
		$this->load->model('Geral_model');
		//mudar para o home page desejado da area privada
		if ($this->session->userdata('comerciante_id')) {
			redirect('Perfil_C');
		}
	}
	public function index()
	{
		$this->load->view('inicio');
		// entrada - mostra a lista completa dos contactos
		/*$this->load->view('Header_V');
		$this->load->view('EstatisticasAdmin_V');
		$this->load->view('Footer_V');*/

	}

//------------------Login------------
	function login()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('pass', 'Password', 'required');
	
		if($this->form_validation->run())
		{	

			$result=$this->Geral_model->can_login_comerciante($this->input->post('email'),$this->input->post('pass'));
			
			if($result=='Conta não está ativa') {
				$data['message']='<span class="text-danger">' . $result . '</span>';
				$this->load->view('inicio',$data);
				return;
			}
			if($result=='Por favor aguarde a comprovação por parte do Administrador') {
				$data['message']='<span class="text-danger">' . $result . '</span>';
				$this->load->view('inicio',$data);
				return;
			}
			if($result!='Email ou Password incorretos')
			{
				$session =array(
					'comerciante_id'=>$result,
								);				
				$this->session->set_userdata($session);
				redirect('Estatisticas_C');
					
			}
			else
			{
			$result=$this->Geral_model->can_login_admin($this->input->post('email'),$this->input->post('pass'));
			
			if($result!='Email ou Password incorretos')
			{
				
			
				$session =array(
					'admin_id'=>$result,
								);				
				$this->session->set_userdata($session);
				redirect('EstatisticasAdmin_C');
					
			}
			$result= $this->Geral_model->can_login_empregado($this->input->post('email'),$this->input->post('pass'));
			if($result=='Conta não está ativa, por favor verifique o seu email') {
				$data['message']='<span class="text-danger">' . $result . '</span>';
				$this->load->view('inicio',$data);
				return;
			}
			if($result!='Email ou Password incorretos')
			{
				$session =array(
					'empregado_id'=>$result,
								);				
				$this->session->set_userdata($session);
				redirect('Empregados_Transacoes_C');
					
			}
			else {	
				$data['message']='<span class="text-danger">Email ou Password incorretos</span>';
				$this->load->view('inicio',$data);
				return;
			}
		}
	}
	else
		{
			$this->load->view('inicio'); //Para mostra os erros do form_validation
			
		}
}



	public function RegistoView() {
		// apresenta a form para adicionar
		$this->load->view('registar');
	}
	// ---------------Registar Conta-----------------
	public function ValidarRegisto(){

		$this->form_validation->set_rules('Termos_Responsabilidade', 'Termos de Responsabilidade', 'required');
		//Comerciante
		$this->form_validation->set_rules('text_email', 'Email', 'trim|required|valid_email|is_unique[comerciantes.email_comerciante]|is_unique[administradores.EMAIL_ADMIN]|is_unique[empregados.EMAIL_EMPREGADO]');
		$this->form_validation->set_rules('text_PNome', 'Primeiro Nome', 'required');
		$this->form_validation->set_rules('text_UNome', 'Último Nome', 'required');
		$this->form_validation->set_rules('text_tele', 'Telemóvel', 'required|numeric|max_length[9]|regex_match[/^[0-9]{9}$/]');
		$this->form_validation->set_rules('text_nif', 'NIF', 'required|numeric|max_length[9]|regex_match[/^[0-9]{9}$/]');
		$this->form_validation->set_rules('text_datanasc', 'Data Nascimento', 'required');
		$this->form_validation->set_rules('text_password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('genero', 'Sexo', 'required');
		$this->form_validation->set_rules('text_confpassword', 'Confirmar Password', 'trim|required|matches[text_password]');
		//Estabelecimento
		$this->form_validation->set_rules('text_nomeEstabelecimento', 'Nome Estabelecimento', 'required');
		$this->form_validation->set_rules('text_morada', 'Morada', 'required');
		$this->form_validation->set_rules('text_codpostal', 'Código Postal', 'required');
		$this->form_validation->set_rules('text_cidade', 'Cidade', 'required');
		$this->form_validation->set_rules('areainteressebtn', 'Áreas de Interesse', 'required');
		$this->form_validation->set_rules('text_descricao', 'Descrição', 'required');
		$this->form_validation->set_rules('text_Gpontos', 'Ganhar Pontos', 'required');
		$this->form_validation->set_rules('text_Upontos', 'Usar Pontos', 'required');
		if (empty($_FILES['Logotipo']['name']))
{
    $this->form_validation->set_rules('Logotipo', 'Logótipo', 'required');
}
if (empty($_FILES['upload_doc1']['name']))
{
    $this->form_validation->set_rules('upload_doc1', 'Comprovativo', 'required');
}		
	
		


	if($this->form_validation->run())
	{
		$config['upload_path']='./VerificarComerciante';
		 
		$config['allowed_types']='png|jpg|jpeg|pdf';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('upload_doc1',FALSE))
		{
			
			$data['errorComprovativo'] = array('error' => $this->upload->display_errors());

			$this->load->view('registar',$data);
			return;

		}
		else {
			$fd_Comprovativo=$this->upload->data();
			$fn_Comprovativo=$fd_Comprovativo['file_name'];
		}
		$config['upload_path']='./LogotipoEstabelecimento';
		$config['allowed_types']='png|jpg|jpeg';
		$config['encrypt_name'] = TRUE;
		$this->load->library('upload',$config);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('Logotipo',FALSE))
		{
			
			$data['errorLogotipo'] = array('error' => $this->upload->display_errors());

			$this->load->view('registar',$data);
			return;

		}
		else {
			$fd_Logotipo=$this->upload->data();
			$fn_Logotipo=$fd_Logotipo['file_name'];

		}
		
		//Introduzir dados do Estabelecimento
		$dados_estabelecimento = array(
		'NOME_ESTABELECIMENTO' => $this->input->post('text_nomeEstabelecimento'),
		'MORADA_ESTABELECIMENTO' => $this->input->post('text_morada'),
		'CODIGO_POSTAL_ESTABELECIMENTO' => $this->input->post('text_codpostal'),
		'CIDADE_ESTABELECIMENTO' => $this->input->post('text_cidade'),
		'DESCRICAO_ESTABELECIMENTO' => $this->input->post('text_descricao'),
		'FILENAME_LOGOTIPO' => $fn_Logotipo,
		'FILENAME_COMPROVATIVO' => $fn_Comprovativo,
		'ganhar_pontos' =>  $this->input->post('text_Gpontos'),
		'usar_pontos' =>  $this->input->post('text_Upontos')
		
		
		);
		$id_estabelecimento= $this->Geral_model->insertEstabelecimento($dados_estabelecimento);	
		if($id_estabelecimento > 0)
		{	
			//Introduzir dados do Comerciante
			$verification_key = md5(rand());
			$encrypted_password=md5($this->input->post('text_password'));
			$dados_comerciante = array(
				'NOME_COMERCIANTE'=> $this->input->post('text_PNome') . ' ' . $this->input->post('text_UNome'),
				'TELEMOVEL_COMERCIANTE' => $this->input->post('text_tele'),
				'NIF_COMERCIANTE' => $this->input->post('text_nif'),
				'EMAIL_COMERCIANTE' => $this->input->post('text_email'),
				'DATA_NASCIMENTO' => $this->input->post('text_datanasc'),
				'PASSWORD_COMERCIANTE' => $encrypted_password,
				'SEXO' => $this->input->post('genero'),
				'ID_ESTABELECIMENTO' => $id_estabelecimento,
				'verification_key' => $verification_key,
				'is_email_verified' => 'no', //Email nao verificado
				'ESTADO_COMERCIANTE' => '0' //visto ainda nao estar comprovado pelo administrador
			);
			$id_comerciante= $this->Geral_model->insertComerciante($dados_comerciante);			
			//Introduzir dados das areas de interesse
		$keywords = explode(' ', $this->input->post('areainteressebtn'));
		foreach ($keywords as $keyword)
		{
			$keyword = trim($keyword);
			$this->Geral_model->insertAreasInteresse($keyword,$id_estabelecimento);
		}
			$subject = "All-in-one-Wallet Verifica&ccedil;&atilde;o da Conta";
		$message = "
		<p>Ol&aacute; ".$this->input->post('text_PNome')."</p> 
		<p>Isto &eacute; um email gerado autom&aacute;ticamente para poder confirmar a sua conta.</p>
		<p>Para tal clique aqui neste <a href='".site_url()."/Ctr_geral/verify_email/".$verification_key."'>link</a>.</p>
		<p>Assim que clicar no link ser&aacute; redirecionado para outra p&aacute;gina.</p>
		<p>Após efetuar a ativa&ccedil;&atilde;o da sua conta, ter&aacute; que aguardar pela aprovação do administrador, receber&aacute; um mail com a resposta.</p>
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
		$this->email->to($this->input->post('text_email'));
		$this->email->subject($subject);
		$this->email->message($message);
	if($this->email->send())
	{
		$data['message_verificarconta']= "<h3 align='center' style='color:green'>Registo Efetuado Com Sucesso <br>Verifique o seu Email </h3>";
		$this->load->view('inicio',$data);
	}
	else {
		$data['message_verificarconta']= "Erro na cria&ccedil;&aacute;o da Conta, Tente novamente mais tarde";
		$this->load->view('inicio',$data);
	}
		
}
	
}
else {
	
	$this->load->view('registar');
	return;

}
	}

function verify_email()
		{
			if($this->uri->segment(3))
		{
			$verification_key = $this->uri->segment(3);
		if($this->Geral_model->verify_email($verification_key))
		{
			$data['message_verificarconta'] = "<h3 align='center' style='color:green'>Verifica&ccedil;&atilde;o realizada com sucesso </h3>";
			$this->load->view('inicio',$data);
		}
		else
		{
			$data['message_verificarconta'] = '<h2 align="center">Link inválido</h1>';
			$this->load->view('inicio',$data);
		}
		}
		}



		
						
 
/*
$dados_modelo_fidelizacao = array (
'GANHAR_PONTOS' => $this->input->post('text_Gpontos'),
'USAR_PONTOS' => $this->input->post('text_Upontos')

);
$this->db->insert('modelo_fidelizacao', $dados_modelo_fidelizacao);   
*/


//---------------Recuperar Palavra passe-------------------
	public function recuperar_pass(){
		$this->load->view('recuperar');
	}

	function email_reset_password_validation()
	{
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

		if($this->form_validation->run())
		{
			$reset_key=md5(uniqid());	
			if($this->Geral_model->update_reset_key($reset_key))
			{    
			$subject = "All-in-one-Wallet Recuperar Password";
			$message = "
			<p>Ol&aacute; ".$this->input->post('email').",</p> 
			<p>Isto &eacute; um email gerado autom&aacute;ticamente para poder dar reset &agrave; sua palavra-passe.</p>
			<p>Para tal clique aqui neste <a href='".site_url()."/Atualizar_password/change_password/".$reset_key."'>link</a>.</p>
			<p>Assim que clicar no link ser&aacute; redirecionado para outra p&aacute;gina.</p>
			<p>Obrigado,</p>
			<p>Equipa All-in-one-Wallet</p>";			
			$config = array(
				'protocol'  => 'smtp',
				'smtp_host' => 'ssl://smtp.gmail.com',
				'smtp_port' =>  465,
				'smtp_user'  => 'ipvpint@gmail.com',
				'smtp_pass'  => 'cortisolshot',
				'charset'    => 'iso-8859-1',
				'mailtype'  => 'html',
				'wordwrap'   => TRUE
				);
	
			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");
			$this->email->initialize($config);
			$this->email->from('ipvpint@gmail.com');
			$this->email->to($this->input->post('email'));
			$this->email->subject($subject);
			$this->email->message($message);
		
		
			if($this->email->send())
			{
				$data['message_verifiqueEmail'] = 'Verifique o Seu email ' .$this->input->post('email') .' para recuperar a sua palavra-passe';
				$this->load->view('inicio',$data);
			}
			else
			{
				$data['msg']="Erro inesperado!";
				$this->load->view('recuperar',$data);
				
			}
		}
		else
		{
			$data['msg']="Email não existe";
			$this->load->view('recuperar',$data);
			
		}
		
			
		}
		
	}
	




}
