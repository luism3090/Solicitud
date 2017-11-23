DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Modificar Periodos Escolares</title>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloHomeMenu.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloBarraSuperior.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/dataTables.bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/select.dataTables.min.css">

	
</head>

<body data-base-url="<?php echo base_url();?>">
	
	<div class="navbar navbar-default navbar-fixed-top" role="navigation" style='margin-top: -20px;'>

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
						 <li>
							<a href="#" data-toggle="collapse" data-target="#PeriodosEscolares" class="collapse active" aria-expanded="false">
										    	 <i class="fa fa-pencil-square-o"></i>
										    	 <span class="nav-label">Periodos Escolares</span>
										    	 <i class="fa fa-chevron-left pull-right"></i>
											 </a>

							 <ul class="sub-menu collapse" id="PeriodosEscolares" aria-expanded="false" style="">
						    	 <li><a href="<?php echo base_url();?>PeriodosEscolares/registrar"><i class=""></i>Registrar</a></li>
						    	 <li><a href="<?php echo base_url();?>PeriodosEscolares/modificar"><i class=""></i>Modificar</a></li>
							 </ul>
						</li>
					</ul> 
		  </ul>

   </div>
	

	<div class="container" style="margin-left:18%;width:78%;" >
						
								<div class="row">
									<div class="col-xs-12 text-center">
										
										<h3>Modificar Periodos Escolares</h3>	
									
									</div>
								</div>
								<br>
								
								<form action="" id="formModificarCarreras">
								
									<fieldset>
										<legend>Periodos Escolares:</legend>
										<div class="row">
											<div class="col-xs-12 ">
												<div class="table-responsive">
													<table class="table table-bordered table-hover" id="tblPeriodosEscolares" cellspacing="0"  width="100%" style="text-align: center;">
															<caption style="text-align: center"><h4><strong>Periodos Escolares</strong></h4></caption>
															<thead>
												                    <tr>
												                    	 <th>id periodo</th>
													                      <th>Periodo</th>
													                      <th>Identificación larga</th>
													                      <th>Identificación corta</th>
													                      <th>Modificar</th>
													                      <th>Eliminar</th>
												                    </tr>
											                </thead>
											        </table>
												</div>
											</div>
										</div>
									</fieldset>
									<br><br>
										

								</form>

	</div>




   <!-- Modal -->
<div id="modalAlertaModificarPeriodosEscolares" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style='width: 800px'>
      <div class="modal-header">
       <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modificar Semestres</h4>
      </div>
       <form id="formDatosPeriodosEscolares">
		      <div class="modal-body">

			 		<div class="form-group">
							<label for="txtPeriodo">Periodo:</label>
							<input type="text" id="txtPeriodo" name="txtPeriodo" class="form-control" placeholder="Periodo"  minlength="1"  maxlength="100">
						</div>
						<div class="form-group">
							<label for="txtIdentificacion_larga">Identificación larga:</label>
							<input type="text" id="txtIdentificacion_larga" name="txtIdentificacion_larga" class="form-control" placeholder="Identificación larga" minlength="1"  maxlength="200">
						</div>
						<div class="form-group">
							<label for="txtIdentificacion_corta">Identificación corta:</label>
							<input type="text" id="txtIdentificacion_corta" name="txtIdentificacion_corta"  class="form-control" placeholder="Identificación corta" minlength="1"  maxlength="100" >
						</div>

		      </div>
		      <div class="modal-footer">
		      		<button type="submit" class="btn btn-primary"  id="btnMdlAlertModificarPeriodosEscolares">Modificar</button>
		      		 <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
		      </div>
       </form>
    </div>

  </div>
</div>



   <!-- Modal -->
<div id="modalAlertaEliminarPeriodosEscolares" class="modal fade" role="dialog">
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
      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMdlAlertEliminarPeriodosEscolares">Aceptar</button>
		<button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
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
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Aceptar</button>

      </div>
    </div>

  </div>
</div>


   <!-- Modal -->
<div id="modalAlertaMsjEliminarPeriodosEscolares" class="modal fade" role="dialog">
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
      <button type="button" class="btn btn-primary" data-dismiss="modal" >Aceptar</button>

      </div>
    </div>

  </div>
</div>

	<br><br><br><br><br><br>

	<script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>

	<script src="<?php echo base_url(); ?>public/libreriasJS/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url(); ?>public/libreriasJS/dataTables.bootstrap.min.js"></script>
	
 	<script src="<?php echo base_url(); ?>public/js/selectElementMenu.js"></script> 
	<script src="<?php echo base_url(); ?>public/js/cerrarSesion.js"></script> 
	<script src="<?php echo base_url(); ?>public/js/modificarPeriodosEscolares.js"></script>



</body>
</html>|