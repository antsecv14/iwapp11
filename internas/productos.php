<?php
include("header.php");
?>

<main>
<div class="boxCentrado">
    <h2 class = "h2Home">
        Productos
    </h2>
    <?php
			include("../dll/config.php");
			include("../dll/class_mysqli.php");

			$miconexion = new clase_mysqli;
			$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
			$miconexion->consulta("select id, nombre, descripcion, precio, image from platos");
			$miconexion->platoCartas();
		?>

</div>
</main>