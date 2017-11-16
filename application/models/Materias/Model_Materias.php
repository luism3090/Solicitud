<?php 
class Model_Materias extends CI_Model
{
		public function __construct()
		{
			parent::__construct();
		}



		public function guardarMaterias($nombre_completo_materia,$nombre_abreviado_materia)
		{

			
			
			$sql =	"insert into materias (
											nombre_completo_materia,
											nombre_abreviado_materia
											) 
											values (
												?,
												?
											)";

			$query = $this->db->query($sql,array($nombre_completo_materia,$nombre_abreviado_materia));


			if($query)
			{
				$resultado_query = array(
											'resultado'=>'OK',
											'mensaje'=>'La materia ha sido registrada correctamente'
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


		public function cargarTablaMaterias($request)
		{

					$requestData= $request;

					$columna = $requestData['order'][0]["column"]+1;
					$ordenacion = $requestData['order'][0]["dir"];

					
					$sqlMaterias =	"select 
											id_materia,
											nombre_completo_materia,
											nombre_abreviado_materia,
										    '<button  type=''button'' class=''btn btn-primary btn btnModificarMateria''> <span class=''glyphicon glyphicon-pencil''></span> </button>' as Modificar,
										    '<button  type=''button'' class=''btn btn-primary btn btnEliminarMateria''> <span class=''glyphicon glyphicon-trash''></span> </button>' as Eliminar
										  from materias 
											order by ".$columna." ".$ordenacion." ";

					

					//$query1 = $this->db->query($sql1,array($id_usuario));
					$query = $this->db->query($sqlMaterias);

					//$this->db->query($sql, array(array(3, 6), 'live', 'Rick') );

					$totalData = $query->num_rows();
					$totalFiltered = $totalData;

					if( !empty($requestData['search']['value']) ) 
					{   

						

						$sqlMaterias = "select 
											id_materia,
											nombre_completo_materia,
											nombre_abreviado_materia,
										    '<button  type=''button'' class=''btn btn-primary btn btnModificarMateria''> <span class=''glyphicon glyphicon-pencil''></span> </button>' as Modificar,
										    '<button  type=''button'' class=''btn btn-primary btn btnEliminarMateria''> <span class=''glyphicon glyphicon-trash''></span> </button>' as Eliminar
										  from materias 
										where  
											 ( 
												 nombre_completo_materia like '%".$this->db->escape_str($requestData['search']['value'])."%' or  
												 nombre_abreviado_materia like '%".$this->db->escape_str($requestData['search']['value'])."%'
										     ) order by ".$columna." ".$ordenacion." ";

					

						$query = $this->db->query($sqlMaterias);


						$totalFiltered = $query->num_rows(); 
						

					}

					$limit = " LIMIT ".$this->db->escape_str($requestData['start'])." ,".$this->db->escape_str($requestData['length'])." ";
		            $sqlMaterias .= $limit;
		                
		            $query = $this->db->query($sqlMaterias);



		            $data = array();

							foreach ($query->result_array() as $row)
							{ 
								$nestedData=array();

								$nestedData[] = $row["id_materia"];
							    $nestedData[] = $row["nombre_completo_materia"];
							    $nestedData[] = $row["nombre_abreviado_materia"];
								$nestedData[] = $row["Modificar"];
								$nestedData[] = $row["Eliminar"];

								$data[] = $nestedData;
							}


				$json_data = array(
					"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
					"recordsTotal"    => intval( $totalData ),  // total number of records
					"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
					"data"            => $data  // total data array
					);


				return $json_data;


			
		}


		public function getInfoMateria($id_materia)
		{

			$sql =	"		select 		id_materia,
										nombre_completo_materia,
										nombre_abreviado_materia
							 from materias 
							 		where id_materia = ? ";
			

			$query = $this->db->query($sql,array($id_materia));


			$resultado_query = array(
											'msjCantidadRegistros'=> 0,
											'materia'=> array(),
											 'status' => '',
											 'mensaje' => ''
										);


			if($query)
			{

				if($query->num_rows()>0)
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['materia'] = $query->result(); 
					$resultado_query['status'] = 'OK'; 
					$resultado_query['mensaje'] = 'información obtenida';

			
				}
				else
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['materia'] = $query->result(); 
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


		public function modificarMaterias($id_materia,$nombre_completo_materia,$nombre_abreviado_materia)
		{

			
			
			$sql =	"update materias set 
											nombre_completo_materia = ? ,
											nombre_abreviado_materia = ?
										where 
											id_materia = ? ";

			$query = $this->db->query($sql,array($nombre_completo_materia,$nombre_abreviado_materia,$id_materia));


			if($query)
			{
				$resultado_query = array(
											'resultado'=>'OK',
											'mensaje'=>'La materia ha sido modificada correctamente'
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



		public function deleteMaterias($id_materia)
		{

			$sql =	"select distinct id_materia 
					from rel_materias_carreras 
					where id_materia = ? ";
			

			$query = $this->db->query($sql,array($id_materia));


			$resultado_query = array(
											'msjCantidadRegistros'=> 0,
											'materia'=> array(),
											 'status' => '',
											 'mensaje' => ''
										);


			if($query)
			{

				if($query->num_rows()>0)
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['materia'] = $query->result(); 
					$resultado_query['status'] = 'NO_DISPONIBLE'; 
					$resultado_query['mensaje'] = 'No se puede eliminar la materia debido a que tiene carrera(s) asociada(s)';

			
				}
				else
				{

					$sql2 =	"delete from materias where id_materia = ? ";
					

					$query2 = $this->db->query($sql2,array($id_materia));

					if($query2)
					{
						$resultado_query['status'] = 'OK'; 
						$resultado_query['mensaje'] = 'La materia ha sido eliminada correctamente';
					}
					else{
						$resultado_query['status'] = 'ERROR'; 
						$resultado_query['mensaje'] = 'Ocurrió un error en la base de datos porfavor recargue la página e intente de nuevo'; 
					}


				}

			}
			else{
					$resultado_query['status'] = 'ERROR'; 
					$resultado_query['mensaje'] = 'Ocurrió un error en la base de datos porfavor recargue la página e intente de nuevo'; 
			}
			

			return $resultado_query;



		}






}