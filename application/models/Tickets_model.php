<?php 
class Tickets_model extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    function add_ticket($ticket)
    {
        $this->db->insert('tickets', $ticket);
    }

    function list_tickets()
    {
        return $query = $this->db->query("SELECT * FROM `tickets`");  
    }

    function ticket_info($id)
    {
        return $query = $this->db->get_where('tickets', array('id'=>$id));  
    }

    function ticket_code_from_id($id)
    {
          $query = $this->db->get_where('tickets', array('id'=>$id));  
         return $query->row()->code;
    }

    function add_action($action)
    {
        $this->db->insert('ticket_action', $action);
    }
    function show_ticket_actions($ticket_id){
        return $query = $this->db->get_where('ticket_action', array('ticket_id'=>$ticket_id)); 
    }

    function ticket_remarks($action_id){
        return $query = $this->db->get_where('action_remarks', array('action_id'=>$action_id)); 
    }
}