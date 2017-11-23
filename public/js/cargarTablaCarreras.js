$(document).on('ready',function()
{
     var base_url = $("body").attr("data-base-url");

     validaDatosCarreras();

               var tblCarreras = $('#tblCarreras').DataTable(
               {
                  "processing": true,
                  "serverSide": true,
                  "ordering": true,
                   "language": {
                                  "url": base_url+"public/libreriasJS/Spanish.json"
                                },
                            "scrollY":        "500px",
                            "scrollCollapse": true,
                  "ajax":{
                    url :base_url+"Carreras/cargarTablaCarreras", 
                    type: "post",  
                    error: function(d){ 
                      $(".employee-grid-error").html("");
                      $("#employee-grid").append('<tbody class="employee-grid-error"><tr><th colspan="3">No se encontraron datos</th></tr></tbody>');
                      $("#employee-grid_processing").css("display","none");
                      
                    }
                    ,
                    // success:function(d)
                    // {
                    //   debugger;
                    //  console.log(d);
                    // }
                  },
                  // "columnDefs": [
                  //               {
                  //                   "targets": [ 0 ],
                  //                   "visible": false,
                  //                   "searchable": false
                  //               }
                  //           ],
                   
               
               });




          $("body").on("click",".btnModificarCarrera",function()
          {

             let clave_oficial = tblCarreras.rows($(this).closest("tr").index()).data().pluck(0)[0];
             //console.log(clave_oficial);

             $.ajax(
                 {
                       type: "POST",
                       dataType:"json",
                       url: base_url+"Carreras/getInfoCarrera",
                       data: {clave_oficial:clave_oficial},
                       async: true,
                       success: function(result)
                         {
                            if( typeof(result.redirect) == 'undefined')
                            {

                                if(result.status != "ERROR")
                                {
                                     $("#txtClaveOficialCarrera").val(result.carrera[0].clave_oficial);
                                     $("#txtClaveOficialCarrera").prop("clave_oficial",clave_oficial);
                                     $("#txtCarrera").val(result.carrera[0].carrera);
                                     $("#txtNombreCarrera").val(result.carrera[0].nombre_carrera);
                                     $("#txtNombreCarreraReducido").val(result.carrera[0].nombre_reducido);
                                     $("#txtCargaMaxima").val(result.carrera[0].carga_maxima);
                                     $("#txtCargaMinima").val(result.carrera[0].carga_minima);
                                     $("#txtCreditosTotales").val(result.carrera[0].creditos_totales);

                                     $("#modalAlertaModificarCarrera").modal("show");
                                     

                                     
                                }
                                else
                                {
                                     $('#modalAlerta .modal-body').text(result.mensaje);
                                     $('#modalAlerta').modal('show');
                                }
                              
                            }
                            else
                            {
                              location.href = result.url;
                            }
                              
                          

                         },
                    error:function(result)
                     {
                       console.log(result.responseText);
                       //$("#error").html(data.responseText); 
                     }
                       
                     });


             


          });

          $("#formDatosCarreras").on("submit",function(event)
          {
               event.preventDefault();

                $("#formDatosCarreras").bootstrapValidator();

           });



          function validaDatosCarreras()
             {
               
               $('#formDatosCarreras').bootstrapValidator(
               {

                     message: 'This value is not valid',
                     container: 'tooltip',
                     feedbackIcons: {
                         valid: 'glyphicon glyphicon-ok',
                         invalid: 'glyphicon glyphicon-remove',
                         validating: 'glyphicon glyphicon-refresh'
                     },
                     fields: {

                       txtClaveOficialCarrera: {
                             group: '.form-group',
                             validators: {
                                 notEmpty: {
                                     message: 'Este campo es requerido'
                                 },
                                             callback: {
                                             message: 'La clave oficial no esta disponible',
                                             callback: function(value, validator) {
                                                 // Get the selected options

                                                 var valida = true;

                                                 var datoCarrera = {
                                                                       clave_oficial_new:$("#txtClaveOficialCarrera").val().trim(),
                                                                        clave_oficial_origen:$("#txtClaveOficialCarrera").prop("clave_oficial")
                                                                     }


                                                             $.ajax(
                                                             {
                                                                 type: "POST",
                                                                 url: base_url+"Carreras/checkModificarClaveOficial",
                                                               dataType:"json",
                                                                 data: datoCarrera,
                                                                  async: false,
                                                                 success: function(result)
                                                                     {
                                                                           //console.log(result);
                                                                        if( typeof(result.redirect) == 'undefined')
                                                                        {
                                                                            if(result.resultado == 'NO_DISPONIBLE')
                                                                            {
                                                                               valida = false;
                                                                            }
                                                                            else
                                                                            {
                                                                              valida = true;
                                                                            }
                                                                        }
                                                                        else
                                                                        {
                                                                          location.href = result.url;
                                                                        }

                                                                     },
                                                                error:function(result)
                                                                   {
                                                                     alert("Error");
                                                                    console.log(result.responseText);
                                                                     
                                                                   }
                                                                   
                                                             });

                                                             return valida;

                                             }
                                         },


                             },
                         }
                         ,
                         txtCarrera: {
                             group: '.form-group',
                             validators: {
                                 notEmpty: {
                                     message: 'Este campo es requerido'
                                 },

                             }
                         }
                         ,
                         txtNombreCarrera: {
                             group: '.form-group',
                             validators: {
                                 notEmpty: {
                                     message: 'Este campo es requerido'
                                 },

                             }
                         }
                         ,
                         txtNombreCarreraReducido: {
                             group: '.form-group',
                             validators: {
                                 notEmpty: {
                                     message: 'Este campo es requerido'
                                 },

                             }
                         }
                         ,
                         txtCargaMaxima: {
                             group: '.form-group',
                             validators: 
                             {
                                 notEmpty: {
                                     message: 'Este campo es requerido'
                                 },
                                  regexp: {
                                       regexp: /^[0-9]+$/,

                                       message: 'Solo debe ingresar números',

                                   },

                             }
                         },
                         txtCargaMinima: {
                             group: '.form-group',
                             validators: 
                             {
                                 notEmpty: {
                                     message: 'Este campo es requerido'
                                 },
                                  regexp: {
                                       regexp: /^[0-9]+$/,

                                       message: 'Solo debe ingresar números',

                                   },

                             }
                         },
                         txtCreditosTotales: {
                             group: '.form-group',
                             validators: 
                             {
                                 notEmpty: {
                                     message: 'Este campo es requerido'
                                 },
                                  regexp: {
                                       regexp: /^[0-9]+$/,

                                       message: 'Solo debe ingresar números',

                                   },

                             }
                         },
                         

                     }
                 }).on('success.form.bv', function (e) 
                 {

                 e.preventDefault();

                 var datosCarrera = {
                   claveOficial:$("#txtClaveOficialCarrera").val().trim(),
                    claveOficialOrigen:$("#txtClaveOficialCarrera").prop("clave_oficial"),
                   carrera:$("#txtCarrera").val().trim(),
                   nombreCarrera:$("#txtNombreCarrera").val().trim(),
                   nombreCarreraReducido:$("#txtNombreCarreraReducido").val().trim(),
                   cargaMaxima:$("#txtCargaMaxima").val().trim(),
                   cargaMinima:$("#txtCargaMinima").val().trim(),
                   creditosTotales:$("#txtCreditosTotales").val().trim()
                 }

                 // console.log(datosCarrera);

                 $.ajax(
                 {
                       type: "POST",
                       dataType:"json",
                       url: base_url+"Carreras/modificarCarreras",
                       data: datosCarrera,
                       async: true,
                       success: function(result)
                         {

                           if( typeof(result.redirect) == 'undefined')
                           {
                                $('#modalAlertaModificarCarrera').modal("hide");
                                $('#modalAlerta .modal-body').text(result.mensaje);
                                $('#modalAlerta').modal('show');
                                if(result.resultado == 'OK')
                                {
                                  $("#btnMdlAlertModificarCarreras").prop("resultado",result.resultado);
                                  
                                }

                           }
                           else
                           {
                            location.href = result.url;
                           }
                           
                           
                         },
                    error:function(result)
                     {
                       console.log(result.responseText);
                       //$("#error").html(data.responseText); 
                     }
                       
                     });

                 });


             }



          $('#modalAlertaModificarCarrera').on('hide.bs.modal', function (e) 
         {

               $("#formDatosCarreras").bootstrapValidator('resetForm', true);
             
         });


          $('#modalAlerta').on('hide.bs.modal', function (e) 
         {

               location.reload();
             
         });


          $("body").on("click",".btnEliminarCarrera",function()
          {

            let clave_oficial = tblCarreras.rows($(this).closest("tr").index()).data().pluck(0)[0];

           let carrera =  $(this).closest("tr").find("td").eq(2).text();


            $("#btnMdlAlertEliminarCarreras").prop("clave_oficial",clave_oficial);
            $("#modalAlertaEliminarCarrera .modal-body").html(`<h5>¿Desea eliminar la carrera de <strong> ${carrera} </strong> ?<h5>`);
            $("#modalAlertaEliminarCarrera").modal("show");
            
            
            
          });


          $("body").on("click","#btnMdlAlertEliminarCarreras",function()
          {

            let clave_oficial = $("#btnMdlAlertEliminarCarreras").prop("clave_oficial");

                $.ajax(
                 {
                       type: "POST",
                       dataType:"json",
                       url: base_url+"Carreras/deleteCarreras",
                       data: {clave_oficial:clave_oficial},
                       async: true,
                       success: function(result)
                         {

                            if( typeof(result.redirect) == 'undefined')
                            {
                                if(result.status == "OK")
                                {

                                    $("#btnMdlAlertEliminarCarreras").removeProp("clave_oficial");
                                    $('#modalAlertaMsjEliminarMaterias .modal-body').html("<h5>"+result.mensaje+"</h5>");
                                    $('#modalAlertaMsjEliminarMaterias').modal('show');

                                     
                                }
                                else
                                {

                                   if(result.status == "NO_DISPONIBLE")
                                  {
                                      $('#modalAlertaMsjEliminarMaterias .modal-body').html("<h5>"+result.mensaje+"</h5>");
                                      $('#modalAlertaMsjEliminarMaterias').modal('show');
                                  }
                                  else{
                                      $('#modalAlertaMsjEliminarMaterias .modal-body').html("<h5>"+result.mensaje+"</h5>");
                                      $('#modalAlertaMsjEliminarMaterias').modal('show');
                                  }

                                }
                                
                            }
                            else
                            {
                              location.href = result.url;
                            }
                              
                          

                         },
                    error:function(result)
                     {
                       console.log(result.responseText);
                       //$("#error").html(data.responseText); 
                     }
                       
                     });

          });


      $('#modalAlertaMsjEliminarMaterias').on('hide.bs.modal', function (e) 
         {
            if( $("#btnMdlAlertEliminarCarreras").prop("clave_oficial") == undefined )
            {
              location.reload();
            }
               
             
         });



});
   

         

   


	   



     

            





