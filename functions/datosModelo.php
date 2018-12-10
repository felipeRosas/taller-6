<?php

include 'conexion.php';
$id_marca   = $_POST["select-marca"];
$id_modelo   = $_POST["id-modelo"];
$descripcion_marca = $_POST["descripcion-marca2"];



$query = "INSERT INTO modelo(id_marca,id_modelo,descripcion_marca)
            VALUES ('$id_marca','$id_modelo','$descripcion_marca')";

$resultado = mysqli_query($conn, $query);  
	
$respuesta="";
$resultadohtml="";

if($resultado==true){
	 
    $query = "select marca.id_marca,modelo.id_modelo,marca.descripcion_marca from modelo join marca on marca.id_marca=modelo.id_marca";
       $datos = mysqli_query($conn, $query);
       
       $resultadohtml .="<table id='tabla-modelos' class='table table-striped'>";
       $resultadohtml .="<tr><td>Id marca</td><td>id Modelo</td><td>descripcion Marca</td>";
       while  ($fila= mysqli_fetch_array($datos)){
       $resultadohtml .= "<tr><td>".$fila ["id_marca"]."</td>";
       $resultadohtml .= "<td>".$fila ["id_modelo"]."</td>";
       $resultadohtml .= "<td>".$fila ["descripcion_marca"]."</td>";
       

       }
       $resultadohtml .="</table>";

   $respuesta="ok";


}else{
    $respuesta="Error: " . mysqli_error($conn);
 
}
mysqli_close($conn);



echo json_encode(array("respuesta" => $respuesta, "resultadohtml" => $resultadohtml));


?>