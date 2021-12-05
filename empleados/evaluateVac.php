<?php
require('CRUD.php');
if($_POST['ID'] > 0)
{
    $id = $_POST['ID'];
    VacacionesADD($id);
}

?>