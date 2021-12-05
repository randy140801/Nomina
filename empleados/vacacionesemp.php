<?php 
require('CRUD.php');
if(!isset($_COOKIE["Id"])){
    redirect('../index.php');
    }
$ID = $_COOKIE["Id"];
$sql = "SELECT * FROM vacaciones WHERE Id_Empleado='$ID'";
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
        <li class="header"><a href="perfil.php">Perfil</a></li>
        <li class="header"><a href="solicitar.php">Solicitar</a></li>
        <li class="header"><a href="../signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
    <?php if(!empty($value)){ ?>
  <table style="background-color: white; border-radius: 10px">
    <tr>
      <th class="center">Fecha de inicio</th>
      <th class="center">Fecha final</th>
      <th class="center">Estado</th>
    </tr>
    <?php
    
      foreach($all as $char)
      {
            echo' <tr>
            <td class="center">'.$char['Fecha_inicio'].' </td>
            <td class="center">'.$char['Fecha_final'].'</td>
            <td class="center">'.$char['Estado'].'</td>
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


</body>

</html>