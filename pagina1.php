<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>taller 5</title>
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <script src="js/jquery-3.3.1.js"></script>
  <script src="js/bootstrap.min.js"></script>

    <style>
        body{
            /* background: #B2FEFA;  fallback for old browsers */
            /* background: -webkit-linear-gradient(to right, #0ED2F7, #B2FEFA);  Chrome 10-25, Safari 5.1-6 */
            /* background: linear-gradient(to right, #0ED2F7, #B2FEFA); W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background:#6dd5ed;
            color:withe;
        }
    </style>

    <link href="toast/toastr.min.css" rel="stylesheet"> 
   <script src="toast/toastr.min.js"></script>
    
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
                <!-- <?php
                // include 'functions/conexion.php';
                // $query = "select * from marca";
                // $datos = mysqli_query($conn,$query);
                // echo "<table id='tabla-marcas' class='table table-striped'>";
				// echo "<tr><td>Id</td><td>Nombre</td><td>Editar</td><td>Eliminar</td></tr>";
				// while  ($fila= mysqli_fetch_array($datos)){
				// echo "<tr><td>".$fila ["id_marca"]."</td>";
                // echo "<td>".$fila ["descripcion_marca"]."</td>";
                // echo "<td><a class='btneditar btn btn-info' data-toggle='modal' data-target='#modalEditar'>Editar</a></td>";
                // echo "<td><button class='btn btn-danger btn-sm'><a href=''>Borrar</a></button></td>";

     
				// }
				// echo "</table>";
                ?> -->
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


    <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Editar Datos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
        <label for="id_marca">id_marca</label>
        <input type="text" readonly class="form-control" id="id_marcaedit" >

    </div>
    <div class="form-group">
        <label for="">Descripcion </label>
        <input type="text" class="form-control" id="descripcionedit" >
    </div>
    
        <div class="form-group">
        
    </div>
        </div>
        <div class="modal-footer">

            <button type="button" id="btnModificar" class="btn btn-primary">Save </button>
            <button type="button" class="btn btn-secondary" >Close</button>
        </div>
        </div>
    </div>
    </div>

    <script src="js/taller-5.js"></script>
   
</body>
</html>