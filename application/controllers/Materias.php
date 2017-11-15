<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Materias extends CI_Controller 
{

    public function __construct()
    {
      parent::__construct();
    
    }

    public function registrar()
    {
     
       $this->load->view('Materias/View_RegistrarMaterias.php');

    }

     public function guardarMaterias()
    {
    	

        	$nombre_completo_materia = $_REQUEST['nombre_completo_materia'];
        	$nombre_abreviado_materia = $_REQUEST['nombre_abreviado_materia'];
        	// $clave_oficial = $_REQUEST['clave_oficial'];
        	// $id_semestre = $_REQUEST['id_semestre'];


            $this->load->model('Materias/Model_Materias'); 
            $resultado_query = $this->Model_Materias->guardarMaterias($nombre_completo_materia,$nombre_abreviado_materia);

      		echo json_encode($resultado_query);
     

    }

    public function modificar()
    {
     
        $this->load->view('Materias/View_ModificarMaterias.php');

    }

     public function cargarTablaMaterias()
    {
     

            $this->load->model('Materias/Model_Materias');
             $datosCarreras = $this->Model_Materias->cargarTablaMaterias($_REQUEST);

            echo json_encode($datosCarreras);

    }


     public function getInfoMateria()
    {
     
           $id_materia = $_REQUEST['id_materia'];

             $this->load->model('Materias/Model_Materias');
            $datosCarreras = $this->Model_Materias->getInfoMateria($id_materia);

            echo json_encode($datosCarreras);

    }


       public function modificarMaterias()
      {
      

	          $id_materia = $_REQUEST['id_materia'];
	          $nombre_completo_materia = $_REQUEST['nombre_completo_materia'];
	          $nombre_abreviado_materia = $_REQUEST['nombre_abreviado_materia'];


	          $this->load->model('Materias/Model_Materias'); 
	          $resultado_query = $this->Model_Materias->modificarMaterias($id_materia,$nombre_completo_materia,$nombre_abreviado_materia);

      		  echo json_encode($resultado_query);

      }


     




}