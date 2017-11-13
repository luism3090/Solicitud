<?php 
class Model_CarrerasMaterias extends CI_Model
{
		public function __construct()
		{
			parent::__construct();
		}


		public function cargarSelectCarreras()
		{

			$sql = "select clave_oficial,nombre_carrera from carreras order by clave_oficial";

			$query = $this->db->query($sql);		
			
			return $query->result();

		}


		public function cargarSelectSemestres()
		{

			$sql = "select id_semestre,nombre_semestre from semestres order by id_semestre";

			$query = $this->db->query($sql);		
			
			return $query->result();

		}

		public function getInfoCarrerasMaterias($clave_oficial,$id_semestre)
		{

			$sql = "select 	ma.id_materia,
							ma.nombre_completo_materia 
					from carreras car
							join rel_materias_carreras rmc on(car.clave_oficial=rmc.clave_oficial)
							join materias ma on(rmc.id_materia=ma.id_materia)
					where 	car.clave_oficial = ?
							and rmc.id_semestre = ?";

			$query = $this->db->query($sql,array($clave_oficial,$id_semestre));		


			$resultado_query = array(
											'msjCantidadRegistros'=> 0,
											'materias'=> array(),
											 'status' => '',
											 'mensaje' => ''
										);


			if($query)
			{

				if($query->num_rows()>0)
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['materias'] = $query->result(); 
					$resultado_query['status'] = 'OK'; 
					$resultado_query['mensaje'] = 'información obtenida';

			
				}
				else
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['materias'] = $query->result(); 
					$resultado_query['status'] = 'Sin datos';
					$resultado_query['mensaje'] = 'No hay registros'; 
				}

			}
			else{
					$resultado_query['status'] = 'ERROR'; 
					$resultado_query['mensaje'] = 'Ocurrió un error en la base de datos porfavor recargue la pagina e intente de nuevo'; 
			}
			
			
			return $resultado_query;

		}


}