<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Inicio Login</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloLogin.css">
  </head>
  <body data-base-url="<?php echo base_url();?>">
    
    <div class="container">

      <!-- <div class="container-logo">
        
      </div> -->
      <div class="titleLogin text-center" >Ingresa tu cuenta</div>
      <div class="card card-container">


        <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
        <form name="form" id="FormLogin" class="form-horizontal" >
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
            <input type="text" id="email" name="email" class="form-control" placeholder="Correo" maxlength="50">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="text"  id="password" name="password" class="form-control" placeholder="Contraseña" minlength="5" maxlength="20" >
          </div>
          <br>
          <br>
          <div class="form-group">
            <div class="col-sm-12 controls">
              <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit"  >Iniciar sesión</button>
            </div>
            <div class='container-registro'>
              <a  href="<?php echo base_url();?>RegistroPersonal">Regístrate</a>
            </div>
          </div>
        </form>
        
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
    <script src="<?php echo base_url(); ?>public/js/login.js"></script>
  </body>
</html>