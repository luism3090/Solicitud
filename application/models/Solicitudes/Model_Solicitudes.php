<?php 
class Model_Solicitudes extends CI_Model
{
		public function __construct()
		{
			parent::__construct();
		}


	public function cargarTablaSolicitudes($request)
	{

				$requestData= $request;

				$columna = $requestData['order'][0]["column"]+1;
				$ordenacion = $requestData['order'][0]["dir"];

				
				$sqlSolicitudes =	"select distinct 
										alu.no_de_control,
										alu.nombre_alumno,
										alu.apellido_paterno,
								        alu.apellido_materno,
								        alu.curp_alumno,
								        se.nombre_semestre,
									    '<button  type=''button'' class=''btn btn-primary btn btnVerSolicitudes''> <span class=''glyphicon glyphicon-pencil''></span> </button>' as Solicitudes
									  from alumnos alu
									  join solicitudes soli on(alu.no_de_control=soli.no_de_control)
									  join carreras car on(alu.clave_oficial=car.clave_oficial)
									  join semestres se on(alu.id_semestre = se.id_semestre) 
										order by ".$columna." ".$ordenacion." ";


				// $sqlSolicitudes =	"select
				// 								no_de_control,
				// 								nombre_alumno,
				// 								apellido_paterno,
				// 						        apellido_materno,
				// 						        nombreCompleto,
				// 						        curp_alumno,
				// 						        nombre_semestre,
				// 						        Solicitudes
				// 						From(
				// 						select distinct 
				// 								alu.no_de_control,
				// 								alu.nombre_alumno,
				// 								alu.apellido_paterno,
				// 						        alu.apellido_materno,
				// 						        CONCAT(alu.nombre_alumno , ' ', alu.apellido_paterno,' ',alu.apellido_materno) as nombreCompleto,
				// 						        alu.curp_alumno,
				// 						        se.nombre_semestre,
				// 						         '<button  type=''button'' class=''btn btn-primary btn btnVerSolicitudes''> <span class=''glyphicon glyphicon-pencil''></span> </button>' as Solicitudes
				// 						from alumnos alu
				// 						join solicitudes soli on(alu.no_de_control=soli.no_de_control)
				// 						join carreras car on(alu.clave_oficial=car.clave_oficial)
				// 						join semestres se on(alu.id_semestre = se.id_semestre)
				// 						) as Mytable 
				// 						order by ".$columna." ".$ordenacion." ";

				

				//$query1 = $this->db->query($sql1,array($id_usuario));
				$query = $this->db->query($sqlSolicitudes);

				//$this->db->query($sql, array(array(3, 6), 'live', 'Rick') );

				$totalData = $query->num_rows();
				$totalFiltered = $totalData;

				if( !empty($requestData['search']['value']) ) 
				{   

					

					$sqlSolicitudes = "select
												no_de_control,
												nombre_alumno,
												apellido_paterno,
										        apellido_materno,
										        nombreCompleto,
										        curp_alumno,
										        nombre_semestre,
										        Solicitudes
										From(
										select distinct 
												alu.no_de_control,
												alu.nombre_alumno,
												alu.apellido_paterno,
										        alu.apellido_materno,
										        CONCAT(alu.nombre_alumno , ' ', alu.apellido_paterno,' ',alu.apellido_materno) as nombreCompleto,
										        alu.curp_alumno,
										        se.nombre_semestre,
										         '<button  type=''button'' class=''btn btn-primary btn btnVerSolicitudes''> <span class=''glyphicon glyphicon-pencil''></span> </button>' as Solicitudes
										from alumnos alu
										join solicitudes soli on(alu.no_de_control=soli.no_de_control)
										join carreras car on(alu.clave_oficial=car.clave_oficial)
										join semestres se on(alu.id_semestre = se.id_semestre)
										) as Mytable 
									where  
										 ( 
											 no_de_control like '%".$this->db->escape_str($requestData['search']['value'])."%' or  
											 nombreCompleto like '%".$this->db->escape_str($requestData['search']['value'])."%' or
											 curp_alumno like '%".$this->db->escape_str($requestData['search']['value'])."%' or 
											 nombre_semestre like '%".$this->db->escape_str($requestData['search']['value'])."%'
									     ) order by ".$columna." ".$ordenacion." ";

				

					$query = $this->db->query($sqlSolicitudes);


					$totalFiltered = $query->num_rows(); 
					

				}

				$limit = " LIMIT ".$this->db->escape_str($requestData['start'])." ,".$this->db->escape_str($requestData['length'])." ";
	            $sqlSolicitudes .= $limit;
	                
	            $query = $this->db->query($sqlSolicitudes);



	            $data = array();

						foreach ($query->result_array() as $row)
						{ 
							$nestedData=array();

							$nestedData[] = $row["no_de_control"];
						    $nestedData[] = $row["nombre_alumno"];
						    $nestedData[] = $row["apellido_paterno"];
							$nestedData[] = $row["apellido_materno"];
							$nestedData[] = $row["curp_alumno"];
							$nestedData[] = $row["nombre_semestre"];
							$nestedData[] = $row["Solicitudes"];

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


		public function getCountSolicitudesEstudiante($no_de_control)
		{

			$sql = "select 
							soli.num_solicitud,
							soli.asunto,lugar,
							soli.fecha,
							se.nombre_semestre,
							peri.identificacion_larga
					from solicitudes soli
					join alumnos alu on(soli.no_de_control = alu.no_de_control)
					join semestres se on(soli.id_semestre = se.id_semestre)
					join periodos_escolares peri on (soli.id_periodo_escolar = peri.id_periodo_escolar)
					where alu.no_de_control = ? ";

			$query = $this->db->query($sql,array($no_de_control));		


			$resultado_query = array(
											'msjCantidadRegistros'=> 0,
											'solicitudes'=> array(),
											 'status' => '',
											 'mensaje' => ''
										);


			if($query)
			{

				if($query->num_rows()>0)
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['solicitudes'] = $query->result(); 
					$resultado_query['status'] = 'OK'; 
					$resultado_query['mensaje'] = 'información obtenida';

			
				}
				else
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['solicitudes'] = $query->result(); 
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