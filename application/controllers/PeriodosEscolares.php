<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PeriodosEscolares extends CI_Controller 
{

    public function __construct()
    {
      parent::__construct();
    
    }


     public function registrar()
    {
     
       $this->load->view('PeriodosEscolares/View_RegistrarPeriodosEscolares.php');

    }


      public function guardarPeriodosEscolares()
    {
    	

        	$periodo = $_REQUEST['periodo'];
        	$identificacion_larga = $_REQUEST['identificacion_larga'];
        	$identificacion_corta = $_REQUEST['identificacion_corta'];
       

            $this->load->model('PeriodosEscolares/Model_PeriodosEscolares'); 
            $resultado_query = $this->Model_PeriodosEscolares->guardarPeriodosEscolares($periodo,$identificacion_larga,$identificacion_corta);

      		echo json_encode($resultado_query);
     

    }


     public function modificar()
    {
     
        $this->load->view('PeriodosEscolares/View_ModificarPeriodosEscolares.php');

    }


       public function cargarTablaPeriodosEscolares()
    {
     

            $this->load->model('PeriodosEscolares/Model_PeriodosEscolares');
             $resultado_query = $this->Model_PeriodosEscolares->cargarTablaPeriodosEscolares($_REQUEST);

            echo json_encode($resultado_query);

    }

     public function getInfoPeriodoEscolar()
    {
     
           $id_periodo_escolar = $_REQUEST['id_periodo_escolar'];

             $this->load->model('PeriodosEscolares/Model_PeriodosEscolares');
            $datosCarreras = $this->Model_PeriodosEscolares->getInfoPeriodoEscolar($id_periodo_escolar);

            echo json_encode($datosCarreras);

    }


     public function modificarPeriodosEscolares()
      {
      

            $id_periodo_escolar = $_REQUEST['id_periodo_escolar'];
            $periodo = $_REQUEST['periodo'];
            $identificacion_larga = $_REQUEST['identificacion_larga'];
            $identificacion_corta = $_REQUEST['identificacion_corta'];


            $this->load->model('PeriodosEscolares/Model_PeriodosEscolares'); 
            $resultado_query = $this->Model_PeriodosEscolares->modificarPeriodosEscolares($id_periodo_escolar,$periodo,$identificacion_larga,$identificacion_corta);

            echo json_encode($resultado_query);

      }


          public function deletePeriodosEscolares()
          {
      
              $id_periodo_escolar = $_REQUEST['id_periodo_escolar'];
              

              $this->load->model('PeriodosEscolares/Model_PeriodosEscolares'); 
              $resultado_query = $this->Model_PeriodosEscolares->deletePeriodosEscolares($id_periodo_escolar);
            

              echo json_encode($resultado_query);
     

         }






}