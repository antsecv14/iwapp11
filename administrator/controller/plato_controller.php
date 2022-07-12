<?php
require_once "../models/platosModels.php";

class plato_controller{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;


	function plato_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	public function CreatePlato()
    {
        $plato = new PlatoModel();

        if (isset($_POST['nombre'])&&isset($_POST['descripcion'])) {
	        $plato->setNombre($_POST['nombre']);
	        $plato->setDescripcion($_POST['descripcion']);
	        $plato->setPrecio($_POST['precio']);
            $img = ($_FILES['image']['name']);
            $plato->setImage($_FILES['image']['name']);
            $plato-> setImageTmpName($_FILES['image']['tmp_name']);
            $plato-> setImageFolder('../../uploaded_img/'.$plato->image) ;
        	$platoResponse = $plato->CreatePlato();
	        //echo  $userResponse . " response"; //BORRAR
	        if ($platoResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/platos.php'</script>";
	        } else {
	            echo "<h1>Error al crear plato.</h1>";
	        }
		}
        
    }
    public function ListPlato()
    {
        $plato = new PlatoModel();
        $platoResponse = $plato->ListPlato();
        
    }
	public function GetPlato($id)
    {
        $plato = new PlatoModel();
        $platoResponse = $plato->GetPlato($id);
		//echo "<script>console.log('$userResponse');</script>";
		return $platoResponse;
		
    }

	public function updatePlato($id){
        $plato = new PlatoModel();
        if (isset($_POST['nombre'])&&isset($_POST['descripcion'])) {
            $plato->setNombre($_POST['nombre']);
            $plato->setDescripcion($_POST['descripcion']);
            $plato->setPrecio($_POST['precio']);
            $img = ($_FILES['image']['name']);
            $plato->setImage($_FILES['image']['name']);
            $plato-> setImageTmpName($_FILES['image']['tmp_name']);
            $plato-> setImageFolder('../../uploaded_img/'.$plato->image) ;
            $platoResponse = $plato->UpdatePlato($id);
            //echo"$img";
            //echo  $userResponse . " response"; //BORRAR
            if ($platoResponse == 1) // exitoso
            {
                echo "<script>location.href='../views/platos.php'</script>";
            } else {
                echo "<h1>Error al crear usuario.</h1>";
            }
        }

        return $platoResponse;
    }

    public function deletePlato($id){
        $plato = new PlatoModel();
            $platoResponse = $plato->DeletePlato($id);
            //echo  $userResponse . " response"; //BORRAR
            if ($platoResponse == 1) // exitoso
            {
                echo "<script>location.href='../views/platos.php'</script>";
            } else {
                echo "<h1>Error al crear usuario.</h1>";
            }
    }



}
?>