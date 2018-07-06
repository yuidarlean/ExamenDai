$(document).ready(function(){
   $("#frmNuevaMuestra").validate({
       rules:{
           txtCodigoCliente:{
               required: true
           },
           txtFechaRecepcion:{
               required: true
           },
           txtTemperatura:{
               required: true,
               maxlength: 4,
               number: true
           },
           txtCantidad:{
               required: true,
               maxlength: 3,
               number: true
           }
       },
       messages:{
           txtCodigoCliente:{
               required: "C&oacute;digo es obligatorio."
           },
           txtFechaRecepcion:{
               required: "Fecha obligatoria."
           },
           txtTemperatura:{
               required: "Campo obligatorio.",
               maxlength: "3 d&iacute;gitos como m&aacute;ximo.",
               number: "Debe ingresar solo n&uacute;meros."
           },
           txtCantidad:{
               required: "Campo obligatorio.",
               maxlength: "3 d&iacute;gitos como m&aacute;ximo.",
               number: "Debe ingresar solo n&acute;meros."
           }
       }
   }) 
});

