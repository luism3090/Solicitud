$(document).on("ready",function()
{

	var base_url = $("body").attr("data-base-url");


	var hoy = new Date();
	var dd = hoy.getDate();
	var mm = hoy.getMonth()+1; 
	var yyyy = hoy.getFullYear();

	if(dd<10) {
	    dd='0'+dd
	} 

	if(mm<10) {
	    mm='0'+mm
	} 

	hoy = yyyy +'-' +mm+'-'+dd;


	$("#txtFecha").val(hoy);



	validaSolicitudEstudiante();

	$("#formSolicitudEstudiante").on("submit",function(event)
	{
		event.preventDefault();

		$("#formSolicitudEstudiante").bootstrapValidator();

	});


	function validaSolicitudEstudiante()
	{
		

		$('#formSolicitudEstudiante').bootstrapValidator(
		{

	        message: 'This value is not valid',
	        container: 'tooltip',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {

	            txtLugar: {
	                group: '.form-group',
	                validators: 
	                {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }
	                     

	                }
	            },

	            txtFecha: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            slPeriodoEscolar: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            txtAsunto: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            rdSolicitud: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            

	            txtNombreEstudiante: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            txtApellidoPaterno: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            txtApellidoMaterno: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            slSemestres: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            slCarreras: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            txtNumControl: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            txtObservacion: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            txtCurpEstudiante: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            txtMotivosAcademicos: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            // txtMotivosPersonales: {
	            //     group: '.form-group',
	            //     validators: {
	            //         notEmpty: {
	            //             message: 'Este campo es requerido'
	            //         }

	            //     }
	            // },

	            //  txtOtros: {
	            //     group: '.form-group',
	            //     validators: {
	            //         notEmpty: {
	            //             message: 'Este campo es requerido'
	            //         }

	            //     }
	            // },



	        }
	    }).on('success.form.bv', function (e) 
	    {

			e.preventDefault();

			let no_de_control = $("#txtNumControl").val().trim();

			let apellido_paterno = $("#txtApellidoPaterno").val().trim();
			let	apellido_materno = $("#txtApellidoMaterno").val().trim();
			let	nombre_alumno = $("#txtNombreEstudiante").val().trim();
			
			let mensaje = `El estudiante <strong>${nombre_alumno} ${apellido_paterno} ${apellido_materno}</strong> con número de control <strong>${no_de_control}</strong> 
							esta apunto de enviar su solicitud <br><br><br>
							Por favor antes de continuar verifique que la información de su solicitud esté escrita correctamente<br><br> 
							Si su información esta escrita correctamente puede pulsar el botón <strong>Enviar Solicitud </strong> de lo contrario pulse el botón <strong>Regresar</strong>`;

			$("#modalConfirDatosCorrectosSolicitud .modal-body").html(mensaje);
			$("#modalConfirDatosCorrectosSolicitud").modal("show");

			$("#btnAceptarSolicitudEstudiante").attr("disabled",false);



	    });


	}


	$("#btnEnviarSolicitudEstudiante").on("click",function(){

		let datosAlumno = 
			{
				no_de_control:$("#txtNumControl").val().trim(),
				id_semestre:$("#slSemestres").val().trim(),
				apellido_paterno:$("#txtApellidoPaterno").val().trim(),
				apellido_materno:$("#txtApellidoMaterno").val().trim(),
				nombre_alumno:$("#txtNombreEstudiante").val().trim(),
				curp_alumno:$("#txtCurpEstudiante").val().trim(),
				creditos_aprobados:'',
				creditos_cursados:'',
				clave_oficial:$("#slCarreras").val().trim()
			}

			let datosSolicitud = 
			{
				status:'Pendiente',
				observacion:$("#txtObservacion").val().trim(),
				asunto:$("#txtAsunto").val().trim(),
				lugar:$("#txtLugar").val().trim(),
				fecha:$("#txtFecha").val().trim(),
				motivos_academicos:$("#txtMotivosAcademicos").val().trim(),
				motivos_personales:$("#txtMotivosPersonales").val().trim(),
				otros:$("#txtOtros").val().trim(),
				id_semestre:$("#slSemestres").val().trim(),
				clave_oficial:$("#slCarreras").val().trim(),
				id_periodo_escolar:$("#slPeriodoEscolar").val().trim()
				
			}

			let no_de_control = $("#txtNumControl").val().trim();

			$.ajax(
			{
	          type: "POST",
	          dataType:"json",
	          url: base_url+"Estudiantes/enviarSolicitudEstudiante",
	          data: {
	          		no_de_control: $("#txtNumControl").val().trim(),
	          		datosAlumno:datosAlumno,
	          		datosSolicitud:datosSolicitud
	          },
	          async: true,
	          success: function(result)
		          {
		          	

		          	if(result.status == 'OK')
		          	{
		          		$("#modalConfirDatosCorrectosSolicitud").modal("hide");
		          		$("#modalAlertaMsJSolicitudEstudiante .modal-body").html(result.mensaje);
		          		$("#modalAlertaMsJSolicitudEstudiante").prop('statusSolicitud','OK');
		          		$("#modalAlertaMsJSolicitudEstudiante").modal("show");
		          	}
		          	else
		          	{

		          		$("#modalConfirDatosCorrectosSolicitud").modal("hide");
		          		$("#modalAlertaMsJSolicitudEstudiante .modal-body").html(result.mensaje);
		          		$("#modalAlertaMsJSolicitudEstudiante").modal("show");
		          		
		          	}

		          },
			   error:function(result)
				  {
				  	console.log(result.responseText);
				  	//$("#error").html(data.responseText); 
				  }
	          
	        });





	})



	$('#modalAlertaMsJSolicitudEstudiante').on('hide.bs.modal', function (e) 
    {
    	
    	if($("#modalAlertaMsJSolicitudEstudiante").prop('statusSolicitud') != undefined)
    	{
    		location.reload();
    		
    	}
        

    });


	 function cargarSelectPeriodosEscolares()
	{

		$.ajax(
	    {
	      
	      type: "POST",
	      url: base_url+"Estudiantes/cargarSelectPeriodosEscolares",
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
    	  
    	                       options += '<option value="'+elemento.id_periodo_escolar+'">'+elemento.identificacion_larga+'</option>';
    	                      
    	                  });

    	                   $("#slPeriodoEscolar").html(options);

    	                }
    	               

	                
	              
	            },
	       error:function(result)
	          {
	            alert("Error");
	           console.log(result.responseText);
	            
	          }
	   });


	}
	cargarSelectPeriodosEscolares();



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



	$("body").on("click","#rdSolicitudNO",function()
	{
		$("#modalAlertaIngresaNocontrol").modal("show");
		$("#txtNumControl").val("");
		$("#txtNumControl").attr('readonly', true);
		$("#formSolicitudEstudiante").data("bootstrapValidator").resetField("txtNumControl",true);
		$("#btnAceptarSolicitudEstudiante").attr("disabled",false);

	});

	$("body").on("click","#rdSolicitudSI",function()
	{
		let num_control = $("#txtNumControl").val();
		$("#txtNumControl").attr('readonly', false);
		$("#btnAceptarSolicitudEstudiante").attr("disabled",false);
		$("#formSolicitudEstudiante").data("bootstrapValidator").resetField("txtNumControl",true);
		$("#txtNumControl").val(num_control);
		$("#formSolicitudEstudiante").data("bootstrapValidator").revalidateField("txtNumControl",true);
		

	});

	validaNumeroControEstudiante();

	$("#formNumeroControlAlumno").on("submit",function(event)
	{
		event.preventDefault();

		$("#formNumeroControlAlumno").bootstrapValidator();

	});



		function validaNumeroControEstudiante()
	{
		

		$('#formNumeroControlAlumno').bootstrapValidator(
		{

	        message: 'This value is not valid',
	        container: 'tooltip',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {

	            mdlTxtNumControl: {
	                group: '.form-group',
	                validators: 
	                {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }
	                     

	                }
	            },
	        }
	    }).on('success.form.bv', function (e) 
	    {

	    	e.preventDefault();

			$.ajax(
			{
	          type: "POST",
	          dataType:"json",
	          url: base_url+"Estudiantes/verifyNoControlGetInfo",
	          data: {
	          		no_de_control: $("#mdlTxtNumControl").val().trim()
	          },
	          async: true,
	          success: function(result)
		          {
		          	//console.log(result);

		          	if(result.msjCantidadRegistros > 0)
		          	{
		          		$("#formSolicitudEstudiante").data("bootstrapValidator").resetField("txtNumControl",true);
		          		$("#formSolicitudEstudiante").data("bootstrapValidator").resetField("txtNombreEstudiante",true);
		          		$("#formSolicitudEstudiante").data("bootstrapValidator").resetField("txtApellidoPaterno",true);
		          		$("#formSolicitudEstudiante").data("bootstrapValidator").resetField("txtApellidoMaterno",true);
		          		$("#formSolicitudEstudiante").data("bootstrapValidator").resetField("txtCurpEstudiante",true);

		          		$("#txtNumControl").val(result.alumno[0].no_de_control);
		          		$("#txtNombreEstudiante").val(result.alumno[0].nombre_alumno);
		          		$("#txtApellidoPaterno").val(result.alumno[0].apellido_paterno);
		          		$("#txtApellidoMaterno").val(result.alumno[0].apellido_materno);
		          		$("#txtCurpEstudiante").val(result.alumno[0].curp_alumno);

		          		$("#formSolicitudEstudiante").data("bootstrapValidator").revalidateField("txtNumControl",true);
		          		$("#formSolicitudEstudiante").data("bootstrapValidator").revalidateField("txtNombreEstudiante",true);
		          		$("#formSolicitudEstudiante").data("bootstrapValidator").revalidateField("txtApellidoPaterno",true);
		          		$("#formSolicitudEstudiante").data("bootstrapValidator").revalidateField("txtApellidoMaterno",true);
		          		$("#formSolicitudEstudiante").data("bootstrapValidator").revalidateField("txtCurpEstudiante",true);

		          		$("#modalAlertaIngresaNocontrol").modal("hide");

		          	}
		          	else
		          	{

		          		alert(result.mensaje);
		          		$("#btnNumControlGetDatosEstudiante").attr("disabled",false);
		          		let no_control = $("#mdlTxtNumControl").val().trim();
		          		//$("#formNumeroControlAlumno").bootstrapValidator('resetForm', true);
		          		$("#mdlTxtNumControl").val(no_control);
		          		

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


	$('#modalAlertaIngresaNocontrol').on('hide.bs.modal', function (e) 
    {
    	$("#btnAceptarSolicitudEstudiante").attr("disabled",false);
    	$("#formNumeroControlAlumno").data("bootstrapValidator").resetField("mdlTxtNumControl",true);
    	$("#formSolicitudEstudiante").data("bootstrapValidator").revalidateField("txtNumControl",true);
        

    });

		

});
