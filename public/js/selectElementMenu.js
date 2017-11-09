$(document).ready(function()
{
   
      $("body .sidebar a[href='"+window.location.href.replace("#","")+"']").closest("ul").siblings().closest("ul").siblings().click();
      $("body .sidebar a[href='"+window.location.href.replace("#","")+"']").closest("ul").siblings().click();
      $("body .sidebar a[href='"+window.location.href.replace("#","")+"']").addClass('selecionado');
   
});