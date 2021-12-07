<?php
require('../conect.php');
function add(){
    require('../conect.php');
    $file = $_FILES['foto']['tmp_name'];
        if (is_uploaded_file($file)) {
            $imgData = addslashes(file_get_contents($file));
            
            $ad = "INSERT INTO empleados VALUES('','$_POST[Nombre]','$_POST[Apellido]','$_POST[Fecha_Nacimiento]','$_POST[Cedula]','$_POST[Direccion]','$_POST[Telefono]','$_POST[Puesto_Trabajo]','$_POST[Correo]','$_POST[Fecha_Ingreso]','$_POST[Dias_Vacaciones]','$imgData')";
            if ($connect->query($ad)){
                $AFP = AFP($_POST['Sueldo']);
                $ARS = ARS($_POST['Sueldo']);
                $ISR = ISR($_POST['Sueldo']);
                $sueldoneto = SueldoNeto($_POST['Sueldo'],$AFP, $ARS, $ISR, 0, 0, 0);
                
                $lastemp = "SELECT * FROM empleados ORDER BY Id DESC LIMIT 1";
                $all = mysqli_query($connect, $lastemp);
                $empid = 0;
                foreach($all as $emp){
                $empid = $emp['Id'];
                }
                $calc = "INSERT INTO nomina VALUES('',$empid,'$_POST[Sueldo]','$AFP','$ARS','$ISR','0','0','0','$sueldoneto')";
                if ($connect->query($calc))
                {
                    redirect('empleados.php');
                }
                else
                {
                    echo'ERROR';
                }
            }
            else {
                redirect('AddEdit.php');
            }
            mysqli_close($connect);
        }
        else {
            $message = "Debe seleccionar una imagen para el empleado";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect('AddEdit.php');
        }
}


function edit($id){
    require('../conect.php');
    if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
        $sql = "UPDATE empleados SET Nombre='$_POST[Nombre]',Apellido='$_POST[Apellido]',Fecha_Nacimiento='$_POST[Fecha_Nacimiento]',Cedula='$_POST[Cedula]',Direccion='$_POST[Direccion]',Telefono='$_POST[Telefono]',Puesto_Trabajo='$_POST[Puesto_Trabajo]',Correo='$_POST[Correo]',Fecha_Ingreso='$_POST[Fecha_Ingreso]',Dias_Vacaciones='$_POST[Dias_Vacaciones]',foto='$imgData' WHERE ID='$id'";
        $char = mysqli_query($connect, $sql);
        if ($char) {
            redirect('empleados.php');
        }
        else {
            echo'ERROR'.$connect->error;
        }
    }
    else {
        $sql = "UPDATE empleados SET Nombre='$_POST[Nombre]',Apellido='$_POST[Apellido]',Fecha_Nacimiento='$_POST[Fecha_Nacimiento]',Cedula='$_POST[Cedula]',Direccion='$_POST[Direccion]',Telefono='$_POST[Telefono]',Puesto_Trabajo='$_POST[Puesto_Trabajo]',Correo='$_POST[Correo]',Fecha_Ingreso='$_POST[Fecha_Ingreso]',Dias_Vacaciones='$_POST[Dias_Vacaciones]' WHERE ID='$id'";
        $char = mysqli_query($connect, $sql);
        if ($char) {
            redirect('empleados.php');
        }
        else {
            echo'ERRRRRRRROR'.$connect->error;
        }
    }
}

function delete($id){
    require('../conect.php');
    $sql = "DELETE FROM empleados WHERE ID='$id'";
    $char = mysqli_query($connect, $sql);
    /*$washers = "SELECT * FROM washingmachines WHERE IDtruck='$id'";
    $washers = mysqli_query($connect, $washers);
    foreach($washers as $val){
        $sql = "DELETE FROM washingmachines WHERE IDtruck='$val[IDtruck]'";
        $char = mysqli_query($connect, $sql);
    }*/
    if ($char) {
        redirect('empleados.php');
    }
    else {
        echo'ERROR'.$connect->error;
    }
}

function ARS($sueldo)
{
    $AFP = $sueldo * 0.0304;
    return $AFP;
}

function ISR($sueldo)
{
    if($sueldo >= 34106 && $sueldo <= 52027)
    {
        $sueldoanual = $sueldo * 12;
        $sueldoanual = $sueldoanual * 0.15;
        $sueldoISR = $sueldoanual / 12;
        return $sueldoISR;
    }

    if($sueldo >= 52027 && $sueldo <= 72260)
    {
        $sueldoanual = $sueldo * 12;
        $sueldoanual = $sueldoanual * 0.20;
        $sueldoISR = $sueldoanual / 12;
        return $sueldoISR;
    }

    if($sueldo >= 72260)
    {
        $sueldoanual = $sueldo * 12;
        $sueldoanual = $sueldoanual * 0.25;
        $sueldoISR = $sueldoanual / 12;
        return $sueldoISR;
    }

    return 0;
}

