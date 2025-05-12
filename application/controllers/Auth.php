<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('user_model');
    }

    public function register_form(){

        if($this->session->userdata('logged_in')) {
            show_error('Ya iniciaste sesión');
        }


		$main_data = [
			'title' => 'Registro de usuarios',
			'innerViewPath' => 'auth/register_form'
		];

		$this->load->view('layouts/public', $main_data);
    }

    public function register(){

        if($this->session->userdata('logged_in')) {
            show_error('Ya iniciaste sesión');
        }


        $this->form_validation->set_rules('usuario', 'USUARIO', 'required');
        $this->form_validation->set_rules('nombre', 'NOMBRE', 'required');
        $this->form_validation->set_rules('app', 'APELLIDO PATERNO', 'required');
        $this->form_validation->set_rules('apm', 'APELLIDO MATERNO', 'required');
        $this->form_validation->set_rules('contra', 'CONTRA', 'required|min_length[8]');
        $this->form_validation->set_rules('correo', 'CORREO', 'required');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');



        if($this->form_validation->run() == false){
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            redirect('Auth/register_form');
        }

        $fechaInsercion = date('Y-m-d H:i:s');

        $user_data = [
            'usuario' => $this->input->post('usuario'),
            'nombre' => $this->input->post('nombre'),
            'app' => $this->input->post('app'),
            'apm' => $this->input->post('apm'),
            'contra' => password_hash($this->input->post('contra'), PASSWORD_DEFAULT),
            'correo' => $this->input->post('correo'),
            'fechaInsercion' => $fechaInsercion
        ];

        $this->user_model->add_new_user($user_data);

        $this->session->set_flashdata('success', 'El usuario ha sido registrado con éxito.');
        redirect('Auth/login_form');
    }

    public function login_form(){

        if($this->session->userdata('logged_in')) {
            show_error('Ya iniciaste sesión');
        }

		$main_data = [
			'title' => 'Registro de usuarios',
			'innerViewPath' => 'auth/login'
		];

		$this->load->view('layouts/public', $main_data);
    }

    public function login(){

        if($this->session->userdata('logged_in')) {
            show_error('Ya iniciaste sesión');
        }


        $this->form_validation->set_rules('usuario', 'USUARIO', 'required');
        $this->form_validation->set_rules('contra', 'CONTRA', 'required|min_length[8]');

        $this->form_validation->set_message('required', 'El campo %s es obligatorio.');

        if($this->form_validation->run() == false){
            $this->session->set_flashdata('errors', $this->form_validation->error_array());
            redirect('Auth/login_form');
        }

        $user = $this->user_model->get_user_by_usuario($this->input->post('usuario'));
        
        if($user != null && password_verify($this->input->post('contra'), $user->contra)) {
            // Generar un token simulado usando MD5 y la marca de tiempo
           $token = md5(uniqid(rand(), true)); // Uniqid con más entropía
            $this->session->set_userdata('usuario', $user->usuario);
            $this->session->set_userdata('session_token', $token);
            $this->session->set_userdata('logged_in', true);
            redirect('tareas');
        } else {
            $this->session->set_flashdata('errors', ['login_error' => 'Credenciales incorrectas.']);
            redirect('Auth/login_form');
        }

    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('Auth/login_form');
    }
}