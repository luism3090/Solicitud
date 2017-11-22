$(document).on('ready',function()
{
     var base_url = $("body").attr("data-base-url");

     validaDatosMaterias();

       var tblMaterias = $('#tblMaterias').DataTable(
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
            url :base_url+"Materias/cargarTablaMaterias", 
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




          $("body").on("click",".btnModificarMateria",function()
          {

             let id_materia = tblMaterias.rows($(this).closest("tr").index()).data().pluck(0)[0];
             //console.log(clave_oficial);

             $.ajax(
                 {
                       type: "POST",
                       dataType:"json",
                       url: base_url+"Materias/getInfoMateria",
                       data: {id_materia:id_materia},
                       async: true,
                       success: function(result)
                         {
                            if( typeof(result.redirect) == 'undefined')
                            {
                                if(result.status != "ERROR")
                                {
                                     $("#txtNombreMateria").val(result.materia[0].nombre_completo_materia);
                                     $("#txtNombreMateriaAbreviado").val(result.materia[0].nombre_abreviado_materia);
                                     $("#btnMdlAlertModificarMaterias").prop('id_materia',result.materia[0].id_materia);

                                     $("#modalAlertaModificarMateria").modal("show");
                                     
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

          $("#formDatosMaterias").on("submit",function(event)
          {
               event.preventDefault();

                $("#formDatosMaterias").bootstrapValidator();

           });



          function validaDatosMaterias()
             {
               
               $('#formDatosMaterias').bootstrapValidator(
               {

                     message: 'This value is not valid',
                     container: 'tooltip',
                     feedbackIcons: {
                         valid: 'glyphicon glyphicon-ok',
                         invalid: 'glyphicon glyphicon-remove',
                         validating: 'glyphicon glyphicon-refresh'
                     },
                     fields: {

                         txtNombreMateria: {
                             group: '.form-group',
                             validators: {
                                 notEmpty: {
                                     message: 'Este campo es requerido'
                                 },

                             }
                         }
                         ,
                         txtNombreMateriaAbreviado: {
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

                 var datosMateria = {
                    id_materia:$("#btnMdlAlertModificarMaterias").prop("id_materia"),
                    nombre_completo_materia:$("#txtNombreMateria").val(),
                    nombre_abreviado_materia:$("#txtNombreMateriaAbreviado").val()
                 }

                 console.log(datosMateria);

                 $.ajax(
                 {
                       type: "POST",
                       dataType:"json",
                       url: base_url+"Materias/modificarMaterias",
                       data: datosMateria,
                       async: true,
                       success: function(result)
                         {
                                if( typeof(result.redirect) == 'undefined')
                                {
                                    $('#modalAlertaModificarMateria').modal("hide");
                                   $('#modalAlerta .modal-body').text(result.mensaje);
                                   $('#modalAlerta').modal('show');
                                   if(result.resultado == 'OK')
                                   {
                                     $("#btnMdlAlertModificarMaterias").prop("resultado",result.resultado);
                                     
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




          $('#modalAlertaModificarMateria').on('hide.bs.modal', function (e) 
         {

               $("#formDatosMaterias").bootstrapValidator('resetForm', true);
             
         });


          $('#modalAlerta').on('hide.bs.modal', function (e) 
         {

               location.reload();
             
         });




          $("body").on("click",".btnEliminarMateria",function()
          {

              let id_materia = tblMaterias.rows($(this).closest("tr").index()).data().pluck(0)[0];

              let materia =  $(this).closest("tr").find("td").eq(0).text();


              $("#btnMdlAlertEliminarMaterias").prop("id_materia",id_materia);
              $("#modalAlertaEliminarMaterias .modal-body").html(`<h5>¿Desea eliminar la carrera de <strong> ${materia} </strong> ?<h5>`);
              $("#modalAlertaEliminarMaterias").modal("show");
            
            
            
          });


          $("body").on("click","#btnMdlAlertEliminarMaterias",function()
          {

            let id_materia = $("#btnMdlAlertEliminarMaterias").prop("id_materia");

                $.ajax(
                 {
                       type: "POST",
                       dataType:"json",
                       url: base_url+"Materias/deleteMaterias",
                       data: {id_materia:id_materia},
                       async: true,
                       success: function(result)
                         {

                            if( typeof(result.redirect) == 'undefined')
                            {

                                   if(result.status == "OK")
                                   {

                                       $("#btnMdlAlertEliminarMaterias").removeProp("id_materia");
                                       $('#modalAlertaMsjEliminarCarreras .modal-body').html("<h5>"+result.mensaje+"</h5>");
                                       $('#modalAlertaMsjEliminarCarreras').modal('show');

                                        
                                   }
                                   else
                                   {

                                      if(result.status == "NO_DISPONIBLE")
                                     {
                                         $('#modalAlertaMsjEliminarCarreras .modal-body').html("<h5>"+result.mensaje+"</h5>");
                                         $('#modalAlertaMsjEliminarCarreras').modal('show');
                                     }
                                     else{
                                         $('#modalAlertaMsjEliminarCarreras .modal-body').html("<h5>"+result.mensaje+"</h5>");
                                         $('#modalAlertaMsjEliminarCarreras').modal('show');
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



          $('#modalAlertaMsjEliminarCarreras').on('hide.bs.modal', function (e) 
         {
            if( $("#btnMdlAlertEliminarMaterias").prop("id_materia") == undefined )
            {
              location.reload();
            }
               
             
         });



});
   

         

   


	   



     

            





