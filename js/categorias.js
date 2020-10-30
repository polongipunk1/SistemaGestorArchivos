function agregarCategoria(){
    var categoria = $('#nombreCategoria').val();
          if(categoria == ""){
              swal("Debes agregar una categoría");
              return false;
          }else{
              $.ajax({
                  type:"POST",
                  data:"categoria=" + categoria,
                  url:"../procesos/categorias/agregarCategoria.php",
                  success:function(respuesta){
                      respuesta = respuesta.trim();
                      if(respuesta == 1){
                        $('#nombreCategoria').val("");
                          swal("Categoría agregada con éxito","Se ha agregado una nueva categoría","success");
                      }else{
                          swal("Error al agregar categoría","Verifique los datos","error");
                      }
                  }
              });
          }
}