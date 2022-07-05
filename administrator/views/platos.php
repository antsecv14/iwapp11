<?php 
	require_once "./header.php";

?>



<div class="container">
    <div class="content">
        <div class="content-user">
            <div class="sucursales">
                <div class="title">
                
                    <h2>Gestion de platos</h2>
                    
                    <ul class = "lista-btn">
                        <li>
                            <div class="btn btn-2"><a href="plato_add.php">Agregar</a></div>
                        </li>
                    </ul>
                </div>
                <?php

include("../controller/plato_controller.php");
$control= new plato_controller();
$control->ListPlato();
?>

                
            </div>
            
        </div>
    </div>
</div>


