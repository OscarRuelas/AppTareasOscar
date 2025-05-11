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
			'title' => 'Tareas por hacer',
			'innerViewPath' => 'tareas/index',
			'tareas' => $tareas
		];

		$this->load->view('layouts/main', $mainData);
	}

	//show -> muestra una sola tarea -> VISTA
	public function show($id){

		$tarea = $this->tareas_model->get_only_tarea($id);

		if($tarea == null) {
			show_404();
		}

		$obtenertarea = [
			'title' => 'Tareas #'. $id,
			'innerViewPath' => 'tareas/show',
			"tarea" => $tarea
		];
		$this->load->view('layouts/main', $obtenertarea);
	}

	//create -> entrada de datos para una nueva tarea (from) -> VISTA
	public function create(){
		$tareas = $this->tareas_model->get_all_tareas();

		$mainData = [
			'title' => 'Crear tareas',
			'innerViewPath' => 'tareas/create'
		];

		$this->load->view('layouts/main', $mainData);
	}

	//showAll -> procesa los datos  de la nueva tarea -> PROCESO

	public function insert(){

		$tareas_data = [
			'idusuario' => $this->input->post('idusuario'),
			'titulo' => $this->input->post('titulo'),
			'descripcion' => $this->input->post('descripcion'),
			'estatus' => $this->input->post('estatus'),
			'fecha' => $this->input->post('fecha')
		];

		$this->tareas_model->add_tarea($tareas_data);
		redirect("tareas");
		//
	}

	//edit -> entrada de datos para actualizar una tarea existente (from) -> VISTA
	public function edit($id){
		
		$tarea = $this->tareas_model->get_only_tarea($id);
		$estatus = $this->tareas_model->get_estatus();

		if($tarea == null) {
			show_404();
		}

		$obtenertarea = [
			'title' => 'Editar tareas #'. $id,
			'innerViewPath' => 'tareas/edit',
			"tarea" => $tarea,
			"estatus" => $estatus
		];
		$this->load->view('layouts/main', $obtenertarea);

	}
	
	//update -> procesa las nuevos datos de la tarea editada -> PROCESO
	public function update($id){

		$tareas_data = [
			'idusuario' => $this->input->post('idusuario'),
			'titulo' => $this->input->post('titulo'),
			'descripcion' => $this->input->post('descripcion'),
			'estatus' => $this->input->post('estatus'),
			'fecha' => $this->input->post('fecha')
		];

		$this->tareas_model->update_tarea($id, $tareas_data);
		redirect("tareas");
	}

	//delete -> borra una tarea -> PROCESO
	public function delete($id){

		$this->tareas_model->delete_tarea($id);
		redirect("tareas");
		//
	}
}
