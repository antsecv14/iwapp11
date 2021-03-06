<?php

class clase_mysqli{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;
	var $Usuario;
	var $Clave;
	/*identificacion de error y texto de error*/
	var $Errno = 0;
	var $Error = "";
	/*identificacion de conexion y consulta*/
	var $Conexion_ID=0;
	var $Consulta_ID=0;
	/*constructor de la clase*/
	function clase_mysqli($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	/*conexion al servidor de db*/
	function conectar($host, $user, $pass, $db){
		if($db != "")$this->BaseDatos=$db;
		if($host != "")$this->Servidor=$host;
		if($user != "")$this->Usuario=$user;
		if($pass != "")$this->Clave=$pass;
		/*conectar al servidor*/
		$this->Conexion_ID=new mysqli($this->Servidor, $this->Usuario, $this->Clave, $this->BaseDatos);
		if(!$this->Conexion_ID){
			$this->Error="Ha fallado la conexion";
			return 0;
		}
		return$this->Conexion_ID;
	}
	function consulta($sql=""){
		if($sql==""){
			$this->Error="NO hay ninguna sentencia sql";
			return 0;
		}
		/*Ejecutar la cunsulta*/
		//$this->Consulta_ID=$this->Conexion_ID->query($sql);
		$this->Consulta_ID=mysqli_query($this->Conexion_ID,$sql);

		if(!$this->Consulta_ID){
			print $this->Conexion_ID->error;
			//$this->Errno->error;
		}
		return $this->Consulta_ID;
	}

	/*retorna el numero de campos de la consulta*/
	function numcampos(){
		return mysqli_num_fields($this->Consulta_ID);
	}
	/*retorna de campos de la consulta*/
	function numregistros(){
		return mysqli_num_rows($this->Consulta_ID);
	}
	function verconsulta(){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo "<td>".$row[$i]."</td>";
			}
			echo "</tr>";
		}
		echo "</table>";
	}

	function platoCartas(){
		if(mysqli_num_rows($this->Consulta_ID)>0){
			echo"<section class = 'products'>";
			while($fetch_product = mysqli_fetch_assoc($this->Consulta_ID)){
			
				
				echo"<div class='box-container'>";
				echo"<form action='../pedidos/controller/add_pedido.php' method='post'>";
				echo"<div class='box'>";
				echo"<div class='plato_img'>";
				echo"<img src='../uploaded_img/".$fetch_product['image']."' alt=''>";
				echo"</div>";
				echo"<h3>".$fetch_product['nombre']. "</h3>";
				echo "<div class='price'>".$fetch_product['precio']."/-</div>";
				echo "<input type='hidden' name='nombre' value='".$fetch_product['nombre']."'>";
                echo "<input type='hidden' name='precio' value='".$fetch_product['precio']."'>";
                echo "<input type='hidden' name='image' value='".$fetch_product['image']."'>";
                echo "<button type='submit' class='btn-submit' value='pedir' name='add_to_cart'>";
				echo"</div>";
				echo"</form>";
				echo "</div>";
				

			}
			echo "</section>";
		}
		
	}

	function verconsultacrud($rutaUpdate, $rutaDelete){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo  "<td>Borrar</td>";
		echo  "<td>Actualizar</td>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				//echo "<td>".utf8_encode($row[$i])."</td>";
				echo "<td>".$row[$i]."</td>";
			}
			echo  "<td><a href='$rutaDelete?id=$row[0]'>Borrar</a></td>";
			echo  "<td><a href='$rutaUpdate?id=$row[0]'>Actualizar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	function verconsultacrudplatos($rutaUpdate, $rutaDelete){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo  "<td>Borrar</td>";
		echo  "<td>Actualizar</td>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				if($i==4){
					echo "<td><img src='../../uploaded_img/".$row[$i]."' height=50 alt=''></img></td>";
				}else{
					echo "<td>".$row[$i]."</td>";
				}
				//echo "<td>".utf8_encode($row[$i])."</td>";
				
			}
			echo  "<td><a href='$rutaDelete?id=$row[0]'>Borrar</a></td>";
			echo  "<td><a href='$rutaUpdate?id=$row[0]'>Actualizar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	function verconsultacrudpedidos($rutaUpdate, $rutaDelete){
		echo "<table class='tablecud'>";
		echo "<tr>";
		for ($i=0; $i < $this->numcampos() ; $i++) { 
			//echo "<td>".$this->nombrecampo($i)."</td>";
			
			echo  "<td>".mysqli_fetch_field_direct($this->Consulta_ID, $i)->name."</td>";
		}
		echo  "<td>Borrar</td>";
		echo  "<td>Actualizar</td>";
		echo "</tr>";
		while ($row=mysqli_fetch_array($this->Consulta_ID)) {
			echo "<tr>";
			for ($i=0; $i < $this->numcampos(); $i++) { 
				if($i==4){
					echo "<td><img src='../../uploaded_img/".$row[$i]."' height=50 alt=''></img></td>";
				}else{
					echo "<td>".$row[$i]."</td>";
				}
				
				
			}
			echo  "<td><a href='$rutaDelete?id=$row[0]'>Borrar</a></td>";
			echo  "<td><a href='$rutaUpdate?id=$row[0]'>Actualizar</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	function consulta_lista(){
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			for ($i=0; $i < $this->numcampos(); $i++) { 
				$row[$i];
			}
			return $row;
		}
	}

	function consulta_json(){
		while ($row = mysqli_fetch_array($this->Consulta_ID)) {
			$data[]=$row;
		}
		echo json_encode(array("sensores"=>$data));
	}
	function consulta_busqueda_json(){
		if($this->numcampos() > 0){
			while ($row = mysqli_fetch_array($this->Consulta_ID)) {
				$data[]=$row;
			}
		    $resultData = array('status' => true, 'postData' => $data);
	    }else{
	    	$resultData = array('status' => false, 'message' => 'No Post(s) Found...');
	    }

	    echo  json_encode($resultData);
	}

}
?>