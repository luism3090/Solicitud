<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registrar Carreras</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloHomeMenu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloBarraSuperior.css">
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/dataTables.bootstrap.min.css">  -->

	
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
							<a href="<?php echo base_url();?>Materias"><i class="fa fa-pencil-square-o"></i>Materias</a>
						</li>
					</ul> 
		  </ul>

   </div>
	

	<div class="container" style="margin-left:18%;width:78%;" >
						
			<div class="row">
				<div class="col-xs-12">
					<h2 style="text-align: center;">Registrar Carreras</h2>
				</div>
			</div>
			<br><br><br>
			<div class="row">
				<div class="col-xs-12">
						
						 <form id="formDatosCarreras">

						 		<div class="form-group">
										<label for="txtClaveOficialCarrera">Clave oficial:</label>
										<input type="text" id="txtClaveOficialCarrera" name="txtClaveOficialCarrera" class="form-control" placeholder="Clave oficial" minlength="1"  maxlength="100">
									</div>
									<div class="form-group">
										<label for="txtCarrera">Carrera:</label>
										<input type="text" id="txtCarrera" name="txtCarrera" class="form-control" placeholder="Carrera" minlength="1"  maxlength="100">
									</div>
									<div class="form-group">
										<label for="txtNombreCarrera">Nombre carrera:</label>
										<input type="text" id="txtNombreCarrera" name="txtNombreCarrera"  class="form-control" placeholder="Nombre carrera" minlength="1"  maxlength="100" >
									</div>
									<div class="form-group">
										<label for="txtNombreCarreraReducido">Nombre reducido:</label>
										<input type="text" id="txtNombreCarreraReducido" name="txtNombreCarreraReducido"  class="form-control" placeholder="Nombre reducido" minlength="1"  maxlength="100" >
									</div>

									<div class="form-group">
										<label for="txtCargaMaxima">Carga máxima:</label>
										<input type="text" id="txtCargaMaxima" name="txtCargaMaxima"  class="form-control" placeholder="Carga máxima" minlength="1"  maxlength="4" >
									</div>
									<div class="form-group">
										<label for="txtCargaMinima">Carga mínima:</label>
										<input type="text" id="txtCargaMinima" name="txtCargaMinima"  class="form-control" placeholder="Carga mínima" minlength="1"  maxlength="4" >
									</div>
									<div class="form-group">
										<label for="txtCreditosTotales">Créditos totales:</label>
										<input type="text" id="txtCreditosTotales" name="txtCreditosTotales"  class="form-control" placeholder="Créditos totales" minlength="1"  maxlength="4" >
									</div>
									
									<br><br>
									<div class="text-center">
										<button type="submit" class="btn btn-primary "  id="btnGuardarCarrera" >Guardar</button>
									</div>
								
									
						 </form>
						
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
      <button type="button" class="btn btn-default" data-dismiss="modal" id="btnMdlAlertSaveCarreras">Aceptar</button>
      </div>
    </div>

  </div>
</div>

	<br><br><br><br><br><br>

	<script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>
	<!-- <script src="<?php echo base_url(); ?>public/libreriasJS/jquery.dataTables.min.js"></script> -->
	<!-- <script src="<?php echo base_url(); ?>public/libreriasJS/dataTables.bootstrap.min.js"></script> -->
	
 	<script src="<?php echo base_url(); ?>public/js/selectElementMenu.js"></script> 
	<script src="<?php echo base_url(); ?>public/js/cerrarSesion.js"></script> 
	<script src="<?php echo base_url(); ?>public/js/carreras.js"></script>


</body>
</html>|