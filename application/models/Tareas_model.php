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

    public function buscar_tareas($titulo){
        $query = $this->db->query("SELECT * FROM tareas WHERE titulo LIKE '%{$titulo}%'");
        return $query->result();
    }


    public function paginacion_tareas($page_size, $offset){
        $this->db->limit($page_size, $offset);
        $query = $this->db->get('tareas');
        return $query->result_array();
    }

    public function count_tareas(){
        return $this->db->count_all('tareas');
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

    public function get_asignado_estatus(){
        $query = $this->db->query('SELECT * FROM estatus WHERE id = "A"');
        return $query->row();
    }

    public function update_tarea($id, $tarea_data){
        $this->db->update('tareas', $tarea_data, ['id' => $id]);
    }

    public function delete_tarea($id){
        $this->db->delete('tareas', ['id' => $id]);
    }

    public function get_usuario($usuario){
        $query = $this->db->get_where('usuarios', ['usuario' => $usuario]);
        return $query->row();
    }
}