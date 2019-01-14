<?php
class Ebitda extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        $this->load->model('Ebitda_model');
        $this->load->helper('url');
        $this->load->database('default');
    }

    public function index()
    {
        $data['titulo'] = 'Informes de Ventas';
  
        $this->load->view('ebitdaView',$data);
    }

    public function informe01()
    {
      $data['titulo'] = 'Informes de ventas - Dia a dia acumulado';
      $data['data'] = $this->Ebitda_model->get_informe_01();
      echo json_encode($data);
    }


    public function informe02()
    {
      $data['titulo'] = 'Informes02 Uncle Charles';
      $data['data'] = $this->Ebitda_model->get_informe_02();
      echo json_encode($data);
      //$this->load->view('ebitdaView',$data);
    }

    public function informe03()
    {
      $data['titulo'] = 'Informes03 Uncle Charles';
      $data['data'] = $this->Ebitda_model->get_informe_03();
      echo json_encode($data);
      //$this->load->view('ebitdaView',$data);
    }

    public function informe04()
    {
      $data['titulo'] = 'Informes04 Uncle Charles';
      $data['data'] = $this->Ebitda_model->get_informe_04();
      echo json_encode($data);
      //$this->load->view('ebitdaView',$data);
    }
    
    public function comments()
    {
            echo 'Look at this!';
    }
    
    public function shoes($sandals, $id)
    {
        echo $sandals;
        echo $id;
    }
    
}