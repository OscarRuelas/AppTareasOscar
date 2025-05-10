<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tareas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('tareas_model');
	}
	//index -> muestra las tareas -> VISTA
	public function index(){

		$tareas = $this->tareas_model->get_all_tareas();

		$mainData = [
			'content' => 'Indice de tareas',
			'tareas' => $tareas
		];

		$this->load->view('layouts/main', $mainData);
	}

	//show -> muestra una sola tarea -> VISTA
	public function show($id){

		$tarea = $this->tareas_model->get_only_tarea($id);

		$obtenertarea = [
			"tarea" => $tarea
		];

		$this->load->view('tareas/obtenertarea', $obtenertarea);
	}

	//create -> entrada de datos para una nueva tarea (from) -> VISTA
	public function create(){
		echo "RUTA Tareas/create";
	}

	//showAll -> procesa los datos  de la nueva tarea -> PROCESO

	public function showAll(){
		//
	}

	//edit -> entrada de datos para actualizar una tarea existente (from) -> VISTA
	public function edit($id){
		echo "RUTA Tareas/edit/$id";
	}
	
	//update -> procesa las nuevos datos de la tarea editada -> PROCESO
	public function update($id, $newData){
		//
	}

	//delete -> borra una tarea -> PROCESO
	public function delete($id){
		//
	}
}
