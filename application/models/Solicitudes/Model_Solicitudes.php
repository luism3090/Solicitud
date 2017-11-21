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

				

				//$query1 = $this->db->query($sql1,array($id_usuario));
				$query = $this->db->query($sqlSolicitudes);

				//$this->db->query($sql, array(array(3, 6), 'live', 'Rick') );

				$totalData = $query->num_rows();
				$totalFiltered = $totalData;

				if( !empty($requestData['search']['value']) ) 
				{   

					

					$sqlSolicitudes = "select distinct
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
									where  
										 ( 
											 alu.no_de_control like '%".$this->db->escape_str($requestData['search']['value'])."%' or  
											 alu.nombre_alumno like '%".$this->db->escape_str($requestData['search']['value'])."%' or
											 alu.apellido_paterno like '%".$this->db->escape_str($requestData['search']['value'])."%' or
											 alu.apellido_materno like '%".$this->db->escape_str($requestData['search']['value'])."%' or
											 alu.curp_alumno like '%".$this->db->escape_str($requestData['search']['value'])."%' or 
											 se.nombre_semestre like '%".$this->db->escape_str($requestData['search']['value'])."%'
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

}