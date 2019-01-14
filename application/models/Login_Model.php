<?php

class Login_Model extends CI_Model {
    public $title;
    public $content;
    public $date;

    public function queryLogin($usuario,$password)
    {
        $this->db->select('us_id');
        $this->db->from('users us');
        $this->db->where('us_usuario', $usuario);
        $this->db->where('us_clave', $password);
        
        $query = $this->db->get();
        echo $query->num_rows();
        die();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }else{
            return 0;
        }
    }
    
}

