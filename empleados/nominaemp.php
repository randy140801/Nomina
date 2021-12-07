<?php 
error_reporting(0);
require('CRUD.php'); 
if(!isset($_COOKIE["Id"]))
{
  redirect('../index.php');
}

if (isset($_COOKIE["Id"])) {
  $ID = $_COOKIE["Id"];
  $sql = "SELECT * FROM nomina WHERE Id_Empleado='$ID'";
  $data = mysqli_query($connect, $sql);
  $char = mysqli_fetch_assoc($data);

  $sql1 = "SELECT * FROM empleados WHERE Id='$ID'";
  $data1 = mysqli_query($connect, $sql1);
  $emp = mysqli_fetch_assoc($data1);
  $blob = $emp['foto'];
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
        <li class="header"><a href="perfil.php">Perfil</a></li>
        <li class="header"><a href="VacacionesEmp.php">Vacaciones</a></li>
        <li class="header"><a href="../signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
  <div class="row">
  <div class="col s6">
  <div class="card" style="padding-top: 6.2%;">
    <div class="row">
    <div class="center">
              <div class="profile">
                  <div class="avatar">
                      <div class="img"
                          style="background-image:url(<?php echo ($emp['foto'] != "") ? 'data:image/jpeg;base64,'.base64_encode( $blob ).'' : 'http://cdn.onlinewebfonts.com/svg/img_569204.png'?>)">
                      </div>
                  </div>
              </div>
          </div>
          <div class="row">
              <div class="center">
                <h5>Sueldo Base: RD$<?php echo $char['Sueldo']?></h5>
                <h5>Sueldo Neto: RD$<?php echo $char['Sueldo_neto']?></h5>
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
              <h5 style="margin-left: 3%;">AFP: RD$<?php echo $char['AFP']?></h5>
            </div>
        </div>
        <div class="row">
            <div class="left-align">
              <h5 style="margin-left: 3%;">ARS: RD$<?php echo $char['ARS']?></h5>
            </div>
        </div>
        <div class="row">
            <div class="left-align">
              <h5 style="margin-left: 3%;">ISR: RD$<?php echo $char['ISR']?></h5>
            </div>
        </div>
        <div class="row">
            <div class="left-align">
              <h5 style="margin-left: 3%;">Cafeteria: RD$<?php echo $char['Cafeteria']?></h5>
            </div>
        </div>
        <div class="row">
            <div class="left-align">
              <h5 style="margin-left: 3%;">Cooperativa: RD$<?php echo $char['Cooperativa']?></h5>
            </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>


</body>
</html>