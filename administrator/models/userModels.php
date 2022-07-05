<?php
require_once "../../dll/config.php";
require_once "../../dll/class_mysqli.php";

class UserModel 
{
  private $idUser;
  private $nombres;
  private $apellidos;
  private $correo;
 

  #region Set y Get
  public function getIdUser(){
    return $this->idUser;
  }
  public function setNombres($nombres){
    $this->nombres = $nombres;
  }
  public function setApellidos($apellidos){
    $this->apellidos = $apellidos;
  }
  public function setCorreo($correo){
    $this->correo = $correo;

  }
  
  public function setClave($clave){
    $this->clave = md5($clave) ;
  }

  public function setTipoUser($tipoUser){
    $this->tipoUser = $tipoUser;
  }


  public function ListUser() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select id, nombres, apellidos, correo from usuarios");
    $resSQL=$miconexion->verconsultacrud("user_update.php","delete_user.php");
    //$this->Disconnect();
    return $resSQL;
  }
  public function CreateUser() {
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("insert into usuarios values('','$this->nombres','$this->apellidos','$this->correo','$this->clave','$this->tipoUser')");

    //$this->Disconnect();
    return $resSQL;
  }

  public function GetUser($idUser) {
    
    $miconexion = new clase_mysqli;
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("select * from usuarios where id = $idUser ");
    $lista_usuario = $miconexion -> consulta_lista();
    //$this->Disconnect();
    return $lista_usuario;
  }


  public function UpdateUser($idUser){
    $miconexion= new clase_mysqli();
    $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
    $resSQL=$miconexion->consulta("update `usuarios` SET `nombres` = '$this->nombres', `apellidos` = '$this->apellidos', `correo` = '$this->correo', `clave` = '$this->clave', `tipoUser` = '$this->tipoUser' WHERE `usuarios`.`id` = $idUser;");
    return $resSQL;
    
}

public function DeleteUser($idUser){
  $miconexion= new clase_mysqli();
  $miconexion->conectar(DBHOST, DBUSER, DBPASS, DBNAME);
  $resSQL=$miconexion->consulta("delete from `usuarios` where `usuarios`.`id` = $idUser;");
  return $resSQL;
  
}


}