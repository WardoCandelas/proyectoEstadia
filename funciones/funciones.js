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


  function nuevoExpediente() {
    
    $.ajax({
              type: "POST",
              url: "archivo/nuevoExpediente",
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
    $("#buscar").submit(function(event) {
                var parametros = $(this).serialize();
                
                $.ajax({
                  type: "POST",
                  url: "buscador/buscarExpediente",
                  data: parametros,
                  beforeSend: function(objeto){
                    $("#expediente").html("Mensaje: Buscando...");
                  },
                  success: function(datos){
                    $("#expediente").html(datos);
              //load(1);
              
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
