
     <?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    class Comerciante_model extends CI_Model{
    //-----------Verifica Empregado---------------
      
     function verificaEmpregado($reset_key)
     {
        $tipo=$this->input->post('tipo');
        $email=$this->input->post('email');
        $nome=$this->input->post('nome');
        $id_estabelecimento=$this->session->userdata('estabelecimento_id');
           $data= array(
            'ID_ESTABELECIMENTO' =>$id_estabelecimento,
             'TIPO_EMPREGADO' => $tipo,
             'NOME_EMPREGADO' => $nome,
             'EMAIL_EMPREGADO' =>$email,
             'creation_key' => $reset_key,
             
         );
         $this->db->insert('empregados',$data);
        if($this->db->affected_rows()>0)
        {
            
            return TRUE;
        }
        else
        {
        
            return FALSE;
        }
 
    }
 
    //devolve informacoes preenchidas pelo comerciante relativamente ao empregado
    function empregadoInfo($creation_key)
    {
        $this->db->where('creation_key',$creation_key);
        $query=$this->db->get('empregados');
        foreach ($query->result() as $row) {
            return $row;
        }
    }
        function updateInfoComerciante($encrypted_password,$creation_key)
        {           
              $data_nascimento=$this->input->post('data_nascimento');      
              $sexo=$this->input->post('sexo');      
              $cidade=$this->input->post('cidade');     
              $valor=1;           
             

              $query = $this->db->get('empregados');
              if($query->num_rows() > 0)
              {   
                       
                $this->db->set('PASSWORD_EMPREGADO', $encrypted_password);
                $this->db->set('DATA_NASC_EMPREGADO', $data_nascimento);
                $this->db->set('SEXO_EMPREGADO', $sexo);
                $this->db->set('CIDADE_EMPREGADO', $cidade);
                $this->db->set('ESTADO_EMPREGADO',$valor );
                $this->db->where('creation_key', $creation_key);
                $this->db->update('empregados');
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

        public function eliminarEmpregado($ID_EMPREGADO)
	{
            $this->db->where('ID_EMPREGADO', $ID_EMPREGADO);
            $this->db->delete('empregados');
    }
    
    public function mostrarDados($ID_EMPREGADO)
    {            
            // vai buscar dados do filme cujo id = $id_         
            return $this->db->where('ID_EMPREGADO', $ID_EMPREGADO)->get('empregados')->row();                        

    }

    public function editar()
    {
              $dados = array(
               
              'TIPO_EMPREGADO' => $this->input->post('tipo'),
              'ESTADO_EMPREGADO' => $this->input->post('estado')
                      
                                        
          );

          $this->db->where('ID_EMPREGADO', $this->input->post('id'));
          $this->db->update('empregados', $dados);

         
     }   


     public function checkplanoPremium($id_estabelecimento)
     {
         $this->db->select('ID_ESTABELECIMENTO');
         $this->db->where('ID_ESTABELECIMENTO',$id_estabelecimento);
         $this->db->from('ESTABELECIMENTO_PLANO');
         $query=$this->db->get();
         if($query->num_rows() == 1)
         {
             return true;
         }
         else
         {
             return false;
         }
         
     }

     public function compraplanoPremium($id_estabelecimento)
     {
      
         $dados=array(
            'ID_PLANO'=>3,
            'ID_ESTABELECIMENTO'=> $id_estabelecimento    
 
        );
        $this->db->set('DATA_EXPIRACAO_PLANO', 'NOW() + INTERVAL 30 DAY', FALSE);
         $this->db->insert('ESTABELECIMENTO_PLANO',$dados);

         
     }

     public function compraplanoPro($id_estabelecimento)
     {
      
         $dados=array(
            'ID_PLANO'=>2,
            'ID_ESTABELECIMENTO'=> $id_estabelecimento    
 
        );
        $this->db->set('DATA_EXPIRACAO_PLANO', 'NOW() + INTERVAL 30 DAY', FALSE);
         $this->db->insert('ESTABELECIMENTO_PLANO',$dados);

         
     }
       
     public function getInfoPlanos()
     {
         $this->db->select('plano.NOME_PLANO');
         $this->db->from('ESTABELECIMENTO_PLANO');
         $this->db->join('plano','ESTABELECIMENTO_PLANO.ID_PLANO = plano.ID_PLANO');
         $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));        
         $query=$this->db->get()->result();       
            return $query;
       
      
     }

     public function getRestDays()
     {
         $this->db->select('ESTABELECIMENTO_PLANO.DATA_EXPIRACAO_PLANO');
         $this->db->from('ESTABELECIMENTO_PLANO');
         $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));        
         $this->db->where('DATA_EXPIRACAO_PLANO >=now()');
         $query=$this->db->get();       
         if ($query->num_rows() > 0 )
         {
            return $query->result();
         }
         else
         {
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            $this->db->delete('ESTABELECIMENTO_PLANO');
            
         }
        
            
         
         
       
        
        
     }




































}
?>