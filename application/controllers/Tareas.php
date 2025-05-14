<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tareas extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('tareas_model');
	}
	//index -> muestra las tareas -> VISTA
	public function index(){

		if($this->session->userdata('session_token') == null) {
            show_error('Acceso no autorizado, Favor de iniciar sesión');
        }

		// echo $this->tareas_model->paginacion_tareas(10, 0);

		$tareas = $this->tareas_model->get_all_tareas();
		// $tareas = $this->tareas_model->paginacion_tareas(2, 0);

		$mainData = [
			'title' => 'Tareas por hacer',
			'innerViewPath' => 'tareas/index',
			// 'session_token' => $this->session->userdata('session_token'),
			'tareas' => $tareas
		];

		$this->load->view('layouts/main', $mainData);
	}

	public function buscar_form(){

		if($this->session->userdata('session_token') == null) {
            show_error('Acceso no autorizado, Favor de iniciar sesión');
        }

		// echo $this->tareas_model->paginacion_tareas(10, 0);

		$tareas = $this->tareas_model->get_all_tareas();
		// $tareas = $this->tareas_model->paginacion_tareas(2, 0);

		$mainData = [
			'title' => 'Tareas por hacer',
			'innerViewPath' => 'tareas/index',
			// 'session_token' => $this->session->userdata('session_token'),
			'tareas' => $tareas
		];

		$this->load->view('layouts/main', $mainData);
	}

	public function buscar($titulo){

		//$titulo=$this->input->post('titulo');
		
		// $titulo = $this->tareas_model->buscar_tareas($buscar_titulo);

		if($titulo){
			$resultado = $this->tareas_model->buscar_tareas($titulo);
			echo json_encode($resultado);
			// $data['tareas'] = $resultado;
			// $this->load->view('layouts/main', $data);
		}
	}

	//show -> muestra una sola tarea -> VISTA
	public function show($id){

		if($this->session->userdata('session_token') == null) {
            show_error('Acceso no autorizado, Favor de iniciar sesión');
        }

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

		if($this->session->userdata('session_token') == null) {
            show_error('Acceso no autorizado, Favor de iniciar sesión');
        }

		$tareas = $this->tareas_model->get_all_tareas();
		$usuario = $this->session->userdata('usuario');
		$estatus = $this->tareas_model->get_asignado_estatus();

		$mainData = [
			'title' => 'Crear tareas',
			'innerViewPath' => 'tareas/create',
			'usuario' => $usuario,
			'estatus' => $estatus
		];

		$this->load->view('layouts/main', $mainData);
	}

	//showAll -> procesa los datos  de la nueva tarea -> PROCESO

	public function insert(){

		if($this->session->userdata('session_token') == null) {
            show_error('Acceso no autorizado, Favor de iniciar sesión');
        }

		$usuario = $this->session->userdata('usuario');

		$idusuario = $this->tareas_model->get_usuario($usuario);

		$tareas_data = [
			'idusuario' => $idusuario->id,
			'titulo' => $this->input->post('titulo'),
			'descripcion' => $this->input->post('descripcion'),
			'estatus' => 'A',
			'fecha' => $this->input->post('fecha')
		];

		$this->tareas_model->add_tarea($tareas_data);
		redirect("tareas");
		//
	}

	//edit -> entrada de datos para actualizar una tarea existente (from) -> VISTA
	public function edit($id){

		if($this->session->userdata('session_token') == null) {
            show_error('Acceso no autorizado, Favor de iniciar sesión');
        }
		
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

		if($this->session->userdata('session_token') == null) {
            show_error('Acceso no autorizado, Favor de iniciar sesión');
        }

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

		if($this->session->userdata('session_token') == null) {
            show_error('Acceso no autorizado, Favor de iniciar sesión');
        }

		$this->tareas_model->delete_tarea($id);
		redirect("tareas");
		//
	}
}
