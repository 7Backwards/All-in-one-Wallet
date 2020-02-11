
<?php
    defined('BASEPATH') OR exit('URL inválida.');
    
    class Charts_model extends CI_Model{
        // --------------------chart total clientes por mes-------------------------
        public function janeiro()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=1");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $jan = $query->num_rows();
            return $jan;
        }
        public function fevereiro()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=2");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $fev = $query->num_rows();            
            return $fev;
        }
        public function marco()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=3");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $mar = $query->num_rows();
            return $mar;
        }
        public function abril()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=4");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $abr = $query->num_rows();
            return $abr;
        }
        public function maio()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=5");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $mai = $query->num_rows();
            return $mai;
        }
        public function junho()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=6");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $jun = $query->num_rows();
            return $jun;
        }
        public function julho()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=7");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $jul = $query->num_rows();
            return $jul;
        }
        public function agosto()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=8");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $ago = $query->num_rows();
            return $ago;
        }
        public function setembro()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=9");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $set = $query->num_rows();
            return $set;
        }
        public function outubro()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=10");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $out = $query->num_rows();
            return $out;
        }
        public function novembro()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=11");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $nov = $query->num_rows();
            return $nov;
        }
        public function dezembro()
        {
            $this->db->select('ID_CARTAO');
            $this->db->from('cartoes');
            $this->db->where('ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $this->db->where("month(date_creation)=12");  
            $this->db->where("period_diff(year(now()),year(date_creation)) =0");        
            $query = $this->db->get();
            $dez = $query->num_rows();
            return $dez;
        }

        //-----------------valor transacao por mes-------------------------
        public function tran_janeiro()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=1");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_fevereiro()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=2");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_marco()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=3");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_abril()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=4");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_maio()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=5");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_junho()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=6");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_julho()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=7");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_agosto()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=8");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_setembro()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=9");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_outubro()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=10");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_novembro()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=11");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function tran_dezembro()
        {
            $this->db->select('SUM(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=12");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }

        //-----------------CHART HORAS--------------------------

        public function horas_manha()
        {
            $this->db->select('COUNT(ID_TRANSACAO) AS COUNT');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where('HOUR(DATA_TRANSACAO) BETWEEN 08 and 11');       
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->COUNT;
            }
         
        }
        public function horas_almoco()
        {
            $this->db->select('COUNT(ID_TRANSACAO) AS COUNT');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where('HOUR(DATA_TRANSACAO) BETWEEN 12 and 13');          
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->COUNT;
            }
         
        }

        public function horas_tarde()
        {
            $this->db->select('COUNT(ID_TRANSACAO) AS COUNT');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where('HOUR(DATA_TRANSACAO) BETWEEN 14 and 20');
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->COUNT;
            }
         
        }

        //------------------contador de vendas por mes-----------------------
        public function c_janeiro()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=1");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_fevereiro()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=2");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_marco()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=3");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_abril()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=4");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_maio()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=5");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_junho()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=6");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_julho()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=7");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_agosto()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=8");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_setembro()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=9");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_outubro()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=10");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_novembro()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=11");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
         
        }
        public function c_dezembro()
        {
            $this->db->select('COUNT(VALOR_TRANSACAO) AS SOMA');
            $this->db->from('transacoes');
            $this->db->join('cartoes','transacoes.ID_CARTAO = cartoes.ID_CARTAO');
            $this->db->join('estabelecimento','cartoes.ID_ESTABELECIMENTO = estabelecimento.ID_ESTABELECIMENTO');
            $this->db->where("month(DATA_TRANSACAO)=12");  
            $this->db->where("period_diff(year(now()),year(DATA_TRANSACAO)) =0");        
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id')); 
            $query = $this->db->get();       
           foreach($query->result() as $row)
            {
              return $row->SOMA;
            }
          }

               //<----------------------ContadorCampanhasAtivas---------------------------------->
    public function get_count_Campanhas_Ativas()
    {           
            $this->db->select('EMAIL_CLIENTE');
            $this->db->from('clientes');
            $this->db->join('cartoes', 'clientes.ID_CLIENTE = cartoes.ID_CLIENTE');
            $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
           // $this->db->where('cartoes.NOTIFICACAO_ESTABELECIMENTO =1');
           $this->db->where('clientes.NOTIFICACAO_EMAIL=1');
            $query = $this->db->get();
            $rowcount = $query->num_rows();
          return $rowcount;
        
    }
     //<----------------------ContadorCampanhasNaoAtivas---------------------------------->
     public function get_count_Campanhas_Nativas()
     {           
             $this->db->select('EMAIL_CLIENTE');
             $this->db->from('clientes');
             $this->db->join('cartoes', 'clientes.ID_CLIENTE = cartoes.ID_CLIENTE');
             $this->db->where('cartoes.ID_ESTABELECIMENTO',$this->session->userdata('estabelecimento_id'));
            // $this->db->where('cartoes.NOTIFICACAO_ESTABELECIMENTO =1');
            $this->db->where('clientes.NOTIFICACAO_EMAIL=0');
             $query = $this->db->get();
             $rowcount = $query->num_rows();
           return $rowcount;
         
     }

     






        

           
































































}