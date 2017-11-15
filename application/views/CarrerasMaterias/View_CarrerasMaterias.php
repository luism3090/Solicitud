<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Carreras Materias</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloHomeMenu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloBarraSuperior.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/dataTables.bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/select.dataTables.min.css">

	
</head>

<body data-base-url="<?php echo base_url();?>">
	
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">

	    <div class="container-fluid"> 

	        <div class="navbar-header">
	        
	        </div>

	        <div class="collapse navbar-collapse">
	            
	            <ul class="nav navbar-nav navbar-right">
	                <li class="dropdown">
	                	
	                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" style='display: inline-block;'>
	                        <span class="glyphicon glyphicon-user"></span> 
	                        <strong><?php echo $this->session->userdata('nombre'); ?></strong>
	                        <span class="glyphicon glyphicon-chevron-down"></span>
	                    </a>
	                    <ul class="dropdown-menu">
	                        <li>
	                            <div class="navbar-login">
	                                <div class="row">
	                                    <div class="col-lg-4">
	                                        <p class="text-center">
	                                            <img src="<?php echo base_url();?>public/uploads/default.png" alt="" width="100px" height="100px">
	                                        </p>
	                                    </div>
	                                    <div class="col-lg-8">
	                                        <p class="text-left"><strong><?php echo $this->session->userdata('nombre'); ?></strong></p>
	                                        <p class="text-left small"><?php echo $this->session->userdata('correo')?></p>
	                                       <!--  <p class="text-left">
	                                            <a href="#" class="btn btn-primary btn-block btn-sm" id="btnUpdateMyData">Actualizar Datos</a>
	                                        </p> -->
	                                    </div>
	                                </div>
	                            </div>
	                        </li>
	                        <li class="divider"></li>
	                        <li>
	                            <div class="navbar-login navbar-login-session">
	                                <div class="row">
	                                    <div class="col-lg-12">
	                                        <p>
	                                            <a href="#" class="btn btn-danger btn-block" id="btnCerrarSesion">Cerrar Sesion</a>
	                                        </p>
	                                    </div>
	                                </div>
	                            </div>
	                        </li>
	                    </ul>
	                </li>
	            </ul>
	        </div>

	    </div>

	</div>


	<div class="sidebar left" >

		  <ul class="list-sidebar bg-defoult" >
				<ul class="list-sidebar bg-defoult">
						<li>
							<a href="<?php echo base_url();?>Home">
								<i class="fa fa-list-alt"></i>Solicitudes
							</a>
						</li>
						<li>
							 <a href="#" data-toggle="collapse" data-target="#Carreras" class="collapse active" aria-expanded="false">
										    	 <i class="fa fa-graduation-cap"></i>
										    	 <span class="nav-label">Carreras</span>
										    	 <i class="fa fa-chevron-left pull-right"></i>
											 </a>

							 <ul class="sub-menu collapse" id="Carreras" aria-expanded="false" style="">
						    	 <li><a href="<?php echo base_url();?>Carreras/registrar"><i class=""></i>Registrar</a></li>
						    	 <li><a href="<?php echo base_url();?>Carreras/modificar"><i class=""></i>Modificar</a></li>
							 </ul>
						</li>
						 <li>
							<a href="#" data-toggle="collapse" data-target="#Materias" class="collapse active" aria-expanded="false">
										    	 <i class="fa fa-pencil-square-o"></i>
										    	 <span class="nav-label">Materias</span>
										    	 <i class="fa fa-chevron-left pull-right"></i>
											 </a>

							 <ul class="sub-menu collapse" id="Materias" aria-expanded="false" style="">
						    	 <li><a href="<?php echo base_url();?>Materias/registrar"><i class=""></i>Registrar</a></li>
						    	 <li><a href="<?php echo base_url();?>Materias/modificar"><i class=""></i>Modificar</a></li>
							 </ul>
						</li>
						<li>
							<a href="<?php echo base_url();?>CarrerasMaterias" >
								<i class="fa fa-list-alt"></i>Carreras y Materias
							</a>
						</li>
					</ul> 
		  </ul>

   </div>
	

	<div class="container" style="margin-left:18%;width:78%;" >
						
			<div class="row">
				<div class="col-xs-12">
					<h2 style="text-align: center;">Carreras y Materias</h2>
				</div>
			</div>
			<br><br><br>
			 <form id="formCarrerasMaterias">

					<div class="row">
						<div class="col-xs-12">
								
					
						 		<div class="form-group">
									<label for="slCarreras">Elija la carrera:</label> 
									<select id="slCarreras" class="form-control" name="slCarreras">											
									</select> 
								</div>
								<div class="form-group">
									<label for="slSemestres">Elija el semestre:</label> 
									<select id="slSemestres" class="form-control" name="slSemestres">											
									</select> 
								</div>

									
								
						</div>
					</div>

					<br>
					
				
					<br>
					<div class="row">
						<div class="col-xs-3" style="width: 20%;">
							<div class="text-left">
							<button type="button" class="btn btn-primary "  id="btnAgregarMaterias" >Agregar Materias</button>
						</div>
						</div>
						<div class="col-xs-9">
							<table id='tblCarrerasMaterias' border='1px' style="width:100%;height:100px;border:1px solid black;margin: 0px auto">
								<thead>
									<tr>
										<th class='text-center'>Materia</th>
										<th class='text-center'>Créditos materia</th>
										<th class='text-center'>Horas teóricas</th>
										<th class='text-center'>Horas prácticas</th>
										<th class='text-center'>Eliminar</th>
									</tr>
								</thead>
								<tbody>
									<tr class='noData' >
										<td  colspan='5' class='text-center'>No hay información disponible</td>
									</tr>
								</tbody>
							</table >
						</div>
					</div>
					

					<br><br><br>
					<div class="text-center">
						<button type="submit" class="btn btn-primary "  id="btnGuardarCarrerasMaterias" >Guardar</button>
					</div>

			</form>

	</div>




   <!-- Modal -->
