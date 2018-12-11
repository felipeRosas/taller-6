<?php
    include 'conexion.php';
	 $id_marca=$_GET['id_marcaeliminar'];
     
   
	
	

$query= "DELETE from marca WHERE id_marca='$id_marca'";
   var_dump($query);

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
