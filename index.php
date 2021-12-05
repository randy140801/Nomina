<?php
if(isset($_COOKIE["ID"])){
    header("Location: trucks/trucks.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/auth.css">
    <title>Nomina</title>
</head>

<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="adminauth.php" method="POST">
			<h1>Inicia sesion</h1><br>
			<input name="usuario" type="text" placeholder="Usuario"/>
			<input name="clave" type="password" placeholder="Contraseña" /><br>
			<button type="submit">Iniciar sesion</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="eauth.php" method="POST">
			<h1>Inicia sesion</h1><br>
			<input name="usuario" type="text" placeholder="Usuario" />
			<input name="clave" type="password" placeholder="Contraseña" /><br>
			<button type="submit">Iniciar sesion</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>¿Eres empleado?</h1>
				<p>Si eres empleado, inicia sesion aqui con tus datos personales.</p>
				<button class="ghost" id="signIn">Inicia sesion</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>¿Eres admin?</h1>
				<p>Si eres admin, inicia sesion aqui con tus datos personales.</p>
				<button class="ghost" id="signUp">Inicia sesion</button>
			</div>
		</div>
	</div>
</div>


<script src="js/auth.js"></script>

</body>

</html>