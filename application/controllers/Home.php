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

		$this->load->view('Home/home');
		
	}



	public function cerrarSesion()
	{

		   $this->session->sess_destroy();
			
			$datos["sesion"] = false;
			$datos["base_url"] = base_url()."Login";

			echo json_encode($datos);


	
			// if($this->session->userdata('logueado')!=null)
			// {
				
			// 	$this->session->sess_destroy();
				
			// 	$datos["sesion"] = false;
			// 	$datos["base_url"] = base_url()."Login";

			// 	echo json_encode($datos);

			// } 
			// else{

			// 	$datos["sesion"] = false;
			// 	$datos["base_url"] = base_url()."Login";

			// 	echo json_encode($datos);
			// }
	}	


	public function actualizarDatosUsuario()
	{

		$this->load->model('Usuarios/users');
		$datosUsuario = $this->users->obtenerDatosUsuario($this->session->userdata('id'));


		if(is_array($datosUsuario))
		{
			echo json_encode($datosUsuario);
		}
		else
		{
			$datos["algo"] = "Hola";
			echo json_encode($datos);
		}
			
		
	}



}

?>