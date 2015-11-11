<?php


class FrontController{
	
	private $controlador ="Home";
	private $metodo="index";
	private $params;


	public function index(){
		

	$url = $_SERVER["REQUEST_URI"];
	$path = trim(parse_url($url, PHP_URL_PATH), "/");

	try{

	@list($appname,$controlador,$metodo,$params) = explode("/", $path,4);
	@$params = (explode("/", $params));


	if($controlador != null){
		$this->controlador = $controlador;
	}
	if($metodo != null){
		$this->metodo = $metodo;
	}
	if($params != null){
		$this->params = $params;
	}

	$micontrolador = $this->cargarControlador($this->controlador);
	if($micontrolador!=null){
	$micontrolador->setParametros($this->params);
	$stringMetodo= $this->metodo;
	$micontrolador->$stringMetodo();
	}
	} catch(Exception $e){
		$e->getMessage();
	}
	}


	public function cargarControlador($controlador){
		$controlador =ucfirst(strtolower($controlador));
		$urlFile = 'controladores/'. $controlador. '.php';

		if(file_exists($urlFile)){
			include $urlFile;

			$class = $controlador;

			$controller = new $class();

			return $controller;
		}else {
			return null;
		}
	}

 	public function getControlador(){
	return $this->controlador;
	}

	public function getMetodo(){
	return $this->metodo;
	}

	public function getParams(){
	return $this->params;
	}

	public function setControlador($controlador){
		$this->controlador = $controlador;
	}
	public function setMetodo($metodo){
		$this->metodo = $metodo;
	}
	public function setParams($params){
		$this->params = $params;
	}
}

$frontController = new FrontController();
$frontController -> index();

?>