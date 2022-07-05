<?php
extract($_POST); 
include("../controller/plato_controller.php");
$platoControl = new plato_controller();
if(isset($_POST['idPlato'])){
    $idPlato = $_POST['idPlato'];
    $platoControl->updatePlato($idPlato);
}

?>