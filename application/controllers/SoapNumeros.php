<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SoapNumeros extends CI_Controller {
	public function __construct(){
		parent::__construct();
	}
	//index -> muestra las tareas -> VISTA
	public function numeros(){

		if($this->session->userdata('session_token') == null) {
            show_error('Acceso no autorizado, Favor de iniciar sesión');
        }
		// $tareas = $this->tareas_model->paginacion_tareas(2, 0);

		$mainData = [
			'title' => 'Conversion de números a letras',
			'innerViewPath' => 'soap/numeros'
		];

		$this->load->view('layouts/main', $mainData);
	}
}
