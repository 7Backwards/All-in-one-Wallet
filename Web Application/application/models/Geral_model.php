
<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    class Geral_model extends CI_Model{
    
        // ================================================
        public function buscarContactos(){            
            // vai buscar todos os contactos
            return $this->db->get('comerciantes')->result();
        }
  
        // ================================================
        public function insertComerciante($data){
            $this->db->insert('comerciantes',$data);
		    return $this->db->insert_id();
             
        } 
        public function insertEstabelecimento($data){
            $this->db->insert('estabelecimento',$data);
		    return $this->db->insert_id();
             
        } 

        public function insertCampanha($data){
            $this->db->insert('campanhas',$data);
            return $this->db->insert_id();
        } 

        public function getIDCliente_FromFirebaseID($id_firebase) {
            $this->db->select('clientes.*');
            $this->db->from('clientes');
            $this->db->where('firebase_id',$id_firebase);
            $query=$this->db->get();
            return $query->row()->ID_CLIENTE;
        }

    function can_login_comerciante($email, $password){
      $this->db->where('EMAIL_COMERCIANTE', $email);
      $this->db->where('PASSWORD_COMERCIANTE', md5($password));

     //echo 'select * from users where email like '.$email .' and password like '.md5($password);
      $query = $this->db->get('comerciantes');

     // echo $query->num_rows() ;
      if($query->num_rows() == 1)
      {
          foreach($query->result() as $row)
           {
        if($row->is_email_verified == 'yes' && $row->ESTADO_COMERCIANTE == '1')
        {
            return $row->ID_COMERCIANTE;
        }
        else if($row->is_email_verified == 'no')
        {
         return 'Conta não está ativa';
        }
        else {
            return 'Por favor aguarde a comprovação por parte do Administrador';
        }
       }
    }
    return 'Email ou Password incorretos';
     }

     function can_login_admin($email, $password){
          $this->db->where('EMAIL_ADMIN',$email);
          $this->db->where('PASSWORD_ADMIN',md5($password));
          $query=$this->db->get('administradores');
          if($query->num_rows() == 1)
        {
            foreach($query->result() as $row)
             {
              return $row->ID_ADMIN;
         }
      }
      else
      return 'Email ou Password incorretos';
}

function can_login_empregado($email, $password){
    $this->db->where('EMAIL_EMPREGADO',$email);
    $this->db->where('PASSWORD_EMPREGADO',md5($password));
    $query=$this->db->get('empregados');
    if($query->num_rows() == 1)
      {
          foreach($query->result() as $row)
           {
        if($row->ESTADO_EMPREGADO == '1')
        {
            return $row->ID_EMPREGADO;
        }
        else {
            return 'Conta não está ativa, por favor verifique o seu email';
        }
       }
}
else
return 'Email ou Password incorretos';
}
        

        
  //-----------Recuperar Palavra passe---------------
     
       function update_reset_key($reset_key)
         {
            $email=$this->input->post('email');
            $this->db->where('EMAIL_COMERCIANTE',$email);
         
            
            //echo $data;
              $query = $this->db->get('comerciantes');
         
              if($query->num_rows() > 0)
              {
                $this->db->set('reset_password_key', $reset_key);
                $this->db->where('EMAIL_COMERCIANTE',$email);
                $this->db->update('comerciantes');
              
               }
               else
                {
                    $this->db->where('EMAIL_EMPREGADO',$email);         
                
                    //echo $data;
                    $query = $this->db->get('empregados');
                
                    if($query->num_rows() > 0)
                    {
                        $this->db->set('reset_password_key', $reset_key);                    
                        $this->db->where('EMAIL_EMPREGADO',$email); 
                        $this->db->update('empregados');              
                    
                    }

                }
            
            if($this->db->affected_rows()>0)
            {
                
                return TRUE;
            }
            else
            {
            
                return FALSE;
            }

        }


     //-------------------------   

     function update($encrypted_password,$key)
        {                           
           
            $this->db->where('reset_password_key',$key);   
                                       
              $query = $this->db->get('comerciantes');
              if($query->num_rows() > 0)
              {              
                $this->db->set('PASSWORD_COMERCIANTE', $encrypted_password);
                $this->db->where('reset_password_key', $key);
                $this->db->update('comerciantes');
              // $data['message'] = '<h1 align="center">Password Atualizada Com Sucesso!</h1>';
              // return true;
               }
              
              else
                {  
                    $this->db->where('reset_password_key',$key);     
                    $query = $this->db->get('empregados');
                    if($query->num_rows() > 0)
                    {  
                    $this->db->set('PASSWORD_EMPREGADO', $encrypted_password);
                    $this->db->where('reset_password_key', $key);                    
                    $this->db->update('empregados');
                    }
                   //return true;
                }

                  
            if($this->db->affected_rows()>0)
            {
                
                return TRUE;
            }
            else
            {
            
                return FALSE;
            }
        }
               
              
             

        function verify_email($key)
        {
             $this->db->where('verification_key', $key);
             $this->db->where('is_email_verified', 'no');
             $query = $this->db->get('comerciantes');
             if($query->num_rows() > 0)
             {
              $data = array(
               'is_email_verified'  => 'yes'
              );
              $this->db->where('verification_key', $key);
              $this->db->update('comerciantes', $data);
              return true;
             }
             else
             {
              return false;
             }
        }

        
        function verify_email_verificationKey($key)
        {
             $this->db->where('verification_key', $key);
             $query = $this->db->get('comerciantes');
             if($query->num_rows() > 0)
             {
              return true;
             }
             else
             {
              return false;
             }
        }


        function insertAreasInteresse($areainteresse,$idestabelecimento) {
            if($areainteresse) {
            $this->db->where('NOME_AREAINTERESSE',$areainteresse);
            $id_areainteresse=$this->db->get('area_interesse')->row()->ID_AREAINTERESSE;
            $data= array(
                'ID_AREAINTERESSE' => $id_areainteresse,
                'ID_ESTABELECIMENTO' => $idestabelecimento
            );
            $this->db->insert('Estabelecimento_AreaInteresse',$data);
            
        }
            return;


        }

        function UpdateNomeEstabelecimento($NomeEstabelecimento) {
            $data = array(
                'NOME_ESTABELECIMENTO' => $NomeEstabelecimento
            );
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            $this->db->update('estabelecimento',$data);
            $this->session->set_userdata('estabelecimento_nome',$NomeEstabelecimento);

            

        }
       
        function UpdateEmailComerciante($novoemail,$atualemail) {
            $data = array(
                'EMAIL_COMERCIANTE' => $novoemail
            );
            $this->db->where('EMAIL_COMERCIANTE',$atualemail);
            $this->db->update('comerciantes',$data);
            $this->session->set_userdata('comerciante_email',$novoemail);
            
        }

        function UpdateVerificationKey($VerificationKey) {
            $data = array(
                'verification_key' => $VerificationKey
            );
            $this->db->where('ID_COMERCIANTE',$this->session->userdata('comerciante_id'));
            $this->db->update('comerciantes',$data);

            
        }
       
        function UpdateTelemovelComerciante($TelemovelComerciante) {
            $data = array(
                'TELEMOVEL_COMERCIANTE' => $TelemovelComerciante
            );
            $this->db->where('ID_COMERCIANTE',$this->session->userdata('comerciante_id'));
            $this->db->update('comerciantes',$data);
            $this->session->set_userdata('comerciante_telemovel',$TelemovelComerciante);

            
        }
      

        function UpdatePasswordComerciante($PasswordComerciante) {
            $encrypted_password=md5($PasswordComerciante);

            $data = array(
                'PASSWORD_COMERCIANTE' => $encrypted_password
            );
            $this->db->where('ID_COMERCIANTE',$this->session->userdata('comerciante_id'));
            $this->db->update('comerciantes',$data);

         

        }
     
        function UpdateMoradaEstabelecimento($MoradaEstabelecimento) {
            $data = array(
                'MORADA_ESTABELECIMENTO' => $MoradaEstabelecimento
            );
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            $this->db->update('estabelecimento',$data);
            $this->session->set_userdata('estabelecimento_morada',$MoradaEstabelecimento);

            

        }
    
        

        function UpdateCidadeEstabelecimento($CidadeEstabelecimento) {
            $data = array(
                'CIDADE_ESTABELECIMENTO' => $CidadeEstabelecimento
            );
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            $this->db->update('estabelecimento',$data);
            $this->session->set_userdata('estabelecimento_cidade',$CidadeEstabelecimento);

           

        }
     
        

        function UpdateCodigoPostalEstabelecimento($CodigoPostalEstabelecimento) {
            $data = array(
                'CODIGO_POSTAL_ESTABELECIMENTO' => $CodigoPostalEstabelecimento
            );
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            $this->db->update('estabelecimento',$data);
            $this->session->set_userdata('estabelecimento_codigopostal',$CodigoPostalEstabelecimento);
    

        }
  
            
        

        function UpdateDescricaoEstabelecimento($DescricaoEstabelecimento) {
            $data = array(
                'DESCRICAO_ESTABELECIMENTO' => $DescricaoEstabelecimento
            );
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            $this->db->update('estabelecimento',$data);
            $this->session->set_userdata('estabelecimento_descricao',$DescricaoEstabelecimento);
          

        }

        function DeleteAreasInteresse_estabelecimento() {
            $this->db->where('ID_ESTABELECIMENTO', $this->session->userdata('estabelecimento_id'));
            $this->db->delete('Estabelecimento_AreaInteresse');
        }


        function SetSessionInfo() {
            $id_comerciante=$this->session->userdata('comerciante_id');
            $sql_comerciante="select * from comerciantes where ID_COMERCIANTE like "."'$id_comerciante'";
            $comerciante =$this->db->query($sql_comerciante)->row();
            $id_estabelecimento=$comerciante->ID_ESTABELECIMENTO;
            $sql_estabelecimento="select * from estabelecimento where ID_ESTABELECIMENTO like "."'$id_estabelecimento'";
            $estabelecimento =$this->db->query($sql_estabelecimento)->row();
            $areasinteresse=$this->Geral_model->ReturnAreasInteresse_Estabelecimento($id_estabelecimento);
		    $i=0;
            $cleanarray = array();
            $info='';
		    if($areasinteresse->num_rows() > 0) {
			    foreach($areasinteresse->result() as $row) {
			       $NomeAreaInteresse=$this->Geral_model->ReturnNomeAreaInteresse($row->ID_AREAINTERESSE);
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
                'comerciante_id'=>$comerciante->ID_COMERCIANTE,
                'comerciante_nome' =>$comerciante->NOME_COMERCIANTE,
                 'comerciante_email'=>$comerciante->EMAIL_COMERCIANTE, 
                 'comerciante_telemovel' => $comerciante->TELEMOVEL_COMERCIANTE,
                 'comerciante_nif' => $comerciante->NIF_COMERCIANTE,
                 'comerciante_sexo' => $comerciante->SEXO,
                 'comerciante_datanasc' => $comerciante->DATA_NASCIMENTO,
                 'estabelecimento_id' => $id_estabelecimento,
                 'estabelecimento_nome' => $estabelecimento->NOME_ESTABELECIMENTO,
                 'estabelecimento_cidade' => $estabelecimento->CIDADE_ESTABELECIMENTO,
                 'estabelecimento_morada' => $estabelecimento->MORADA_ESTABELECIMENTO,
                 'estabelecimento_codigopostal' => $estabelecimento->CODIGO_POSTAL_ESTABELECIMENTO,
                 'estabelecimento_filename_logotipo' => $estabelecimento->FILENAME_LOGOTIPO,
                 'estabelecimento_descricao' => $estabelecimento->DESCRICAO_ESTABELECIMENTO,
                 'estabelecimento_ganharpontos' => $estabelecimento->ganhar_pontos,
                 'estabelecimento_usarpontos' => $estabelecimento->usar_pontos,
                 'comerciante_password' => $comerciante->PASSWORD_COMERCIANTE,
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
   
        function UpdateGanharPontos($ganharpontos) {
            $data = array(
                'ganhar_pontos' => $ganharpontos
            );
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            $this->db->update('estabelecimento',$data);
            $this->session->set_userdata('estabelecimento_ganharpontos',$ganharpontos);
    
        }

        function UpdateUsarPontos($usarpontos) {
            $data = array(
                'usar_pontos' => $usarpontos
            );
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            $this->db->update('estabelecimento',$data);
            $this->session->set_userdata('estabelecimento_ganharpontos',$usarpontos);
    
        }

        function UpdateLogotipo($new_filename) {
            $path= "./LogotipoEstabelecimento/" . $this->session->userdata('estabelecimento_filename_logotipo'); 
            unlink($path);//apagar ficheiro do logo antigo
            $data = array(
                'FILENAME_LOGOTIPO' => $new_filename
            );
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            $this->db->update('estabelecimento',$data); //adicionar filename do logo novo
            $this->session->set_userdata('estabelecimento_filename_logotipo',$new_filename); 
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

      public function get_countCamapanhas() {
      //   $dt=date('Y/m/d');
        $this->db->select('ID_CAMPANHA');
        $this->db->from('campanhas');
        $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
     // $this->db->where("'$dt'"."BETWEEN DATA_FIM_CAMPANHA AND DATA_INICIO_CAMPANHA ");
      // $this->db->where("DATA_INICIO_CAMPANHA <="."'$dt'");
        $this->db->where("DATA_INICIO_CAMPANHA <= NOW()");
        $this->db->where("DATA_FIM_CAMPANHA >= NOW()");
        $this->db->where("ESTADO_PUBLICACAO_CAMPANHA =1");
         $query = $this->db->get();
         $rowcount = $query->num_rows();
        return $rowcount;       
    }
     //<---------------------------Total cliente do comerciantes-------------------->
    public function get_countClientes() {
        $this->db->select('ID_CLIENTE');
        $this->db->from('cartoes');
        $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
      //<---------------------------Total clientes do site-------------------->
      public function get_countClientesSite() {
        $this->db->select('ID_CLIENTE');
        $this->db->from('cartoes');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    //<---------------------------CAMPANHAS A EXPIRAR-------------------->
    public function get_countExpirarC() {
        $dt=date('Y/m/d');
        $this->db->select('ID_CAMPANHA');
        $this->db->from('campanhas');
        $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
        $this->db->where("DATA_INICIO_CAMPANHA <= NOW()");
        $this->db->where("ESTADO_PUBLICACAO_CAMPANHA =1");
        $this->db->where("DATA_FIM_CAMPANHA >= NOW()");
        $this->db->where("DATEDIFF(DATA_FIM_CAMPANHA, now())<6");  
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    public function getCampanhas() {
        $estabelecimento_id= $this->session->userdata('estabelecimento_id');
        $query = $this->db->query(" select campanhas.ID_CAMPANHA , FILENAME_LOGOTIPO_CAMPANHA , DESCRICAO_CAMPANHA , DATA_INICIO_CAMPANHA , DATA_FIM_CAMPANHA , NOME_CAMPANHA , ESTADO_PUBLICACAO_CAMPANHA , NOME_AREAINTERESSE
        FROM campanhas join area_interesse_campanhas on campanhas.ID_CAMPANHA = area_interesse_campanhas.ID_CAMPANHA join area_interesse on area_interesse_campanhas.ID_AREAINTERESSE = area_interesse.ID_AREAINTERESSE
        WHERE ID_ESTABELECIMENTO like "."'$estabelecimento_id' group by campanhas.ID_CAMPANHA , ID_ESTABELECIMENTO , NOME_AREAINTERESSE");
        return $query->result();

    }


    public function getCampanhasDisponiveis() {
        $estabelecimento_id= $this->session->userdata('estabelecimento_id');
        $query = $this->db->query(" select campanhas.ID_CAMPANHA , FILENAME_LOGOTIPO_CAMPANHA , DESCRICAO_CAMPANHA , DATA_INICIO_CAMPANHA , DATA_FIM_CAMPANHA , NOME_CAMPANHA , ESTADO_PUBLICACAO_CAMPANHA , NOME_AREAINTERESSE
        FROM campanhas join area_interesse_campanhas on campanhas.ID_CAMPANHA = area_interesse_campanhas.ID_CAMPANHA join area_interesse on area_interesse_campanhas.ID_AREAINTERESSE = area_interesse.ID_AREAINTERESSE
        WHERE ID_ESTABELECIMENTO like "."'$estabelecimento_id' and DATA_INICIO_CAMPANHA <= CURDATE() and DATA_FIM_CAMPANHA >= CURDATE() and ESTADO_PUBLICACAO_CAMPANHA =1 group by campanhas.ID_CAMPANHA , ID_ESTABELECIMENTO , NOME_AREAINTERESSE");
        return $query->result();

    }

    public function removerCampanha($id_campanha) {
        $this->db->where('ID_CAMPANHA',$id_campanha);
        $this->db->delete('area_interesse_campanhas');
        $this->db->where('ID_CAMPANHA',$id_campanha);
        $this->db->delete('campanhas');
    }

    public function publicarCampanha($id_campanha) {
        $this->db->where('ID_CAMPANHA',$id_campanha);
        $this->db->set('ESTADO_PUBLICACAO_CAMPANHA','1');
        $this->db->update('campanhas');
        
    }
     //<---------------------------Numero novos clientes ultimo mês-------------------->
    public function get_numbLastMonthC() {
        $dt=date('Y/m/d');
        $this->db->select('ID_CARTAO');
        $this->db->from('cartoes');
        $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
        $this->db->where("period_diff(date_format(now(), '%Y%m'), date_format(date_creation, '%Y%m')) <=1");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
     //<---------------------------Numero novos clientes ultimo seis meses-------------------->
     public function get_numbLastSixMonthC() {
        $dt=date('Y/m/d');
        $this->db->select('ID_CARTAO');
        $this->db->from('cartoes');
        $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
        $this->db->where("period_diff(date_format(now(), '%Y%m'), date_format(date_creation, '%Y%m')) <=6");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }
     //<---------------------------Numero novos clientes ultima semana-------------------->
     public function get_numbLastWeekC() {
        $dt=date('Y/m/d');
        $this->db->select('ID_CARTAO');
        $this->db->from('cartoes');
        $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
        $this->db->where(" DATEDIFF(now(), date_creation) <8");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
    }

    //<---------------------------Mandar email--------------------------------------->
    public function emailtestes() {
      $this->db->select('EMAIL_CLIENTE');
      $this->db->from('clientes');
      $this->db->join('cartoes', 'clientes.ID_CLIENTE = cartoes.ID_CLIENTE');
      $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
     // $this->db->where('cartoes.NOTIFICACAO_ESTABELECIMENTO =1');
     $this->db->where('clientes.NOTIFICACAO_EMAIL=1');
      $query = $this->db->get();
      return $query->result();

    }
 

    public function adicionarAreaInteresse_campanhas($id_campanha,$id_areainteresse) {
        $this->db->set('ID_AREAINTERESSE',$id_areainteresse);
        $this->db->set('ID_CAMPANHA',$id_campanha);
        $this->db->insert('area_interesse_campanhas');
    }


   
    public function getpontos($idcartao) {
        $this->db->select('PONTOS_CARTAO');
        $this->db->from('cartoes');
        $this->db->where('ID_CARTAO',$idcartao);
        $query= $this->db->get();
        foreach($query->result() as $row) {
            return $row->PONTOS_CARTAO;
        }
    }       

    public function insertTransacao($dados_transacao) {
        $this->db->insert('transacoes',$dados_transacao);
    }

   public function getHistoricotransacoes_mobile($id_cliente) {
        $this->db->select('transacoes.*,estabelecimento.NOME_ESTABELECIMENTO');
        $this->db->from('cartoes');
        $this->db->join('transacoes','cartoes.ID_CARTAO = transacoes.ID_CARTAO');
        $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
        $this->db->where('cartoes.ID_CLIENTE',$id_cliente);
        $this->db->order_by("transacoes.DATA_TRANSACAO", "desc");
        $this->db->limit(25);  
        $query = $this->db->get();  
      
       if ( $query->num_rows() > 0 )
    		return $query->result_array();
		else
    		return FALSE;
	
   }

 
  
   public function getCampanhas_mobile($id_cliente) {
    $query= $this->db->query("SELECT campanhas.*,estabelecimento.*,cartoes.*
    from cartoes join campanhas on cartoes.ID_ESTABELECIMENTO = campanhas.ID_ESTABELECIMENTO join 
    estabelecimento on cartoes.ID_ESTABELECIMENTO=estabelecimento.ID_ESTABELECIMENTO
    where cartoes.ID_CLIENTE='$id' and campanhas.ESTADO_PUBLICACAO_CAMPANHA=1  and campanhas.DATA_INICIO_CAMPANHA <= CURDATE() and campanhas.DATA_FIM_CAMPANHA >= CURDATE()");
    if ( $query->num_rows() > 0 )
        return $query->result_array();
        else
        return FALSE;

}

public function getAllCampanhas_mobile($id_cliente) { //Devolve todas as campanhas menos as de um estabelecimento que o cliente já esteja fidelizado
    $query= $this->db->query("SELECT campanhas.*,estabelecimento.*
    from estabelecimento join campanhas on estabelecimento.ID_ESTABELECIMENTO = campanhas.ID_ESTABELECIMENTO
    where estabelecimento.ID_ESTABELECIMENTO not in (SELECT cartoes.ID_ESTABELECIMENTO from cartoes where cartoes.ID_CLIENTE = '$id_cliente') AND campanhas.ESTADO_PUBLICACAO_CAMPANHA=1 and campanhas.DATA_INICIO_CAMPANHA <= CURDATE() and campanhas.DATA_FIM_CAMPANHA >= CURDATE()");
    if ($query->num_rows() > 0 )
        return $query->result_array();
        else
        return FALSE;
}
    //-----------------------teste do goncalo inserir cartao--------------
     public function insert_cartoes_mobile($id_cliente,$id_estabelecimento)
     {
            $this->db->set('ID_CLIENTE',$id_cliente);
            $this->db->set('ID_ESTABELECIMENTO',$id_estabelecimento);
            $this->db->set('PONTOS_CARTAO','0');
            $this->db->set('NOTIFICACAO_ESTABELECIMENTO','1');
            $this->db->insert('cartoes');
            if($this->db->affected_rows() >= 0){ 
                return true;
            }
            else
                return false;
        
         }

     public function get_cartoes_info($id_cliente)
     {
        $this->db->select('cartoes.*,estabelecimento.*');
        $this->db->from('cartoes');
        $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
        $this->db->where('ID_CLIENTE',$id_cliente);
        $query= $this->db->get();
        return $query->result_array();
        
     }

public function getCartoes_mobile($id_cliente) {
    $query= $this->db->query("SELECT cartoes.*
    from cartoes 
    where cartoes.ID_CLIENTE='$id_cliente'");
    if ( $query->num_rows() > 0 )
        return $query->result_array();
    else
        return FALSE;

}


public function getCliente_mobile($id_cliente) {
    $query= $this->db->query("SELECT clientes.*
    from clientes
    where clientes.ID_CLIENTE='$id_cliente'");
    if ( $query->num_rows() > 0 )
        return $query->result_array();
    else
        return FALSE;

}
public function getMapas_mobile($id_cliente) {
    $query= $this->db->query("SELECT estabelecimento.LAT,estabelecimento.LON,estabelecimento.NOME_ESTABELECIMENTO
    from cartoes join estabelecimento on cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO
    where cartoes.ID_CLIENTE='$id_cliente'");
    if ( $query->num_rows() > 0 )
        return $query->result_array();
    else
        return FALSE;

}


    public function updatePontos($pontos,$pontosganhos,$id_cartao) {
        $pontos_final_transacao=$pontos+$pontosganhos;
        $this->db->set('PONTOS_CARTAO',$pontos_final_transacao);
        $this->db->where('ID_CARTAO',$id_cartao);
        $this->db->update('cartoes');
    }


    public function update_cliente_notificacaoMail($id_cliente,$notificacaoMail) {
        $this->db->set('NOTIFICACAO_EMAIL',$notificacaoMail);  
        $this->db->where('ID_CLIENTE',$id_cliente);
        $this->db->update('clientes');
        if($this->db->affected_rows() >= 0){ 
            return true;
        }
        else
            return false;
        }

        public function update_cliente_notificacaoApp($id_cliente,$notificacaoApp) {
            $this->db->set('NOTIFICACAO_APP',$notificacaoApp);        
            $this->db->where('ID_CLIENTE',$id_cliente);
            $this->db->update('clientes');
            if($this->db->affected_rows() >= 0){ 
                return true;
            }
            else
                return false;
            }

    public function getID_CARTAO($id_cliente,$id_estabelecimento) {
        $this->db->where('ID_CLIENTE',$id_cliente);
        $this->db->where('ID_ESTABELECIMENTO',$id_estabelecimento);
        return $this->db->get('cartoes')->row()->ID_CARTAO;
    }


    public function DeleteCartao($id_cartao) {
        $this->db->where('ID_CARTAO',$id_cartao);
        $this->db->delete('cartoes');
        if($this->db->affected_rows() >= 0){ 
            return true;
        }
        else
            return false;
    }

    public function DeleteUser($id_cliente) {
        
        $this->db->where('ID_CLIENTE',$id_cliente);
        $this->db->delete('clientes');
        if($this->db->affected_rows() >= 0){ 
            return true;
        }
        else
            return false;
    }


    public function getTransacoes_Estabelecimento_mobile($id_cartao) {
        
        $this->db->select('transacoes.*,estabelecimento.*');
        $this->db->from('transacoes');
        $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
        $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO=estabelecimento.ID_ESTABELECIMENTO');
        $this->db->where('cartoes.ID_CARTAO',$id_cartao);
        $query= $this->db->get();
        return $query->result_array();
    }
   
    public function get_empregados() {
        $this->db->select('empregados.*');
        $this->db->from('empregados');
        $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
        $query=$this->db->get();
        return $query->result_array();
    }

    public function FidelizarMobile($id_cliente,$id_estabelecimento) {
        

        $query=$this->db->query("SELECT cartoes.* from cartoes join clientes
        on cartoes.ID_CLIENTE = clientes.ID_CLIENTE where id_cliente like "."'$id_comerciante'");
        $id=$query->row()->ID_CLIENTE;

        $data = array(
            'ID_CLIENTE' => $id,
            'ID_ESTABELECIMENTO' => $id_estabelecimento,
            'PONTOS_CARTAO' => 0,
            'NOTIFICACAO_ESTABELECIMENTO' => 1,
            'ESTADO_CARTAO' => 1
        );
        $this->db->insert('cartoes',$data);
        if($this->db->affected_rows() >= 0){ 
            return true;
        }
        else
            return false;
    }
        

    public function AdicionarCliente_mobile($firebase_id,$email_cliente,$telemovel_cliente,$nome_cliente) {
        
        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->where('firebase_id',$firebase_id);
        $query=$this->db->get();
        if ( $query->num_rows() > 0 )
          return false;
       
        $data = array(
            'NOME_CLIENTE' => $nome_cliente,
            'TELEMOVEL_CLIENTE' => $telemovel_cliente,
            'EMAIL_CLIENTE' => $email_cliente,
            'firebase_id' => $firebase_id
        );
        $this->db->insert('clientes',$data);
        if($this->db->affected_rows() >= 0){ 
            return true;
        }
        else
            return false;
    
    }



    }



    

?>