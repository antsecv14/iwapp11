<?php
require_once "../models/userModels.php";

class user_controller{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;


	function user_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	public function CreateUser()
    {
        $user = new UserModel();

        if (isset($_POST['nombres'])&&isset($_POST['apellidos'])) {
	        $user->setNombres($_POST['nombres']);
	        $user->setApellidos($_POST['apellidos']);
	        $user->setCorreo($_POST['correo']);
			$user->setClave($_POST['clave']);
			$user->setTipoUser($_POST['tipoUser']);
        	$userResponse = $user->CreateUser();
	        //echo  $userResponse . " response"; //BORRAR
	        if ($userResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../views/user.php'</script>";
	        } else {
	            echo "<h1>Error al crear usuario.</h1>";
	        }
		}
        
    }
    public function ListUser()
    {
        $user = new UserModel();
        $userResponse = $user->ListUser();
        
    }
	public function GetUser($id)
    {
        $user = new UserModel();
        $userResponse = $user->GetUser($id);
		//echo "<script>console.log('$userResponse');</script>";
		return $userResponse;
		
    }

	public function updateUser($id){
        $user = new UserModel();
        if (isset($_POST['nombres'])&&isset($_POST['apellidos'])) {
            $user->setNombres($_POST['nombres']);
            $user->setApellidos($_POST['apellidos']);
            $user->setCorreo($_POST['correo']);
            $user->setClave($_POST['clave']);
            $user->setTipoUser($_POST['tipoUser']);
            $userResponse = $user->UpdateUser($id);
            //echo  $userResponse . " response"; //BORRAR
            if ($userResponse == 1) // exitoso
            {
                echo "<script>location.href='../views/user.php'</script>";
            } else {
                echo "<h1>Error al crear usuario.</h1>";
            }
        }

        return $userResponse;
    }

    public function deleteUser($id){
        $user = new UserModel();
            $userResponse = $user->DeleteUser($id);
            //echo  $userResponse . " response"; //BORRAR
            if ($userResponse == 1) // exitoso
            {
                echo "<script>location.href='../views/user.php'</script>";
            } else {
                echo "<h1>Error al crear usuario.</h1>";
            }
    }



}
?>