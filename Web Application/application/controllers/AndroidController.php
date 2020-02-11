<?php

class AndroidController extends CI_Controller {
public function gettransacoes_mobile(){
		$this->load->model('Geral_model');
		if($this->input->post('id')) {
			$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
			$transacoes=$this->Geral_model->getHistoricotransacoes_mobile($id);
		if(!empty($transacoes)){
			$response["status"] = 0;
			$response["transacoes"] = array();
		foreach ((array)$transacoes as $row):
			$response["transacoes"][]=$row;
		endforeach;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Não possui transações disponiveis";
		}
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Parametros obrigatorios por preencher";
		}
		$arr['obj'] = array($response) ;
		echo json_encode($response);
	}
	public function getcampanhas_mobile() { 
		$this->load->model('Geral_model');
		if($this->input->post('id')) {
			$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
			$campanhas=$this->Geral_model->getCampanhas_mobile($id);
		if(!empty($campanhas)){
			$response["status"] = 0;
			$response["campanhas"] = array();
		foreach ((array)$campanhas as $row):
			$response["campanhas"][]=$row;
		endforeach;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Não possui campanhas disponiveis";
		}
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Parametros obrigatorios por preencher";
		}
		$arr['obj'] = array($response);
		echo json_encode($response);
	}

	public function getcartoes_mobile() { 
		$this->load->model('Geral_model');
		if($this->input->post('id')) {
			$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
			$cartoes=$this->Geral_model->getCartoes_mobile($id);
		if(!empty($cartoes)){
			$response["status"] = 0;
			$response["cartoes"] = array();
		foreach ((array)$cartoes as $row):
			$response["cartoes"][]=$row;
		endforeach;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Não possui cartões disponiveis";
		}
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Parametros obrigatorios por preencher";
		}
		$arr['obj'] = array($response) ;
		echo json_encode($response);
	}

	public function getclientes_mobile() { 
		$this->load->model('Geral_model');
		if($this->input->post('id')) {
			$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
			$clientes=$this->Geral_model->getCliente_mobile($id);
		if(!empty($clientes)){
			$response["status"] = 0;
			$response["clientes"] = array();
		foreach ((array)$clientes as $row):
			$response["clientes"][]=$row;
		endforeach;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Não possui clientes disponiveis";
		}
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Parametros obrigatorios por preencher";
		}
		$arr['obj'] = array($response);

		echo json_encode($response);
	}
	


public function getmapas_mobile() { //mudar nome
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
	
	
	$mapas=$this->Geral_model->getMapas_mobile($id); 
	if(!empty($mapas)){
	$response["status"] = 0;
	$response["mapas"] = array();
	foreach ((array)$mapas as $row):
		$response["mapas"][]=$row;
	endforeach;
	}
	else{
		$response["status"] = 1;
		$response["message"] = "Não possui mapas disponiveis";
	}
	}
	else{
		$response["status"] = 1;
		$response["message"] = "Parametros obrigatorios por preencher";
	}
	$arr['obj'] = array($response);
	echo json_encode($response);
}

	//--------------------gonçalo sabado----------------

public function insert_cartoes_mob() { 
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
		$id_estabelecimento=$this->input->post('id_estabelecimento');
		$cartoes=$this->Geral_model->insert_cartoes_mobile($id,$id_estabelecimento);
		if($cartoes==true){
			$response["status"] = 0;
			$response["message"] = "Cartão inserido com sucesso";
		return;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Erro a inserir cartão";
		}
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Parametros obrigatorios por preencher";
		}
	 $arr['obj'] = array($response) ;
	 echo json_encode($response);
}



public function get_cartoes_informacao() { 
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
		$clientes=$this->Geral_model->get_cartoes_info($id);
	if(!empty($clientes)){
		$response["status"] = 0;
		$response["cartoes"] = array();
		foreach ((array)$clientes as $row):
			$response["cartoes"][]=$row;
		endforeach;
		}
	else{
		$response["status"] = 1;
		$response["message"] = "Não possui clientes disponiveis";
	}
	}
	else{
		$response["status"] = 1;
		$response["message"] = "Parametros obrigatorios por preencher";
	}
	$arr['obj'] = array($response) ;
	echo json_encode($response);
}




