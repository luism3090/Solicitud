<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Solicitudes</title>
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">	 -->
</head>

<body >
	

    <div> 

        <h3>SOLICTUD DEL ESTUDIANTE PARA EL ANÁLISIS DEL COMITÉ ACADÉMICO</h3>
        <br> 
        <h3 style='width:340px;margin: 0px auto'>Instituto tecnológico de Salina Cruz </h3>
		<br> <br>
		<div style='width:340px;margin:0px 350px'>Lugar y Fecha: <strong><ins> <?php echo $lugarYfecha; ?> </ins></strong> </div> 
		<div style='width:340px;margin:7px 350px'>Asunto: <strong><ins> <?php echo $asunto; ?> </ins> </strong></div> 
		<br>
		<strong>
			C. Ing Victor Hugo Vargas Contreras<br>
	    	Jefe de la Division de Estudios Profesionales<br>
	         PRESENTE
         </strong>
        <br><br><br>

       <!--  <div>
        	
        	<div >
        		El (la) que suscribe C. 
        		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        		<ins><?php echo $nombreCompleto; ?></ins> 
        		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        		estudiante del 
        		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        		<ins><?php echo $nombre_semestre; ?></ins> <br>
        	</div>
        	<div>
        		
        	</div>
        	
        	de la carrera de <ins><?php echo $nombre_carrera; ?></ins>
        	con número de control <ins><?php echo $no_de_control; ?></ins>

        </div> -->


          <div>
        	
        	<div >
        		El (la) que suscribe C. 
        		<strong><ins><?php echo $nombreCompleto; ?></ins> </strong>
        		estudiante del 
        		<strong><ins><?php echo $nombre_semestre; ?></ins></strong>
        		de la carrera de <strong><ins><?php echo $nombre_carrera; ?></ins></strong>
        	    con número de control <strong><ins><?php echo $no_de_control; ?></ins></strong>.
        	    <br><br>
        	    Solicito de la manera mas atenta:
        	   <strong> <ins><?php echo $observacion; ?></ins></strong>
        	    <br><br><br>
				Por los siguientes motivos: <br><br><br>

				Motivos académicos: <br><br>
				<strong><ins><?php echo $motivos_academicos; ?></ins></strong>

				<br><br><br>

				Motivos personales: <br><br>
				<strong><ins><?php echo $motivos_personales; ?></ins></strong>

				<br><br><br>

				Otros: <br><br>
				<strong><ins><?php echo $otros; ?></ins></strong>
				
				<br><br><br><br>
				<div style='width:120px;border:0px solid red;margin:0px auto'>
					<strong>ATENTAMENTE </strong>
				</div>
				<br><br>
					<div style="border-bottom: 1px solid black;width:300px;margin:0px auto"></div>
				<br>
				<div>
					c.c.p Interesado.
				</div>
        	</div>
        	
        	
        	
        </div>



    </div>

</body>
</html>