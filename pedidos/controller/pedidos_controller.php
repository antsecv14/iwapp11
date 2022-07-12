<?php
//require_once "C:\xampp\htdocs\iwapp11\pedidos\models\pedidosModels.php";
include("../pedidos/models/pedidosModels.php");
class pedido_controller{
	/*variables de conexoion*/
	var $BaseDatos;
	var $Servidor;


	function pedido_controller($host="", $user="", $pass="", $db=""){
		$this->BaseDatos=$db;
		$this->Servidor=$host;
		$this->Usuario=$user;
		$this->Clave=$pass;
	}
	public function Createpedido()
    {
        $pedido = new pedidoModel();

        if (isset($_POST['nombre'])&&isset($_POST['precio'])) {
	        $pedido->setNombre($_POST['nombre']);
	        $pedido->setPrecio($_POST['precio']);
            $pedido->setImage($_POST['image']);
            $pedido->setCantidad(1);
        	$pedidoResponse = $pedido->CreatePedido();
	        //echo  $userResponse . " response"; //BORRAR
	        if ($pedidoResponse == 1) // exitoso
	        {
	            echo "<script>location.href='../../internas/carrito.php'</script>";
	        } else {
	            echo "<h1>Error al crear pedido.</h1>";
	        }
		}
        
    }
    public function ListPedido()
    {
        $pedido = new pedidoModel();
        $pedidoResponse = $pedido->ListPedidos();
        
    }
	public function GetPedido($id)
    {
        $pedido = new pedidoModel();
        $pedidoResponse = $pedido->Getpedido($id);
		//echo "<script>console.log('$userResponse');</script>";
		return $pedidoResponse;
		
    }

	public function updatePedido($id){
        $pedido = new pedidoModel();
        if (isset($_POST['nombre'])&&isset($_POST['descripcion'])) {
            $pedido->setCantidad(1);
            //echo"$img";
            //echo  $userResponse . " response"; //BORRAR
            if ($pedidoResponse == 1) // exitoso
            {
                echo "<script>location.href='../views/pedidos.php'</script>";
            } else {
                echo "<h1>Error al crear usuario.</h1>";
            }
        }

        return $pedidoResponse;
    }

    public function deletepedido($id){
        $pedido = new pedidoModel();
            $pedidoResponse = $pedido->Deletepedido($id);
            //echo  $userResponse . " response"; //BORRAR
            if ($pedidoResponse == 1) // exitoso
            {
                echo "<script>location.href='../views/pedidos.php'</script>";
            } else {
                echo "<h1>Error al crear usuario.</h1>";
            }
    }



}
?>