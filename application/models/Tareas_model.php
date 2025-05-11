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
        $query = $this->db->query('SELECT * FROM tareas ORDER BY id DESC');
        return $query->result();
    }

    public function get_only_tarea($id){
        $query = $this->db->query('SELECT * FROM tareas WHERE id = ?', array($id));
        return $query->row(); // Usamos row() porque esperamos un solo resultado
    }

    public function add_tarea($tareas_data){
        $query = $this->db->insert('tareas', $tareas_data);
    }

    public function get_estatus(){
        $query = $this->db->query('SELECT * FROM estatus');
        return $query->result();
    }

    public function update_tarea($id, $tarea_data){
        $this->db->update('tareas', $tarea_data, ['id' => $id]);
    }

    public function delete_tarea($id){
        $this->db->delete('tareas', ['id' => $id]);
    }
}