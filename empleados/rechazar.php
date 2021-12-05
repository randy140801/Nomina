<?php 
require('CRUD.php');
if($_GET['ID'] > 0)
{
    $id = $_GET['ID'];
    Rechazar($id);
}
?>