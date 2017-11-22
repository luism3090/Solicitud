<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		
	}

	public function index()
	{

		$this->load->view('Solicitudes/home');
		
	}


	 public function cargarTablaSolicitudes()
    {
     

            $this->load->model('Solicitudes/Model_Solicitudes');
             $datos = $this->Model_Solicitudes->cargarTablaSolicitudes($_REQUEST);

            echo json_encode($datos);

    }

	public function cerrarSesion()
	{

		   $this->session->sess_destroy();
			
			$datos["sesion"] = false;
			$datos["base_url"] = base_url()."Login";

			echo json_encode($datos);
	}	



	 public function getCountSolicitudesEstudiante()
    {
     
     	$no_de_control = $_REQUEST["no_de_control"];

            $this->load->model('Solicitudes/Model_Solicitudes');
             $datos = $this->Model_Solicitudes->getCountSolicitudesEstudiante($no_de_control);

            echo json_encode($datos);

    }


}

?>