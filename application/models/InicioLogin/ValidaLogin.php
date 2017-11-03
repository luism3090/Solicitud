<?php 
	class ValidaLogin extends CI_Model
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function verificarLogin($usuario)
		{
			
			$sql =	"select id_usuario,
							nombre,
							apellidos,
							correo
					from   
				    		usuarios
		         	where correo = ? and 
		         		  password = ? and 
		         		  estado = '1' ";

			$query = $this->db->query($sql,array($usuario["email"],$usuario["password"]));


			$datosLogin = array("msjCantidadRegistros" => 0, "msjNoHayRegistros" => '',"loginUsuario" => array());

			$datosLogin["msjCantidadRegistros"] = $query->num_rows(); 

			if($datosLogin["msjCantidadRegistros"] > 0)
			{
				$datosLogin["loginUsuario"] = $query->result(); 
			}
			else{
				$datosLogin["msjNoHayRegistros"] = "El nombre de usuario o contraseña son incorrectos";
			}
			

			return $datosLogin;



			// foreach ($query->result_array() as $row)
			// {
			//         echo $row['title'];
			//         echo $row['name'];
			//         echo $row['body'];
			// }

		}
	}
?>