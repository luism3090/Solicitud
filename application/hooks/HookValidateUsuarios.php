<?php 

class HookValidarDatosUsuario
{

	function __construct()
	{
		$this->ci =& get_instance();
	}


	 function validarUsuarios()
	{
	
		$controlador = $this->ci->router->class;
		$method = $this->ci->router->method;

		// var_dump($this->ci->session->userdata('logueado'));
		// exit();
		//echo $this->ci->session->userdata('logueado');


		
		// primero verificamos si el usuario esta logueado 

		if($controlador == 'Login')
		{

			if( $this->ci->input->is_ajax_request())
			{

				if($this->ci->session->userdata('logueado') === true)
				{

					$datos["redirect"]=true;
					$datos["url"]= base_url()."home";

					echo json_encode($datos);
					
					exit();

				}

			}
			else
			{
				if($this->ci->session->userdata('logueado') === true)
				{
					redirect('Home');
					exit();
				}
			}

			


		}
		else
		{
			//exit();

			if( $this->ci->input->is_ajax_request())
			{
				if($this->ci->session->userdata('logueado') === null)
				{

					if($controlador != 'RegistroPersonal' and $controlador != 'Estudiantes')
					{
						$datos["redirect"]=true;
						$datos["url"]= base_url()."Login";

						echo json_encode($datos);
						
						exit();
					}
					

				}


			}
			else
			{
				if($this->ci->session->userdata('logueado') === null)
				{

					
					

					if($controlador != 'RegistroPersonal' and $controlador != 'Estudiantes')
					{
						

						redirect('Login');
						exit();
					}
					// else{
					// 	echo json_encode($controlador."B");
					// 	exit();
					// }

					

					
				}
			}


			
	
		}
		

		// verificar si el usuario tiene permisos de acuerdo a su rol para visualizar tales elementos del menú

		// if($this->ci->session->userdata('id_rol') != null)
		// {

		// 	$id_rol = $this->ci->session->userdata('id_rol');
		// 	$controladores_rol ="";
		// 	$controladorPermitido = false;

		// 	$this->ci->load->model('Home/VerificarControladoresRol');

		// 	$datos = $this->ci->VerificarControladoresRol->VerifyControlesRol($this->ci->session->userdata('id_rol'));


		// 	 // echo $method;
		// 	 // exit();

		// 	// if($controlador=="Polizas")
		// 	// {
		// 	// 	$controlador = $controlador."/".$method;
		// 	// }
			 
			 

		// 	if($datos["msjCantidadRegistros"] > 0)
		// 	{

				
		// 		$controladores_rol = explode(",", $datos["controllers"][0]->controladores);

		// 		// var_dump($datos["controllers"][0]->controladores);


		// 		foreach ($controladores_rol as $key => $controlBD)
		// 		 {
					
		// 			if(stripos($controlBD,"/"))
		// 			{
		// 				$indexDiagonal = stripos($controlBD,"/");
		// 				$controladores_rol[$key] = substr($controlBD,0,$indexDiagonal);

		// 			}
		// 			else
		// 			{
		// 				$controladores_rol[$key] == $controlBD;
		// 			}

		// 		}

		// 		// var_dump($controladores_rol);
		// 		// echo "<br>";
		// 		// var_dump($controlador);
				
		// 		$controladorPermitido = in_array($controlador,$controladores_rol);
		// 		// var_dump($controladorPermitido);
		// 		// exit();
		// 	}
		// 	else
		// 	{
		// 		$controladores_rol = array();
		// 		$controladorPermitido = in_array($controlador,$controladores_rol);
		// 	}

		// 	//var_dump($datos["controllers"][0]->controladores);
			
		// 	 //exit();

		// 	if($controlador != "AccesoDenegado")
		// 	{

		// 		// var_dump($controladorPermitido);
		// 		// var_dump($controlador);

		// 		// exit();

		// 		if($controladorPermitido===false)
		// 		{
		// 			// echo "b";
		// 			// exit();
		// 			redirect('/AccesoDenegado',$datosControles);
		// 		}
				
				
		// 	}
			
		
		// }
		
		
	



	}
}


?>