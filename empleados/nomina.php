<?php 
require('CRUD.php');
if(!isset($_COOKIE["Id"])){
    redirect('../index.php');
    }
$ID = $_COOKIE["Id"];
$sql = "SELECT * FROM nomina";
$all = mysqli_query($connect, $sql);
$value = mysqli_fetch_assoc($connect->query($sql));



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
      <a href="nomina.php" class="brand-logo left" style="color: #000; margin-left:10%">Nomina</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="empleados.php">Empleados</a></li>
        <li class="header"><a href="vacaciones.php">Vacaciones</a></li>
        <li class="header"><a href="../signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
  <table style="background-color: white; border-radius: 10px">
    <tr>
      <th class="center">Nombre</th>
      <th class="center">Cedula</th>
      <th class="center">Sueldo</th>
      <th class="center">AFP</th>
      <th class="center">ARS</th>
      <th class="center">ISR</th>
      <th class="center">Cafeteria</th>
      <th class="center">Cooperativa</th>
      <th class="center">Sueldo neto</th>
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
            <td class="center">'.$char['Sueldo'].'</td>
            <td class="center">'.$char['AFP'].'</td>
            <td class="center">'.$char['ARS'].'</td>
            <td class="center">'.$char['ISR'].'</td>
            <td class="center">'.$char['Cafeteria'].'</td>
            <td class="center">'.$char['Cooperativa'].'</td>
            <td class="center">'.$char['Sueldo_neto'].'</td>
            <td class="center"><a href="NominaEdit.php?Id='.$char['Id_Empleado'].'"><i class="material-icons" style="color: #000">edit</i></a>
          </tr>';
            
      }
      ?>
  </table>
  </div>


</body>

</html>