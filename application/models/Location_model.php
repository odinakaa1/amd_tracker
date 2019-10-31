<?php 
class Location_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('location_model');
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
        return $query = $this->db->query("SELECT * FROM `country`");   
    
    }
     function list_states(){
        return $query = $this->db->query("SELECT * FROM `state`");  
     }

     function list_lga(){
        return $query = $this->db->query("SELECT * FROM `lga`");  
     }
     function add_lga($lga){
         $this->db->insert('lga', $lga);
         return $this->db->insert_id();
     }

     function add_facility($facility){
        $this->db->insert('facility', $facility);
        return $this->db->insert_id();
    }
    function list_facility(){
        return $query = $this->db->query("SELECT * FROM `facility`");  
     }

    function next_facility_auto_increament(){
    $query = $this->db->query( 'SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "amd_engrs" AND TABLE_NAME = "facility"');   
    return $query->row()->AUTO_INCREMENT;
    }
}
