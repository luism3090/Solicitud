$(document).ready(function()
{
   
   var base_url = $("body").attr("data-base-url");

   validaDatosPeriodosEscolares();


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
				periodo:$("#txtPeriodo").val().trim(),
				identificacion_larga:$("#txtIdentificacion_larga").val().trim(),
				identificacion_corta:$("#txtIdentificacion_corta").val().trim(),
				
			}


			$.ajax(
			{
	          type: "POST",
	          dataType:"json",
	          url: base_url+"PeriodosEscolares/guardarPeriodosEscolares",
	          data: datosInfo,
	          async: true,
	          success: function(result)
		          {
					
					if( typeof(result.redirect) == 'undefined')
                    {
                    	$('#modalAlerta .modal-body').text(result.mensaje);
                    	$('#modalAlerta').modal('show');
                    	if(result.resultado == 'OK')
                    	{
                    		$("#btnGuardarPeriodosEscolares").prop("resultado",result.resultado);
                    		
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


	$('#modalAlerta').on('hide.bs.modal', function (e) 
    {
    	if($("#btnGuardarPeriodosEscolares").prop("resultado") =='OK')
    	{
    		location.reload();
    	}

    	$("#btnGuardarPeriodosEscolares").removeProp("resultado");
        
    });


    


});