$(document).ready(function()
{
  
 var base_url = $("body").attr("data-base-url");

 validaDatosCarrerasMaterias();


	$("#formCarrerasMaterias").on("submit",function(event)
	{
		event.preventDefault();

		$("#formCarrerasMaterias").bootstrapValidator();

	});


  function cargarSelectCarreras()
	{

		$.ajax(
	    {
	      
	      type: "POST",
	      url: base_url+"CarrerasMaterias/cargarSelectCarreras",
	      dataType:"json",
	      data: '',
	      async: true,
	        success: function(result)
	            {

	                if(result.length > 0)
	                {
	                   let options ="<option selected disabled >Elija una opción</option>";
	                   result.forEach(function(elemento,index) 
	                   {
	  
	                       options += '<option value="'+elemento.clave_oficial+'">'+elemento.nombre_carrera+'</option>';
	                      
	                  });

	                   $("#slCarreras").html(options);

	                }
	              
	            },
	       error:function(result)
	          {
	            alert("Error");
	           console.log(result.responseText);
	            
	          }
	   });


	}
	cargarSelectCarreras();


	function cargarSelectSemestres()
	{

		$.ajax(
	    {
	      
	      type: "POST",
	      url: base_url+"CarrerasMaterias/cargarSelectSemestres",
	      dataType:"json",
	      data: '',
	      async: true,
	        success: function(result)
	            {

	                if(result.length > 0)
	                {
	                   let options ="<option selected disabled >Elija una opción</option>";
	                   result.forEach(function(elemento,index) 
	                   {
	  
	                       options += '<option value="'+elemento.id_semestre+'">'+elemento.nombre_semestre+'</option>';
	                      
	                  });

	                   $("#slSemestres").html(options);

	                }
	              
	            },
	       error:function(result)
	          {
	            alert("Error");
	           console.log(result.responseText);
	            
	          }
	   });


	}
	cargarSelectSemestres();


	function validaDatosCarrerasMaterias()
	{
		

		$('#formCarrerasMaterias').bootstrapValidator(
		{

	        message: 'This value is not valid',
	        container: 'tooltip',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            slCarreras: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    },

	                }
	            }
	            ,
	            slSemestres: {
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

			var datosCarrerasMaterias = {
				clave_oficial:$("#slCarreras").val(),
				id_semestre:$("#slSemestres").val()
				
			}

			//console.log(datosCarrerasMaterias);

			// $.ajax(
			// {
	  //         type: "POST",
	  //         dataType:"json",
	  //         url: base_url+"Materias/guardarMaterias",
	  //         data: datosMateria,
	  //         async: true,
	  //         success: function(result)
		 //          {
	
		 //          	$('#modalAlerta .modal-body').text(result.mensaje);
		 //          	$('#modalAlerta').modal('show');
		 //          	if(result.resultado == 'OK')
		 //          	{
		 //          		$("#btnGuardarMateria").prop("resultado",result.resultado);
		          		
		 //          	}

		 //          },
			//    error:function(result)
			// 	  {
			// 	  	console.log(result.responseText);
			// 	  	//$("#error").html(data.responseText); 
			// 	  }
	          
	  //       });

	    });


	}


	$("#slCarreras").on("change",function()
	{

		if( $("#slSemestres").val() !=null )
		{
			getInfoCarrerasMaterias();
		}

	});

	$("#slSemestres").on("change",function()
	{

		if( $("#slCarreras").val() !=null )
		{
			getInfoCarrerasMaterias();
		}



	});




	function getInfoCarrerasMaterias()
	{

			var datos = {
				clave_oficial:$("#slCarreras").val(),
				id_semestre:$("#slSemestres").val()
				
				}

				$.ajax(
				{
		          type: "POST",
		          dataType:"json",
		          url: base_url+"CarrerasMaterias/getInfoCarrerasMaterias",
		          data: datos,
		          async: true,
		          success: function(result)
			          {

			          	

			          	if(result.status == 'OK')
			          	{
			          		let tempMaterias = '';
			          		let tempModalInfoMaterias = '';

			          		$("#containerModalsInfoMaterias").html("");

			          		result.materias.forEach(function(materia) {
						    		
						    	tempMaterias += `	<tr data-id_materia='${materia.id_materia}' style='height:50px;'>
														<td><input type='checkbox' class="form-control" style='height: 25px;' checked='checked' /></td>
														<td class='text-center'>${materia.nombre_completo_materia}</td>
														<td class='text-center'><input type='button' class='btn btn-primary btnMasInfoMateria' value='Ver más Información'></td>
													</tr>`;


								tempModalInfoMaterias =  `<div id="modalAlerta_${materia.id_materia}" class="modal fade" role="dialog">
															<div class="modal-dialog">
															   	<div class="modal-content">
															      		<div class="modal-header">
															       			<button type="button" class="close" data-dismiss="modal">&times;</button>
															        		<h4 class="modal-title">Alerta</h4>
															      		</div>
																      <div class="modal-body">
																        	
																        	<div class="row">
																			<div class="col-xs-12">
																				<h2 style="text-align: center;">información adicional de la materia</h2>
																			</div>
																		</div>
																		<br><br>
																		<div class="row">
																			<div class="col-xs-12">
																				
																		 		<div class="form-group">
																						<label for="txtCreditosMateria${materia.id_materia}">Créditos materia:</label>
																						<input type="text" id="txtCreditosMateria${materia.id_materia}" name="txtCreditosMateria${materia.id_materia}" class="form-control" placeholder="Créditos materia" minlength="1"  maxlength="4">
																				</div>
																				<div class="form-group">
																					<label for="txtHorasTeoricas${materia.id_materia}">Horas teóricas:</label>
																					<input type="text" id="txtHorasTeoricas${materia.id_materia}" name="txtHorasTeoricas${materia.id_materia}" class="form-control" placeholder="Horas teóricas" minlength="1"  maxlength="4">
																				</div>
																				<div class="form-group">
																					<label for="txtHorasPracticas${materia.id_materia}">Horas prácticas:</label>
																					<input type="text" id="txtHorasPracticas${materia.id_materia}" name="txtHorasPracticas${materia.id_materia}" class="form-control" placeholder="Horas prácticas" minlength="1"  maxlength="4">
																				</div>

																			</div>
																		</div>

																      </div>
																      <div class="modal-footer">
																      <button type="button" class="btn btn-primary" data-dismiss="modal" id="btnMdlInfoMateria${materia.id_materia}">Aceptar</button>
																      </div>
														    	</div>
															</div>
														</div>`;


								$("#containerModalsInfoMaterias").append(tempModalInfoMaterias);



							});


			          		


							

			          			$("#tblCarrerasMaterias tbody").html(tempMaterias);
			          	}
			          	else
			          	{
			          		if(result.status == 'Sin datos')
			          		{
			          			$("#tblCarrerasMaterias tbody").html(`	<tr class='noData' >
																			<td  colspan='3' class='text-center'>No hay información disponible</td>
																		</tr>`
																	);
			          		}
			          		else
			          		{

			          		}
			          	}

			          	

			          },
				   error:function(result)
					  {
					  	console.log(result.responseText);
					  	//$("#error").html(data.responseText); 
					  }
		          
		        });	
	}



	$("#btnAgregarMaterias").on("click",function()
	{

		if($("#slCarreras").val() == null )
		{
			$("#modalAlerta .modal-body").html("Antes de agregar materias <strong>elija una carrera</strong>")
			$("#modalAlerta").modal("show");
		}
		else
		{
			if($("#slSemestres").val() == null )
			{
				$("#modalAlerta .modal-body").html("Antes de agregar materias <strong>elija un semestre</strong>")
				$("#modalAlerta").modal("show");
			}
			else
			{

				
				$.ajax(
				{
		          type: "POST",
		          dataType:"json",
		          url: base_url+"CarrerasMaterias/getInfoMaterias",
		          data: '',
		          async: true,
		          success: function(result)
			          {

			          	if(result.status == 'OK')
			          	{
			          		let tempMaterias = '';

			          		result.materias.forEach(function(materia) {
						    		
						    	tempMaterias += `	<tr data-id_materia='${materia.id_materia}' >
														<td><input type='checkbox' class="form-control" style='height: 25px;'  /></td>
														<td class='text-center'>${materia.nombre_completo_materia}</td>
													</tr>`

							});

			          			$("#tblMaterias tbody").html(tempMaterias);

			          			$('#modalAlertaAgregarMaterias').modal('show');
			          	}
			          	else
			          	{
			          		if(result.status == 'Sin datos')
			          		{
			          			$("#tblMaterias tbody").html(`	<tr class='noData' >
																			<td  colspan='3' class='text-center'>No hay información disponible</td>
																		</tr>`
																	);
			          			$('#modalAlertaAgregarMaterias').modal('show');
			          		}
			          		else
			          		{
			          			$('#modalAlertaAgregarMaterias .modal-body').html(result.mensaje);
			          		}
			          	}


			          		// $('#modalAlertaAgregarMaterias .modal-body #tblMaterias').text(result.mensaje);


			          		// $('#modalAlertaAgregarMaterias').modal('show');
			          	
			          	
			          	
			          },
				   error:function(result)
					  {
					  	console.log(result.responseText);
					  	//$("#error").html(data.responseText); 
					  }
		          
		        });	


			}
		}


	});




	$("#btnMdlAgregarMaterias").on("click",function()
	{

		let tempMaterias = '';
		let arrayMaterias = [];

		$('#tblMaterias input[type="checkbox"]:checked').each(function(index)
		{

			let id_materia = $(this).closest("tr").attr("data-id_materia");

			let materia = $(this).closest("tr").find("td").eq(1).text();

			arrayMaterias[index] =  $(this).closest("tr").attr("data-id_materia");

			tempMaterias += `	<tr data-id_materia='${id_materia}' style='height:50px;'>
														<td><input type='checkbox' class="form-control" style='height: 25px;' checked='checked' /></td>
														<td class='text-center'>${materia}</td>
														<td class='text-center'><input type='button' class='btn btn-primary btnMasInfoMateria' value='Ver más Información'></td>
													</tr>`


		});

	
		if(arrayMaterias.length > 0)
		{

			let datos = 
			{
				ids_materias : arrayMaterias,
				clave_oficial: $("#slCarreras").val(),
				id_semestre: $("#slSemestres").val()
			}
			

			$.ajax(
					{
			          type: "POST",
			          dataType:"json",
			          url: base_url+"CarrerasMaterias/verifyMateriasAgregar",
			          data: datos,
			          async: true,
			          success: function(result)
				          {

				          	if(result.status == 'OK')
				          	{
				          		if(result.msjCantidadRegistros > 0)
				          		{
          			          		// let materias = 'Las materia(s) :\n\n ';
          			          		let materias = '<h5>Las materia(s) :<br><br><br> ';

          			          		materias += '<ol>';

          			          		result.materias.forEach(function(materia) {
          						    		
          						    	// materias += `${materia.nombre_completo_materia}\n `;
          						    	 materias += `<li style='margin-left:10px' >${materia.nombre_completo_materia}</li> <br><br> `;

          							});

          							// materias += `\n\nya fueron agregadas a la carrera y semestre elegido `;
          							materias += `</ol><br> ya fueron agregadas a la carrera y semestre elegido para continuar desmarquelas de la tabla de agregar materias</h5>`;

          							//alert(materias);

          							$("#modalAlerta .modal-body").html(materias);
          							$("#modalAlerta").modal("show");


				          		}

				    			
				          	}
				          	else
				          	{
				          		if(result.status == 'Sin datos')
				          		{
				          		
				          			$("#tblCarrerasMaterias tbody").append(tempMaterias);
				          			$("#modalAlertaAgregarMaterias").modal('hide');
				          		
				          		}
				          		else
				          		{
				          			$('#modalAlertaAgregarMaterias .modal-body').html(result.mensaje);
				          		}
				          	}
				          	
				          	
				          },
					   error:function(result)
						  {
						  	console.log(result.responseText);
						  	//$("#error").html(data.responseText); 
						  }
			          
			        });	


		}

		






	});


	$("body").on("click",".btnMasInfoMateria",function()
	{

       let id_materia = $(this).closest("tr").attr('data-id_materia')

       $("#modalAlerta_"+id_materia).modal("show");


	});



 });