<?php

include 'conexion.php';

$id_marca   = $_POST["id-marca"];
$descripcion_marca = $_POST["descripcion-marca"];


$query = "INSERT INTO marca(id_marca,descripcion_marca)
            VALUES ('$id_marca','$descripcion_marca')";

$resultado = mysqli_query($conn, $query);  
	
$respuesta="";
$resultadohtml="";
$select = "<option value='' >seleccione</option>";

if($resultado==true){
	 
    $query = "select * from marca";
       $datos = mysqli_query($conn, $query);
       $resultadohtml .="<table id='tabla-marcas' class='table table-striped'>";
       $resultadohtml .="<tr><td>Id</td><td>Nombre</td>";

       while  ($fila= mysqli_fetch_array($datos)){
       $resultadohtml .= "<tr><td>".$fila ["id_marca"]."</td>";
       $resultadohtml .= "<td>".$fila ["descripcion_marca"]."</td>";
       $select        .="<option value=".$fila["id_marca"].">".$fila["descripcion_marca"]."</option>";

       }
       $resultadohtml .="</table>";

   $respuesta="ok";


}else{
    $respuesta="Error: " . mysqli_error($conn);
 
}
mysqli_close($conn);



echo json_encode(array("respuesta" => $respuesta, "resultadohtml" => $resultadohtml, "select" => $select));


?>