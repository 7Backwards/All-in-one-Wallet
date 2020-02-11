<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    class Admin_model extends CI_Model{

        public function get_totalComerciantes()
        {           
                $this->db->select('ID_COMERCIANTE');
                $this->db->from('comerciantes');
                $this->db->where("is_email_verified='yes'");
                $this->db->where('ESTADO_COMERCIANTE =1');
                $query = $this->db->get();
                $rowcount = $query->num_rows();
                return $rowcount;
            
        }
        public function get_total_clientes()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
            $query=$this->db->get();
            $rowcount=$query->num_rows();
            return $rowcount;
        }

        public function get_total_campanhas()
        {
            $this->db->select('ID_CAMPANHA');
            $this->db->from('campanhas');
            $this->db->where('ESTADO_PUBLICACAO_CAMPANHA =1');
            $query=$this->db->get();
            $rowcount=$query->num_rows();
            return $rowcount;
        }

        public function get_total_registoPor_verificar()
        {
            $this->db->select('*');
            $this->db->from('comerciantes');
            $this->db->where('ESTADO_COMERCIANTE','0');
            $query=$this->db->get();
            $rowcount=$query->num_rows();
            return $rowcount;
        }

                   //<----------------------ContadorCampanhasAtivas---------------------------------->
    public function get_count_Campanhas_Ativas()
    {           
            $this->db->select('EMAIL_CLIENTE');
            $this->db->from('clientes');
            $this->db->join('cartoes', 'clientes.ID_CLIENTE = cartoes.ID_CLIENTE');
           
           // $this->db->where('cartoes.NOTIFICACAO_ESTABELECIMENTO =1');
           $this->db->where('clientes.NOTIFICACAO_EMAIL=1');
            $query = $this->db->get();
            $rowcount = $query->num_rows();
          return $rowcount;
        
    }
     //<----------------------ContadorComerciantesMes---------------------------------->
    

    
        public function c_janeiro()
        {
            $this->db->select('ID_COMERCIANTE');
            $this->db->from('comerciantes');
            $this->db->where("month(date_creation)=1");  
            $this->db->where("is_email_verified='yes'");
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $rowcount = $query->num_rows();
             return $rowcount;
        }
        
      
     
     public function c_fevereiro()
     {
        $this->db->select('ID_COMERCIANTE');
        $this->db->from('comerciantes');
        $this->db->where("month(date_creation)=2");  
        $this->db->where("is_email_verified='yes'");
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
         return $rowcount;
      
     }
     public function c_marco()
     {
        $this->db->select('ID_COMERCIANTE');
        $this->db->from('comerciantes');
        $this->db->where("month(date_creation)=3");  
        $this->db->where("is_email_verified='yes'");
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
         return $rowcount;
      
     }
     public function c_abril()
     {
        $this->db->select('ID_COMERCIANTE');
         $this->db->from('comerciantes');
         $this->db->where("month(date_creation)=4");  
         $this->db->where("is_email_verified='yes'");
         $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
         $query = $this->db->get();
         $rowcount = $query->num_rows();
          return $rowcount;
      
     }
     public function c_maio()
     {
        $this->db->select('ID_COMERCIANTE');
        $this->db->from('comerciantes');
        $this->db->where("month(date_creation)=5");  
        $this->db->where("is_email_verified='yes'");
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
         return $rowcount;
      
     }
     public function c_junho()
     {
        $this->db->select('ID_COMERCIANTE');
        $this->db->from('comerciantes');
        $this->db->where("month(date_creation)=6");  
        $this->db->where("is_email_verified='yes'");
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
         return $rowcount;
      
     }
     public function c_julho()
     {
        $this->db->select('ID_COMERCIANTE');
        $this->db->from('comerciantes');
        $this->db->where("month(date_creation)=7");  
        $this->db->where("is_email_verified='yes'");
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
         return $rowcount;
      
     }
     public function c_agosto()
     {
        $this->db->select('ID_COMERCIANTE');
         $this->db->from('comerciantes');
         $this->db->where("month(date_creation)=8");  
         $this->db->where("is_email_verified='yes'");
         $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
         $query = $this->db->get();
         $rowcount = $query->num_rows();
          return $rowcount;
      
     }
     public function c_setembro()
     {
        $this->db->select('ID_COMERCIANTE');
        $this->db->from('comerciantes');
        $this->db->where("month(date_creation)=9");  
        $this->db->where("is_email_verified='yes'");
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
         return $rowcount;
      
     }
     public function c_outubro()
     {
        $this->db->select('ID_COMERCIANTE');
        $this->db->from('comerciantes');
        $this->db->where("month(date_creation)=10"); 
        $this->db->where("is_email_verified='yes'"); 
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
         return $rowcount;
      
     }
     public function c_novembro()
     {
        $this->db->select('ID_COMERCIANTE');
        $this->db->from('comerciantes');
        $this->db->where("month(date_creation)=11");  
        $this->db->where("is_email_verified='yes'");
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
         return $rowcount;
      
     }
     public function c_dezembro()
     {
        $this->db->select('ID_COMERCIANTE');
        $this->db->from('comerciantes');
        $this->db->where("month(date_creation)=12"); 
        $this->db->where("is_email_verified='yes'"); 
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
         return $rowcount;
       }

