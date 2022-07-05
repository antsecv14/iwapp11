<?php

include("../controller/plato_controller.php");
$platoControl = new plato_controller();
extract($_GET);   
            $id = $_GET['id'];
            $platoControl->deletePlato($id);
?>
