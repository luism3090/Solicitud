<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Registro de personal</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloFormRegistroPersonal.css">
  </head>
  
  <body data-base-url="<?php echo base_url();?>">
    
    <div class="container">

      <!-- <div class="container-logo">
        
      </div> -->
      
<br><br>
      <div class="card card-container">

       <div style="width:75%" class="container-fluid" >
          
          <div class="row">

            <div class="col-xs-12 text-center">
              
             <h3 class="titleLogin text-center" >Registro de personal</h3>
            
            </div>
          </div>
          <br><br>
          
          <form action="" id="formRegistrarPersonal">
            <div class="row">
              <div class="col-xs-6">
                  <div class="form-group">
                    <label for="txtCargoPersonal">Cargo personal:</label>
                    <input type="text" id="txtCargoPersonal" name="txtCargoPersonal"  class="form-control" placeholder="Cargo personal">
                  </div>
                  
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="txtDepartamento">Departamento:</label>
                  <input type="text" id="txtDepartamento" name="txtDepartamento"  class="form-control" placeholder="Departamento">
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="txtFechaInicio">Fecha de inicio:</label>
                  <input type="date" id="txtFechaInicio" name="txtFechaInicio"  class="form-control" placeholder="Fecha de inicio">
                </div>
              </div>
              <div class="col-xs-6">
                  <div class="form-group">
                    <label for="txtFechaFin">Fecha de fin:</label> 
                    <input type="date" id="txtFechaFin" name="txtFechaFin"  class="form-control" placeholder="Fecha de fin">            
                    </select> 
                  </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                    <label for="txtNombre">Nombre:</label>
                    <input type="text" id="txtNombre" name="txtNombre"  class="form-control" placeholder="Nombre" maxlength='13'>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                    <label for="txtApellidos">Apellidos:</label>
                    <input type="text" id="txtApellidos" name="txtApellidos"  class="form-control" placeholder="Apellidos" maxlength='10'>
                </div>
              </div>
              <div class="col-xs-6">
                <div class="form-group">
                  <label for="slComite">Comité:</label> 
                  <select id="slComite" class="form-control" name="slComite">
                      <option value="1" selected >Director</option>
                      <option value="2">Sudirector</option> 
                      <option value="3">Jefe de departamento</option>
                      <option value="3">Docente</option>
                      <option value="3">Administrativo</option>
                  </select> 
                </div>
              </div>
             
            </div>
            <div class="row">
              <div class="col-xs-12 ">
                  <br><br>
                  <button type="submit" class="btn btn-primary center-block text-center"  >Guardar</button>
              </div>

              <div class="col-xs-12 container-iniciarSesion" > 
                <br><br>
              <a  href="<?php echo base_url();?>Login" '>Iniciar sesión</a>
              </div>
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
                        <p></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
              </div>
        </div>
    </div>


    <script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>
    <!-- <script src="<?php echo base_url(); ?>public/js/login.js"></script> -->
  </body>
</html>