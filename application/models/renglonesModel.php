<?php

class renglonesModel extends CI_Model {
    public $title;
    public $content;
    public $date;

    public function costoVenta()
    {
    	//Query para el costo de ventas	

		$query = $this->db->query("SELECT ID_CO, SUM(NETO_MES_REAL_L2) Neto_mes FROM CGRESUMEN_CUENTA_CCOSTO WHERE LAPSO_DOC = '201806' AND (left(ID_CUENTA,4) = '7530')");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    //Cilindros CLI
    public function cilindrosCLI()
    {
    	/*
			Query para el renglón de cilindros - CIL
		*/
		$query = $this->db->query("SELECT 
									    ID_CO, SUM(NETO_MES_REAL_L2) as valor
									FROM
									    BD_BIABLE01.CGRESUMEN_CUENTA_CCOSTO
									WHERE
									    LAPSO_DOC = '201806'
									        AND (ID_CUENTA = '43252902'
									        OR ID_CUENTA = '43252907'
									        OR ID_CUENTA = '43950502'
									        OR ID_CUENTA = '43900402'
									        OR ID_CUENTA = '43950507')
									GROUP BY ID_CO");

        if($query->num_rows() > 0 )
        {
            return $query->result();
            //return $query->result_array();
        }
    }

    //Cilindros CLI
    public function cilindrosCT2()
    {
    	/*
			Query para el renglón de cilindros - CT2
		*/
		$query = $this->db->query("SELECT 
									    ID_CO, ID_CUENTA, SUM(NETO_MES_REAL_L2) as valor
									FROM
									    BD_BIABLE01.CGRESUMEN_CUENTA_CCOSTO
									WHERE
									    LAPSO_DOC = '201806'
									        /*AND SUM(NETO_MES_REAL_L2) <> 0*/
									        AND ((ID_CUENTA = '750501'
									        OR ID_CUENTA = '750503'
									        OR ID_CUENTA = '750504'
									        OR ID_CUENTA = '750518'
									        OR ID_CUENTA = '750523'
									        OR ID_CUENTA = '750524'
									        OR ID_CUENTA = '750525'
									        OR ID_CUENTA = '750535'
									        OR ID_CUENTA = '750537'
									        OR ID_CUENTA = '750543'
									        OR ID_CUENTA = '750544'
									        OR ID_CUENTA = '750546'
									        OR ID_CUENTA = '750552'
									        OR ID_CUENTA = '75101903'
									        OR ID_CUENTA = '75101904'
									        OR ID_CUENTA = '751036'
									        OR ID_CUENTA = '75104601'
									        OR ID_CUENTA = '75109009'
									        OR ID_CUENTA = '754005'
									        OR ID_CUENTA = '755001'
									        OR ID_CUENTA = '755002'
									        OR ID_CUENTA = '75500401'
									        OR ID_CUENTA = '75500402'
									        OR ID_CUENTA = '75501401'
									        OR ID_CUENTA = '75509003'
									        OR ID_CUENTA = '75509004'
									        OR ID_CUENTA = '75509005'
									        OR ID_CUENTA = '756008')
									        AND
									        (ID_CCONIV4 = 'F471'
									        OR ID_CCONIV4 = 'F428'
									        OR ID_CCONIV4 = 'F429'
									        OR ID_CCONIV4 = 'F443'
									        OR ID_CCONIV4 = 'F439'
									        OR ID_CCONIV4 = 'F440'
									        OR ID_CCONIV4 = 'F442'
									        OR ID_CCONIV4 = 'F609'
									        OR ID_CCONIV4 = 'F344'
									        OR ID_CCONIV4 = 'O006')
									        AND
									        (ID_CO = 'D01'
									        OR ID_CO = 'DB1'
									        OR ID_CO = 'M01'
									        OR ID_CO = 'R01'
									        OR ID_CO = 'S01'
									        OR ID_CO = 'Y01'))
																");
		/*GROUP BY ID_CO , ID_CUENTA
		ORDER BY ID_CO , ID_CUENTA*/


        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    //Gastos Administrativos
    public function gastosAdministrativos()
    {
    	/*
			Query para el renglón de Gastos Administrativos - GA
		*/
		$query = $this->db->query("SELECT 
									    ID_CO, ID_CUENTA, SUM(NETO_MES_REAL_L2)
									FROM
									    BD_BIABLE01.CGRESUMEN_CUENTA_CCOSTO
									WHERE
									    LAPSO_DOC = '201806'
									        AND (LEFT(ID_CUENTA, 2) = '51')
									        AND (LEFT(ID_CUENTA, 6) <> '512095')");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    //Query para el renglón de Granel
    public function renglonGranel()
    {
    	/*
			Query para el renglón de Granel
		*/
		$query = $this->db->query("SELECT 
									    ID_CO, SUM(NETO_MES_REAL_L2) as valor
									FROM
									    BD_BIABLE01.CGRESUMEN_CUENTA_CCOSTO
									WHERE
									    LAPSO_DOC = '201806'
									        AND (ID_CUENTA = '43252903'
									        OR ID_CUENTA = '43950503'
									        OR ID_CUENTA = '43950505'
									        OR ID_CUENTA = '43900401')
									GROUP BY ID_CO");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    //Query para el renglón de Granel
    public function cuentaCosto()
    {
    	/*
			Query para el cuenta Costo
		*/
		$query = $this->db->query("SELECT 
									    ID_CO, SUM(NETO_MES_REAL_L2) as valor
									FROM
									    BD_BIABLE01.CGRESUMEN_CUENTA_CCOSTO
									WHERE
									    LAPSO_DOC = '201806'
									        AND (ID_CUENTA = '43252903'
									        OR ID_CUENTA = '43950503'
									        OR ID_CUENTA = '43950505'
									        OR ID_CUENTA = '43900401')
									GROUP BY ID_CO");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    public function renglonMontacargas()
    {
    	/*
			Query para el renglón de Montacargas
		*/
		$query = $this->db->query("SELECT 
									    ID_CO, SUM(NETO_MES_REAL_L2) as valor
									FROM
									    BD_BIABLE01.CGRESUMEN_CUENTA_CCOSTO
									WHERE
									    LAPSO_DOC = '201806'
									        AND (ID_CUENTA = '43252909'
									        OR ID_CUENTA = '43950509')
									GROUP BY ID_CO");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    public function otrosIgresos()
    {
    	/*
			Query para el renglón de Otros Ingresos
		*/
		$query = $this->db->query("SELECT 
									    ID_CO, SUM(NETO_MES_REAL_L2) as valor
									FROM
									    BD_BIABLE01.CGRESUMEN_CUENTA_CCOSTO
									WHERE
									    LAPSO_DOC = '201806'
									        AND (ID_CUENTA = '43253001')
									GROUP BY ID_CO");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    public function ventasComercialKg()
    {
    	/*
			Query para sumar ventas del comercial en Kg
		*/
		$query = $this->db->query("SELECT 
									    ID_CO,VEN.ID_ITEM,SUM(IT.PESO * CANTIDAD) kilos,IT.ID_LINEA linea
									FROM
									    BD_BIABLE01.CMMOVIMIENTO_VENTAS AS VEN
									        LEFT JOIN
									    ITEMS AS IT ON VEN.ID_ITEM = IT.ID_ITEM
									WHERE
									    LAPSO_DOC = '201806' AND DOCUMENTO_FC<>'      '
									GROUP BY ID_CO,ID_LINEA");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }

    public function jonItems()
    {
    	/*
			Query para el Jon e los items
		*/
		$query = $this->db->query("SELECT 
									    ID_ITEM, ID_REFERENCIA, DESCRIPCION,ID_TIPO, PESO, ID_LINEA
									FROM
									    BD_BIABLE01.ITEMS
									WHERE
									    /*ID_PROCEDENCIA = 'K'*/
									    ID_TIPO='1'");

        if($query->num_rows() > 0 )
        {
            return $query->result();
        }
    }



}

?>