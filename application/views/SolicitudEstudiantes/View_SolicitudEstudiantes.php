<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Solicitud de Estudiantes</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>public/css/estiloSolicitudEstudiantes.css">
  </head>
  
  <body data-base-url="<?php echo base_url();?>">
    
    <div class="container">

      
                <br><br>

              <div class="card card-container">

                    <form id="formSolicitudEstudiante" class="form-inline">

                               <div style="width:75%" class="container-fluid" >
                                  
                                                      <div class="row">

                                                        <div class="col-xs-12 text-center">
                                                          
                                                         <h3 class="titleLogin text-center" >Solicitud del estudiante para el análisis del comité académico</h3>
                                                         <br>
                                                         <h3 class="titleLogin text-center" >Instituto Tecnológico de Salina Cruz</h3>            
                                                        </div>
                                                      </div>
                                                      <br><br>
                                                       
                                                       <div style='border:0px solid red;width: 80%;margin-left: 220px;'>
                                                            
                                                       
                                                            <div class="form-group form-right">
                                                                 <label for="txtLugar" >Lugar:</label>
                                                                 <input type="text" id="txtLugar" name="txtLugar"  class="form-control" placeholder="Lugar" style='width:180px;' minlength="1" maxlength="200">
                                                            </div>

                                                            <div class="form-group form-right">
                                                                 <label for="txtFecha" >Fecha:</label>
                                                                 <input type="date" id="txtFecha" name="txtFecha"  class="form-control" style='width:180px;'>
                                                            </div>
                                                       
                                                       </div>
                                                       <br>
                                                        <div style='border:0px solid red;width: 80%;margin-left: 220px;'>
                                                            <div class="form-group form-right">
                                                                  <label for="slPeriodoEscolar" >Periodo escolar:</label>
                                                                  <select id="slPeriodoEscolar" class="form-control" name="slPeriodoEscolar" style='width:385px;margin-left:10px;'>
                                                                    <option value="" selected disabled>Elija el periodo escolar</option>
                                                                </select> 
                                                            </div>
                                                       </div> 
                                                       <br>
                                                       <div style='border:0px solid red;width: 80%;margin-left: 220px;'>
                                                             <div class="form-group form-right">
                                                                 <label for="txtAsunto">Asunto:</label>
                                                                 <textarea style='width:448px;height: 58px;' id="txtAsunto" name="txtAsunto" class="form-control" placeholder="Asunto" minlength="1" maxlength="350" ></textarea>
                                                            </div>
                                                       </div>

                                                       <br><br>

                                                       <div class="cont-jefe">
                                                         <label id="jefeEstudiosProfesionales">C. Ing Victor Hugo Vargas Contreras</label><br>
                                                         <label>Jefe de la Division de Estudios Profesionales</label><br>
                                                         <label>PRESENTE</label>
                                                       </div>

                                                       <br><br>
                                                 

                                                       <div class="form-group" style="font-size: 18px">
                                                               <label>¿Es la primera vez que vas hacer la solicitud?</label><br>
                                                               <div class="col-sm-5" style="margin-top:5px;">
                                                                   <div class="radio">
                                                                       <label>
                                                                           <input type="radio" id='rdSolicitudSI' name="rdSolicitud" value="SI" style="width:20px;"/> <label for='rdSolicitudSI'><strong>SI</strong></label>
                                                                       </label>
                                                                   </div>
                                                                   <div class="radio">
                                                                       <label>
                                                                           <input type="radio" id='rdSolicitudNO' name="rdSolicitud" value="NO" style="width:20px;margin-left: 10px"/> <label for='rdSolicitudNO'><strong>NO</strong></label>
                                                                       </label>
                                                                   </div>
                                                               </div>
                                                           </div>

                                                       <br><br><br><br>
                                                       
                                                       <div style='width: 780px;'>
                                                         
                                                       
                                                           <div class="form-group">
                                                                <label>El (la) que suscribe C. </label>
                                                                <input type="text" id="txtNombreEstudiante" name="txtNombreEstudiante"  class="form-control" placeholder="Nombre" style='width:230px;' minlength="1" maxlength="100">

                                                           </div>

                                                           <div class="form-group">
                                                                <input type="text" id="txtApellidoPaterno" name="txtApellidoPaterno"  class="form-control" placeholder="Apellido Paterno" style='width:191px;' minlength="1" maxlength="100"> 
                                                           </div>
                                                          
                                                          <div class="form-group">
                                                                <input type="text" id="txtApellidoMaterno" name="txtApellidoMaterno"  class="form-control" placeholder="Apellido Materno" style='width:191px' minlength="1" maxlength="100"> 
                                                           </div>

                                                       </div>
                                                       <br>
                                                       <div style='width: 780px;'>
                                                            
                                                            <div class="form-group">
                                                                 <label>Estudiante del </label> 
                                                            </div>
                                                            <div class="form-group">
                                                                  <select id="slSemestres" class="form-control" name="slSemestres" style='width:185px;margin-left: 50px;'>
                                                                </select> 
                                                            </div>
                                                            <div class="form-group" style='margin-left: 42px;'>
                                                                  <label> de la carrera de </label> 
                                                            </div>

                                                            <div class="form-group" style='margin-left: 50px;'>
                                                                   <select id="slCarreras" class="form-control" name="slCarreras" style='width:230px;'>
                                                                 </select> 
                                                            </div>

                                                       </div>
                                                       
                                                       <br>
                                                       <div style='width: 780px;'>

                                                            <div class="form-group" >
                                                                  <label> con numero de control  </label> 
                                                            </div>
                                                            <div class="form-group" style='margin-left: 45px;'>
                                                                  <input type="text" id="txtNumControl" name="txtNumControl"  class="form-control" placeholder="Número de control" style='width:280px;' minlength="1" maxlength="30">  
                                                            </div>
                                                            <div class="form-group" style='margin-left: 40px;'>
                                                                  <label> solicito de la manera más atenta: </label> 
                                                            </div>
                                                       </div>
                                                       
                                                       <br>

                                                       <div style='width: 780px;'>
                                                            <div class="form-group" >
                                                                 <textarea style='width:776px;height:70px' id="txtObservacion" name="txtObservacion" placeholder="Observación" class="form-control" minlength="1" maxlength="500"></textarea>
                                                            </div>
                                                       </div>
                                                       <br>


                                                        <div style='width: 780px;'>
                                                            <div class="form-group">
                                                                <label for='txtCurpEstudiante'>Curp: </label>
                                                                <input type="text" id="txtCurpEstudiante" name="txtCurpEstudiante"  class="form-control" placeholder="Curp del estudiante" style='width:735px' minlength="1" maxlength="30">

                                                            </div>     
                                                         </div>    

                                                       <br><br><br><br>

                                                       <div style='width: 780px;'>
                                                            <div class="form-group" >
                                                                 <label>Por los siguientes motivos:</label> 
                                                            </div>                                                            
                                                       </div>  
                                                       <br>
               
                                                        <div style='width: 780px;'>
                                                             <div class="form-group" >
                                                                 <label>Motivos Académicos:</label> 
                                                            </div>
                                                       </div>  

                                                       <div style='width: 780px;'>
                                                             <div class="form-group" >
                                                                 <textarea style='width:776px;height:70px' id="txtMotivosAcademicos" name="txtMotivosAcademicos" placeholder="Motivos académicos" class="form-control" minlength="1" maxlength="500"></textarea>
                                                            </div>
                                                       </div>  

                                                       <br>
                                                       
                                                        <div style='width: 780px;'>
                                                             <div class="form-group" >
                                                                 <label>Motivos Personales:</label> 
                                                            </div>
                                                       </div>  

                                                       <div style='width: 780px;'>
                                                             <div class="form-group" >
                                                                  <textarea style='width:776px;height:70px' id="txtMotivosPersonales" name="txtMotivosPersonales" placeholder="Motivos personales" class="form-control" minlength="1" maxlength="500"></textarea>
                                                            </div>
                                                       </div>  

                                                       <br>
                                                       
                                                        <div style='width: 780px;'>
                                                             <div class="form-group" >
                                                                 <label>Otros:</label> 
                                                            </div>
                                                       </div>  

                                                       <div style='width: 780px;'>
                                                             <div class="form-group" >
                                                                  <textarea style='width:776px;height:70px' placeholder="Otros" id="txtOtros" name="txtOtros" class="form-control" minlength="1" maxlength="500"></textarea>
                                                            </div>
                                                       </div>  
                                     
                              </div>

                                        <div class="row">
                                              <div class="col-xs-12 ">
                                                  <br><br>
                                                  <button type="submit" class="btn btn-primary center-block text-center" id="btnAceptarSolicitudEstudiante" >Aceptar</button>
                                              </div>
                                        </div>
                              
                    </form>
                          

               </div>
        
    </div>



    <!-- Modal -->
    <div id="modalAlerta" class="modal fade" role="dialog">
        <div class="modal-dialog">
           
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


       <!-- Modal -->
    <div id="modalAlertaMsJSolicitudEstudiante" class="modal fade" role="dialog">
        <div class="modal-dialog">
           
              <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alerta</h4>
                    </div>
                    <div class="modal-body">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Aceptar</button>
                    </div>
              </div>
        </div>
    </div>



        <!-- Modal -->
    <div id="modalAlertaIngresaNocontrol" class="modal fade" role="dialog"  data-backdrop="static" data-keyboard="false"  >
        <div class="modal-dialog">
           
              <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alerta</h4>
                    </div>
               <form id="formNumeroControlAlumno">
                    <div class="modal-body">

                         <div class="form-group">
                              <label for="mdlTxtNumControl">Ingrese su número de control:</label>
                              <input type="text" id="mdlTxtNumControl" name="mdlTxtNumControl" style="width: 100%;" class="form-control" placeholder="Número de control" minlength="1"  maxlength="100">  
                         </div>    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id='btnNumControlGetDatosEstudiante'>Aceptar</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Cancelar</button>
                    </div>
               </form>
              </div>
         
        </div>
    </div>



            <!-- Modal -->
    <div id="modalConfirDatosCorrectosSolicitud" class="modal fade" role="dialog" data-backdrop="static" data-keyboard="false" >
        <div class="modal-dialog">
           
              <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Alerta</h4>
                    </div>
              
                    <div class="modal-body">
                    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" id='btnEnviarSolicitudEstudiante'>
                         <span class="glyphicon glyphicon-arrow-right"></span> Enviar Solicitud
                         </button>
                        <button type="button" class="btn btn-default" data-dismiss="modal" >Regresar</button>
                    </div>
              
              </div>
         
        </div>
    </div>



    <script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>
    <script src="<?php echo base_url(); ?>public/js/solicitudEstudiante.js"></script>
  </body>
</html>