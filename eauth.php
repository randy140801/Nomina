<?php
require('conect.php');

        $select = "SELECT * FROM empleados WHERE cedula='$_POST[usuario]' and cedula='$_POST[clave]'";
        $row = mysqli_fetch_assoc($connect->query($select));
       if($row['Id'] > 0){
        setcookie("Id", $row['Id']);   
        redirect('empleados/perfil.php');
       }
       else{
           redirect('index.php');
       }

    function redirect($url){
        echo"
        <script>
        window.location = '{$url}';
        </script>
        ";
        exit();
    }
?>