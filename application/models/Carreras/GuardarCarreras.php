<?php 
	class GuardarCarreras extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		
		public function guardar_carreras($clave_oficial,$carrera,$nombre_carrera,$nombre_reducido,$carga_maxima,$carga_minima,$creditos_totales)
		{

			
			
			$sql =	"insert into carreras (
											clave_oficial,
											carrera,
											nombre_carrera,
											nombre_reducido,
											carga_maxima,
											carga_minima,
											creditos_totales
											) 
											values (
												?,
												?,
												?,
												?,
												?,
												?,
												?
											)";

			$query = $this->db->query($sql,array($clave_oficial,$carrera,$nombre_carrera,$nombre_reducido,$carga_maxima,$carga_minima,$creditos_totales));


			if($query)
			{
				$resultado_query = array(
											'resultado'=>'OK',
											'mensaje'=>'La carrera ha sido registrada correctamente'
										);
			}
			else{
				$resultado_query = array(
											'resultado'=>'ERROR',
											'mensaje'=>'Ocurrio un error a la hora de guardar los datos'
										);
			}
			

			return $resultado_query;



		}
	}
?>