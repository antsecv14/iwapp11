<?php
require_once "../../dll/config.php";
require_once "../../dll/class_mysqli.php";

class PlatoModel 
{
  private $idPlato;
  private $nombre;
  private $descripcion;
  private $precio;
 

  #region Set y Get
  public function getIdPlato(){
    return $this->idPlato;
  }
  public function setNombre($nombre){
    $this->nombre = $nombre;
  }
  public function setDescripcion($descripcion){
    $this->descripcion = $descripcion;
  }
  public function setPrecio($precio){
    $this->precio = $precio;

  }
  
  public function ListPlato() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select id, nombre, descripcion, precio from platos");
    $resSQL=$miconexion->verconsultacrud("plato_update.php","delete_plato.php");
    //$this->Disconnect();
    return $resSQL;
  }
  public function CreatePlato() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("insert into platos values('','$this->nombre','$this->descripcion','$this->precio')");

    //$this->Disconnect();
    return $resSQL;
  }

  public function GetPlato($idPlato) {
    
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select * from platos where id = $idPlato ");
    $lista_platos = $miconexion -> consulta_lista();
    //$this->Disconnect();
    return $lista_platos;
  }


  public function UpdatePlato($idPlato){
    $miconexion= new clase_mysqli();
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("update `platos` SET `nombre` = '$this->nombre', `descripcion` = '$this->descripcion', `precio` = '$this->precio' WHERE `platos`.`id` = $idPlato;");
    return $resSQL;
    
}

public function DeletePlato($idPlato){
  $miconexion= new clase_mysqli();
  $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
  $resSQL=$miconexion->consulta("delete from `platos` where `platos`.`id` = $idPlato;");
  return $resSQL;
  
}
}