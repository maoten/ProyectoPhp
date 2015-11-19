<?php

require_once "Libs/Modelo.php";
class Proveedor extends Modelo{

    function __construct()
    {
        parent::__construct();
    }

    function getProveedores()
    {
        return $this->query("select * from proveedor");
    }

    public function ingresarProveedores($datos)
    {
        $this->insertar($datos, "proveedor");
    }
    public function eliminarProveedores($condiciones)
    {
        $this->eliminar($condiciones);
    }

    public function authenticate($username,$password){
        return $this->query("select id from proveedor where nickname='$username' and password='$password'");
    }
}
