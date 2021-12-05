<?php 
require('CRUD.php');
if($_GET['ID'] > 0)
{
    $id = $_GET['ID'];
    Aprobar($id);
}
?>