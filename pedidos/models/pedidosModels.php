<?php
require_once "../dll/config.php";
require_once "../dll/class_mysqli.php";

class PedidoModel 
{
  private $idPedido;
  private $nombre;
  private $precio;
  public $image;
  private $cantidad;

 
 

  #region Set y Get
  public function getIdPedido(){
    return $this->idPedido;
  }
  public function setNombre($nombre){
    $this->nombre = $nombre;
  }

  public function setPrecio($precio){
    $this->precio = $precio;

  }
  public function setImage($image){
    $this->image = $image;

  }

  public function setCantidad($cantidad){
    $this->cantidad =$cantidad;
  }

  

  
  
  public function ListPedidos() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select id, nombre, precio, image,cantidad from pedidos");
    $resSQL=$miconexion->verconsultacrudpedidos("pedido_update.php","delete_pedido.php");
    //$this->Disconnect();
    return $resSQL;
  }
  public function CreatePedido() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("insert into pedidos values('','$this->nombre','$this->precio', '$this->image','$this->cantidad')");
    

    //$this->Disconnect();
    return $resSQL;
  }

  public function UpdatePedido($idPedido){
    $miconexion= new clase_mysqli();
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("update `pedidos` SET `nombre` = '$this->nombre', `descripcion` = '$this->descripcion', `precio` = '$this->precio', `image` = '$this->image' WHERE `platos`.`id` = $idPlato;");
    
    return $resSQL;
    
}

public function DeletePedido($idPedido){
  $miconexion= new clase_mysqli();
  $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
  $resSQL=$miconexion->consulta("delete from `pedidos` where `pedidos`.`id` = $idPlato;");
  return $resSQL;
  
}
}