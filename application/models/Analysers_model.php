<?php 
class Analysers_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function add_brand($analysers)
    {
        $this->db->insert('brands', $analysers);
    }

    function get_brands(){
        return $query = $this->db->query("SELECT * FROM `brands`");   
    }

    function add_model($model)
    {
        $this->db->insert('model', $model);
    }

    function add_analyser($analyser)
    {
        $this->db->insert('analysers', $analyser);
    }

    function list_models(){
        return $query = $this->db->query("SELECT * FROM `model`");   
    }

    function list_analysers(){
        return $query = $this->db->query("SELECT * FROM `analysers`");   
    }
}