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
	                else
	                {
	                	$("#modalAlerta .modal-body").html("No se encontraron carreras disponibles porfavor agregue carreras para poder continuar");
						$("#modalAlerta").modal("show");
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

			var datosRelCarrerasMaterias = [];

			$clave_oficial = $("#slCarreras").val();
			$id_semestre = $("#slSemestres").val();

			$("#tblCarrerasMaterias tbody tr").each(function()
			{

				var datosCarrerasMaterias = {
											
											id_materia:$(this).attr("data-id_materia"),
											creditos_materia:$(this).find("input").eq(0).val(),
											horas_teoricas:$(this).find("input").eq(1).val(),
											horas_practicas:$(this).find("input").eq(2).val()
				
											}


				datosRelCarrerasMaterias.push(datosCarrerasMaterias);

			})

			//console.log(datosRelCarrerasMaterias);

			$.ajax(
			{
	          type: "POST",
	          dataType:"json",
	          url: base_url+"CarrerasMaterias/guardarCarrerasMaterias",
	          data: {datosMaterias:datosRelCarrerasMaterias,clave_oficial:$clave_oficial,id_semestre:$id_semestre},
	          async: true,
	          success: function(result)
		          {

		          	console.log(result);
	
		          	$('#modalAlerta .modal-body').text(result.mensaje);
		          	$('#modalAlerta').modal('show');
		          	if(result.status == 'OK')
		          	{
		          		
		          		getInfoCarrerasMaterias();
		          		$("#btnGuardarCarrerasMaterias").attr('disabled',false); 
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

			          		let buttonCreditosMateria = ''
			          		let buttonHorasTeoricas = ''
			          		let buttonHorasPracticas = ''

			          		$("body #tblCarrerasMaterias tbody").html("");

			          		result.materias.forEach(function(materia) {
						    		
						    		//<td><input type='checkbox' class="form-control" style='height: 25px;' checked='checked' /></td>

						    	tempMaterias = `	<tr data-id_materia='${materia.id_materia}' style='height:50px;'>
														<td class='text-center'>${materia.nombre_completo_materia}</td>
														<td class='text-center'>
															<div class="form-group">
				 												<input type="text" id="txtCreditoss${materia.id_materia}" name="txtCreditoss${materia.id_materia}" class="form-control" value='${materia.creditos_materia}' placeholder="Horas teóricas" minlength="1"  maxlength="4" style='margin: 14px auto;width:90%'>
															</div>
														</td>
														<td class='text-center'>
															<div class="form-group">
				 												<input type="text" id="txtHorasTeoricas${materia.id_materia}" name="txtCreditoss${materia.id_materia}" class="form-control" value='${materia.horas_teoricas}' placeholder="Horas teóricas" minlength="1"  maxlength="4" style='margin: 14px auto;width:90%'>
															</div>
														</td>
														<td class='text-center'>
															<div class="form-group">
				 												<input type="text" id="txtHorasPracticas${materia.id_materia}" name="txtCreditoss${materia.id_materia}" class="form-control" value='${materia.horas_practicas}' placeholder="Horas prácticas" minlength="1"  maxlength="4"  style='margin: 14px auto;width:90%'>
															</div>
														</td>
														<td><input type='button' data-save='true' id='btnEliminarMateria_${materia.id_materia}' class="btn btn-primary btnEliminarMateria"  value='Eliminar' /></td>
													</tr>`;


								$("body #tblCarrerasMaterias tbody").append(tempMaterias);

								$('#formCarrerasMaterias').bootstrapValidator('addField',`txtCreditoss${materia.id_materia}`,{
									group: '.form-group',
					                validators: {
					                    notEmpty: {
					                        message: 'Este campo es requerido'
					                    },
					                     regexp: {
				                            regexp: /^[0-9]+$/,

				                            message: 'Solo debe ingresar números',

				                        },

					                }
								});

								$('#formCarrerasMaterias').bootstrapValidator('addField',`txtHorasTeoricas${materia.id_materia}`,{
									group: '.form-group',
					                validators: {
					                    notEmpty: {
					                        message: 'Este campo es requerido'
					                    },
                	                     regexp: {
                                            regexp: /^[0-9]+$/,

                                            message: 'Solo debe ingresar números',

                                        },

					                }
								});

								$('#formCarrerasMaterias').bootstrapValidator('addField',`txtHorasPracticas${materia.id_materia}`,{
									group: '.form-group',
					                validators: {
					                    notEmpty: {
					                        message: 'Este campo es requerido'
					                    },
					                     regexp: {
				                            regexp: /^[0-9]+$/,

				                            message: 'Solo debe ingresar números',

				                        },

					                }
								});


							});


			          		


							

			          			
			          	}
			          	else
			          	{
			          		if(result.status == 'Sin datos')
			          		{
			          			$("#tblCarrerasMaterias tbody").html(`	<tr class='noData' >
																			<td  colspan='5' class='text-center'>No hay información disponible</td>
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

				let arrayMaterias2 = [];

				$('#tblCarrerasMaterias tbody tr').each(function(index)
          		{
          			arrayMaterias2[index] = $(this).attr("data-id_materia");


          		});

				let datos;
				let url_=""

				if( $('#tblCarrerasMaterias tbody tr td').length > 1)
				{
					 datos = {
								clave_oficial: $("#slCarreras").val(),
								id_semestre: $("#slSemestres").val(),
								arrayMaterias: arrayMaterias2
					}

					url_ = base_url+"CarrerasMaterias/getInfoMaterias";
				}
				else
				{
					 datos = {
								clave_oficial: $("#slCarreras").val(),
								id_semestre: $("#slSemestres").val(),
					}

					url_ = base_url+"CarrerasMaterias/getInfoMaterias2";
				}

          		


				
				$.ajax(
				{
		          type: "POST",
		          dataType:"json",
		          url: url_,
		          data: datos,
		          async: true,
		          success: function(result)
			          {
			          	debugger;

			          	if(result.status == 'OK')
			          	{
			          		let tempMaterias = '';

			          		
			          		result.materias.forEach(function(materia) {
						    	
						    		tempMaterias += `	<tr data-id_materia='${materia.id_materia}' >
														<td><input type='checkbox' class="form-control" style='height: 25px;'  /></td>
														<td class='text-center'>${materia.nombre_completo_materia}</td>
													</tr>`;

							});

			          			$("#tblMaterias tbody").html(tempMaterias);
			          			$("#modalAlertaAgregarMaterias #stCarrera").text($("#slCarreras option:selected").text());
			          			$("#modalAlertaAgregarMaterias #stSemestre").text($("#slSemestres option:selected").text());
			          			

			          			$('#modalAlertaAgregarMaterias').modal('show');
			          	}
			          	else
			          	{
			          		if(result.status == 'Sin datos')
			          		{
			          			$("#tblMaterias tbody").html(`	<tr class='noData' >
																			<td  colspan='5' class='text-center'>No hay información disponible</td>
																		</tr>`
																	);
			          			$('#modalAlertaAgregarMaterias').modal('show');
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
		}


	});




	$("#btnMdlAgregarMaterias").on("click",function()
	{

		let tempMaterias = '';
		var arrayMaterias = [];
		

		//$("#tblCarrerasMaterias tbody").html("");

		$('#tblMaterias input[type="checkbox"]:checked').each(function(index)
		{

			let id_materia = $(this).closest("tr").attr("data-id_materia");

			let materia = $(this).closest("tr").find("td").eq(1).text();

			arrayMaterias[index] =  $(this).closest("tr").attr("data-id_materia");

		});
	
		if(arrayMaterias.length > 0)
		{

			$("body #tblCarrerasMaterias tbody tr.noData").remove();

  			$('#tblMaterias input[type="checkbox"]:checked').each(function(index)
  			{

  				let id_materia = $(this).closest("tr").attr("data-id_materia");

  				let materia = $(this).closest("tr").find("td").eq(1).text();

  				arrayMaterias[index] =  $(this).closest("tr").attr("data-id_materia");


			    	tempMaterias = `	<tr data-id_materia='${id_materia}' style='height:50px;'>
											<td class='text-center'>${materia}</td>
											<td class='text-center'>
												<div class="form-group">
	 												<input type="text" id="txtCreditoss${id_materia}" name="txtCreditoss${id_materia}" class="form-control" placeholder="Horas teóricas" minlength="1"  maxlength="4" style='margin: 14px auto;width:90%'>
												</div>
											</td>
											<td class='text-center'>
												<div class="form-group">
	 												<input type="text" id="txtHorasTeoricas${id_materia}" name="txtCreditoss${id_materia}" class="form-control" placeholder="Horas teóricas" minlength="1"  maxlength="4" style='margin: 14px auto;width:90%'>
												</div>
											</td>
											<td class='text-center'>
												<div class="form-group">
	 												<input type="text" id="txtHorasPracticas${id_materia}" name="txtCreditoss${id_materia}" class="form-control" placeholder="Horas prácticas" minlength="1"  maxlength="4"  style='margin: 14px auto;width:90%'>
												</div>
											</td>
											<td><input type='button' data-save='false' id='btnEliminarMateria_${id_materia}' class="btn btn-primary btnEliminarMateria" value='Eliminar' /></td>
										</tr>`;

  												

						$("body #tblCarrerasMaterias tbody").append(tempMaterias);

							$('#formCarrerasMaterias').bootstrapValidator('addField',`txtCreditoss${id_materia}`,{
								group: '.form-group',
				                validators: {
				                    notEmpty: {
				                        message: 'Este campo es requerido'
				                    },
				                     regexp: {
			                            regexp: /^[0-9]+$/,

			                            message: 'Solo debe ingresar números',

			                        },

				                }
							});

							$('#formCarrerasMaterias').bootstrapValidator('addField',`txtHorasTeoricas${id_materia}`,{
								group: '.form-group',
				                validators: {
				                    notEmpty: {
				                        message: 'Este campo es requerido'
				                    },
            	                     regexp: {
                                        regexp: /^[0-9]+$/,

                                        message: 'Solo debe ingresar números',

                                    },

				                }
							});

							$('#formCarrerasMaterias').bootstrapValidator('addField',`txtHorasPracticas${id_materia}`,{
								group: '.form-group',
				                validators: {
				                    notEmpty: {
				                        message: 'Este campo es requerido'
				                    },
				                     regexp: {
			                            regexp: /^[0-9]+$/,

			                            message: 'Solo debe ingresar números',

			                        },

				                }
							});




  			});

  			
  			$("#modalAlertaAgregarMaterias").modal('hide');



		


		}
		else
		{
			$("#modalAlerta .modal-body").html("Selecciona las materias a agregar");
			$("#modalAlerta").modal("show");
		}

	});

	
	$("body").on("click","#btnMdlAlertEliminarMaterias",function()
	{
		
		let datos = $("#btnMdlAlertEliminarMaterias").prop("datos");

		if(datos.dataSave == 'false')
		{
			$("#"+datos.rowToDelete).closest("tr").remove();
			 $("#btnGuardarCarrerasMaterias").attr('disabled',false); 
			 $("#formCarrerasMaterias").bootstrapValidator();
			//$("#formCarrerasMaterias").bootstrapValidator('resetForm', true);
		}
		else
		{
			$.ajax(
						{
				          type: "POST",
				          dataType:"json",
				          url: base_url+"CarrerasMaterias/deleteMaterias",
				          data: datos,
				          async: true,
				          success: function(result)
					          {

					          	if(result.status == 'OK')
					          	{

					          		$("#"+datos.rowToDelete).closest("tr").remove();

					          		$("#modalAlerta .modal-body").html(result.mensaje);
					          		$("#modalAlerta").modal("show");
					          		getInfoCarrerasMaterias();
					          		 $("#btnGuardarCarrerasMaterias").attr('disabled',false); 
					          		 $("#formCarrerasMaterias").bootstrapValidator();
					          		//$("#formCarrerasMaterias").bootstrapValidator('resetForm', true);

					    			
					          	}
					          	else
					          	{
					          		$("#modalAlerta .modal-body").html(result.mensaje);
					          		$("#modalAlerta").modal("show");
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


	$("body").on("click",".btnEliminarMateria",function()
	{

		let materia = $(this).closest("tr").find("td").eq(0).text();

		$("#modalAlertaEliminarMaterias .modal-body").html(`<h5>¿Desea eliminar la materia de <strong>${materia}</strong>?<h5>`);
		$("#modalAlertaEliminarMaterias").modal("show");

		  let datos = {
	   					id_materia : $(this).closest("tr").attr('data-id_materia'),
						clave_oficial : $("#slCarreras").val(),
						id_semestre : $("#slSemestres").val(),
						dataSave : $(this).attr("data-save"),
						rowToDelete: $(this).attr("id")
	   			   }

		$("#btnMdlAlertEliminarMaterias").prop("datos",datos);




	});




 });