<?php 
error_reporting(0);
require('CRUD.php'); 
if (isset($_GET['ID'])) {
  $ID = $_GET['ID'];
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
        <li class="header"><a href="empleados.php">Volver</a></li>
        <li class="header"><a href="signout.php">Cerrar sesion</a></li>
      </ul>
    </div>
  </nav>

<div class="container">
    <div class="card">
        
  <div class="row">
    <form class="col s12" action="evaluate.php?ID='.$char['ID'].'" method="POST" enctype="multipart/form-data">
    <div class="center">
            <div class="profile">
                <div class="avatar">
                    <input id="file-uploader" type="file" name="foto" value="">
                    <div class="img"
                        style="background-image:url(<?php echo ($char['foto'] != "") ? 'data:image/jpeg;base64,'.base64_encode( $blob ).'' : 'http://cdn.onlinewebfonts.com/svg/img_569204.png'?>)">
                    </div>
                    <label class="avatar-selector" for="file-uploader"><i class="fa fa-camera"></i></label>
                </div>
            </div>
        </div>
    <input hidden type="text" name="ID" value="<?php echo $char["Id"];?>">
    <input hidden type="text" name="Dias_Vacaciones" value="14">
    <div class="row">
            <div class="input-field col s6">
              <input name="Nombre" id="Nombre" type="text" class="validate" value="<?php echo $char["Nombre"];?>">
              <label for="Nombre">Nombre</label>
            </div>
            <div class="input-field col s6">
              <input name="Apellido" id="Apellido" type="text" class="validate" value="<?php echo $char["Apellido"];?>">
              <label for="Apellido">Apellido</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s4">
              <input name="Fecha_Nacimiento" id="Fecha_Nacimiento" type="date" class="validate" value="<?php echo $char["Fecha_Nacimiento"];?>">
              <label for="Fecha_Nacimiento">Fecha de nacimiento</label>
            </div>
            <div class="input-field col s4">
              <input name="Cedula" id="Cedula" type="text" class="validate" value="<?php echo $char["Cedula"];?>">
              <label for="Cedula">Cedula</label>
            </div>
            <div class="input-field col s4">
              <input name="Puesto_Trabajo" id="Puesto_Trabajo" type="text" class="validate" value="<?php echo $char["Puesto_Trabajo"];?>">
              <label for="Puesto_Trabajo">Puesto de trabajo</label>
            </div>
        </div>
        <div class="row">
            <div class="input-field col s6">
              <input name="Direccion" id="Direccion" type="text" class="validate" value="<?php echo $char["Direccion"];?>">
              <label for="Direccion">Direccion</label>
            </div>

        </div>
      <div class="row">
            <div class="input-field col s4">
              <input name="Correo" id="Correo" type="text" class="validate" value="<?php echo $char["Correo"];?>">
              <label for="Correo">Correo electronico</label>
            </div>
            <div class="input-field col s4">
              <input name="Telefono" id="Telefono" type="text" class="validate" value="<?php echo $char["Telefono"];?>">
              <label for="Telefono">Telefono</label>
            </div>
            <div class="input-field col s4">
              <input name="Fecha_Ingreso" id="Fecha_Ingreso" type="date" class="validate" value="<?php echo $char["Fecha_Ingreso"];?>">
              <label for="Fecha_Ingreso">Fecha de ingreso</label>
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