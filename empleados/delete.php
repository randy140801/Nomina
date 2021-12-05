<?php 
require('CRUD.php');
if (isset($_GET['ID'])) {
    $id = $_GET['ID'];
    delete($id);
}
else {
    redirect('trucks.php');
}


?>