function SueldoNeto($sueldo, $AFP, $ARS, $IRS, $Cafeteria, $Cooperativa)
{
    $sueldoneto = $sueldo - $AFP - $ARS - $IRS - $Cafeteria - $Cooperativa;
    return $sueldoneto;
}

function Nominaedit($id)
{
    require('../conect.php');
    $AFP = AFP($_POST['Sueldo']);
    $ARS = ARS($_POST['Sueldo']);
    $ISR = ISR($_POST['Sueldo']);
    $sueldoneto = SueldoNeto($_POST['Sueldo'],$AFP, $ARS, $ISR, $_POST['Cafeteria'], $_POST['Cooperativa']);

    $sql = "UPDATE nomina SET Sueldo='$_POST[Sueldo]',AFP=$AFP,ARS=$ARS,ISR=$ISR,Cafeteria='$_POST[Cafeteria]',Cooperativa='$_POST[Cooperativa]',Sueldo_neto=$sueldoneto WHERE ID='$id'";
        $char = mysqli_query($connect, $sql);
        if ($char) {
            redirect('empleados.php');
        }
        else {
            echo'ERRRRRRRROR'.$connect->error;
        }
}

function VacacionesADD($id)
{
    require('../conect.php');
    $sql = "SELECT * FROM empleados WHERE Id='$id'";
    $data = mysqli_query($connect, $sql);
    $emp = mysqli_fetch_assoc($data);

    $dias_vacaciones = $emp['Dias_Vacaciones'];
    
    $date1 = new DateTime($_POST['Fecha_inicio']);
    $date2 = new DateTime($_POST['Fecha_final']);
    $diff = $date1->diff($date2);


    if($diff->days <= $dias_vacaciones)
    {
        $ad = "INSERT INTO vacaciones VALUES('','$id','$_POST[Fecha_inicio]','$_POST[Fecha_final]', 'pendiente')";
        $char = mysqli_query($connect, $ad);
        if ($char) {
            redirect('vacacionesemp.php');
        }
        else {
            $message = "Ha surgido un inconveniente";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect('vacacionesemp.php');
        }
    }
    else
    {
        $message = "La cantidad de dias seleccionados sobrepasa la cantidad de dias disponibles de vacaciones";
        echo "<script type='text/javascript'>alert('$message');</script>";
        redirect('solicitar.php');
    }
}

function aprobar($id)
{
    require('../conect.php');
    $sql = "SELECT * FROM vacaciones WHERE Id='$id'";
    $data = mysqli_query($connect, $sql);
    $char = mysqli_fetch_assoc($data);

    $idempleado = $char['Id_Empleado'];
    
    $sql = "SELECT * FROM empleados WHERE Id='$idempleado'";
    $data = mysqli_query($connect, $sql);
    $emp = mysqli_fetch_assoc($data);

    $dias_vacaciones = $emp['Dias_Vacaciones'];
    
    $date1 = new DateTime($char['Fecha_inicio']);
    $date2 = new DateTime($char['Fecha_final']);
    $diff = $date1->diff($date2);

    
    if($diff->days <= $dias_vacaciones)
    {
        $sql = "UPDATE vacaciones SET Estado='aprobado' WHERE Id='$id'";
        $char = mysqli_query($connect, $sql);
        $diasrestantes = $dias_vacaciones-$diff->days;

        if ($char) {
            $sql = "UPDATE empleados SET Dias_Vacaciones=$diasrestantes WHERE Id='$idempleado'";
            $char = mysqli_query($connect, $sql);
            redirect('vacaciones.php');
        }
        else {
            $message = "Este empleado excede la cantidad de dias disponibles de sus vacaciones";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect('vacaciones.php');
        }
    }
    else
    {
        $message = "Este empleado excede la cantidad de dias disponibles de sus vacaciones";
        echo "<script type='text/javascript'>alert('$message');</script>";
        redirect('vacaciones.php');
    }
}

function rechazar($id)
{
    require('../conect.php');
    $sql = "UPDATE vacaciones SET Estado='rechazado' WHERE Id='$id'";
        $char = mysqli_query($connect, $sql);
        if ($char){
            redirect('vacaciones.php');
        }
        else {
            $message = "Ha surgido un inconveniente";
            echo "<script type='text/javascript'>alert('$message');</script>";
            redirect('vacaciones.php');
        }
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
