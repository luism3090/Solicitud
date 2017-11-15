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
							ma.nombre_completo_materia,
							rmc.creditos_materia,
							rmc.horas_teoricas,
							rmc.horas_practicas
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


		public function getInfoMaterias()
		{

			$sql = "select 	id_materia,
							nombre_completo_materia 
					from materias order by id_materia desc";

			$query = $this->db->query($sql);		


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



		public function verifyMateriasAgregar($ids_materias,$clave_oficial,$id_semestre)
		{

			// $sql = "select 	ma.id_materia,
			// 				ma.nombre_completo_materia 
			// 		from carreras car
			// 				join rel_materias_carreras rmc on(car.clave_oficial=rmc.clave_oficial)
			// 				join materias ma on(rmc.id_materia=ma.id_materia)
			// 		where 	car.clave_oficial = ?
			// 				and rmc.id_semestre = ?";
							//and ma.id_materia IN ? ";


			$this->db->select('materias.id_materia,materias.nombre_completo_materia');
			$this->db->from('carreras');
			$this->db->join('rel_materias_carreras', 'rel_materias_carreras.clave_oficial = carreras.clave_oficial');
			$this->db->join('materias', 'materias.id_materia = rel_materias_carreras.id_materia');
			$this->db->where('carreras.clave_oficial', $clave_oficial);
			$this->db->where('rel_materias_carreras.id_semestre', $id_semestre);
			$this->db->where_in('materias.id_materia', $ids_materias);
			$query = $this->db->get();



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