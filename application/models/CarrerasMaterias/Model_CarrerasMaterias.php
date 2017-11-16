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


		public function getInfoMaterias($clave_oficial,$id_semestre,$arrayMaterias)
		{

			// $sql = "select 	id_materia,nombre_completo_materia
			// 		from materias 
			// 		where 	
			// 		id_materia not in (
			// 									select 	ma2.id_materia
			// 									from carreras car2
			// 											join rel_materias_carreras rmc2 on(car2.clave_oficial=rmc2.clave_oficial)
			// 											join materias ma2 on(rmc2.id_materia=ma2.id_materia)
			// 									where 	car2.clave_oficial = ?
			// 											and rmc2.id_semestre = ?
			// 									)";

			
					$this->db->select('id_materia,nombre_completo_materia');
					$this->db->from('materias');
					$this->db->where_not_in('id_materia', $arrayMaterias);
					$query = $this->db->get();
		

		

			// $query = $this->db->query($sql,array($arrayMaterias,$id_semestre));		


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


		public function getInfoMaterias2()
		{
			
			$this->db->select('id_materia,nombre_completo_materia');
			$this->db->from('materias');
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




		public function verifyMateriasAgregar($ids_materias,$clave_oficial,$id_semestre)
		{


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



		public function deleteMaterias($clave_oficial,$id_semestre,$id_materia)
		{

					$sql = "delete from rel_materias_carreras 
							where 
							clave_oficial = ? and
							id_materia = ? and 
							id_semestre = ? ";

					$query = $this->db->query($sql,array($clave_oficial,$id_materia,$id_semestre));		


					$resultado_query = array(
													'materias'=> array(),
													 'status' => '',
													 'mensaje' => ''
												);


					if($query)
					{

						$resultado_query['status'] = 'OK'; 
						$resultado_query['mensaje'] = 'La materia ha sido eliminada correctamente';

					}
					else{
							$resultado_query['status'] = 'ERROR'; 
							$resultado_query['mensaje'] = 'Ocurrió un error en la base de datos porfavor recargue la pagina e intente de nuevo'; 
					}
					
					
					return $resultado_query;

		}



		public function guardarCarrerasMaterias($datosMaterias,$clave_oficial,$id_semestre)
		{

			//$this->db->trans_begin();

			$sql1 = "delete from rel_materias_carreras 
					where 	clave_oficial = ? and
							 id_semestre = ? ";

			$query = $this->db->query($sql1,array($clave_oficial,$id_semestre));	



			for($i = 0; $i < count($datosMaterias); $i++) 
			{

			    $id_materia = $datosMaterias[$i]["id_materia"];
			    $creditos_materia = $datosMaterias[$i]["creditos_materia"];
			    $horas_teoricas = $datosMaterias[$i]["horas_teoricas"];
			    $horas_practicas = $datosMaterias[$i]["horas_practicas"];


			    $sql2 = "insert into 
			    				rel_materias_carreras (
														clave_oficial,
														id_materia,
														creditos_materia,
														horas_teoricas,
														horas_practicas,
														id_semestre
	    											  )
	    								             values 
	    								             (
														?,
														?,
														?,
														?,
														?,
														?
	    								             )

	    								             ";

				$query = $this->db->query($sql2,array($clave_oficial,$id_materia,$creditos_materia,$horas_teoricas,$horas_practicas,$id_semestre));	
			    

			}	

			$resultado_query = array(
											 'status' => '',
											 'mensaje' => ''
										);

			if ($this->db->trans_status() === FALSE)
				{
						$resultado_query["status"] = "ERROR";
						$resultado_query["mensaje"] = "Falló al ingresar los datos intente de nuevo";

				        $this->db->trans_rollback();
				}
				else
				{
					$resultado_query["status"] = "OK";
					$resultado_query["mensaje"] = "Los datos se han guardado correctamente";

				    $this->db->trans_commit();
				}

			


			// if($query)
			// {

			// 	if($query->num_rows()>0)
			// 	{
			// 		$resultado_query['msjCantidadRegistros'] = $query->num_rows();
			// 		$resultado_query['materias'] = $query->result(); 
			// 		$resultado_query['status'] = 'OK'; 
			// 		$resultado_query['mensaje'] = 'información obtenida';

			
			// 	}
			// 	else
			// 	{
			// 		$resultado_query['msjCantidadRegistros'] = $query->num_rows();
			// 		$resultado_query['materias'] = $query->result(); 
			// 		$resultado_query['status'] = 'Sin datos';
			// 		$resultado_query['mensaje'] = 'No hay registros'; 
			// 	}

			// }
			// else{
			// 		$resultado_query['status'] = 'ERROR'; 
			// 		$resultado_query['mensaje'] = 'Ocurrió un error en la base de datos porfavor recargue la pagina e intente de nuevo'; 
			// }
			
			
			return $resultado_query;

		}


}