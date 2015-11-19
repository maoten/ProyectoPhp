<?php

require_once "Libs/Modelo.php";
class Pujas extends Modelo{

    function __construct()
    {
        parent::__construct();
    }

    function getPujas()
    {
        return $this->query("select * from pujas");
    }


    public function ingresarPujas($datos)
    {
        $this->insertar($datos, "pujas");
    }
    public function eliminarPujas($condiciones)
    {
        $this->eliminar($condiciones);
    }
    // public function authenticate($username,$password){
    //     return $this->query("select * from users where username='$username' and pass='$password'");
    // }
}