<div id="modalAlertaAgregarMaterias" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style='width: 800px'>
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Agregar Materias</h4>
      </div>
		      <div class="modal-body">

					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<h3> Agregue las materias para la carrera seleccionada:</h3> 
							</div>
						</div>
					</div>	
					
					<div class="row">
						<div class="col-xs-12">
							<table id='tblMaterias' border='1px' style="width:100%;height:100px;border:1px solid black;margin: 0px auto">
								<thead>
									<tr>
										<th class='text-center'>Seleccionar</th>
										<th class='text-center'>Materia</th>
									</tr>
								</thead>
								<tbody>
									<tr class='noData' >
										<td  colspan='3' class='text-center'>No hay información disponible</td>
									</tr>
								</tbody>
							</table >
						</div>
					</div>	



		      </div>
		      <div class="modal-footer">
		      		<button type="submit" class="btn btn-primary"   id="btnMdlAgregarMaterias">Aceptar</button>
		      		 <button type="button" class="btn btn-primary" data-dismiss="modal" >Cancelar</button>
		      </div>
     
    </div>

  </div>
</div>



   <!-- Modal -->
<div id="modalAlerta" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMdlAlertSaveMaterias">Aceptar</button>

      </div>
    </div>

  </div>
</div>


   <!-- Modal -->
<div id="modalAlertaEliminarMaterias" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alerta</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMdlAlertEliminarMaterias">Aceptar</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
      </div>
    </div>

  </div>
</div>




	<br>

	<script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>

	<script src="<?php echo base_url(); ?>public/libreriasJS/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/dataTables.bootstrap.min.js"></script>
	
 	<script src="<?php echo base_url(); ?>public/js/selectElementMenu.js"></script> 
	<script src="<?php echo base_url(); ?>public/js/cerrarSesion.js"></script> 
	<script src="<?php echo base_url(); ?>public/js/carrerasMaterias.js"></script>



</body>
</html>|