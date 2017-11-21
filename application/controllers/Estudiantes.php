<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estudiantes extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();

		
	}

	public function index()
	{

		$this->load->view('SolicitudEstudiantes/View_SolicitudEstudiantes');
		
	}


	public function verifyNoControlGetInfo()
	{

		$no_de_control = $_REQUEST['no_de_control'];

		$this->load->model('SolicitudEstudiantes/Model_SolicitudEstudiantes');
         $resultado_query = $this->Model_SolicitudEstudiantes->verifyNoControlGetInfo($no_de_control);

        echo json_encode($resultado_query);
		
	}


	
	public function cargarSelectPeriodosEscolares()
	{


		$this->load->model('SolicitudEstudiantes/Model_SolicitudEstudiantes'); 
		$datosSelect = $this->Model_SolicitudEstudiantes->cargarSelectPeriodosEscolares();

		echo json_encode($datosSelect);

	}


	public function enviarSolicitudEstudiante()
	{
		$no_de_control = $_REQUEST['no_de_control'];
		$datosAlumno = $_REQUEST['datosAlumno'];
		$datosSolicitud = $_REQUEST['datosSolicitud'];

		$this->load->model('SolicitudEstudiantes/Model_SolicitudEstudiantes'); 
		$datosSelect = $this->Model_SolicitudEstudiantes->enviarSolicitudEstudiante($no_de_control,$datosAlumno,$datosSolicitud);

		echo json_encode($datosSelect);

	}



}

?>