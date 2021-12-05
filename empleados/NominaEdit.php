<?php 
error_reporting(0);
require('CRUD.php'); 
if (isset($_GET['Id'])) {
  $ID = $_GET['Id'];
  $sql = "SELECT * FROM nomina WHERE Id_Empleado='$ID'";
  $data = mysqli_query($connect, $sql);
  $char = mysqli_fetch_assoc($data);

  $sql1 = "SELECT * FROM empleados WHERE Id='$ID'";
  $data = mysqli_query($connect, $sql1);
  $emp = mysqli_fetch_assoc($data);
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
      <a href="Nomina.php" class="brand-logo center" style="color: #000;">Nomina</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li class="header"><a href="nomina.php">Volver</a></li>
        <li class="header"><a href="signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
    <div class="card">
        
  <div class="row">
    <form class="col s12" action="Nominaevaluate.php?ID='.$char['ID'].'" method="POST" enctype="multipart/form-data">
    <input hidden type="text" name="ID" value="<?php echo $char["Id"];?>">
    <input hidden type="text" name="Dias_Vacaciones" value="14">
        <div class="row">
            <div class="input-field col s6">
              <input name="Nombre" id="Nombre" type="text" class="validate" disabled value="<?php echo $emp["Nombre"], " ", $emp["Apellido"]?>">
              <label for="Nombre">Nombre</label>
            </div>
            <div class="input-field col s6">
              <input name="Nombre" id="Nombre" type="text" class="validate" disabled value="<?php echo $emp["Cedula"];?>">
              <label for="Nombre">Cedula</label>
            </div>
            
        </div>
        <div class="row">
            <div class="input-field col s4">
              <input name="Sueldo" id="Sueldo" type="number" class="validate" value="<?php echo $char["Sueldo"];?>">
              <label for="Sueldo">Sueldo</label>
            </div>
            <div class="input-field col s4">
              <input name="Cafeteria" id="Cafeteria" type="text" class="validate" value="<?php echo $char["Cafeteria"];?>">
              <label for="Cafeteria">Cafeteria</label>
            </div>
            <div class="input-field col s4">
              <input name="Cooperativa" id="Cooperativa" type="text" class="validate" value="<?php echo $char["Cooperativa"];?>">
              <label for="Cooperativa">Cooperativa</label>
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