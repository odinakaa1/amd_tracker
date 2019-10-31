<?php
class User_model extends CI_Model {
	/* UseAnalysersrs Page Controller
	*
	* This class handles user Analysers  related functionality
	* @author		Isaac Odinaka Franklin
	* @email		isaacodinakafranklinlin@gmail.com
    */
    public function __construct(){
        parent::__construct();
        $this->load->database();
        
    }

    function list_users()
    {
       return  $this->db->query('SELECT * FROM users');
    }
}