$(document).ready(function(){

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