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
     
       $this->load->view('Carreras/View_RegistrarCarreras.php');

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


                $this->load->model('Carreras/Model_Carreras'); 
                $resultado_query = $this->Model_Carreras->guardarCarreras($claveOficial,$carrera,$nombreCarrera,$nombreCarreraReducido,$cargaMaxima,$cargaMinima,$creditosTotales);

      	echo json_encode($resultado_query);
     

    }

    public function checkClaveOficial()
    {
      
          $clave_oficial = $_REQUEST['claveOficial'];
          

          $this->load->model('Carreras/Model_Carreras'); 
          $resultado_query = $this->Model_Carreras->checkClaveOficial($clave_oficial);
        

          echo json_encode($resultado_query);
     

    }


  public function modificar()
  {
   
      $this->load->view('Carreras/View_ModificarCarreras.php');

  }

    public function cargarTablaCarreras()
    {
     

            $this->load->model('Carreras/Model_Carreras');
             $datosCarreras = $this->Model_Carreras->cargarTablaCarreras($_REQUEST);

            echo json_encode($datosCarreras);

    }


    public function getInfoCarrera()
    {
     
           $clave_oficial = $_REQUEST['clave_oficial'];

             $this->load->model('Carreras/Model_Carreras');
            $datosCarreras = $this->Model_Carreras->getInfoCarrera($clave_oficial);

            echo json_encode($datosCarreras);

    }


     public function checkModificarClaveOficial()
     {
      
          $clave_oficial_new = $_REQUEST['clave_oficial_new'];
          $clave_oficial_origen = $_REQUEST['clave_oficial_origen'];
          

          $this->load->model('Carreras/Model_Carreras'); 
          $resultado_query = $this->Model_Carreras->checkModificarClaveOficial($clave_oficial_new,$clave_oficial_origen);
        

          echo json_encode($resultado_query);

      }


      public function modificarCarreras()
      {
      

                  $claveOficial = $_REQUEST['claveOficial'];
                  $claveOficialOrigen = $_REQUEST['claveOficialOrigen'];
                  $carrera = $_REQUEST['carrera'];
                  $nombreCarrera = $_REQUEST['nombreCarrera'];
                  $nombreCarreraReducido = $_REQUEST['nombreCarreraReducido'];
                  $cargaMaxima = $_REQUEST['cargaMaxima'];
                  $cargaMinima = $_REQUEST['cargaMinima'];
                  $creditosTotales = $_REQUEST['creditosTotales'];


                      $this->load->model('Carreras/Model_Carreras'); 
                      $resultado_query = $this->Model_Carreras->modificarCarreras($claveOficial,$claveOficialOrigen,$carrera,$nombreCarrera,$nombreCarreraReducido,$cargaMaxima,$cargaMinima,$creditosTotales);

                  echo json_encode($resultado_query);

      }


}

?>