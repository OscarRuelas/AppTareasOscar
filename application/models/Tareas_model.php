<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tareas_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    // public function get_all_tareas(){
    //     $query = $this->db->get('tareas');
    //     return $query->result();
    // }

    public function get_all_tareas(){
        $query = $this->db->query('SELECT * FROM tareas');
        return $query->result();
    }

    public function get_only_tarea($id){
        $query = $this->db->query('SELECT * FROM tareas WHERE id = ?', array($id));
        return $query->row(); // Usamos row() porque esperamos un solo resultado
    }

    public function add_tarea(){
        $query = $this->db->query('SELECT * FROM tareas WHERE id = ?');
    }
}