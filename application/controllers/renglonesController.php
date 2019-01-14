<?php
class RenglonesController extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('renglonesModel');
        $this->load->helper('url');
        $this->load->database('default');
    }

    public function index()
    {
        $data['titulo'] = 'Ebitda Mayo 2018 por Centro Operativo';

        $data['costo_ventas'] = $this->renglonesModel->costoVenta();
        $data['cilindros_cli'] = $this->renglonesModel->cilindrosCLI();
        $data['cilindros_ct2'] = $this->renglonesModel->cilindrosCT2();
        $data['renglon_granel'] = $this->renglonesModel->renglonGranel();
        $data['cuenta_costo'] = $this->renglonesModel->cuentaCosto();
        $data['renglon_montacargas'] = $this->renglonesModel->renglonMontacargas();
        $data['otros_ingresos'] = $this->renglonesModel->otrosIgresos();
        $data['ventas_comercial'] = $this->renglonesModel->ventasComercialKg();
        /*$data['jon_items'] = $this->renglonesModel->jonItems();*/
    
        $this->load->view('renglonesView',$data);
    }

    public function ionic(){
        //$result_json = array('name' => 'Alfonso', 'age' => '34');
        $data['cilindros_cli'] = $this->renglonesModel->cilindrosCLI();
        //echo "<h2></h2>";
        //var_dump($data);die();
        /*Cilindros CT2*/

        // headers for not caching the results
        //header('Cache-Control: no-cache, must-revalidate');
        //header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');

        // headers to tell that result is JSON
        //header('Content-type: application/json');

        // send the result now
        //echo json_encode($result_json);
        echo json_encode($data);
    }

}