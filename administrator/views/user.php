<?php 
	require_once "./header.php";

?>



<div class="container">
    <div class="content">
        <div class="content-user">
            <div class="sucursales">
                <div class="title">
                
                    <h2>Gestion de usuarios</h2>
                    
                    <ul class = "lista-btn">
                        <li>
                            <div class="btn btn-2"><a href="user_add.php">Agregar</a></div>
                        </li>
                    </ul>
                </div>
                <?php

include("../controller/user_controller.php");
$control= new user_controller();
$control->ListUser();
?>

                
            </div>
            
        </div>
    </div>
</div>


<?php require_once "./footer.php"; ?>