public function getallcampanhas_mobile() { 
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
		$campanhas=$this->Geral_model->getAllCampanhas_mobile($id);
	
			if(!empty($campanhas)){
				$response["status"] = 0;
				$response["campanhas"] = array();
				foreach ((array)$campanhas as $row):
				$response["campanhas"][]=$row;
				endforeach;
			}
			else{
				$response["status"] = 1;
				$response["message"] = "Não possui clientes disponiveis";
			}
	}
	else{
		$response["status"] = 1;
		$response["message"] = "Parametros obrigatorios por preencher";
	}
	$arr['obj'] = array($response) ;
	echo json_encode($response);
}

public function updateNotificacoes_mobileApp() { 
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
		$notApp=$this->input->post('notApp');
		$result=$this->Geral_model->update_cliente_notificacaoApp($id,$notApp);
		if($result== true){
			$response["status"] = 0;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Erro";
		}
	}
		else{
			$response["status"] = 1;
			$response["message"] = "Parametros obrigatorios por preencher";
		}
	$arr['obj'] = array($response);
	echo json_encode($response);
}

public function updateNotificacoes_mobileMail() { 
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
		$notMail=$this->input->post('notMail');
		$result=$this->Geral_model->update_cliente_notificacaoMail($id,$notMail);
		if($result== true){
			$response["status"] = 0;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Erro";
		}
	}
		else{
			$response["status"] = 1;
			$response["message"] = "Parametros obrigatorios por preencher";
		}
	$arr['obj'] = array($response);
	echo json_encode($response);
}
public function DeleteCartao_mobile() { 
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id_cliente=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
		$id_estabelecimento=$this->input->post('id_estabelecimento');
		$id_cartao=$this->Geral_model->getID_CARTAO($id_cliente,$id_estabelecimento);
		$result=$this->Geral_model->DeleteCartao($id_cartao);
		if($result== true){
			$response["status"] = 0;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Erro";
		}
	$arr['obj'] = array($response);
	echo json_encode($response);
    }
}

public function DeleteCliente_mobile() { 
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id_cliente=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
		$result=$this->Geral_model->DeleteUser($id_cliente);
		if($result== true){
			$response["status"] = 0;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Erro";
		}
	$arr['obj'] = array($response);
	echo json_encode($response);
    }
}

public function getTransacoes_Estabelecimento() {
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id_cartao=$this->input->post('id');//id do cartão*/
		$transacoes=$this->Geral_model->getTransacoes_Estabelecimento_mobile($id_cartao);
		if(!empty($transacoes)){
			$response["status"] = 0;
			$response["transacoes"] = array();
			foreach ((array)$transacoes as $row):
			$response["transacoes"][]=$row;
			endforeach;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Não possui transacoes disponiveis";
		}
}
else{
	$response["status"] = 1;
	$response["message"] = "Parametros obrigatorios por preencher";
}
$arr['obj'] = array($response);
echo json_encode($response);
}



public function FidelizarCliente_mobile() { 
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		$id_cliente=$this->Geral_model->getIDCliente_FromFirebaseID($this->input->post('id'));
		$id_estabelecimento=$this->input->post('id_estabelecimento');
		$result=$this->Geral_model->FidelizarMobile($id_cliente,$id_estabelecimento);
		if($result== true){
			$response["status"] = 0;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Erro";
		}
	$arr['obj'] = array($response);
	echo json_encode($response);
    }
}

public function AdicionarCliente() { 
	$this->load->model('Geral_model');
	if($this->input->post('id')) {
		if($this->input->post('email') == "0") 
			$email_cliente=NULL;
		else
			$email_cliente=$this->input->post('email');
		if($this->input->post('nome') == "0")
			$nome_cliente=NULL;	
		else
		$nome_cliente=$this->input->post('nome');
		if($this->input->post('telemovel') == "0")
			$telemovel_cliente=NULL;	
		else
		$telemovel_cliente=$this->input->post('telemovel');
		$id=$this->input->post('id');
		$result=$this->Geral_model->AdicionarCliente_mobile($id,$email_cliente,$telemovel_cliente,$nome_cliente);
		if($result== true){
			$response["status"] = 0;
		}
		else{
			$response["status"] = 1;
			$response["message"] = "Erro";
		}
	$arr['obj'] = array($response);
	echo json_encode($response);
    }
}
}	
    ?>
