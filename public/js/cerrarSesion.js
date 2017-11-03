$(document).ready(function()
{


  var base_url = $("body").attr("data-base-url");

  var url = "";

  if($("body").attr("data-id-rol") != undefined)
  {
      url = base_url+"PolizaDigitalCliente/cerrarSesion";
  }
  else
  {
      url = base_url+"Home/cerrarSesion";
  }

    $("#btnCerrarSesion").on("click",function()
    {

       $.ajax(
        {
              type: "POST",
              dataType: "json",
              url: url,
              data: "",
               async: true,
              success: function(result)
                  {
                    
                    if(!result.sesion)
                    {
                      location.href = result.base_url;
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


  