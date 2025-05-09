<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tareas_model extends CI_Model {

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function get_all_tareas(){
        $query = $this->db->get('tareas');
        return $query->result();
    }
}