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

                    <form id="formSolicitudEstudiante" >

                               <div style="width:75%" class="container-fluid" >
                                  
                                                      <div class="row">

                                                        <div class="col-xs-12 text-center">
                                                          
                                                         <h3 class="titleLogin text-center" >Solicitud del estudiante para el análisis del comité académico</h3>
                                                         <br>
                                                         <h3 class="titleLogin text-center" >Instituto Tecnológico de Salina Cruz</h3>            
                                                        </div>
                                                      </div>
                                                      <br><br>
                                                      
                                                      

                                                        <div class="row" style='margin-left: 26px;'>
                                                            
                                                            <div class="col-xs-3" style="text-align: right; margin-left: 70px;">
                                                                 <label for="txtLugar" >Lugar:</label>
                                                            </div>

                                                            <div class="col-xs-3">
                                                                <div class="form-group">
                                                                      <input type="text" id="txtLugar" name="txtLugar"  class="form-control" placeholder="Lugar" style='width:160px;margin-left:-21px' >
                                                                </div>
                                                            </div>
                                                                
                                                                <div class="col-xs-3" style=";width: 100px;">
                                                                 <label for="txtLugar" >Fecha:</label>
                                                            </div>


                                                            <div class="col-xs-3">
                                                              <div class="form-group">
                                                                    <input type="date" id="txtFecha" name="txtFecha"  class="form-control" style='width:180px;display:inline;margin-left:-42px'>
                                                              </div>
                                                            </div>

                                                        </div>

                                                        <div class="row">

                                                                     <div class="col-xs-4">
                                                                     </div>
                                                                     
                                                                    <div class="col-xs-4" style="width: 8.333333%;margin-left: -32px;">
                                                                        <div class="form-group">
                                                                            <label for="txtFecha">Asunto:</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-xs-4" style='width:62%'>
                                                                        <div class="form-group">
                                                                            <textarea style='width:420px;height: 58px;' id="txtAsunto" name="txtAsunto" class="form-control" placeholder="Asunto" ></textarea>
                                                                        </div>
                                                                    </div>

                                                        </div>
                                                        
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-xs-12 cont-jefe">
                                                              <label id="jefeEstudiosProfesionales">C. Ing Victor Hugo Vargas Contreras</label><br>
                                                              <label>Jefe de la Division de Estudios Profesionales</label><br>
                                                              <label>PRESENTE</label>
                                                            </div>
                                                        </div>
                                                        <br><br>


                                                        
                                                      
                                                        <div class="row">
                                                            <div class="col-xs-3 " >
                                                                  
                                                                 <label>El (la) que suscribe C. </label>
                                                                
                                                            </div>
                                                            <div class="col-xs-3" >
                                                                  <div class="form-group ">
                                                                        <input type="text" id="txtNombreEstudiante" name="txtNombreEstudiante"  class="form-control" placeholder="Nombre" style='width:170px;margin-left:-25px'>
                                                                  </div>
                                                            </div>

                                                            <div class="col-xs-3 " >
                                                                  <div class="form-group">
                                                                        <input type="text" id="txtApellidoPaterno" name="txtApellidoPaterno"  class="form-control" placeholder="Apellido Paterno" style='width:170px;margin-left:-25px'> 
                                                                  </div>
                                                            </div>

                                                            <div class="col-xs-3 " >
                                                                  <div class="form-group">
                                                                        <input type="text" id="txtApellidoMaterno" name="txtApellidoMaterno"  class="form-control" placeholder="Apellido Materno" style='width:170px;margin-left:-25px'> 
                                                                  </div>
                                                            </div>

                                                        </div>  

                                                            
                                                      
                                                        <div class="row">

                                                                    <div class="col-xs-3 " >
                                                                            
                                                                            <label>Estudiante del </label> 
                                                                          
                                                                      </div>


                                                                     <div class="col-xs-3">
                                                                        <div class="form-group">
                                                                                 <!--  <div  class='texto-solictud' style='margin-left:58px'> -->
                                                                                      <select id="slSemestre" class="form-control" name="slSemestre" style='width:172px; margin-left: -24px;'>
                                                                                        <option value="1" selected >1º semestre</option>
                                                                                        <option value="2">2º semestre</option> 
                                                                                        <option value="3">3º semestre</option>
                                                                                        <option value="4">4º semestre</option>
                                                                                        <option value="5">5º semestre</option>
                                                                                        <option value="6">6º semestre</option>
                                                                                        <option value="7">7º semestre</option>
                                                                                        <option value="8">8º semestre</option>
                                                                                        <option value="9">9º semestre</option>
                                                                                        <option value="10">10º semestre</option>
                                                                                        <option value="11">11º semestre</option>
                                                                                        <option value="12">12º semestre</option>
                                                                                    </select> 
                                                                                <!-- </div> -->
                                                                          </div>
                                                                    </div>

                                                                  

                                                                   <div class="col-xs-3 " style="margin-left: -23px;">
                                                                            
                                                                             <label> de la carrera de </label> 
                                                                          
                                                                      </div>

                                                                <div class="col-xs-3 " style="margin-left:21px;">
                                                                    
                                                                      <div class="form-group">
                                                                          <select id="slCarrera" class="form-control" name="slCarrera" style='width:235px;margin-left:-88px;'>
                                                                            <option value="1" selected >Ingenieria en sistemas</option>
                                                                            <option value="2">Ingenieria en electrónica</option> 
                                                                            <option value="3">Ingenieria industrial</option>
                                                                            <option value="4">Ingenieria en alimentos</option>
                                                                            <option value="5">Ingenieria civil</option>
                                                                            <option value="6">Ingeieria mecanica</option>
                                                                            <option value="7">Ingeieria química</option>
                                                                        </select> 
                                                                      </div>

                                                                </div>

                                                            
                                                          </div>
                                                                    

                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                        <div class="form-group">

                                                                            <label  style='display: inline-block;' >con numero de control </label> 
                                                                            <input type="text" id="txtNumControl" name="txtNumControl"  class="form-control" placeholder="Número de control" style='display: inline-block;width:280px;margin-left:2px'> 
                                                                            <label  style='display: inline-block;margin-left:16px' >solicito de la manera más atenta:</label> 
                                                        
                                                                        </div>
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-xs-12">
                                                                        <div class="form-group">
                                                                            <textarea style='width:99.5%;height:70px' id="txtMateriaACursar" name="txtMateriaACursar" placeholder="Materia a cursar" class="form-control"></textarea>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Por los siguientes motivos:</label> 
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <br>

                                                            <div class="row">
                                                                <div class="col-xs-12">
                                                                     
                                                                        <label>Motivos Académicos:</label> 
                                                                    
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-xs-12">
                                                                        <div class="form-group">
                                                                            <textarea style='width:99.5%;height:70px' id="txtMotivosAcademicos" name="txtMotivosAcademicos" placeholder="Motivos académicos" class="form-control"></textarea>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                            
                                                             <div class="row">
                                                                <div class="col-xs-12">
                                                                     
                                                                        <label>Motivos Personales:</label> 
                                                                    
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-xs-12">
                                                                        <div class="form-group">
                                                                            <textarea style='width:99.5%;height:70px' placeholder="Motivos personales" id="txtMotivosPersonales" name="txtMotivosPersonales" class="form-control"></textarea>
                                                                        </div>
                                                                </div>
                                                            </div>


                                                             <div class="row">
                                                                <div class="col-xs-12">
                                                                     
                                                                        <label>Otros:</label> 
                                                                    
                                                                </div>
                                                            </div>

                                                             <div class="row">
                                                                <div class="col-xs-12">
                                                                        <div class="form-group">
                                                                            <textarea style='width:99.5%;height:70px' placeholder="Otros" id="txtOtros" name="txtOtros" class="form-control"></textarea>
                                                                        </div>
                                                                </div>
                                                            </div>
                                                        

                                                        <br><br><br>

                                
                                     
                              </div>

                                <div class="row">
                                      <div class="col-xs-12 ">
                                          <br><br>
                                          <button type="submit" class="btn btn-primary center-block text-center"  >Guardar</button>
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


    <script src="<?php echo base_url(); ?>public/libreriasJS/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>public/libreriasJS/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>public/libreriasJS/bootstrapValidator.js"></script>
    <script src="<?php echo base_url(); ?>public/js/solicitudEstudiante.js"></script>
  </body>
</html>