<?php 
require('CRUD.php');
if(!isset($_COOKIE["Id"])){
    redirect('../index.php');
    }
$ID = $_COOKIE["Id"];
$sql = "SELECT * FROM vacaciones WHERE Estado='pendiente'";
$all = mysqli_query($connect, $sql);
$value = mysqli_fetch_assoc($connect->query($sql));

$sql1 = "SELECT * FROM vacaciones WHERE Estado='aprobado'";
$all1 = mysqli_query($connect, $sql1);
$value1 = mysqli_fetch_assoc($connect->query($sql1));

$sql2 = "SELECT * FROM vacaciones WHERE Estado='rechazado'";
$all2 = mysqli_query($connect, $sql2);
$value2 = mysqli_fetch_assoc($connect->query($sql2));

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
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Yomogi&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <title>Nomina</title>
</head>

<body>

  <nav class="header">
    <div class="nav-wrapper">
      <a href="nomina.php" class="brand-logo left" style="color: #000; margin-left:10%">Vacaciones</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="empleados.php">Empleados</a></li>
        <li class="header"><a href="nomina.php">Nomina</a></li>
        <li class="header"><a href="../signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
    <h3 class="center" style="color: white">Solicitudes pendientes</h3>
    <?php if(!empty($value)){ ?>
  <table style="background-color: white; border-radius: 10px">
    <tr>
      <th class="center">Nombre</th>
      <th class="center">Cedula</th>
      <th class="center">Fecha de inicio</th>
      <th class="center">Fecha final</th>
      <th class="center">Dias restantes</th>
      <th class="center">Estado</th>
      <th class="center">Acciones</th>
    </tr>
    <?php
    
      foreach($all as $char)
      {
            $sql1 = "SELECT * FROM empleados WHERE Id='$char[Id_Empleado]'";
            $data = mysqli_query($connect, $sql1);
            $emp = mysqli_fetch_assoc($data);
            echo' <tr>
            <td class="center">'.$emp['Nombre'].' '.$emp['Apellido'].'</td>
            <td class="center">'.$emp['Cedula'].'</td>
            <td class="center">'.$char['Fecha_inicio'].' </td>
            <td class="center">'.$char['Fecha_final'].'</td>
            <td class="center">'.$emp['Dias_Vacaciones'].'</td>
            <td class="center">'.$char['Estado'].'</td>
            <td class="center"><a href="aprobar.php?ID='.$char['Id'].'"><i class="material-icons" style="color: green; font-size: 32px">check_circle</i></a>
            <a href="rechazar.php?ID='.$char['Id'].'"><i class="material-icons" style="color: red; font-size: 32px">cancel</i></a></td>
          </tr>';
            
      }
    }
    else
    {
        echo'
        <div class="center">
        <div class="notrucks">No haz solicitado vacaciones por el momento. Intentalo ahora!.</div>
        </div>
        ';
    }
      ?>
  </table>
  </div>




  <div class="container">
    <?php if(!empty($value1)){ ?>
        <h3 class="center" style="color: white">Solicitudes aprobadas</h3>
  <table style="background-color: white; border-radius: 10px">
    <tr>
      <th class="center">Nombre</th>
      <th class="center">Cedula</th>
      <th class="center">Fecha de inicio</th>
      <th class="center">Fecha final</th>
      <th class="center">Dias restantes</th>
      <th class="center">Estado</th>
    </tr>
    <?php
      foreach($all1 as $char)
      {
            $sql1 = "SELECT * FROM empleados WHERE Id='$char[Id_Empleado]'";
            $data = mysqli_query($connect, $sql1);
            $emp = mysqli_fetch_assoc($data);
            echo' <tr>
            <td class="center">'.$emp['Nombre'].' '.$emp['Apellido'].'</td>
            <td class="center">'.$emp['Cedula'].'</td>
            <td class="center">'.$char['Fecha_inicio'].' </td>
            <td class="center">'.$char['Fecha_final'].'</td>
            <td class="center">'.$emp['Dias_Vacaciones'].'</td>
            <td class="center">'.$char['Estado'].'</td>
          </tr>';
            
      }
    }
    else
    {

    }
      ?>
  </table>
  </div>



  <div class="container">
    <?php if(!empty($value2)){ ?>
        <h3 class="center" style="color: white">Solicitudes rechazadas</h3>
  <table style="background-color: white; border-radius: 10px">
    <tr>
      <th class="center">Nombre</th>
      <th class="center">Cedula</th>
      <th class="center">Fecha de inicio</th>
      <th class="center">Fecha final</th>
      <th class="center">Dias restantes</th>
      <th class="center">Estado</th>
    </tr>
    <?php
      foreach($all2 as $char)
      {
            $sql1 = "SELECT * FROM empleados WHERE Id='$char[Id_Empleado]'";
            $data = mysqli_query($connect, $sql1);
            $emp = mysqli_fetch_assoc($data);
            echo' <tr>
            <td class="center">'.$emp['Nombre'].' '.$emp['Apellido'].'</td>
            <td class="center">'.$emp['Cedula'].'</td>
            <td class="center">'.$char['Fecha_inicio'].' </td>
            <td class="center">'.$char['Fecha_final'].'</td>
            <td class="center">'.$emp['Dias_Vacaciones'].'</td>
            <td class="center">'.$char['Estado'].'</td>
          </tr>';
            
      }
    }
    else
    {
        
    }
      ?>
  </table>
  </div>


</body>

</html>