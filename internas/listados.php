<?php
include("header.php");
?>
	
	<main>
		<div class="boxCentrado">
		<h2 class="h2Home">Lista de Usuarios</h2>
		<?php
			include("../dll/config.php");
			include("../dll/class_mysqli.php");

			$miconexion = new clase_mysqli;
			$miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
			$miconexion->consulta("select id 'CODIGO', nombres NOMBRES, apellidos APELLDIOS, correo CORREO from usuarios");
			$miconexion->verconsulta();
		?>
		</div>
	</main>
	<footer class="piePagina"><h6>Derechos Reservados 2022</h6></footer>
</body>
</html>