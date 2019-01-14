<?php
class main_Controller extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // Your own constructor code
        /*$active_group="login_Reportes";
        $this->load->model('Login_Model');*/
        $this->load->helper('url');
        //$this->load->database('login_Reportes');
    }

    public function index()
    {
        $data['titulo'] = 'Menu Principal';
  
        $this->load->view('mainView',$data);
    }

    public function login_users()
    {
        //$data['data'] = $this->Ebitda_model->get_informe_01();   
        //print_r($_POST);
        $usuario=$_POST['usuario'];
        $password=$_POST['clave'];        
        $estado=$this->Login_Model->queryLogin($usuario,$password);        
        $arr = array('estado' => $estado);  
        echo json_encode($arr);        
    }
}
?>