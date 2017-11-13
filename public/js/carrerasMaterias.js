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

			console.log(datosCarrerasMaterias);

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

			          		result.materias.forEach(function(materia) {
						    		
						    	tempMaterias += `	<tr data-id_materia='${materia.id_materia}'>
														<td><input type='checkbox' class="form-control" /></td>
														<td class='text-center'>${materia.nombre_completo_materia}</td>
														<td class='text-center'><button class='btn btn-primary btnMasInfoMateria ' >Ver màs Información</button></td>
													</tr>`

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

			          	

			          	
		
			          	// $('#modalAlerta .modal-body').text(result.mensaje);
			          	// $('#modalAlerta').modal('show');
			          	

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

				


			}
		}


	});




 });