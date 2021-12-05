<?php

require("conect.php");
if(isset($_GET["ID"])){
    $ID = $_GET["ID"];
    $sql = "SELECT * FROM trucks WHERE ID='$ID'";
    $truck = mysqli_query($connect, $sql);
    $value = mysqli_fetch_assoc($connect->query($sql));
    $blob = $value['foto'];
}

?>

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
  <link rel="stylesheet" href="../css/style.css">
  <title>Camiones</title>
</head>
<body>
    
    <?php 
    //echo''
    echo'<H2 class="center">'.$value['marca'].' '.$value['modelo'].'</H2>
    <p class="center"><img style="width: 500px; height:300px" src="data:image/jpeg;base64,'.base64_encode($blob).'" alt=""></p>
        <H4 class="left">Marca: '.$value['marca'].'<br>
        Modelo: '.$value['modelo'].'<br>
        Color: '.$value['color'].'<br>
        Comentario: '.$value['comentario'].'<br>
        Total de lavadoras: '.$value['lavadoras'].'<br>
        Valor total de la carga: '.$value['valor'].'<br>
        Peso total de la carga: '.$value['peso'].'<br>
        </H4>';
    ?>
</body>
</html>