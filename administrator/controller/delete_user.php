<?php
extract($_POST); 
include("../controller/user_controller.php");
$userControl = new user_controller();
if(isset($_POST['idUser'])){
    $idUser = $_POST['idUser'];
    $userControl->deleteUser($idUser);
}

?>