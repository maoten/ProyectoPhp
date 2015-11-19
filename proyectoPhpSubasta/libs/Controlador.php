<?php

class Controlador{


	private $parametros;

	protected function cargarModelo($modelo){

		$modelo = ucfirst(strtolower($modelo));
		$urlFile = 'modelos/'.$modelo.'.php';

		if(file_exists($urlFile)){

			include $urlFile;

			$class=$modelo;

			$model= new $class();

			return $model;
		}else{
			return null;
		}
	}

	protected function cargarVista($vista){

		$modelo = ucfirst(strtolower($vista));
		$urlFile = 'vistas2/'.$modelo.'.html';

		if(file_exists($urlFile)){

			require_once($urlFile);
			return true;
		}else{
			echo "llego hasta ". $vista;
			return false;
		}
	}


	public function setParametros($parametros){
		$this->parametros = $parametros;
	}

	public function getParametros(){
	return $this->parametros;
	}
}

?>