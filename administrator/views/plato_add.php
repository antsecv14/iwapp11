<?php 
	require_once "./header.php";

?>
<div class="container">
<div class="content">

<div class= "content-adduser">
<h1>Nuevo Platos</h1>
<form method="post" action="../controller/add_plato.php" enctype="multipart/form-data">
			<div class="grupoInput">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Ingrese nombre">
			</div>
			<div class="grupoInput">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" id="descripcion" placeholder="Ingrese la descripcion">
			</div>
			<div class="grupoInput">
				<label for="precio">Precio</label>
				<input type="number" min=0 step=".01" name="precio" id="precio" placeholder="Ingrese el precio">
			</div>
			<div>
				<label for="Image">Imagen del producto</label>
				<input type="file" name="image" accept="image/png, image/jpg, image/jpeg" class="box" required>
			</div>
			<div class="grupoInput">
			 <button type="submit" value="Procesar" class="btn">Procesar</button>
			</div>
		</form>
</div>



</div>
</div>

