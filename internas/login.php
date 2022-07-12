<?php
include("header.php");
?>
	
	<main>
		<div class="boxCentrado">
		<h2 class="h2Home">Ingeso al sistema</h2>
		<form method="post" action="../dll/validar.php">
			<div class="grupoInput">
				<label for="correo">Correo</label>
				<input type="email" name="correo" id="correo" placeholder="Ingrese su correo">
			</div>
			<div class="grupoInput">
				<label for="clave">Contraseña</label>
				<input type="password" name="clave" id="clave" placeholder="Ingrese su Contraseña">
			</div>
			
			<div class="grupoInput">
			 <button type="submit" value="Procesar" class="btn-submit">Ingresar</button>
			</div>
		</form>
		</div>
	</main>
	<footer class="piePagina"><h6>Derechos Reservados 2022</h6></footer>
</body>
</html>