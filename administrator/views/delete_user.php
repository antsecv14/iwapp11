
<?php

include("../controller/user_controller.php");
$userControl = new user_controller();
extract($_GET);   
            $id = $_GET['idUser'];
            $userControl->deleteUser($id);
?>

