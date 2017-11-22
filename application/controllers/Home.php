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


      public function solicitudPDFEstudiante2()
    {
    	$num_solicitud = $_REQUEST["num_solicitud"];

    	$this->load->model('Solicitudes/Model_Solicitudes');

         $datos = $this->Model_Solicitudes->getDatosSolicitudPDF_Estudiante($num_solicitud);
	

		 $arrayDatos["lugarYfecha"] = $datos["solicitudes"][0]->lugarYfecha;
         $arrayDatos["asunto"] = $datos["solicitudes"][0]->asunto;
         $arrayDatos["nombreCompleto"] = $datos["solicitudes"][0]->nombreCompleto;
         $arrayDatos["nombre_semestre"] = $datos["solicitudes"][0]->nombre_semestre;
         $arrayDatos["nombre_carrera"] = $datos["solicitudes"][0]->nombre_carrera;
         $arrayDatos["no_de_control"] = $datos["solicitudes"][0]->no_de_control;
         $arrayDatos["observacion"] = $datos["solicitudes"][0]->observacion;
         $arrayDatos["motivos_academicos"] = $datos["solicitudes"][0]->motivos_academicos;
         $arrayDatos["motivos_personales"] = $datos["solicitudes"][0]->motivos_personales;
         $arrayDatos["otros"] = $datos["solicitudes"][0]->otros;
         $this->load->view('Solicitudes/viewSolicitudPDF_Estudiante',$arrayDatos);


    }


     public function solicitudPDFEstudiante()
    {
     
     	$num_solicitud = $_REQUEST["num_solicitud"];


     	 $this->load->model('Solicitudes/Model_Solicitudes');

         $datos = $this->Model_Solicitudes->getDatosSolicitudPDF_Estudiante($num_solicitud);

         $nombreCompleto = $datos["solicitudes"][0]->nombreCompleto;

         $arrayDatos["lugarYfecha"] = $datos["solicitudes"][0]->lugarYfecha;
         $arrayDatos["asunto"] = $datos["solicitudes"][0]->asunto;
         $arrayDatos["nombreCompleto"] = $datos["solicitudes"][0]->nombreCompleto;
         $arrayDatos["nombre_semestre"] = $datos["solicitudes"][0]->nombre_semestre;
         $arrayDatos["nombre_carrera"] = $datos["solicitudes"][0]->nombre_carrera;
         $arrayDatos["no_de_control"] = $datos["solicitudes"][0]->no_de_control;
         $arrayDatos["observacion"] = $datos["solicitudes"][0]->observacion;
         $arrayDatos["motivos_academicos"] = $datos["solicitudes"][0]->motivos_academicos;
         $arrayDatos["motivos_personales"] = $datos["solicitudes"][0]->motivos_personales;
         $arrayDatos["otros"] = $datos["solicitudes"][0]->otros;


     	 $html =  $this->load->view('Solicitudes/viewSolicitudPDF_Estudiante',$arrayDatos,true);

        $data = [];

		$hoy = date("dmyhis");


        $pdfFilePath = $nombreCompleto."_".$hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4-L'); 
 		//$mpdf->WriteHTML($num_solicitud);
		$mpdf->Output($pdfFilePath, "D");
       //generate the PDF from the given html
        $this->m_pdf->pdf->WriteHTML($html);
 
        //download it.
        $this->m_pdf->pdf->Output($pdfFilePath, "D"); 

    }


}

?>