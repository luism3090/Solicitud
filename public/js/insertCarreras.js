$(document).ready(function()
{
   
   var base_url = $("body").attr("data-base-url");

   validaDatosCarreras();


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

	                }
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
				claveOficial:$("#txtClaveOficialCarrera").val(),
				carrera:$("#txtCarrera").val(),
				nombreCarrera:$("#txtNombreCarrera").val(),
				nombreCarreraReducido:$("#txtNombreCarreraReducido").val(),
				cargaMaxima:$("#txtCargaMaxima").val(),
				cargaMinima:$("#txtCargaMinima").val(),
				creditosTotales:$("#txtCreditosTotales").val()
			}

			//console.log(datosCarrera);

			$.ajax(
			{
	          type: "POST",
	          dataType:"json",
	          url: base_url+"Carreras/guardarCarreras",
	          data: datosCarrera,
	          async: true,
	          success: function(result)
		          {
		          	
		          	if(result.resultado == 'OK')
		          	{
		          		$('#modalAlerta .modal-body').text(result.mensaje);
		          		$('#modalAlerta').modal('show');

		          		
		          	}
		          	else
		          	{
		          		$('#modalAlerta .modal-body').text(result.mensaje);
		          		$('#modalAlerta').modal('show');
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


});