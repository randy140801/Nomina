<?php 
error_reporting(0);
require('CRUD.php'); 
if(!isset($_COOKIE["Id"]))
{
  redirect('../index.php');
}

if (isset($_COOKIE["Id"])) {
  $ID = $_COOKIE["Id"];
  $sql = "SELECT * FROM empleados WHERE Id='$ID'";
  $data = mysqli_query($connect, $sql);
  $char = mysqli_fetch_assoc($data);
  $blob = $char['foto'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Nomina</title>
</head>
<body>
    
<nav class="header">
    <div class="nav-wrapper">
      <a href="empleados.php" class="brand-logo center" style="color: #000;">Empleados</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="NominaEmp.php">Nomina</a></li>
        <li class="header"><a href="VacacionesEmp.php">Vacaciones</a></li>
        <li class="header"><a href="../signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
  <div class="row">
  <div class="col s6">
  <div class="card">
    <div class="row">
      <div class="center">
              <div class="profile">
                  <div class="avatar">
                      <div class="img"
                          style="background-image:url(<?php echo ($char['foto'] != "") ? 'data:image/jpeg;base64,'.base64_encode( $blob ).'' : 'http://cdn.onlinewebfonts.com/svg/img_569204.png'?>)">
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="center">
                <h5><?php echo $char['Nombre'], ' ', $char['Apellido']?></h5>
              </div>
          </div>
          <div class="row">
              <div class="center" style="margin-bottom: 4%;">
                <h5><?php echo $char['Cedula']?></h5>
              </div>
          </div>
    </div>
  </div>
  </div>
  <div class="col s6">
    <div class="card">
      <div class="row">
        <div class="row">
            <div class="left-align">
              <h6 style="margin-left: 3%;">Cargo: <?php echo $char['Puesto_Trabajo']?></h6>
            </div>
        </div>
        <div class="row">
            <div class="left-align">
              <h6 style="margin-left: 3%;">Correo: <?php echo $char['Correo']?></h6>
            </div>
        </div>
        <div class="row">
            <div class="left-align">
              <h6 style="margin-left: 3%;">Telefono: <?php echo $char['Telefono']?></h6>
            </div>
        </div>
        <div class="row">
            <div class="left-align">
              <h6 style="margin-left: 3%;">Direccion: <?php echo $char['Direccion']?></h6>
            </div>
        </div>
        <div class="row">
            <div class="left-align">
              <h6 style="margin-left: 3%;">Fecha de nacimiento: <?php echo $char['Fecha_Nacimiento']?></h6>
            </div>
        </div>
        <div class="row">
            <div class="left-align">
              <h6 style="margin-left: 3%;">Fecha de ingreso: <?php echo $char['Fecha_Ingreso']?></h6>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>

</body>
</html>