//-----------------Contador Clientes por mes-------------------------
        public function c_c_janeiro()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
            $this->db->where("month(date_creation)=1");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $rowcount = $query->num_rows();
            return $rowcount;
        }



        public function c_c_fevereiro()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=2");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_marco()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=3");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_abril()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=4");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_maio()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=5");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_junho()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=6");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_julho()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=7");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_agosto()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=8");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_setembro()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=9");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_outubro()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=10");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_novembro()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=11");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

        }
        public function c_c_dezembro()
        {
            $this->db->select('ID_CLIENTE');
            $this->db->from('clientes');
        $this->db->where("month(date_creation)=12");  
        $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;
        }




        public function getComprovarComerciante() {
            $query=$this->db->query("SELECT comerciantes.*,estabelecimento.* from comerciantes 
            join estabelecimento on comerciantes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO
            where comerciantes.ESTADO_COMERCIANTE = 0 LIMIT 1");
            if ( $query->num_rows() > 0 )
                return $query->result();
            else
                return FALSE;
        }

    public function ReturnAreasInteresse_Estabelecimento($id_estabelecimento) {
        $sql_areasinteresse="select * from Estabelecimento_AreaInteresse where ID_ESTABELECIMENTO like "."'$id_estabelecimento'";
        return $this->db->query($sql_areasinteresse);
    }

    public function ReturnNomeAreaInteresse($id_areainteresse) {
        $this->db->where('ID_AREAINTERESSE',$id_areainteresse);
        return $this->db->get('area_interesse')->row()->NOME_AREAINTERESSE;
    }

    function SetSessionInfo() {
        $id_admin=$this->session->userdata('admin_id');
        $sql_admin="select * from administradores where ID_ADMIN like "."'$id_admin'";
        $admin =$this->db->query($sql_admin)->row();
        $session =array(
            'admin_id'=>$admin->ID_ADMIN,
            'admin_nome' =>$admin->NOME_ADMIN,
            'admin_email'=>$admin->EMAIL_ADMIN, 
            'admin_telemovel' => $admin->TELEMOVEL_ADMIN,
            'admin_password' => $admin->PASSWORD_ADMIN 
            );				
        $this->session->set_userdata($session);

    }

    //--------------contar numero de comerciantes com plano free--------------------
    public function planoFree()
    {
        $this->db->select('ID_PLANO');
        $this->db->from('ESTABELECIMENTO_PLANO');
        $this->db->where('ID_PLANO =1');
        $this->db->where('DATA_AQUISICAO_PLANO <= now()');
        $this->db->where('DATA_EXPIRACAO_PLANO >= now()');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

    }
    //--------------contar numero de comerciantes com plano PRO--------------------
    public function planoPro()
    {
        $this->db->select('ID_PLANO');
        $this->db->from('ESTABELECIMENTO_PLANO');
        $this->db->where('ID_PLANO =2');
        $this->db->where('DATA_AQUISICAO_PLANO <= now()');
        $this->db->where('DATA_EXPIRACAO_PLANO >= now()');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

    }
    //--------------contar numero de comerciantes com plano PREMIUM--------------------
    public function planoPremium()
    {
        $this->db->select('ID_PLANO');
        $this->db->from('ESTABELECIMENTO_PLANO');
        $this->db->where('ID_PLANO =3');
        $this->db->where('DATA_AQUISICAO_PLANO <= now()');
        $this->db->where('DATA_EXPIRACAO_PLANO >= now()');
        $query = $this->db->get();
        $rowcount = $query->num_rows();
        return $rowcount;

    }



    function UpdateNomeAdmin($NomeAdmin) {
        $data = array(
            'NOME_ADMIN' => $NomeAdmin
        );
        $this->db->where('ID_ADMIN',$this->session->userdata('admin_id'));
        $this->db->update('administradores',$data);
        $this->session->set_userdata('admin_nome',$NomeAdmin);

        

    }

    function UpdateEmailAdmin($EmailAdmin) {
        $data = array(
            'EMAIL_ADMIN' => $EmailAdmin
        );
        $this->db->where('ID_ADMIN',$this->session->userdata('admin_id'));
        $this->db->update('administradores',$data);
        $this->session->set_userdata('admin_email',$EmailAdmin);

        

    }

    function UpdateTelemovelAdmin($TelemovelAdmin) {
        $data = array(
            'TELEMOVEL_ADMIN' => $TelemovelAdmin
        );
        $this->db->where('ID_ADMIN',$this->session->userdata('admin_id'));
        $this->db->update('administradores',$data);
        $this->session->set_userdata('admin_telemovel',$TelemovelAdmin);

        

    }

    function UpdatePasswordAdmin($PasswordAdmin) {
        $encrypted_password=md5($PasswordAdmin);

        $data = array(
            'PASSWORD_ADMIN' => $encrypted_password
        );
        $this->db->where('ID_ADMIN',$this->session->userdata('admin_id'));
        $this->db->update('administradores',$data);
        $this->session->set_userdata('admin_password',$PasswordAdmin);

        

    }

    public function AceitarRegisto($id_comerciante) {
        $data= array(
            'ESTADO_COMERCIANTE' => '1'
        );
        $this->db->where('ID_COMERCIANTE',$id_comerciante);
        $this->db->update('comerciantes',$data);

        $data=array(
            'ID_COMERCIANTE' => $id_comerciante,
            'ID_ADMIN' => $this->session->userdata('admin_id'),
            'APROVACAO' => '1',
            'DESCRICAO_NAO_APROVACAO' => null,
            'RAZAO_NAO_APROVACAO' => null
        );
        $this->db->insert('aprovacao',$data);
        
    }

    public function RecusarRegisto($id_comerciante) {
        $data= array(
            'ESTADO_COMERCIANTE' => '2'
        );
        $this->db->where('ID_COMERCIANTE',$id_comerciante);
        $this->db->update('comerciantes',$data);


        $data=array(
            'ID_COMERCIANTE' => $id_comerciante,
            'ID_ADMIN' => $this->session->userdata('admin_id'),
            'APROVACAO' => '0',
            'DESCRICAO_NAO_APROVACAO' => $this->input->post('Razao_input')
        );
        $this->db->insert('aprovacao',$data);
        
    }

    public function getEmailComerciante($id_comerciante) {
        $this->db->select('EMAIL_COMERCIANTE');
        $this->db->where('ID_COMERCIANTE',$id_comerciante);
        return $this->db->get('comerciantes')->row()->EMAIL_COMERCIANTE;
     }
       //-----------Verifica Admin---------------
      
       function verificaAdmin($reset_key)
       {
          $nome=$this->input->post('nomeA');
          $email=$this->input->post('emailA');         
         
             $data= array(
               'NOME_ADMIN' => $nome,
               'EMAIL_ADMIN' =>$email,
               'creation_key' => $reset_key
               
           );
           $this->db->insert('administradores',$data);
          if($this->db->affected_rows()>0)
          {
              
              return TRUE;
          }
          else
          {
          
              return FALSE;
          }
   
      }

       //devolve informacoes preenchidas pelo Admin relativamente ao Admin
    function AdminInfo($creation_key)
    {
        $this->db->where('creation_key',$creation_key);
        $query=$this->db->get('administradores');
        foreach ($query->result() as $row) {
            return $row;
        }
    }


    function updateInfoAdmin($encrypted_password,$creation_key)
    {           
          $password=$this->input->post('password');      
          $telemovel=$this->input->post('telemovel');       
          $valor=1;           
         

          $query = $this->db->get('administradores');
          if($query->num_rows() > 0)
          {   
                   
            $this->db->set('PASSWORD_ADMIN', $encrypted_password);
            $this->db->set('TELEMOVEL_ADMIN',$telemovel);
            $this->db->set('ESTADO_ADMIN',$valor );
            $this->db->where('creation_key', $creation_key);
            $this->db->update('administradores');
          // $data['message'] = '<h1 align="center">Password Atualizada Com Sucesso!</h1>';
           return true;
           }
           else
           {
            return false;
           // $data['message'] = '<h1 align="center">Falha Ao Atualizar, Tente Novamente Mais Tarde!</h1>';
           }
     //   $this->load->view('mudar_password_view',$data);
         //    $this->load->view('mudar_password_view');
        

    }


    function getAdmins() {
        $this->db->select('*');
        $this->db->from('administradores');
        $query=$this->db->get();
        return $query->result_array();

    }

    function getComerciantes() {
        $this->db->select('comerciantes.*,estabelecimento.*');
        $this->db->from('comerciantes');
        $this->db->join('estabelecimento','comerciantes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
        $query=$this->db->get();
        return $query->result_array();

    }



    
    public function mostrarDados($ID_COMERCIANTE)
    {            
            // vai buscar dados do filme cujo id = $id_         
            $this->db->select('comerciantes.*,estabelecimento.*');
            $this->db->from('comerciantes');
            $this->db->join('estabelecimento','comerciantes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where('ID_COMERCIANTE', $ID_COMERCIANTE);
            $query=$this->db->get();
            return $query->row();                      

    }

    public function editar()
    {
              $dados = array(
               
              'ESTADO_COMERCIANTE' => $this->input->post('estado'),
              'is_email_verified' => $this->input->post('email_verified')
                      
                                        
          );

          $this->db->where('ID_COMERCIANTE', $this->input->post('id'));
          $this->db->update('comerciantes', $dados);

         
  }   

       

























}

?>