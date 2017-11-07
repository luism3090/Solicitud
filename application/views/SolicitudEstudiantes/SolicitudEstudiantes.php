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
                                                                 <input type="text" id="txtLugar" name="txtLugar"  class="form-control" placeholder="Lugar" style='width:180px;' >
                                                            </div>

                                                            <div class="form-group form-right">
                                                                 <label for="txtLugar" >Fecha:</label>
                                                                 <input type="date" id="txtFecha" name="txtFecha"  class="form-control" style='width:180px;'>
                                                            </div>
                                                       
                                                       </div>
                                                       <br>
                                                       <div style='border:0px solid red;width: 80%;margin-left: 220px;'>
                                                             <div class="form-group form-right">
                                                                 <label for="txtFecha">Asunto:</label>
                                                                 <textarea style='width:448px;height: 58px;' id="txtAsunto" name="txtAsunto" class="form-control" placeholder="Asunto" ></textarea>
                                                            </div>
                                                       </div>

                                                       <br><br>

                                                       <div class="cont-jefe">
                                                         <label id="jefeEstudiosProfesionales">C. Ing Victor Hugo Vargas Contreras</label><br>
                                                         <label>Jefe de la Division de Estudios Profesionales</label><br>
                                                         <label>PRESENTE</label>
                                                       </div>

                                                       <br><br>
                                                       
                                                       <div style='width: 780px;'>
                                                         
                                                       
                                                           <div class="form-group">
                                                                <label>El (la) que suscribe C. </label>
                                                                <input type="text" id="txtNombreEstudiante" name="txtNombreEstudiante"  class="form-control" placeholder="Nombre" style='width:230px;'>

                                                           </div>

                                                           <div class="form-group">
                                                                <input type="text" id="txtApellidoPaterno" name="txtApellidoPaterno"  class="form-control" placeholder="Apellido Paterno" style='width:191px;'> 
                                                           </div>
                                                          
                                                          <div class="form-group">
                                                                <input type="text" id="txtApellidoMaterno" name="txtApellidoMaterno"  class="form-control" placeholder="Apellido Materno" style='width:191px'> 
                                                           </div>

                                                       </div>
                                                       <br>
                                                       <div style='width: 780px;'>
                                                            
                                                            <div class="form-group">
                                                                 <label>Estudiante del </label> 
                                                            </div>
                                                            <div class="form-group">
                                                                  <select id="slSemestre" class="form-control" name="slSemestre" style='width:172px;margin-left: 50px;'>
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
                                                            </div>
                                                            <div class="form-group" style='margin-left: 42px;'>
                                                                  <label> de la carrera de </label> 
                                                            </div>

                                                            <div class="form-group" style='margin-left: 50px;'>
                                                                   <select id="slCarrera" class="form-control" name="slCarrera" style='width:245px;'>
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
                                                       
                                                       <br>
                                                       <div style='width: 780px;'>

                                                            <div class="form-group" >
                                                                  <label> con numero de control  </label> 
                                                            </div>
                                                            <div class="form-group" style='margin-left: 45px;'>
                                                                  <input type="text" id="txtNumControl" name="txtNumControl"  class="form-control" placeholder="Número de control" style='width:280px;'>  
                                                            </div>
                                                            <div class="form-group" style='margin-left: 40px;'>
                                                                  <label> solicito de la manera más atenta: </label> 
                                                            </div>
                                                       </div>
                                                       
                                                       <br>

                                                       <div style='width: 780px;'>
                                                            <div class="form-group" >
                                                                 <textarea style='width:776px;height:70px' id="txtMateriaACursar" name="txtMateriaACursar" placeholder="Materia a cursar" class="form-control"></textarea>
                                                            </div>
                                                       </div>     

                                                       <br><br><br>

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
                                                                 <textarea style='width:776px;height:70px' id="txtMotivosAcademicos" name="txtMotivosAcademicos" placeholder="Motivos académicos" class="form-control"></textarea>
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
                                                                  <textarea style='width:776px;height:70px' id="txtMotivosAcademicos" name="txtMotivosAcademicos" placeholder="Motivos académicos" class="form-control"></textarea>
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
                                                                  <textarea style='width:776px;height:70px' placeholder="Otros" id="txtOtros" name="txtOtros" class="form-control"></textarea>
                                                            </div>
                                                       </div>  
                                     
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