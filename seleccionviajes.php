<?php
    include 'conexion.php';

    $consulta=mysqli_query($conexion,"SELECT ID_Destino, Nombre FROM destinos");
?>

<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Viajes
Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.css">
<!--Estilos personalizados-->
<link rel="stylesheet" href="css/estilos.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.js" integrity="sha256-BTlTdQO9/fascB1drekrDVkaKd9PkwBymMlHOiG+qLI=" crossorigin="anonymous"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<title>Viajes</title>
</head>
    <body>
        <header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href="#">Adventure Tours</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item active">  
            <a class="nav-link" href="#">Ingreso por Viajes <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="seleccionsolicitudes.php">Solicitudes de Viajes</a>
            </li> 
            </ul>
          </div>
        </nav>
        </header>

        <main>
            <div class="container">
                <div class="row mt-3">
                  <div class="col">
                      <br>
                      <br>
                      <br>
                      <h2 class="d-flex justify-content-center mb-3">Ingresos Por Viaje</h2>
                      <form id="procesar-registro" action="seleccionviajes.php" method="POST">
                          <div class="form-group row">
                              <label for="fecha" class="col-12 col-md-2 col-form-label h2">Seleccione Viaje :</label>
                              <div class="col-12 col-md-10">
                                <select class="form-control" name="lugares" onchange='submit()'>

                                    <?php 
                                    
                                    while($datos = mysqli_fetch_array($consulta))
                                    {
                                    
                                    echo "<option value='" .$datos['ID_Destino']."' "; 
                                    if($_POST['lugares']==$datos['ID_Destino'])
                                    echo " SELECTED ";
                                    echo ">";                                    
                                    echo $datos['Nombre'];
                                    echo "</option>";
                                    }
                                    ?>
                                  </select>
                              </div>
                          </div>
<br>
<br>
<br>
<br>
                          <table class="table table-striped table-bordered" id="listado">
                                <thead>
                                  <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">DUI</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Dirección</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Fecha Reservación</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $lugar=$_POST['lugares'];

                                    $seleccion=mysqli_query($conexion,"SELECT * FROM reservaciones WHERE ID_Destino = '$lugar'") or die (mysqli_error($conexion));
                                    

                                    while($ingresos = mysqli_fetch_array($seleccion))
                                    { 
                                    ?>
                                  <tr>
                                    <td><?php echo $ingresos['Nombre_Completo'] ?></td>
                                    <td><?php echo $ingresos['DUI'] ?></td>
                                    <td><?php echo $ingresos['Correo'] ?></td>
                                    <td><?php echo $ingresos['Direccion'] ?></td>
                                    <td><?php echo $ingresos['Telefono'] ?></td>
                                    <td><?php echo $ingresos['Fecha_Reserva'] ?></td>
                                  </tr>
                                  <?php
                                    }
                                  ?>
                                </tbody>
                              </table>
                      </form>
            
            
                  </div>
                </div>
              </div>
        </main>

        <script type="text/javascript">
            $(document).ready( function () {
                $('#listado').DataTable();
            } );
            </script>
    </body>
</html>