<?php
    include 'conexion.php';

   	
	$respuesta="";
	$resultadohtml="";
	
	

	 
	 		$query = "select * from marca";
				$datos = mysqli_query($conn, $query);
				$resultadohtml .="<table id='tabla-marcas' class='table table-striped'>";
				$resultadohtml .="<tr><td>Id</td><td>Nombre</td><td>Editar</td><td>Eliminar</td>";
				while  ($fila= mysqli_fetch_array($datos)){
				$resultadohtml .= "<tr id=".$fila["id_marca"]."><td >".$fila ["id_marca"]."</td>";
				$resultadohtml .="<td>".$fila ["descripcion_marca"]."</td>";
				$resultadohtml .= " <td><a class='btneditar btn btn-info' data-toggle='modal' data-target='#modalEditar'>Editar</a></td>";
                $resultadohtml .= " <td><a class='btneliminar btn btn-danger' data-toggle='modal' data-target='#modalEliminar'>Eliminar</a></td>";
				}
				$resultadohtml .="</table>";
	 
				$respuesta="ok";
	 
	 

mysqli_close($conn);



echo json_encode(array("respuesta" => $respuesta, "resultadohtml" => $resultadohtml));


?>