$(document).on("ready",function()
{

var base_url = $("body").attr("data-base-url");

	validaLogin();

	$("#FormLogin").on("submit",function(event)
	{
		event.preventDefault();

		$("#FormLogin").bootstrapValidator();

	});


	function validaLogin()
	{
		

		$('#FormLogin').bootstrapValidator(
		{

	        message: 'This value is not valid',
	        container: 'tooltip',
	        feedbackIcons: {
	            valid: 'glyphicon glyphicon-ok',
	            invalid: 'glyphicon glyphicon-remove',
	            validating: 'glyphicon glyphicon-refresh'
	        },
	        fields: {
	            email: {
	                group: '.input-group',
	                validators: 
	                {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    },
	                     regexp: {
                            regexp: /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/,

                            message: 'La dirección de email no es válida',

                        },

	                }
	            },
	            password: {
	                group: '.input-group',
	                validators: {
	                    notEmpty: {
	                        message: 'Este campo es requerido'
	                    },
	                    stringLength: {
	                        enabled: true,
	                        min: 5,
	                        max: 20,
	                        message: 'El password debe contener como mínimo 5 caracteres y 20 como máximo'
	                    },

	                }
	            }

	        }
	    }).on('success.form.bv', function (e) 
	    {

			e.preventDefault();

			$.ajax(
			{
	          type: "POST",
	          dataType:"json",
	          url: base_url+"Login/loginUsuario",
	          data: {
	          		email: $("#email").val(),
					password: $("#password").val(),
	          },
	          async: true,
	          success: function(result)
		          {
		          	//console.log(result);

		          	if(result.msjCantidadRegistros > 0)
		          	{
		          		//location.href = result.base_url;
		          		location.href = result.base_url;
		          	}
		          	else
		          	{
		          		$('#modalAlerta .modal-body > p').text(result.msjNoHayRegistros);
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


