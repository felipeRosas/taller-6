<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>taller 5</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script
			  src="https://code.jquery.com/jquery-3.3.1.js"
			  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
			  crossorigin="anonymous"></script>

    <style>
        body{background: #B2FEFA;  /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #0ED2F7, #B2FEFA);  /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #0ED2F7, #B2FEFA); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        }
    </style>
    
</head>
<body>
    <div class="container" >
        <div class="row">
            <div class="col-6 border border-dark p-5 mt-4">
                <form action="functions/datos.php" class="" method="POST" name="formulario1" id="formulario1">
                    <div class="form-group">
                        <label for="id-marca" >ID marca</label>
                        <input type="text" class="form-control" name="id-marca" id="id-marca">
                    </div>
                    <div class="form-group">
                        <label for="descripcion-marca">Descripción Marca</label>
                        <input type="text" class="form-control" name="descripcion-marca" id="descripcion-marca">
                    </div>
                    <div class="form-group">
                    <input type="button" value="enviar" id="btn-formulario1" class="btn btn-dark offset-lg-10">
                    </div>
                    
                </form>
            </div>

             <div class="col-6 border border-dark p-5 mt-4">
                <form action="functions/datosModelo.php" class="" method="POST" name="formulario2" id="formulario2">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-6">
                                <label for="">ID marca</label>
                                <select name="select-marca" class="form-control" id="select-marca">
                                    <option value="">seleccione</option>
                                    <?php
                                    include 'functions/conexion.php';
                                    $query ="select * from marca";
                                    $marcas = mysqli_query($conn,$query);
                                    while  ($fila= mysqli_fetch_array($marcas)){
                                    echo "<option value=".$fila["id_marca"].">".$fila["descripcion_marca"]."</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label for="">ID modelo</label>
                                <input type="text" name="id-modelo" class="form-control" id="id-modelo">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="descripcion-marca">Descripción Marca</label>
                        <input type="text" class="form-control" name="descripcion-marca2" id="descripcion-marca2" >
                    </div>
                    <div class="form-group">
                    <input type="button" value="enviar" id="btn-formulario2" class="btn btn-dark offset-lg-10">
                    </div>
                    
                </form>
            </div>
        </div>
        
        <div class="row mt-3">
            <div class="col-6" id="datos-marca">
                <?php
                include 'functions/conexion.php';
                $query = "select * from marca";
                $datos = mysqli_query($conn,$query);
                echo "<table id='tabla-marcas' class='table table-striped'>";
				echo "<tr><td>Id</td><td>Nombre</td>";
				while  ($fila= mysqli_fetch_array($datos)){
				echo "<tr><td>".$fila ["id_marca"]."</td>";
				echo "<td>".$fila ["descripcion_marca"]."</td>";

     
				}
				echo "</table>";
                ?>
            </div>

            <div class="col-6" id="datos-modelo">
                <?php
                include 'functions/conexion.php';
                $query = "select marca.id_marca,modelo.id_modelo,marca.descripcion_marca from modelo join marca on marca.id_marca=modelo.id_marca";
                $datos = mysqli_query($conn ,$query);
                echo "<table id='tabla-modelos' class='table table-striped'>";
				echo "<tr><td>Id marca</td><td>id Modelo</td><td>descripcion Marca</td>";
				while  ($fila= mysqli_fetch_array($datos)){
				echo "<tr><td>".$fila ["id_marca"]."</td>";
				echo "<td>".$fila ["id_modelo"]."</td>";
                echo "<td>".$fila ["descripcion_marca"]."</td></tr>";
     
				}
				echo "</table>";
                ?>
            </div>
        </div>
    </div>


    <script src="js/taller-5.js"></script>
   
</body>
</html>