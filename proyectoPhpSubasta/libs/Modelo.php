<?php

class Modelo{

	 protected $host = "localhost";
	 protected $db_name = "proyectophp";
	protected $username = "root";
	 protected $password = "";
	protected $conexion;
	protected $nombretabla="";


public function Modelo(){

try{

	$this->conexion = new PDO ("mysql:host={$this->host};dbname={$this->db_name}", $this->username, $this->password);
		}
		catch(PDOException $exception){
	echo "Connection error: " . $exception->getMessage();
}
}

public function query($query){
	return $this->conexion->query($query);
}

public function obtenerNombre(){
	 return $this->query("SELECT * FROM".strtolower(get_class($this)));


}

 protected function insertar($datos, $tabla) {
        $campos = "";
        $valores = "";
        $this->nombretabla=$tabla;

       foreach ($datos as $campo => $valor) {
          if(strlen($campos)>0){
               $campos=$campos.",";
               $valores=$valores.",";
            }
            $campos=$campos.$campo;
            $valores=$valores."'".$valor."'";
        }

        $consula = "INSERT INTO " .$this->nombretabla. " (".$campos.") VALUES (".$valores.")";
        
         $result = $this->query($consula);
         print_r($this->conexion->errorInfo());
         print_r($consula);
        return $result;
    }


  protected function eliminar($condiciones){
        $where = "";
        foreach ($condiciones as $campo => $valor) {
            if(strlen($where)>0){
                $where=$where.",";
            }
            $where=$where.$campo." = ".$valor;
        }
        if(strlen($where)>0){
            $where=" WHERE ".$where;
        
        $consulta = "DELETE FROM " . $this->nombretabla ." ".$where;
        echo $consulta;
        $result=$this-> query($consulta);
        print_r($this->conexion->errorInfo());
        }
        else{
          return $this->query("DELETE FROM " . $this->nombretabla);
        }
    }






}
?>