<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carreras extends CI_Controller 
{

  public function __construct()
  {
    parent::__construct();
  
  }

  public function index()
  {
   
     //$this->load->view('RegisrarCarreras/RegisrarCarreras.php');

  }


  public function registrar()
  {
   
     $this->load->view('Carreras/Registrar.php');

  }

   public function guardarCarreras()
  {
  	

  	$claveOficial = $_REQUEST['claveOficial'];
  	$carrera = $_REQUEST['carrera'];
  	$nombreCarrera = $_REQUEST['nombreCarrera'];
  	$nombreCarreraReducido = $_REQUEST['nombreCarreraReducido'];
  	$cargaMaxima = $_REQUEST['cargaMaxima'];
  	$cargaMinima = $_REQUEST['cargaMinima'];
  	$creditosTotales = $_REQUEST['creditosTotales'];


	$this->load->model('Carreras/GuardarCarreras'); 
	$resultado_query = $this->GuardarCarreras->guardar_carreras($claveOficial,$carrera,$nombreCarrera,$nombreCarreraReducido,$cargaMaxima,$cargaMinima,$creditosTotales);
	

	echo json_encode($resultado_query);
   

  }


  }

?>