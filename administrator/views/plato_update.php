<?php 

    
	require_once "./header.php";

?>
<div class="container">
<div class="content">
<h1>Actualizar plato</h1>
<?php
            extract($_GET);
            include("../controller/plato_controller.php");
            $platoControl = new plato_controller();
            $id = $_GET['id'];
            $listaPlato=$platoControl->GetPlato($id);
        ?>
<form method="post" action="../controller/update_plato.php">

<input type="hidden" name="idPlato" value="<?php echo $listaPlato[0]; ?>"><br>
			<div class="grupoInput">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" id="nombre" placeholder="Ingrese nombre" value="<?php echo $listaPlato[1]; ?>">
			</div>
			<div class="grupoInput">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" id="descripcion" placeholder="Ingrese descripcion"value="<?php echo $listaPlato[2]; ?>">
			</div>
			<div class="grupoInput">
				<label for="precio">Precio</label>
				<input type="number" min=0 step=".01" name="precio" id="precio" placeholder="Ingrese precio" value="<?php echo $listaPlato[3]; ?>">
			</div>
			<div class="grupoInput">
			 <button type="submit" value="Procesar" class="btn">Procesar</button>
			</div>
		</form>


</div>
</div>

