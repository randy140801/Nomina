<?php 
error_reporting(0);
require('CRUD.php'); 
if(!isset($_COOKIE["Id"]))
{
  redirect('../index.php');
}

$ID = $_COOKIE["Id"];
$sql = "SELECT * FROM empleados WHERE Id='$ID'";
$data = mysqli_query($connect, $sql);
$char = mysqli_fetch_assoc($data);

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
      <a href="Nomina.php" class="brand-logo center" style="color: #000;">Nomina</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="vacacionesemp.php">Volver</a></li>
        <li class="header"><a href="../signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
    <div class="card">
        
  <div class="row">
    <form class="col s12" action="evaluateVac.php?ID='.$char['ID'].'" method="POST" enctype="multipart/form-data">
    <input hidden type="text" name="ID" value="<?php echo $char["Id"];?>">
    <input hidden type="text" name="Dias_Vacaciones" value="14">
    <div class="row">
        <div class="center">
            <h4>Dias de vacaciones restantes: <?php echo $char['Dias_Vacaciones']?></h4>
        </div>
        <div class="row">
            <div class="input-field col s6">
              <input name="Fecha_inicio" id="Fecha_inicio" type="date" class="validate"  value="<?php echo $emp["Nombre"], " ", $emp["Fecha_inicio"]?>">
              <label for="Fecha_inicio">Fecha de inicio</label>
            </div>
            <div class="input-field col s6">
              <input name="Fecha_final" id="Fecha_final" type="date" class="validate"  value="<?php echo $emp["Fecha_final"];?>">
              <label for="Fecha_final">Fecha final</label>
            </div>
            
        </div>
      <div class="row">
          <div class="center">
            <button class="btn waves-effect waves-light reset" type="reset" name="action" style="margin-right: 5px;">Limpiar</button>
            <button class="btn waves-effect waves-light save" type="submit" name="action">Guardar</button>
            </div>
      </div>
    </form>
  </div>
</div>
</div>
<script id="rendered-js">
        (() => {
            document.querySelector("#file-uploader").addEventListener("change", e => {
                const image = e.target.files[0];
                const imageURL = URL.createObjectURL(image);
                document.querySelector(".profile .img").
                style.backgroundImage = ` url("${imageURL}")`;
            });
        })();
    </script>
</body>
</html>

