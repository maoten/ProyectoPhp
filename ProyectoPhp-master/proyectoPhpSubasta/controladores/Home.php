<?php
	include "libs/Controlador.php";
class Home extends Controlador{


	public function register(){
	$nombre 	= isset($_POST["nombre"]) 	? $_POST["nombre"]	: "";
	$pass 		= isset($_POST["pass"]) ? $_POST["pass"]: "";
	$passRep	= isset($_POST["pass2"]) 	? $_POST["pass2"] : "";
	$username 	= isset($_POST["username"]) ? $_POST["username"] : "";
	if($pass==$passRep){
	$usuario = $this-> cargarModelo("Usuario");
	$result	= $usuario->ingresarUsuarios(array('pass'=>$pass, 'nombre'=>$nombre, 'username'=>$username));
	}else{
		echo "No son iguales";
	}

	}
	public function login(){
		$username=$_POST["username"];
		$pass=$_POST["pass"];
		$modelo = $this->cargarModelo("Usuario");
		$respuesta= $modelo->authenticate($username,$pass);
		if ($respuesta != null && $respuesta->rowCount()>0) {
			setcookie("chsm","logedin", time()+3600, "/");
			header("Location: /chatSystem");
			
			exit;
		}else {
			echo "Login Fallido";
			$this->cargarVista("index");
		}
	}
	public function logout(){
		setcookie("chsm","", time()-3600,"/");
		header("Location:/chatSystem");
	}


	public function imprimir(){
		print_r($this->parametros);
	}

	public function index(){
		$this->cargarVista("principal");
	}

	public function iniciarSesion(){
		$this->cargarVista("iniciarsesion");
	}

	public function inscripcion(){
		$this->cargarVista("inscripcion");
	}

	public function ingresarProducto(){
		$this->cargarVista("ingresarproducto");
	}

	public function compraPuja(){
		$this->cargarVista("comprapuja");
	}

	public function inscripcionEmpresa(){
		$this->cargarVista("inscripcionempresa");
	}

	public function subasta(){
		$this->cargarVista("subasta");
	}

	public function descripcion(){
		$this->cargarVista("descripcion");
	}
		//$usuario = $this-> cargarModelo("Usuario");
		//$result = $usuario->ingresarUsuarios(array('nombre' => "'Juan Manu' ","apellido"=>"'Alvarez'","cedula"=>1234, "direccion"=>"'asha'	"));
		//$result = $usuario->eliminarUsuario(array("cedula"=>1234));

		//$result = $usuario->getUsuarios();
		//$result = $result->fetchAll();
		//echo "entre";
		//foreach ($result as $row) {
	//		print_r($row); 
	//	}
	
}

?>