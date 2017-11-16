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


		$this->load->model('CarrerasMaterias/Model_CarrerasMaterias'); 
		$datosSelect = $this->Model_CarrerasMaterias->cargarSelectCarreras();

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


	public function getInfoMaterias()
	{
		
		$clave_oficial = $_REQUEST['clave_oficial'];
		$id_semestre = $_REQUEST['id_semestre'];
		$arrayMaterias = $_REQUEST['arrayMaterias'];

		$this->load->model('CarrerasMaterias/Model_CarrerasMaterias'); 
		$datosSelect = $this->Model_CarrerasMaterias->getInfoMaterias($clave_oficial,$id_semestre,$arrayMaterias);

		echo json_encode($datosSelect);

	}


	public function getInfoMaterias2()
	{

		$this->load->model('CarrerasMaterias/Model_CarrerasMaterias'); 
		$datosSelect = $this->Model_CarrerasMaterias->getInfoMaterias2();

		echo json_encode($datosSelect);

	}


	public function verifyMateriasAgregar()
	{
		
		$ids_materias = $_REQUEST['ids_materias'];
		$clave_oficial = $_REQUEST['clave_oficial'];
		$id_semestre = $_REQUEST['id_semestre'];

		$this->load->model('CarrerasMaterias/Model_CarrerasMaterias'); 
		$datosSelect = $this->Model_CarrerasMaterias->verifyMateriasAgregar($ids_materias,$clave_oficial,$id_semestre);

		echo json_encode($datosSelect);

	}



	 public function deleteMaterias()
	{
		
		$clave_oficial = $_REQUEST['clave_oficial'];
		$id_semestre = $_REQUEST['id_semestre'];
		$id_materia = $_REQUEST['id_materia'];


		$this->load->model('CarrerasMaterias/Model_CarrerasMaterias'); 
		$resultado_query = $this->Model_CarrerasMaterias->deleteMaterias($clave_oficial,$id_semestre,$id_materia);


		echo json_encode($resultado_query);

	}


	 public function guardarCarrerasMaterias()
	{
		
		$datosMaterias = $_REQUEST['datosMaterias'];
		$clave_oficial = $_REQUEST['clave_oficial'];
		$id_semestre = $_REQUEST['id_semestre'];


		$this->load->model('CarrerasMaterias/Model_CarrerasMaterias'); 
		$resultado_query = $this->Model_CarrerasMaterias->guardarCarrerasMaterias($datosMaterias,$clave_oficial,$id_semestre);


		echo json_encode($resultado_query);

	}


}