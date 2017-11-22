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


     public function solicitudPDFEstudiante()
    {
     
     	$num_solicitud = $_REQUEST["num_solicitud"];


     	 $this->load->model('Solicitudes/Model_Solicitudes');
         $datos = $this->Model_Solicitudes->getDatosSolicitudPDF_Estudiante($num_solicitud);

        $data = [];

		$hoy = date("dmyhis");

        //load the view and saved it into $html variable
   //      $html = 
   //      "<style>@page {
			//     margin-top: 0.5cm;
			//     margin-bottom: 0.5cm;
			//     margin-left: 0.5cm;
			//     margin-right: 0.5cm;
			// }
			// </style>".
   //      "<body>
   //      	<div style='color:#006699;'><b>".$this->input->post('txtPDF')."<b></div>".
   //      		"<div style='width:50px; height:50px; background-color:red;'>asdf</div>

   //      </body>";

        // $html = $this->load->view('v_dpdf',$date,true);
 		
 		//$html="asdf";
        //this the the PDF filename that user will get to download
        $pdfFilePath = "cipdf_".$hoy.".pdf";
 
        //load mPDF library
        $this->load->library('M_pdf');
        $mpdf = new mPDF('c', 'A4-L'); 
 		$mpdf->WriteHTML($num_solicitud);
		$mpdf->Output($pdfFilePath, "D");
       // //generate the PDF from the given html
       //  $this->m_pdf->pdf->WriteHTML($html);
 
       //  //download it.
       //  $this->m_pdf->pdf->Output($pdfFilePath, "D"); 

    }


}

?>