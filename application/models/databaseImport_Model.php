<?php

class databaseImport_Model extends CI_Model {
    public $title;
    public $content;
    public $date;

    public function importDataBiable()
    {
        $this->db->select('cg.ID_CUENTA CUENTA,
                            cg.SALDOS_INICIAL_REAL_L2 SALDO_INICIAL,
                            cg.SALDOS_DEB_REAL_L2 DEBITO,
                            cg.SALDOS_CRE_REAL_L2 CREDITO,
                            cg.SALDOS_FINAL_REAL_L2 NUEVO_SALDO, 
                            ID_CO, ID_CCONIV4');
        $this->db->from('CGRESUMEN_CUENTA_CCOSTO AS cg');
        $this->db->where('cg.LAPSO_DOC', '201805');
        $this->db->where('cg.ID_CUENTA >=', '4');
        $this->db->where('cg.ID_CUENTA <=', '7');
        //$this->db->group_by("LEFT(cg.ID_CUENTA, 2)");  // Produces: GROUP BY title, date
        
        $query = $this->db->get();
        //echo $query->num_rows();
        //die();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }
    
    public function Save($query)
    {
        $mysqli = new mysqli("localhost", "root", "", "ebitda");
        if ($mysqli->connect_errno) {
            echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }
        //echo $mysqli->host_info."<br>";
        $resultado = $mysqli->query($sql);
        
        if($resultado){
            echo "Ingres exitoso";
        }else{
            echo "Eror al ingresar query: ".$query."<br>";
        }
    }
    
}

