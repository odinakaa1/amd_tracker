<?php 
class Location_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function add_country($country_name){
        $this->db->insert('country', $country_name);
        return $this->db->insert_id();
    }

     function country_exist($country_name){
        $query = $this->db->get_where('country', array('country_name'=>$country_name));
        return $query->num_rows();    
    }

    function add_state($data){
        $query = $this->db->insert('state', $data);
        return $this->db->insert_id();
    }

    function list_countries(){
        return $query = $this->db->query("SELECT * FROM `state`");   
    
    }
}