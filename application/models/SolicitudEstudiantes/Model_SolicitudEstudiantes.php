<?php 
class Model_SolicitudEstudiantes extends CI_Model
{


	public function __construct()
	{
		parent::__construct();
	}


	public function verifyNoControlGetInfo($no_de_control)
		{

			$sql =	"select 	no_de_control,
								apellido_paterno,
								apellido_materno,
								nombre_alumno,
								curp_alumno
							 from alumnos 
							 		where no_de_control = ? ";
			

			$query = $this->db->query($sql,array($no_de_control));


			$resultado_query = array(
											'msjCantidadRegistros'=> 0,
											'alumno'=> array(),
											 'status' => '',
											 'mensaje' => ''
										);


			if($query)
			{

				if($query->num_rows()>0)
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['alumno'] = $query->result(); 
					$resultado_query['status'] = 'OK'; 
					$resultado_query['mensaje'] = 'información obtenida';

			
				}
				else
				{
					$resultado_query['msjCantidadRegistros'] = $query->num_rows();
					$resultado_query['alumno'] = $query->result(); 
					$resultado_query['status'] = 'Sin datos';
					$resultado_query['mensaje'] = 'Verifique que su número de control esté escrito correctamente'; 
				}

			}
			else{
					$resultado_query['status'] = 'ERROR'; 
					$resultado_query['mensaje'] = 'Ocurrió un error en la base de datos porfavor recargue la pagina e intente de nuevo'; 
			}
			

			return $resultado_query;



		}


		public function cargarSelectPeriodosEscolares()
		{

			$sql = "select id_periodo_escolar,identificacion_larga,identificacion_corta,periodo from periodos_escolares order by id_periodo_escolar";

			$query = $this->db->query($sql);		
			
			return $query->result();

		}


		public function enviarSolicitudEstudiante($no_de_control,$datosAlumno,$datosSolicitud)
		{

			 $this->db->trans_begin();

			$sql =	"select 	no_de_control,
								apellido_paterno,
								apellido_materno,
								nombre_alumno,
								curp_alumno
							 from alumnos 
							 		where no_de_control = ? ";
			

			$query = $this->db->query($sql,array($no_de_control));


			// if($query)
			// {

				if($query->num_rows()>0)
				{

					$sql =	"update alumnos set 
												id_semestre = ?,
												apellido_paterno = ?,
												apellido_materno = ?,
												nombre_alumno = ?,
												curp_alumno = ?,
												clave_oficial = ?
							  where no_de_control = ? ";

					$query = $this->db->query($sql,array($datosAlumno["id_semestre"],$datosAlumno["apellido_paterno"],$datosAlumno["apellido_materno"],$datosAlumno["nombre_alumno"],$datosAlumno["curp_alumno"],$datosAlumno["clave_oficial"],$no_de_control));



					$sql =	"insert into solicitudes 	(
															num_solicitud,
															status,
															observacion,
															asunto,
															lugar,
															fecha,
															motivos_academicos,
															motivos_personales,
															otros,
															id_semestre,
															no_de_control,
															id_periodo_escolar
														) 
											  values 	(
															null,
															?,
															?,
															?,
															?,
															?,
															?,
															?,
															?,
															?,
															?,
															?
														)";
			

					$query = $this->db->query($sql,array($datosSolicitud["status"],$datosSolicitud["observacion"],$datosSolicitud["asunto"],$datosSolicitud["lugar"],$datosSolicitud["fecha"],$datosSolicitud["motivos_academicos"],$datosSolicitud["motivos_personales"],$datosSolicitud["otros"],$datosSolicitud["id_semestre"],$no_de_control,$datosSolicitud["id_periodo_escolar"]));


			
				}
				else
				{
					
					$sql =	"insert into alumnos 	(
														no_de_control,
														id_semestre,
														apellido_paterno,
														apellido_materno,
														nombre_alumno,
														curp_alumno, 
														creditos_aprobados,
														creditos_cursados,
														clave_oficial
													)
											values 	(
														?,
														?,
														?,
														?,
														?,
														?,
														null,
														null,
														?
													) ";

					$query = $this->db->query($sql,array($no_de_control,$datosAlumno["id_semestre"],$datosAlumno["apellido_paterno"],$datosAlumno["apellido_materno"],$datosAlumno["nombre_alumno"],$datosAlumno["curp_alumno"],$datosAlumno["clave_oficial"]));


					$sql =	"insert into solicitudes 	(
															num_solicitud,
															status,
															observacion,
															asunto,
															lugar,
															fecha,
															motivos_academicos,
															motivos_personales,
															otros,
															id_semestre,
															no_de_control,
															id_periodo_escolar
														) 
											  values 	(
															null,
															?,
															?,
															?,
															?,
															?,
															?,
															?,
															?,
															?,
															?,
															?
														)";
			

					$query = $this->db->query($sql,array($datosSolicitud["status"],$datosSolicitud["observacion"],$datosSolicitud["asunto"],$datosSolicitud["lugar"],$datosSolicitud["fecha"],$datosSolicitud["motivos_academicos"],$datosSolicitud["motivos_personales"],$datosSolicitud["otros"],$datosSolicitud["id_semestre"],$no_de_control,$datosSolicitud["id_periodo_escolar"]));


				}


				$resultado_query = array(
											 'status' => '',
											 'mensaje' => ''
										);


				if ($this->db->trans_status() === FALSE)
				{
						$resultado_query['status'] = 'ERROR'; 
						$resultado_query['mensaje'] = 'Ocurrió un error en la base de datos por favor recargue la pagina e intente de nuevo'; 

				        $this->db->trans_rollback();
				}
				else
				{
					$resultado_query["status"] = "OK";
					$resultado_query["mensaje"] = "La solcitud fue realizada correctamente";

				    $this->db->trans_commit();
				}



			
			return $resultado_query;

		}





}