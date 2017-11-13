<?php 
	class Model_Carreras extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		
		public function guardarCarreras($clave_oficial,$carrera,$nombre_carrera,$nombre_reducido,$carga_maxima,$carga_minima,$creditos_totales)
		{

			
			
			$sql =	"insert into carreras (
											clave_oficial,
											carrera,
											nombre_carrera,
											nombre_reducido,
											carga_maxima,
											carga_minima,
											creditos_totales,
											fecha_ingreso
											) 
											values (
												?,
												?,
												?,
												?,
												?,
												?,
												?,
												now()
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


		public function checkClaveOficial($clave_oficial)
		{

			$sql =	"select clave_oficial from carreras where clave_oficial = ? ";
			

			$query = $this->db->query($sql,array($clave_oficial));


			if($query)
			{

				if($query->num_rows()>0)
				{
					$resultado_query = array(
											'resultado'=>'NO_DISPONIBLE',
											'mensaje'=>'La clave oficial no esta disponible'
										);
			
				}
				else
				{
					$resultado_query = array(
											'resultado'=>'OK',
											'mensaje'=>'se puede ocupar la clave'
										);
				}

			}
			else{
				$resultado_query = array(
											'resultado'=>'ERROR',
											'mensaje'=>'Ocurrio un error a la hora de guardar los datos'
										);
			}
			

			return $resultado_query;



		}


		public function cargarTablaCarreras($request)
		{

					$requestData= $request;

					$columna = $requestData['order'][0]["column"]+1;
					$ordenacion = $requestData['order'][0]["dir"];

					
					$sqlCarreras =	"select 
											clave_oficial,
											carrera,
											nombre_carrera,
											nombre_reducido,
											carga_maxima,
											carga_minima,
											creditos_totales,
										    '<button  type=''button'' class=''btn btn-primary btn btnModificarCarrera''> <span class=''glyphicon glyphicon-pencil''></span> </button>' as Modificar,
										    '<button  type=''button'' class=''btn btn-primary btn btnEliminarCarrera''> <span class=''glyphicon glyphicon-trash''></span> </button>' as Eliminar
										  from carreras 
											order by ".$columna." ".$ordenacion." ";

					

					//$query1 = $this->db->query($sql1,array($id_usuario));
					$query = $this->db->query($sqlCarreras);

					//$this->db->query($sql, array(array(3, 6), 'live', 'Rick') );

					$totalData = $query->num_rows();
					$totalFiltered = $totalData;

					if( !empty($requestData['search']['value']) ) 
					{   

						

						$sqlCarreras = "select 
											clave_oficial,
											carrera,
											nombre_carrera,
											nombre_reducido,
											carga_maxima,
											carga_minima,
											creditos_totales,
										  '<button  type=''button'' class=''btn btn-primary btn btnModificarCarrera''> <span class=''glyphicon glyphicon-pencil''></span> </button>' as Modificar,
										  '<button  type=''button'' class=''btn btn-primary btn btnEliminarCarrera''> <span class=''glyphicon glyphicon-trash''></span> </button>' as Eliminar
										  from carreras 
										where  
											 ( 
												 clave_oficial like '%".$this->db->escape_str($requestData['search']['value'])."%' or  
												 carrera like '%".$this->db->escape_str($requestData['search']['value'])."%' or 
												 nombre_carrera like '%".$this->db->escape_str($requestData['search']['value'])."%' or 
												 nombre_reducido like '%".$this->db->escape_str($requestData['search']['value'])."%' or
												 carga_maxima like '%".$this->db->escape_str($requestData['search']['value'])."%'  or
												 carga_minima like '%".$this->db->escape_str($requestData['search']['value'])."%'  or
												 creditos_totales like '%".$this->db->escape_str($requestData['search']['value'])."%'  
										     ) order by ".$columna." ".$ordenacion." ";

					

						$query = $this->db->query($sqlCarreras);


						$totalFiltered = $query->num_rows(); 
						

					}

					$limit = " LIMIT ".$this->db->escape_str($requestData['start'])." ,".$this->db->escape_str($requestData['length'])." ";
		            $sqlCarreras .= $limit;
		                
		            $query = $this->db->query($sqlCarreras);



		            $data = array();

							foreach ($query->result_array() as $row)
							{ 
								$nestedData=array();

							    $nestedData[] = $row["clave_oficial"];
							    $nestedData[] = $row["carrera"];
								$nestedData[] = $row["nombre_carrera"];
								$nestedData[] = $row["nombre_reducido"];
								$nestedData[] = $row["carga_maxima"];
								$nestedData[] = $row["carga_minima"];
								$nestedData[] = $row["creditos_totales"];
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


		public function getInfoCarrera($clave_oficial)
		{

			$sql =	"		select 		clave_oficial,
										carrera,
										nombre_carrera,
										nombre_reducido,
										carga_maxima,
										carga_minima,
										creditos_totales
							 from carreras 
							 		where clave_oficial = ? ";
			

			$query = $this->db->query($sql,array($clave_oficial));


			$resultado_query = array(
											'msjCantidadRegistros'=> 0,
											'carrera'=> array(),
											 'status' => '',
											 'mensaje' => ''
										);


			if($query)
			{

				if($query->num_rows()>0)
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['carrera'] = $query->result(); 
					$resultado_query['status'] = 'OK'; 
					$resultado_query['mensaje'] = 'información obtenida';

			
				}
				else
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['carrera'] = $query->result(); 
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


		public function checkModificarClaveOficial($clave_oficial_new,$clave_oficial_origen)
		{

			$sql1 =	"select clave_oficial from carreras where clave_oficial = ?";
			
			$query1 = $this->db->query($sql1,array($clave_oficial_origen));

			if($query1)
			{

				if($query1->num_rows()>0)
				{
					
					$clave_oficial_origen = $query1->result()[0]->clave_oficial;

					if($clave_oficial_origen == $clave_oficial_new)
					{
						$resultado_query = array(
											'resultado'=>'OK',
											'mensaje'=>'se puede ocupar la clave 1'
										);
					}
					else
					{
						$sql2 =	"select clave_oficial from carreras where clave_oficial = ?";
			
						$query2 = $this->db->query($sql2,array($clave_oficial_new));

						if($query2)
						{

							if($query2->num_rows()>0)
							{
								$resultado_query = array(
											'resultado'=>'NO_DISPONIBLE',
											'mensaje'=>'La clave oficial no esta disponible 1'
										);
							}
							else
							{
								$resultado_query = array(
											'resultado'=>'OK',
											'mensaje'=>'se puede ocupar la clave 2'
										);
							}
						}
						else
						{
							$resultado_query = array(
														'resultado'=>'ERROR',
														'mensaje'=>'Ocurrio un error a la hora de guardar los datos'
													);
						}



					}
				}
			}
			else
			{
				$resultado_query = array(
											'resultado'=>'ERROR',
											'mensaje'=>'Ocurrio un error a la hora de guardar los datos'
										);
			}


			// if($query)
			// {

			// 	if($query->num_rows()>0)
			// 	{
			// 		$resultado_query = array(
			// 								'resultado'=>'NO_DISPONIBLE',
			// 								'mensaje'=>'La clave oficial no esta disponible'
			// 							);
			
			// 	}
			// 	else
			// 	{
			// 		$resultado_query = array(
			// 								'resultado'=>'OK',
			// 								'mensaje'=>'se puede ocupar la clave'
			// 							);
			// 	}

			// }
			// else{
			// 	$resultado_query = array(
			// 								'resultado'=>'ERROR',
			// 								'mensaje'=>'Ocurrio un error a la hora de guardar los datos'
			// 							);
			// }
			

			return $resultado_query;



		}



		public function modificarCarreras($clave_oficial,$claveOficialOrigen,$carrera,$nombre_carrera,$nombre_reducido,$carga_maxima,$carga_minima,$creditos_totales)
		{

			
			
			$sql =	"update carreras set 
											clave_oficial = ? ,
											carrera = ? ,
											nombre_carrera = ? ,
											nombre_reducido = ? ,
											carga_maxima = ? ,
											carga_minima = ? ,
											creditos_totales = ?
										where 
											clave_oficial = ? ";

			$query = $this->db->query($sql,array($clave_oficial,$carrera,$nombre_carrera,$nombre_reducido,$carga_maxima,$carga_minima,$creditos_totales,$claveOficialOrigen));


			if($query)
			{
				$resultado_query = array(
											'resultado'=>'OK',
											'mensaje'=>'La carrera ha sido modificada correctamente'
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