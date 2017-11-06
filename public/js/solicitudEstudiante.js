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

	            txtAsunto: {
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

	            slSemestre: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	            slCarrera: {
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

	            txtMateriaACursar: {
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

	            txtMotivosPersonales: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },

	             txtOtros: {
	                group: '.form-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    }

	                }
	            },



	        }
	    }).on('success.form.bv', function (e) 
	    {

			e.preventDefault();

			alert();

			// $.ajax(
			// {
	  //         type: "POST",
	  //         dataType:"json",
	  //         url: base_url+"Estudiantes/Solicitud",
	  //         data: {
	  //         		email: $("#email").val(),
			// 		password: $("#password").val(),
	  //         },
	  //         async: true,
	  //         success: function(result)
		 //          {
		 //          	//console.log(result);

		 //          	if(result.msjCantidadRegistros > 0)
		 //          	{
		 //          		//location.href = result.base_url;
		 //          		location.href = result.base_url;
		 //          	}
		 //          	else
		 //          	{
		 //          		$('#modalAlerta .modal-body > p').text(result.msjNoHayRegistros);
		 //          		$('#modalAlerta').modal('show');
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
		

});
