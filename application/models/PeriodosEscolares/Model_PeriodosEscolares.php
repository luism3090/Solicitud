<?php 
class Model_PeriodosEscolares extends CI_Model
{
		public function __construct()
		{
			parent::__construct();
		}


			public function guardarPeriodosEscolares($periodo,$identificacion_larga,$identificacion_corta)
		{

			if($identificacion_corta=="")
			{
				$sql =	"insert into periodos_escolares (
											id_periodo_escolar,
											periodo,
											identificacion_larga,
											identificacion_corta
											) 
											values (
												null,
												?,
												?,
												null
											)";


				$query = $this->db->query($sql,array($periodo,$identificacion_larga));
			}
			else
			{
				$sql =	"insert into periodos_escolares (
												id_periodo_escolar,
												periodo,
												identificacion_larga,
												identificacion_corta
												) 
												values (
													null,
													?,
													?,
													?
												)";

				$query = $this->db->query($sql,array($periodo,$identificacion_larga,$identificacion_corta));
			}
		
			


			if($query)
			{
				$resultado_query = array(
											'resultado'=>'OK',
											'mensaje'=>'El periodo ha sido registrado correctamente'
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


		public function cargarTablaPeriodosEscolares($request)
		{

					$requestData= $request;

					$columna = $requestData['order'][0]["column"]+1;
					$ordenacion = $requestData['order'][0]["dir"];

					
					$sqlPeriodosEscolares =	"select 
											id_periodo_escolar,
											periodo,
											identificacion_larga,
											identificacion_corta,
										    '<button  type=''button'' class=''btn btn-primary btn btnModificarPeriodosEscolares''> <span class=''glyphicon glyphicon-pencil''></span> </button>' as Modificar,
										    '<button  type=''button'' class=''btn btn-primary btn btnEliminarPeriodosEscolares''> <span class=''glyphicon glyphicon-trash''></span> </button>' as Eliminar
										  from periodos_escolares 
											order by ".$columna." ".$ordenacion." ";

					

					//$query1 = $this->db->query($sql1,array($id_usuario));
					$query = $this->db->query($sqlPeriodosEscolares);

					//$this->db->query($sql, array(array(3, 6), 'live', 'Rick') );

					$totalData = $query->num_rows();
					$totalFiltered = $totalData;

					if( !empty($requestData['search']['value']) ) 
					{   

						

						$sqlPeriodosEscolares = "select 
											id_periodo_escolar,
											periodo,
											identificacion_larga,
											identificacion_corta,
										    '<button  type=''button'' class=''btn btn-primary btn btnModificarPeriodosEscolares''> <span class=''glyphicon glyphicon-pencil''></span> </button>' as Modificar,
										    '<button  type=''button'' class=''btn btn-primary btn btnEliminarPeriodosEscolares''> <span class=''glyphicon glyphicon-trash''></span> </button>' as Eliminar
										  from periodos_escolares 
										where  
											 ( 
												 periodo like '%".$this->db->escape_str($requestData['search']['value'])."%' or  
												 identificacion_larga like '%".$this->db->escape_str($requestData['search']['value'])."%' or 
												 identificacion_corta like '%".$this->db->escape_str($requestData['search']['value'])."%' 
										     ) order by ".$columna." ".$ordenacion." ";

					

						$query = $this->db->query($sqlPeriodosEscolares);


						$totalFiltered = $query->num_rows(); 
						

					}

					$limit = " LIMIT ".$this->db->escape_str($requestData['start'])." ,".$this->db->escape_str($requestData['length'])." ";
		            $sqlPeriodosEscolares .= $limit;
		                
		            $query = $this->db->query($sqlPeriodosEscolares);



		            $data = array();

							foreach ($query->result_array() as $row)
							{ 
								$nestedData=array();

								$nestedData[] = $row["id_periodo_escolar"];
							    $nestedData[] = $row["periodo"];
							    $nestedData[] = $row["identificacion_larga"];
							    $nestedData[] = $row["identificacion_corta"];
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




		public function getInfoPeriodoEscolar($id_periodo_escolar)
		{

			$sql =	"		select 		id_periodo_escolar,
											periodo,
											identificacion_larga,
											identificacion_corta
							 from periodos_escolares 
							 		where id_periodo_escolar = ? ";
			

			$query = $this->db->query($sql,array($id_periodo_escolar));


			$resultado_query = array(
											'msjCantidadRegistros'=> 0,
											'semestre'=> array(),
											 'status' => '',
											 'mensaje' => ''
										);


			if($query)
			{

				if($query->num_rows()>0)
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['semestre'] = $query->result(); 
					$resultado_query['status'] = 'OK'; 
					$resultado_query['mensaje'] = 'información obtenida';

			
				}
				else
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['semestre'] = $query->result(); 
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



		public function modificarPeriodosEscolares($id_periodo_escolar,$periodo,$identificacion_larga,$identificacion_corta)
		{

			
			
			$sql =	"update periodos_escolares set 
											periodo = ? ,
											identificacion_larga = ?,
											identificacion_corta = ?
										where 
											id_periodo_escolar = ? ";

			$query = $this->db->query($sql,array($periodo,$identificacion_larga,$identificacion_corta,$id_periodo_escolar));


			if($query)
			{
				$resultado_query = array(
											'resultado'=>'OK',
											'mensaje'=>'El periodo ha sido modificado correctamente'
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


		public function deletePeriodosEscolares($id_periodo_escolar)
		{

			$sql =	"select distinct id_periodo_escolar 
					from solicitudes 
					where id_periodo_escolar = ? ";
			

			$query = $this->db->query($sql,array($id_periodo_escolar));


			$resultado_query = array(
											'msjCantidadRegistros'=> 0,
											'solicitud'=> array(),
											 'status' => '',
											 'mensaje' => ''
										);


			if($query)
			{

				if($query->num_rows()>0)
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['solicitud'] = $query->result(); 
					$resultado_query['status'] = 'NO_DISPONIBLE'; 
					$resultado_query['mensaje'] = 'No se puede eliminar el periodo escolar debido a que esta relacionado con alguna(s) solicitude(s)';

			
				}
				else
				{

					$sql2 =	"delete from periodos_escolares where id_periodo_escolar = ? ";
					

					$query2 = $this->db->query($sql2,array($id_periodo_escolar));

					if($query2)
					{
						$resultado_query['status'] = 'OK'; 
						$resultado_query['mensaje'] = 'El periodo ha sido eliminado correctamente';
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