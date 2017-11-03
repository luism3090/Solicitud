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


	public function cargarMenu()
	{

		// ----------- ESTA ES LA FORMA DE TRAER DATOS DEL MENU COLOCANDO DIRECTAMENTE EL CODIGO HTML  -----------
		

		 // menu para administradores

		if($this->session->userdata('id_rol') == '1' || $this->session->userdata('id_rol') == '2' ) 
		{

			$dataMenu = '<li class="active">

											 <a href="#" data-toggle="collapse" data-target="#Usuarios" class="collapse active" aria-expanded="false">
										    	 <i class="fa fa-user"></i>
										    	 <span class="nav-label">Usuarios</span>
										    	 <i class="fa fa-chevron-left pull-right"></i>
											 </a>

											 <ul class="sub-menu collapse" id="Usuarios" aria-expanded="false" style="">
										    	 <li><a href="'.base_url().'RegistrarUsuarios"><i class=""></i>Registrar</a></li>
										    	 <li><a href="'.base_url().'ModificarUsuarios"><i class=""></i>Modificar</a></li>
											 </ul>
										</li>


										<li class="active">

											 <a href="#" data-toggle="collapse" data-target="#Pólizas" class="collapse active" aria-expanded="true">
										    	 <i class="fa fa-expeditedssl"></i>
										    	 <span class="nav-label">Pólizas</span>
										    	 <i class="fa fa-chevron-left pull-right"></i>
											 </a>

											 <ul class="sub-menu collapse" id="Pólizas" aria-expanded="false" style="">

											 	<li class="active">

													 <a href="#" data-toggle="collapse" data-target="#Ramo" class="collapse active" aria-expanded="true">
														 <i class="fa fa-list"></i>
														 <span class="nav-label">Ramo</span>
														 <i class="fa fa-chevron-left pull-right"></i>
													 </a>

												 	<ul class="sub-menu collapse" id="Ramo" aria-expanded="false" style="">
														 <li>
														 	<a href="'.base_url().'Polizas/autos"><i class=""></i>Autos</a>
														 </li>
														 <li>
														 	<a href="'.base_url().'Polizas/empresarial"><i class=""></i>Empresarial</a>
														 </li>
														 <li>
														 	<a href="'.base_url().'Polizas/gastos_medicos_mayores"><i class=""></i>GMM</a>
														 </li>
														 <li>
														 	<a href="'.base_url().'Polizas/responsabilidad_civil"><i class=""></i>Responsabilidad civil</a>
														 </li>
														 <li>
														 	<a href="'.base_url().'Polizas/vida_grupo"><i class=""></i>Vida de grupo</a>
														 </li>
													</ul>

												</li>

												<li><a href="http://localhost:8080/Seguros/PolizaDigital"><i class=""></i>Póliza digital</a></li>

													<li class="active">
												    	 <a href="#" data-toggle="collapse" data-target="#Pagos" class="collapse active">
												        	 <i class="fa fa-money"></i>
												        	 <span class="nav-label">Pagos</span>
												        	 <i class="fa fa-chevron-left pull-right"></i>
												    	 </a>
												    	 <ul class="sub-menu collapse" id="Pagos">
												    	 	<li>
												    	 		<a href="'.base_url().'PagosVencer"><i class=""></i>Próximos a vencer</a>
												    	 	</li>
												    	 	<li>
												    	 		<a href="'.base_url().'TodoPolizas"><i class=""></i>Todas las Pólizas</a>
												    	 	</li>
												    	 </ul>
													 </li>
											</ul>
											   
										</li>

										<li>
											<a href="'.base_url().'PolizasCotizacion"><i class="fa fa-money"></i>Cotización</a>

										</li>

										';

		}

		 // menu para clientes

		else{ 

			$dataMenu = '<ul class="list-sidebar bg-defoult">
						<li>
							<a href="'.base_url().'PolizaDigitalCliente" class="selecionado">
								<i class="fa fa-list-alt"></i>Póliza digital
							</a>
						</li>
						<li>
							<a href="'.base_url().'Descargas"><i class="fa fa-download"></i>Descargas</a>
						</li>
						<li>
							<a href="'.base_url().'Descargas"><i class="fa fa-download"></i>Hola mundo</a>
						</li>
					</ul> ';

		}




		//  ----------- ESTA ES LA FORMA DE TRAER DATOS DEL MENU CON FUNCIONALIDAD DESDE LA BASE DE DATOS  -----------



		// $this->load->model('Home/Menu');

		// $datosMenu = $this->Menu->getElmentosMenu($this->session->userdata('id_rol'));

		// $dataMenu = $this->buildMenu($datosMenu,false,false);

	


		

		$datos["rowsMenu"] = $dataMenu;

		echo json_encode($datos);

	}

	function buildMenu($datosMenu1,$is_sub,$descripcion)
	{

		$menu = "";
		$attr = "";

		if($is_sub)
		{
			$attr = "class='sub-menu collapse' id='".$descripcion."'";
			$menu = "<ul $attr >";
		}
		else
		{
			 $attr = 'id="menu"';
		}


		  foreach($datosMenu1 as $id => $properties) 
		  {


			  	$datosMenu2 = $this->Menu->getHijosElmentosMenu($properties->id_elemento_menu,$this->session->userdata('id_rol'));
			  	
			  	if(!empty($datosMenu2)) 
			  	{

                	$sub = $this->buildMenu($datosMenu2, TRUE,$properties->descripcion);

	            }		           
	            else {

	                $sub = NULL;                

	            }	

	            if ($sub != NULL)
	            {
	            	
	            	
	            	 $menu .= "<li class='active' >
					            	 <a href='#' data-toggle='collapse' data-target='#".$properties->descripcion."' class='collapse active'>
						            	 <i class='$properties->icono'></i>
						            	 <span class='nav-label'>$properties->descripcion</span>
						            	 <i class='fa fa-chevron-left pull-right'></i>
					            	 </a>
					            	 $sub
	            	 		   </li>";
	            	
	            }
	            else
	            {

	            	if($properties->controlador != "" )
	            	{
	            		$url = base_url().$properties->controlador;
	            	}
	            	else
	            	{
	            		$url = "#";
	            	}

	            	$menu .= "<li><a href='".$url."'><i class='".$properties->icono."'></i>$properties->descripcion</a></li>";
	            }
            		
            		     			                          

		  }
		

		return $menu . "</ul>";

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