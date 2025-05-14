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
        $query = $this->db->query('SELECT id, titulo, DATE_FORMAT(fecha, "%d/%m/%Y") as fecha FROM tareas ORDER BY id DESC');
        return $query->result();
    }

    public function buscar_tareas($titulo){
        $query = $this->db->query("SELECT id, titulo, DATE_FORMAT(fecha, '%d/%m/%Y') as fecha FROM tareas WHERE titulo LIKE '%{$titulo}%'");
        return $query->result();
    }

    public function get_only_tarea($id){
        $query = $this->db->query('SELECT t.id, t.titulo, t.descripcion, e.estatus, DATE_FORMAT(t.fecha, "%d/%m/%Y") as fecha FROM tareas t INNER JOIN estatus e ON e.id = t.estatus WHERE t.id = ?', array($id));
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