<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    class Empregados_model extends CI_Model{

function SetSessionInfo() {
            $id_empregado=$this->session->userdata('empregado_id');
            $sql_empregado="select * from empregados where ID_EMPREGADO like "."'$id_empregado'";
            $empregado =$this->db->query($sql_empregado)->row();
            $id_estabelecimento=$empregado->ID_ESTABELECIMENTO;
            $sql_estabelecimento="select * from estabelecimento where ID_ESTABELECIMENTO like "."'$id_estabelecimento'";
            $estabelecimento =$this->db->query($sql_estabelecimento)->row();
            $areasinteresse=$this->Empregados_model->ReturnAreasInteresse_Estabelecimento($id_estabelecimento);
		    $i=0;
            $cleanarray = array();
            $info='';
		    if($areasinteresse->num_rows() > 0) {
			    foreach($areasinteresse->result() as $row) {
			       $NomeAreaInteresse=$this->Empregados_model->ReturnNomeAreaInteresse($row->ID_AREAINTERESSE);
			       $cleanarray[$i] = $NomeAreaInteresse;
			       $i++;                 
		    	}
            $d=0;
            
            while(isset($cleanarray[$d])) {
				$info .= $cleanarray[$d] . ' ' ;	
                $d++;
            }
        }
            $session =array(
                'empregado_id'=>$empregado->ID_EMPREGADO,
                'empregado_nome' =>$empregado->NOME_EMPREGADO,
                 'empregado_email'=>$empregado->EMAIL_EMPREGADO,    
                 'empregado_sexo' => $empregado->SEXO_EMPREGADO,
                 'empregado_datanasc' => $empregado->DATA_NASC_EMPREGADO,
                 'estabelecimento_id' => $id_estabelecimento,
                 'estabelecimento_nome' => $estabelecimento->NOME_ESTABELECIMENTO,
                 'estabelecimento_cidade' => $estabelecimento->CIDADE_ESTABELECIMENTO,
                 'estabelecimento_morada' => $estabelecimento->MORADA_ESTABELECIMENTO,
                 'estabelecimento_codigopostal' => $estabelecimento->CODIGO_POSTAL_ESTABELECIMENTO,
                 'estabelecimento_filename_logotipo' => $estabelecimento->FILENAME_LOGOTIPO,
                 'estabelecimento_descricao' => $estabelecimento->DESCRICAO_ESTABELECIMENTO,
                 'estabelecimento_ganharpontos' => $estabelecimento->ganhar_pontos,
                 'estabelecimento_usarpontos' => $estabelecimento->usar_pontos,
                 'empregado_password' => $empregado->PASSWORD_EMPREGADO,
                 'estabelecimento_areasinteresse' =>  $info

                 
                            );				
            $this->session->set_userdata($session);

        }
function ReturnAreasInteresse_Estabelecimento($id_estabelecimento) {
   $sql_areasinteresse="select * from Estabelecimento_AreaInteresse where ID_ESTABELECIMENTO like "."'$id_estabelecimento'";
       return $this->db->query($sql_areasinteresse);
}

function ReturnNomeAreaInteresse($id_areainteresse) {
    $this->db->where('ID_AREAINTERESSE',$id_areainteresse);
    return $this->db->get('area_interesse')->row()->NOME_AREAINTERESSE;
          
}

public function get_clientes() {
       
    $this->db->select('clientes.*,cartoes.*');
    $this->db->from('clientes');
    $this->db->join('cartoes', 'clientes.ID_CLIENTE = cartoes.ID_CLIENTE');
    $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
    $query = $this->db->get();
    return $query->result_array();

}


public function get_transacoes() {
        $this->db->select('transacoes.*,clientes.NOME_CLIENTE');
$this->db->from('transacoes');
$this->db->join('cartoes', 'transacoes.ID_CARTAO = cartoes.ID_CARTAO');
$this->db->join('clientes', 'cartoes.ID_CLIENTE = clientes.ID_CLIENTE');
$this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
$query = $this->db->get();
return $query->result_array();
}

public function getCampanhasDisponiveis() {
    $estabelecimento_id= $this->session->userdata('estabelecimento_id');
    $query = $this->db->query(" select campanhas.ID_CAMPANHA , FILENAME_LOGOTIPO_CAMPANHA , DESCRICAO_CAMPANHA , DATA_INICIO_CAMPANHA , DATA_FIM_CAMPANHA , NOME_CAMPANHA , ESTADO_PUBLICACAO_CAMPANHA , NOME_AREAINTERESSE
    FROM campanhas join area_interesse_campanhas on campanhas.ID_CAMPANHA = area_interesse_campanhas.ID_CAMPANHA join area_interesse on area_interesse_campanhas.ID_AREAINTERESSE = area_interesse.ID_AREAINTERESSE
    WHERE ID_ESTABELECIMENTO like "."'$estabelecimento_id' and DATA_INICIO_CAMPANHA <= CURDATE() and DATA_FIM_CAMPANHA >= CURDATE() and ESTADO_PUBLICACAO_CAMPANHA =1 group by campanhas.ID_CAMPANHA , ID_ESTABELECIMENTO , NOME_AREAINTERESSE");
    return $query->result();

}

function UpdatePasswordEmpregado($PasswordEmpregado) {
    $encrypted_password=md5($PasswordEmpregado);

    $data = array(
        'PASSWORD_EMPREGADO' => $encrypted_password
    );
    $this->db->where('ID_EMPREGADO',$this->session->userdata('empregado_id'));
    $this->db->update('empregados',$data);

 

}

function UpdateEmailEmpregado($novoemail,$atualemail) {
    $data = array(
        'EMAIL_EMPREGADO' => $novoemail
    );
    $this->db->where('EMAIL_EMPREGADO',$atualemail);
    $this->db->update('empregados',$data);
    $this->session->set_userdata('empregado_email',$novoemail);
    
}

function UpdateVerificationKey($VerificationKey) {
    $data = array(
        'verification_key' => $VerificationKey
    );
    $this->db->where('ID_EMPREGADO',$this->session->userdata('empregado_id'));
    $this->db->update('empregados',$data);

    
}

function verify_email_verificationKey($key)
        {
             $this->db->where('verification_key', $key);
             $query = $this->db->get('empregados');
             if($query->num_rows() > 0)
             {
              return true;
             }
             else
             {
              return false;
             }
}


}