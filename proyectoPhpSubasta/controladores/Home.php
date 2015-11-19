<?php
	include "libs/Controlador.php";
class Home extends Controlador{


	public function register(){
		$nombre 	= isset($_POST["name"]) 	? $_POST["name"]	: "";
		$pass 		= isset($_POST["password"]) ? $_POST["password"]: "";
		$passRep	= isset($_POST["confirm"]) 	? $_POST["confirm"] : "";
		$username 	= isset($_POST["nick"]) ? $_POST["nick"] : "";
		$email 	= isset($_POST["email"]) ? $_POST["email"] : "";
		$tel 	= isset($_POST["tel"]) ? $_POST["tel"] : "";
		$direccion 	= isset($_POST["direccion"]) ? $_POST["direccion"] : "";
		$pais	= isset($_POST["pais"]) ? $_POST["pais"] : "";
		$genero 	= isset($_POST["genderRadios"]) ? $_POST["genderRadios"] : "";
		if($pass==$passRep){
		$usuario = $this-> cargarModelo("Usuario");
		$result	= $usuario->ingresarUsuarios(array('password'=>$pass, 'nombre'=>$nombre, 'nickname'=>$username, 'genero'=>$genero, 
													'pais'=>$pais, 'direccion'=>$direccion, 'email'=>$email));
		header("Location: /proyectoPhpSubasta/home/index");
		}else{
			echo "Las casillas de contraseña y confirmacion de contraseña no concuerdan";
		}

	}
	public function puja(){
		$paquete = isset($_POST["paquete"]) ? $_POST["paquete"] : "";
		$precio=	50000;
		$usuario="";

		$puja = $this-> cargarModelo("Pujas");
		$result	= $ouja->ingresarProveedores(array('cantidad'=>$paquete, 'precio'=>$precio, 'usuario'=>$usuario));
		header("Location: /proyectoPhpSubasta/home/index");
	}

	public function enterprise(){
		$nombre 	= isset($_POST["name"]) 	? $_POST["name"]	: "";
		$pass 		= isset($_POST["password"]) ? $_POST["password"]: "";
		$passRep	= isset($_POST["confirm"]) 	? $_POST["confirm"] : "";
		$username 	= isset($_POST["nick"]) ? $_POST["nick"] : "";
		$email 	= isset($_POST["inputEmail"]) ? $_POST["inputEmail"] : "";
		$tel 	= isset($_POST["tel"]) ? $_POST["tel"] : "";
		$direccion 	= isset($_POST["direccion"]) ? $_POST["direccion"] : "";
		$pais	= isset($_POST["pais"]) ? $_POST["pais"] : "";
		if($pass==$passRep){
		$empresa = $this-> cargarModelo("Proveedor");
		$result	= $empresa->ingresarProveedores(array('password'=>$pass, 'nombre'=>$nombre, 'nickname'=>$username, 'telefono'=>$tel, 
													'pais'=>$pais, 'direccion'=>$direccion, 'email'=>$email));
		header("Location: /proyectoPhpSubasta/home/ingresarProducto");
		}else{
			echo "Las casillas de contraseña y confirmacion de contraseña no concuerdan";
		}

	}

	public function product(){
		$nombre 	= isset($_POST["nombre"]) 	? $_POST["nombre"]	: "";
		// $fechafinal	= isset($_POST["password"]) ? $_POST["password"]: "";
		// $fechaentrega	= isset($_POST["confirm"]) 	? $_POST["confirm"] : "";
		$monto 	= isset($_POST["monto"]) ? $_POST["monto"] : "";
		$imagen 	= isset($_FILES["file"]) ? $_FILES["file"]["name"] : "";
		$descripcion 	= isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
		$proveedor= $_COOKIE["empresa"];
        $product = $this-> cargarModelo("Producto");
		$result	= $product->ingresarProducto(array('nombre'=>$nombre, 'precio'=>$monto, 'imagen'=>$imagen,'descripcion'=>$descripcion, 'proveedor'=>$proveedor));
		$this->test();		
	}

	function test(){
		if (isset($_FILES["file"]["name"])) {

		    $name = $_FILES["file"]["name"];
		    $tmp_name = $_FILES['file']['tmp_name'];
		    $error = $_FILES['file']['error'];

		    if (!empty($name)) {
		        $location = 'img/';

		        if  (move_uploaded_file($tmp_name, $location.$name)){
		            echo 'Uploaded';
		            header("Location: /proyectoPhpSubasta/home/index");
		        }

		    } else {
		        echo 'please choose a file';
		    }
		}
	}
	public function subir_fichero($directorio_destino, $nombre_fichero)
	{
	    $tmp_name = $_FILES[$nombre_fichero]['tmp_name'];
	    //si hemos enviado un directorio que existe realmente y hemos subido el archivo    
	    if (is_dir($directorio_destino) && is_uploaded_file($tmp_name))
	    {
	        $img_file = $_FILES[$nombre_fichero]['name'];
	        $img_type = $_FILES[$nombre_fichero]['type'];
	        echo 1;
	        // Si se trata de una imagen   
	        if (((strpos($img_type, "gif") || strpos($img_type, "jpeg") ||
	 strpos($img_type, "jpg")) || strpos($img_type, "png")))
	        {
	            //¿Tenemos permisos para subir la imágen?
	            echo 2;
	            if (move_uploaded_file($tmp_name, $directorio_destino . '/' . $img_file))
	            {
	                return true;
	            }
	        }
	    }
	    //Si llegamos hasta aquí es que algo ha fallado
	    return false;
	}
	public function login(){
		$username=$_POST["nick"];
		$pass=$_POST["password"];
		$tipo=$_POST["radios"];
		if ($tipo == "usuario")
			$modelo = $this->cargarModelo("Usuario");
		else
			$modelo = $this->cargarModelo("Proveedor");	
		
		$respuesta= $modelo->authenticate($username,$pass);
		if ($respuesta != null && $respuesta->rowCount()>0) {
			setcookie("chsm","logedin", time()+3600, "/");
			if ($tipo=="usuario") 
			setcookie("user", $respuesta);
			else
				setcookie("empresa", $respuesta, time()+3600, "/");
			echo"<script>alert('Login exitoso: $username'); window.location='/proyectoPhpSubasta/home/comprarPujas';</script>";
			// header("Location: /proyectoPhpSubasta/home/index");

			
			exit;
		}else {
			echo "Login Fallido";
			$this->cargarVista("principal");
		}
	}
	public function logout(){
		setcookie("chsm","", time()-3600,"/");
		header("Location:/proyectoPhpSubasta/home/index");
	}

	public function detalles(){

		setcookie("user");
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

	public function comprarPujas(){
		$this->cargarVista("comprarpujas");
	}

	public function inscripcionEmpresa(){
		$this->cargarVista("inscripcionempresa");
	}

	public function subasta(){
		$this->cargarVista("subasta");
	}

	public function descripcionProducto(){
		$this->cargarVista("descripcionProducto");
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