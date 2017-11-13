<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CarrerasMaterias extends CI_Controller 
{

	 public function __construct()
    {
      parent::__construct();
    
    }

    public function index()
    {
     
       $this->load->view('CarrerasMaterias/View_CarrerasMaterias.php');

    }

    public function cargarSelectCarreras()
	{
		
		$this->load->model('Materias/Model_Materias'); 
		$datosSelect = $this->Model_Materias->cargarSelectCarreras();



		echo json_encode($datosSelect);

	}

	 public function cargarSelectSemestres()
	{
		
		$this->load->model('CarrerasMaterias/Model_CarrerasMaterias'); 
		$datosSelect = $this->Model_CarrerasMaterias->cargarSelectSemestres();



		echo json_encode($datosSelect);

	}


	 public function getInfoCarrerasMaterias()
	{
		
		$clave_oficial = $_REQUEST['clave_oficial'];
		$id_semestre = $_REQUEST['id_semestre'];

		$this->load->model('CarrerasMaterias/Model_CarrerasMaterias'); 
		$resultado_query = $this->Model_CarrerasMaterias->getInfoCarrerasMaterias($clave_oficial,$id_semestre);


		echo json_encode($resultado_query);

	}




}