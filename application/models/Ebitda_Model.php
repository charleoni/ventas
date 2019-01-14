<?php

class Ebitda_model extends CI_Model {
    public $title;
    public $content;
    public $date;

    public function queryComercil()
    {
        $this->db->select('LEFT(cg.ID_CUENTA, 2) CUENTA,
                            format(SUM(cg.SALDOS_INICIAL_REAL_L2), 2, 2) SALDO_INICIAL,
                            format(SUM(cg.SALDOS_DEB_REAL_L2), 2, 2) DEBITO,
                            format(SUM(cg.SALDOS_CRE_REAL_L2), 2, 2) CREDITO,
                            format(SUM(cg.SALDOS_FINAL_REAL_L2), 2, 2) NUEVO_SALDO');
        $this->db->from('CGRESUMEN_CUENTA_CCOSTO AS cg');
        $this->db->where('cg.LAPSO_DOC', '201805');
        $this->db->where('cg.ID_CUENTA >=', '4');
        $this->db->where('cg.ID_CUENTA <=', '7');
        $this->db->group_by("LEFT(cg.ID_CUENTA, 2)");  // Produces: GROUP BY title, date
        
        $query = $this->db->get();
        //echo $query->num_rows();
        //die();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }
    
    public function get_informe_01()
    {        
        $this->load->dbutil();
        $query = $this->db->query("SELECT 
                                     VEN.FECHA_DCTO, SUM((VEN.CANTIDAD*IT.PESO)) AS SUMPESO, 
                                     SUM(VEN.TOT_VENTA) AS TOT_VEN
                                    FROM
                                     CMMOVIMIENTO_VENTAS AS VEN
                                    LEFT JOIN CENTRO_OPERACION AS CO ON VEN.ID_CO=CO.CODIGO
                                    LEFT JOIN GRUPO_C_OPERACION AS GC ON VEN.ID_CO=GC.ID_CO
                                    LEFT JOIN ITEMS AS IT ON VEN.ID_ITEM=IT.ID_ITEM
                                    LEFT JOIN LINEAS AS LI ON IT.ID_LINEA2=LI.ID_LINEA2 AND LI.ID_TIPO='1'
                                    LEFT JOIN TERCEROS AS TER ON VEN.ID_TERC=TER.CODIGO AND VEN.ID_SUC=TER.SUCURSAL
                                    WHERE
                                     LAPSO_DOC = '201901' AND IT.ID_TIPO = '1' AND VEN.ID_TIPDOC<>''
                                    GROUP BY VEN.FECHA_DCTO");
        //echo $this->dbutil->csv_from_result($query);
        //die();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    public function get_informe_02()
    {        
        $this->load->dbutil();
        $query = $this->db->query("SELECT 
                                     VEN.FECHA_DCTO, SUM((VEN.CANTIDAD*IT.PESO)) AS SUMPESO, 
                                     SUM(VEN.TOT_VENTA) AS TOT_VEN,
                                     CASE GC.CODIGO
                                        WHEN '01' THEN 'VALLE'
                                        WHEN '02' THEN 'CENTRO'
                                        WHEN '03' THEN 'ANTIOQUIA'
                                        WHEN '04' THEN 'EJE CAFETERO'
                                    END AS ZONA
                                    FROM
                                     CMMOVIMIENTO_VENTAS AS VEN
                                    LEFT JOIN CENTRO_OPERACION AS CO ON VEN.ID_CO=CO.CODIGO
                                    LEFT JOIN GRUPO_C_OPERACION AS GC ON VEN.ID_CO=GC.ID_CO
                                    LEFT JOIN ITEMS AS IT ON VEN.ID_ITEM=IT.ID_ITEM
                                    LEFT JOIN LINEAS AS LI ON IT.ID_LINEA2=LI.ID_LINEA2 AND LI.ID_TIPO='1'
                                    LEFT JOIN TERCEROS AS TER ON VEN.ID_TERC=TER.CODIGO AND VEN.ID_SUC=TER.SUCURSAL
                                    WHERE
                                        LAPSO_DOC = '201901' AND IT.ID_TIPO = '1' AND VEN.ID_TIPDOC<>''
                                    GROUP BY VEN.FECHA_DCTO,ZONA");
        //echo $this->dbutil->csv_from_result($query);
        //die();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }    

    public function get_informe_03()
    {        
        $this->load->dbutil();
        $query = $this->db->query("SELECT 
                                     INV.LAPSO_DOC,INV.ID_CO,CO.DESCRIPCION,
                                     CASE GC.CODIGO
                                        WHEN '01' THEN 'VALLE'
                                        WHEN '02' THEN 'CENTRO'
                                        WHEN '03' THEN 'ANTIOQUIA'
                                        WHEN '04' THEN 'EJE CAFETERO'
                                        END AS ZONA,
                                        IT.ID_REFERENCIA,LI.CMLINEAS_DESCRIPCION,INV.CAN_EXIS_FIN,
                                        SUM(INV.CAN_EXIS_FIN*IT.PESO) AS KGXFAC
                                    FROM CMRESUMEN_INVENTARIO AS INV
                                    LEFT JOIN ITEMS AS IT ON INV.ID_ITEM=IT.ID_ITEM
                                    LEFT JOIN CENTRO_OPERACION AS CO ON INV.ID_CO=CO.CODIGO
                                    LEFT JOIN GRUPO_C_OPERACION AS GC ON INV.ID_CO=GC.ID_CO
                                    LEFT JOIN LINEAS AS LI ON IT.ID_LINEA2=LI.ID_LINEA2 AND LI.ID_TIPO='1'
                                    WHERE LAPSO_DOC='201901' AND ID_GRULOC='27' AND CAN_EXIS_FIN<>0 GROUP BY ZONA");
        //echo $this->dbutil->csv_from_result($query);
        //die();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    public function get_informe_04()
    {        
        $this->load->dbutil();
        $query = $this->db->query("SELECT 
                                     SUM((VEN.CANTIDAD*IT.PESO)) AS SUM_PESO_RM, 
                                     SUM(VEN.TOT_VENTA) AS TOT_VEN_RM,
                                     CASE GC.CODIGO
                                        WHEN '01' THEN 'VALLE'
                                        WHEN '02' THEN 'CENTRO'
                                        WHEN '03' THEN 'ANTIOQUIA'
                                        WHEN '04' THEN 'EJE CAFETERO'
                                    END AS ZONA
                                    FROM
                                     CMMOVIMIENTO_VENTAS AS VEN
                                    LEFT JOIN CENTRO_OPERACION AS CO ON VEN.ID_CO=CO.CODIGO
                                    LEFT JOIN GRUPO_C_OPERACION AS GC ON VEN.ID_CO=GC.ID_CO
                                    LEFT JOIN ITEMS AS IT ON VEN.ID_ITEM=IT.ID_ITEM
                                    LEFT JOIN LINEAS AS LI ON IT.ID_LINEA2=LI.ID_LINEA2 AND LI.ID_TIPO='1'
                                    LEFT JOIN TERCEROS AS TER ON VEN.ID_TERC=TER.CODIGO AND VEN.ID_SUC=TER.SUCURSAL
                                    WHERE
                                        LAPSO_DOC >= '201801' AND IT.ID_TIPO = '1' AND VEN.DOC_RM_TIPO='RM' AND VEN.ID_TIPDOC=''
                                    GROUP BY ZONA");
        //echo $this->dbutil->csv_from_result($query);
        //die();
        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    public function insert_entry()
    {
        $this->title    = $_POST['title']; // please read the below note
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->insert('entries', $this);
    }

    public function update_entry()
    {
        $this->title    = $_POST['title'];
        $this->content  = $_POST['content'];
        $this->date     = time();

        $this->db->update('entries', $this, array('id' => $_POST['id']));
    }


}

