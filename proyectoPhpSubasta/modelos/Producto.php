<?php

require_once "Libs/Modelo.php";
class Producto extends Modelo{

    function __construct()
    {
        parent::__construct();
    }

    function getProductos()
    {
        return $this->query("select * from producto");
    }

    public function getLastProducto()
    {
        return $this->query("select MAX(id) as id from producto");
    }

    public function ingresarProducto($datos)
    {
        $this->insertar($datos, "producto");
    }
    public function eliminarProducto($condiciones)
    {
        $this->eliminar($condiciones);
    }
    // public function authenticate($username,$password){
    //     return $this->query("select * from users where username='$username' and pass='$password'");
    // }
}
