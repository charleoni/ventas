<?php
class databaseImportController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model("databaseImport_Model");
        $this->load->helper('url');
        $this->load->database('default');
    }
    
    public function index()
    {
        $data['titulo'] = 'Evitda Uncle Charles';
        
        $this->load->view('databaseImportView', $data);
        
        Insert();
    }
    
    public function Insert()
    {
        $data = $this->databaseImport_Model->importDataBiable();
        
        foreach ($data as $registro)
        {
            $queryInsert = "";
            $queryValue = "";
            
            $queryInsert = "INSERT INTO EVITDA (CUENTA,
                                              SALDO_INICIAL,
                                              DEBITO,
                                              CREDITO,
                                              NUEVO_SALDO,
                                              ID_CO,
                                              ID_CCONIV4)
                            VALUES (";
            
            $queryValue .= $registro->CUENTA.",";
            $queryValue .= $registro->SALDO_INICIAL.",";
            $queryValue .= $registro->DEBITO.",";
            $queryValue .= $registro->CREDITO.",";
            $queryValue .= $registro->NUEVO_SALDO.",'";
            $queryValue .= $registro->ID_CO."','";
            $queryValue .= $registro->ID_CCONIV4."')";
            
            $query = $queryInsert.$queryValue;
            //echo $query;
            //$this->databaseImport_Model->Save($query);
        }
        $this->load->view('databaseImportView');
    }
    
}
