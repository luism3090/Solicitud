$(document).ready(function()
{
   
   var base_url = $("body").attr("data-base-url");

   var tblSolicitudes = $('#tblSolicitudes').DataTable(
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
            url :base_url+"Home/cargarTablaSolicitudes", 
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

   $("body").on("click",".btnVerSolicitudes",function(){

   		let no_de_control = tblSolicitudes.rows($(this).closest("tr").index()).data().pluck(0)[0];

   		let nombre = tblSolicitudes.rows($(this).closest("tr").index()).data().pluck(1)[0];
   		let apellido_paterno = tblSolicitudes.rows($(this).closest("tr").index()).data().pluck(2)[0];
   		let apellido_materno = tblSolicitudes.rows($(this).closest("tr").index()).data().pluck(3)[0];

   		let nombre_completo = nombre+" "+apellido_paterno +" "+apellido_materno;
   	

   		$.ajax(
   		    {
   		          type: "POST",
   		          dataType:"json",
   		          url: base_url+"Home/getCountSolicitudesEstudiante",
   		          data: {no_de_control:no_de_control},
   		          async: true,
   		          success: function(result)
   		            {
   		               if( typeof(result.redirect) == 'undefined')
   		               {
   		                   if(result.status == "OK")
   		                   {

   		                   	let tbodySolicitudes = '';
   		                   	let x=1;

   		                   	$("body #tblSolicitudesEstudiante tbody").empty();

   		                   	result.solicitudes.forEach(function(solicitud) {

   		                   		let selectEstatus = ""

   		                   		if(solicitud.status == "Pendiente")
   		                   		{
   		                   			selectEstatus = `<select class="slStatusSolicitud form-control" >
	                                           						<option value="Pendiente" selected >Pendiente</option>
	                                           						<option value="Aceptado" >Aceptado</option>
	                                           						<option value="Rechazado" >Rechazado</option>
	                                       					</select> `;
   		                   		}
   		                   		else
   		                   		{
   		                   			if(solicitud.status == "Aceptado")
	   		                   		{
	   		                   			selectEstatus = `<select class="slStatusSolicitud form-control"  >
	                                           						<option value="Pendiente"  >Pendiente</option>
	                                           						<option value="Aceptado" selected >Aceptado</option>
	                                           						<option value="Rechazado" >Rechazado</option>
	                                       					</select> `;
	   		                   		}
	   		                   		else
	   		                   		{
	   		                   			selectEstatus = `<select class="slStatusSolicitud form-control"  >
	                                           						<option value="Pendiente"  >Pendiente</option>
	                                           						<option value="Aceptado"  >Aceptado</option>
	                                           						<option value="Rechazado" selected >Rechazado</option>
	                                       					</select> `;
	   		                   		}
   		                   		}

   		                   		tbodySolicitudes = `	<tr data-num_solicitud='${solicitud.num_solicitud}' style='height:50px;'>
   		                   							<td class='text-center'>${x}</td>
												<td class='text-center'>${solicitud.asunto}</td>
												<td class='text-center'>${solicitud.lugar}</td>
												<td class='text-center'>${solicitud.fecha}</td>
												<td class='text-center'>${solicitud.nombre_semestre}</td>
												<td class='text-center'>${solicitud.identificacion_larga}</td>
												<td><p class='demo'><a href='${base_url}/Home/solicitudPDFEstudiante?num_solicitud=${solicitud.num_solicitud}' target='_blank' class='demo'>
																	<input type='button' class="btn btn-primary btnVerFormatoSolicitud"  value='Ver solicitud' />
																</a>
													</p> 
												</td>
												<td>
													${selectEstatus}
												</td>
											</tr>`;

							$("body #tblSolicitudesEstudiante tbody").append(tbodySolicitudes);
							x++;

						});

   		                        $("#modalSolicitudesEstudiante #nameEstudiante").text(nombre_completo);
   		                        $("#modalSolicitudesEstudiante").modal("show");
   		                        
   		                   }
   		                   else
   		                   {
   		                        // $('#modalAlerta .modal-body').text(result.mensaje);
   		                        // $('#modalAlerta').modal('show');
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


   })



   // $("body").on("click",".btnVerFormatoSolicitud",function()
   // {

   // 	let num_solicitud = $(this).closest("tr").attr("data-num_solicitud");


   // })


 $("body").on("change",".slStatusSolicitud",function()
 {
 	let num_solicitud = $(this).closest("tr").attr("data-num_solicitud");


 	$.ajax(
   		    {
   		          type: "POST",
   		          dataType:"json",
   		          url: base_url+"Home/evaluarSolicitudEstudiante",
   		          data: {num_solicitud:num_solicitud,status:$(this).val()},
   		          async: true,
   		          success: function(result)
   		            {
   		               if( typeof(result.redirect) == 'undefined')
   		               {
   		                   if(result.resultado == "OK")
   		                   {

   		                   	    alert(result.mensaje);
   		                        
   		                   }
   		                   else
   		                   {
   		                        alert(result.mensaje);
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




});