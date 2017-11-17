$(document).ready(function()
{
   
   var base_url = $("body").attr("data-base-url");

   validaDatosMaterias();


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
				nombre_completo_materia:$("#txtNombreMateria").val(),
				nombre_abreviado_materia:$("#txtNombreMateriaAbreviado").val(),
				
			}

			//console.log(datosCarrera);

			$.ajax(
			{
	          type: "POST",
	          dataType:"json",
	          url: base_url+"Materias/guardarMaterias",
	          data: datosMateria,
	          async: true,
	          success: function(result)
		          {
					
					if( typeof(result.redirect) == 'undefined')
                    {
                    	$('#modalAlerta .modal-body').text(result.mensaje);
                    	$('#modalAlerta').modal('show');
                    	if(result.resultado == 'OK')
                    	{
                    		$("#btnGuardarMateria").prop("resultado",result.resultado);
                    		
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
    	if($("#btnGuardarMateria").prop("resultado") =='OK')
    	{
    		location.reload();
    	}

    	$("#btnGuardarMateria").removeProp("resultado");
        
    });


    


});