<?php
    include 'conexion.php';
	 $id_marca=$_GET['id_marcaedit'];
     $descripcion_marca=$_GET['descripcion_marcaedit'];
   
	
	

$query= "UPDATE marca SET descripcion_marca = '$descripcion_marca'  WHERE id_marca='$id_marca'";
   

      $resultado = mysqli_query($conn, $query);  
	
	 $respuesta="";
	$resultadohtml="";
	
	
	  if($resultado==true){
	 
	 
	 
			$respuesta="ok";
	 
	 
	  }else{
		 	$respuesta="Error: " . mysqli_error($conn);
		  
	  }
mysqli_close($conn);



echo $respuesta;


?>
