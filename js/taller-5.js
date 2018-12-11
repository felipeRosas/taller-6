$(document).ready(function(){

    cargarTabla();

    function cargarTabla()
{
  $.ajax({
            type:"POST",
            url:"~/../functions/cargarMarcas.php",
            success: function(response){
     

			var datos = JSON.parse(response);
			
			if(datos.respuesta !="ok"){
				
					alert(datos.respuesta);
				
			}else{
				$("#datos-marca").html("");
			   $("#datos-marca").html(datos.resultadohtml); 
				
				   $(".btneditar").click(function(){
									$("#modalEditar").modal("show");
								 var id_marca = $(this).parents("tr").find("td")[0].innerHTML;
								 $("#id_marcaedit").val(id_marca);
								 
								  var descripcion = $(this).parents("tr").find("td")[1].innerHTML;
								 $("#descripcionedit").val(descripcion);
								 
								  

                        });
                    
                    $('.btneliminar').click(function(){
                        var id_marca = $(this).parents("tr").find("td")[0].innerHTML;
                        $("#id_marcaeliminar").val(id_marca);

                        var descripcion = $(this).parents("tr").find("td")[1].innerHTML;
								 $("#descripcioneliminar").val(descripcion);
                    });

			}
			
			
            }
        });


}


$("#btnModificar").click(function(){
		
    Modificar();

});

function Modificar(){
	
    var id_marca=$('#id_marcaedit').val();
    var descripcion=$('#descripcionedit').val();
    

 
    $.ajax({
            type:"GET",
            url:"~/../functions/modificarMarca.php",
            data: { 'id_marcaedit' : id_marca, 'descripcion_marcaedit':descripcion},
            datatype : "application/json",
            success: function(response){
            
            
            toastr.success("Registro Modificado");
            cargarTabla();
            $('#modalEditar').modal('hide');
            }   ,
            failure: function (response) {
                alert(response);
            
            }
        });

}

$("#btneliminar").click(function(){
    eliminar();
});

function eliminar(){
    var id_marca = $("#id_marcaeliminar").val();

    $.ajax({
        type:"GET",
        url:"~/../functions/eliminarMarca.php",
        data: { 'id_marcaeliminar' : id_marca},
        datatype : "application/json",
        success: function(response){
        
        
        toastr.success("Registro Modificado");
        cargarTabla();
        $('#modalEliminar').modal('hide');
        }   ,
        failure: function (response) {
            alert(response);
        
        }
    });
}

















    var formulario1 = $("#formulario1");
    var formulario2 = $("#formulario2");

    $("#btn-formulario1").click(function(){
        if(!validarIdMarca()){
            return;
        }
        if(!validarDescripcion()){
            alert("descripcion erronea");
            return;
        }
        $.ajax({
            type:"POST",
            url:formulario1.attr("action"),
            data:$("#formulario1 input").serialize(),//only input
            success: function(response){
     

			var datos = JSON.parse(response);
			
			if(datos.respuesta !="ok"){
				
					alert(datos.respuesta);
				
			}else{
				$("#datos-marca").html("");
                $("#datos-marca").html(datos.resultadohtml);
                $("#select-marca").html(datos.select);
				
				
			}
			
			
            }
        });
    });

    $("#btn-formulario2").click(function(){
        if(!validarIdModelo()){
            
            return;
        }
        if(!validardescripcionmodelo()){
          
            return;
        }

        var marca = $("#select-marca").val();
       // alert($("#formulario2 input").serialize()+'&select-marca='+marca);
       
        $.ajax({
            type:"POST",
            url:formulario2.attr("action"),
            data:$("#formulario2 input").serialize()+'&select-marca='+marca,
            success: function(response){
     

			var datos = JSON.parse(response);
			
			if(datos.respuesta !="ok"){
				
					alert(datos.respuesta);
				
			}else{
				$("#datos-modelo").html("");
			   $("#datos-modelo").html(datos.resultadohtml); 
				
				
			}
			
			
            }
        });
    });


    function validarIdMarca(){
       // return $('#id-marca').val().match(idmarca) ? true : false;
       var id = $("#id-marca");
       if(id.val() == ""){
        alert("id vacio");
        return false;
       }
       else 
       return true;
       
    }


    function validarDescripcion(){
        var validacion = "^[a-z A-Z]{1,50}$";
        var des =$("#descripcion-marca");

        return des.val().match(validacion) ? true : false;

        
    }

    function validarIdModelo(){
        // var validacion = "^[a-z A-Z0-9]{1,50}$";
         var modelo = $("#id-modelo");
        // return descripcion.val().match(validacion) ? true : false;
        if(modelo.val() == ""){
            alert("modelo vacio");
            return false;
        }
        return true;
     }

     function validardescripcionmodelo(){
         var des= $("#descripcion-marca2");
        if(des.val()==""){
            alert("descripcion vacia");
            return false;

        }
        return true;
     }
});