<?php

require_once "Libs/Modelo.php";
class Usuario extends Modelo{


function __construct(){
    parent::__construct();
}

function getUsuarios(){
    return $this->query("select * from users");
}

public function ingresarUsuarios($datos){
    $this->insertar($datos, "usuario");
}
public function eliminarUsuario($condiciones){
    $this->eliminar($condiciones);
}
    public function authenticate($username,$password)
    {
        return $this->query("select id from usuario where nickname='$username' and password='$password'");
    }
}

