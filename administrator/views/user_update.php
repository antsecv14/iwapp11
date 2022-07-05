<?php 

    
	require_once "./header.php";

?>
<div class="container">
<div class="content">
<h1>Actualizar Usuario</h1>
<?php
            extract($_GET);
            include("../controller/user_controller.php");
            $userControl = new user_controller();
            $id = $_GET['idUser'];
            $listaUser=$userControl->GetUser($id);
            $listaRol[1]="Administrador";
            $listaRol[2]="Colaborador";
        ?>
<form method="post" action="../controller/update_user.php">

<input type="hidden" name="idUser" value="<?php echo $listaUser[0]; ?>"><br>
			<div class="grupoInput">
				<label for="nombres">Nombres</label>
				<input type="text" name="nombres" id="nombres" placeholder="Ingrese su nombre" value="<?php echo $listaUser[1]; ?>">
			</div>
			<div class="grupoInput">
				<label for="apellidos">Apellidos</label>
				<input type="text" name="apellidos" id="apellidos" placeholder="Ingrese su apellido"value="<?php echo $listaUser[2]; ?>">
			</div>
			<div class="grupoInput">
				<label for="correo">Correo</label>
				<input type="email" name="correo" id="correo" placeholder="Ingrese su correo" value="<?php echo $listaUser[3]; ?>">
			</div>
			<div class="grupoInput">
				<label for="clave">Clave</label>
				<input type="password" name="clave" id="clave" placeholder="Ingrese su clave" value="<?php echo $listaUser[4]; ?>">
			</div>
			<div class="grupoInput">
				<label for="tipoUser">Tipo de usuario</label>
				<select id="tipoUser" name="tipoUser">
                    <option value="<?php echo $listaUser[5]; ?>"><?php echo $listaRol[$listaUser[5]]; ?></option>
					<option value="1">Administrador</option>
					<option value="2">Colaborador</option>
				</select>
			</div>
			<div class="grupoInput">
			 <button type="submit" value="Procesar" class="btn">Procesar</button>
			</div>
		</form>


</div>
</div>


<?php require_once "./footer.php"; ?>