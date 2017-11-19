$(document).on('ready',function()
{
     var base_url = $("body").attr("data-base-url");

     validaDatosPeriodosEscolares();

               var tblPeriodosEscolares = $('#tblPeriodosEscolares').DataTable(
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
                    url :base_url+"PeriodosEscolares/cargarTablaPeriodosEscolares", 
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
                  "columnDefs": [
                                {
                                    "targets": [ 0 ],
                                    "visible": false,
                                    "searchable": false
                                }
                            ],
                   
               
               });




          $("body").on("click",".btnModificarPeriodosEscolares",function()
          {

             let id_periodo_escolar = tblPeriodosEscolares.rows($(this).closest("tr").index()).data().pluck(0)[0];
   

             $.ajax(
                 {
                       type: "POST",
                       dataType:"json",
                       url: base_url+"PeriodosEscolares/getInfoPeriodoEscolar",
                       data: {id_periodo_escolar:id_periodo_escolar},
                       async: true,
                       success: function(result)
                         {
                            if( typeof(result.redirect) == 'undefined')
                            {

                                if(result.status != "ERROR")
                                {
                                     $("#txtPeriodo").val(result.semestre[0].periodo);
                                     $("#txtPeriodo").prop("id_periodo_escolar",id_periodo_escolar);
                                     $("#txtIdentificacion_larga").val(result.semestre[0].identificacion_larga);
                                     $("#txtIdentificacion_corta").val(result.semestre[0].identificacion_corta);
                                    

                                     $("#modalAlertaModificarPeriodosEscolares").modal("show");
                                     

                                     
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

          $("#formDatosPeriodosEscolares").on("submit",function(event)
          {
               event.preventDefault();

                $("#formDatosPeriodosEscolares").bootstrapValidator();

           });



          function validaDatosPeriodosEscolares()
             {
               
               $('#formDatosPeriodosEscolares').bootstrapValidator(
    {

          message: 'This value is not valid',
          container: 'tooltip',
          feedbackIcons: {
              valid: 'glyphicon glyphicon-ok',
              invalid: 'glyphicon glyphicon-remove',
              validating: 'glyphicon glyphicon-refresh'
          },
          fields: {
              txtPeriodo: {
                  group: '.form-group',
                  validators: {
                      notEmpty: {
                          message: 'Este campo es requerido'
                      },

                  }
              }
              ,
              txtIdentificacion_larga: {
                  group: '.form-group',
                  validators: {
                      notEmpty: {
                          message: 'Este campo es requerido'
                      },

                  }
              }
          }
      }).on('success.form.bv', function (e) 
                 {

                 e.preventDefault();

                 var datosInfo = {
                                id_periodo_escolar: $("#txtPeriodo").prop("id_periodo_escolar"),
                                periodo:$("#txtPeriodo").val().trim(),
                                identificacion_larga:$("#txtIdentificacion_larga").val().trim(),
                                identificacion_corta:$("#txtIdentificacion_corta").val().trim(),
                                
                              }


                 $.ajax(
                 {
                       type: "POST",
                       dataType:"json",
                       url: base_url+"PeriodosEscolares/modificarPeriodosEscolares",
                       data: datosInfo,
                       async: true,
                       success: function(result)
                         {

                           if( typeof(result.redirect) == 'undefined')
                           {
                                $('#modalAlertaModificarPeriodosEscolares').modal("hide");
                                $('#modalAlerta .modal-body').text(result.mensaje);
                                $('#modalAlerta').modal('show');
                                if(result.resultado == 'OK')
                                {
                                  $("#btnMdlAlertModificarPeriodosEscolares").prop("resultado",result.resultado);
                                  
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



          $('#modalAlertaModificarPeriodosEscolares').on('hide.bs.modal', function (e) 
         {

               $("#formDatosPeriodosEscolares").bootstrapValidator('resetForm', true);
             
         });


          $('#modalAlerta').on('hide.bs.modal', function (e) 
         {

               location.reload();
             
         });


          $("body").on("click",".btnEliminarPeriodosEscolares",function()
          {

            let id_periodo_escolar = tblPeriodosEscolares.rows($(this).closest("tr").index()).data().pluck(0)[0];

           let periodo =  $(this).closest("tr").find("td").eq(1).text();


            $("#btnMdlAlertEliminarPeriodosEscolares").prop("id_periodo_escolar",id_periodo_escolar);
            $("#modalAlertaEliminarPeriodosEscolares .modal-body").html(`<h5>¿Desea eliminar la Periodo Escolar de <strong> ${periodo} </strong> ?<h5>`);
            $("#modalAlertaEliminarPeriodosEscolares").modal("show");
            
            
            
          });


          $("body").on("click","#btnMdlAlertEliminarPeriodosEscolares",function()
          {

            let id_periodo_escolar = $("#btnMdlAlertEliminarPeriodosEscolares").prop("id_periodo_escolar");

                $.ajax(
                 {
                       type: "POST",
                       dataType:"json",
                       url: base_url+"PeriodosEscolares/deletePeriodosEscolares",
                       data: {id_periodo_escolar:id_periodo_escolar},
                       async: true,
                       success: function(result)
                         {

                            if( typeof(result.redirect) == 'undefined')
                            {
                                if(result.status == "OK")
                                {

                                    $("#btnMdlAlertEliminarPeriodosEscolares").removeProp("id_periodo_escolar");
                                    $('#modalAlertaMsjEliminarPeriodosEscolares .modal-body').html("<h5>"+result.mensaje+"</h5>");
                                    $('#modalAlertaMsjEliminarPeriodosEscolares').modal('show');

                                     
                                }
                                else
                                {

                                   if(result.status == "NO_DISPONIBLE")
                                  {
                                      $('#modalAlertaMsjEliminarPeriodosEscolares .modal-body').html("<h5>"+result.mensaje+"</h5>");
                                      $('#modalAlertaMsjEliminarPeriodosEscolares').modal('show');
                                  }
                                  else{
                                      $('#modalAlertaMsjEliminarPeriodosEscolares .modal-body').html("<h5>"+result.mensaje+"</h5>");
                                      $('#modalAlertaMsjEliminarPeriodosEscolares').modal('show');
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


      $('#modalAlertaMsjEliminarPeriodosEscolares').on('hide.bs.modal', function (e) 
         {
            if( $("#btnMdlAlertEliminarPeriodosEscolares").prop("id_periodo_escolar") == undefined )
            {
              location.reload();
            }
               
             
         });



});
   

         

   


	   



     

            





