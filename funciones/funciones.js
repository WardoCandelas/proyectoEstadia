//Carga de modulos INDEX

  function avisos() {
  
  $.ajax({
            type: "POST",
            url: "expediente/expedientes",
            success: function(response) {
                $('#main-derecha').html(response);
                //$('#navbarCollapse').collapse('hide');
            }
       
        });
}

  function nuevoArchivo() {
    
    $.ajax({
              type: "POST",
              url: "expediente/expedientesListadoDetalle",
              success: function(response) {
                  $('#main-derecha').html(response);
                  //$('#navbarCollapse').collapse('hide');
              }
         
          });
  }


 function validarArchivo() {
    
    $.ajax({
              type: "POST",
              url: "archivo/validarArchivo",
              success: function(response) {
                  $('#main-derecha').html(response);
                  //$('#navbarCollapse').collapse('hide');
              }
         
          });
  }

//EXPEDIENTES
//Busqueda de Expedientes
    $("#buscarExpediente").submit(function(event) {
                var parametros = $(this).serialize();
                
                $.ajax({
                  type: "POST",
                  url: "buscador/buscarExpediente",
                  data: parametros,
                  beforeSend: function(objeto){
                    $("#main-derecha").html("Mensaje: Buscando...");
                  },
                  success: function(datos){
                    $("#main-derecha").html(datos);
              
            }
          });
                event.preventDefault();
              })


//DETALLE EXPEDIENTE
function detalleExpediente(id){
        //$('#delete_data').attr("disabled", true);
        

        $.ajax({
          type: "POST",
          url: "expediente/detalleExpediente",
          data: "id="+id,
          beforeSend: function(objeto){
            $("#expediente").html("Mensaje: Cargando...");
            
          },
          success: function(datos){
            $("#expediente").html(datos);
             //$('#delete_data').attr("disabled", true);
             //elementt.style.display='block';
                //$('#save_data1').attr("disabled", false);
                
              }
            });
        event.preventDefault();
    
 }

//Nuevo Expediente
 $("#nuevoExpediente").submit(function(event) {
                var parametros = $(this).serialize();
                
                $.ajax({
                  type: "POST",
                  url: "expediente/nuevoExpedienteAction",
                  data: parametros,
                  beforeSend: function(objeto){
                    $("#containerNuevoExpediente").html("Mensaje: Creando...");
                  },
                  success: function(datos){
                    $("#containerNuevoExpediente").html(datos);
                    $('#reinscripcionFormBoton').attr("disabled", true);
              
            }
          });
                event.preventDefault();
              })



 function nuevoExpediente() {
    
    $.ajax({
              type: "POST",
              url: "expediente/nuevoExpediente",
              success: function(response) {
                  $('#contenedorModal').html(response);
          
              }
         
          });
  }


//ARCHIVOS

//Detalle de Archivos 
 function detalleArchivosExpediente(id){

        $.ajax({
          type: "POST",
          url: "archivo/detalleArchivos",
          data: "id="+id,
          beforeSend: function(objeto){
            $("#main-derecha").html("Mensaje: Cargando...");
            
          },
          success: function(datos){
            $("#main-derecha").html(datos);
             //$('#delete_data').attr("disabled", true);
             //elementt.style.display='block';
                //$('#save_data1').attr("disabled", false);
                
              }
            });
        event.preventDefault();
    
 }



 //Nuevo Archivo Formulario
 function nuevoArchivoFormulario(id){

        $.ajax({
          type: "POST",
          url: "archivo/formularioArchivo",
          data: "id="+id,
          beforeSend: function(objeto){
            $("#contenedorModal").html("Mensaje: Cargando...");
            
          },
          success: function(datos){
            $("#contenedorModal").html(datos);
             //$('#delete_data').attr("disabled", true);
             //elementt.style.display='block';
                //$('#save_data1').attr("disabled", false);
                
              }
            });
        event.preventDefault();
    
 }
