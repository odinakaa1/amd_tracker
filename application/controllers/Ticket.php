<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	
	/* Users Page Controller
	*
	* This class handles user Admin  related functionality
	* @author		Isaac Odinaka FRanklin
	* @email		isaacodinakafranklinlin@gmail.com
	*/

	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form'));
        $this->load->library('form_validation');
        
        $this->load->model('location_model');
		$this->load->model('tickets_model');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger col-xs-12"> ', '</div>');
		
        $this->load->model('analysers_model');
		$this->load->model('user_model');
		pageProtect();
	}
	public function index()
		
	{   
		// pageProtect();
		// $this->load->view('templates/admin/header');
		// $this->load->view('templates/admin/nav');
		// $this->load->view('admin_home_view');
		
		$data["title"] = "Advance Medisystem Engineers | Tickets";
		
		$data["tickets"] = $this->tickets_model->list_tickets();
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_tickets_view', $data);
        $this->load->view('templates/admin/footer');
	}
	
	function tickets_more_info($code=1){
		$data["tickets"] = $this->tickets_model->ticket_info($code);
		//$data["remarks"] = $this->tickets_model->ticket_remarks($this->tickets_model->ticket_code_from_id($code));
		
		$data["ticket_actions"] = $this->tickets_model->show_ticket_actions($this->tickets_model->ticket_code_from_id($code));
		$data["title"] = "Ticket overview";
		$this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('tickets_more_info_view', $data);
        $this->load->view('templates/admin/footer');

	}
	function comment_ticket($code=1){
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/nav');
        $this->load->view('comment_ticket_view');
        $this->load->view('templates/admin/footer');

	}

	public function create_ticket()
		
	{   
		pageProtect();
		
		$this->form_validation->set_rules('facility', 'Facility', 'required');
		$this->form_validation->set_rules('complaint', 'Complaint', 'required');
		$this->form_validation->set_rules('analyser', 'analyser', 'required');
		// $this->form_validation->set_rules('comment', 'Clients Complains', 'required');
		$data["facility"] = $this->location_model->list_facility();
		$data["analysers"] = $this->analysers_model->list_analysers();
		if($this->form_validation->run()== FALSE){
		$data['title'] = " Create a Ticket";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('create_ticket_view');
        $this->load->view('templates/admin/footer');
		}
		else{
			$ticket['facility_id'] = $this->input->post('facility');
			$ticket['engr_id'] = $this->session->user_id;
			$ticket['analyser'] = $this->input->post('analyser');
			$ticket['complains'] = $this->input->post('complaint');
			$ticket['notes'] = $this->input->post('comment');
			
			$ticket['code']= $this->input->post('facility')."/".$this->next_ticket_auto_increament();
			$date_object = date_create("", new DateTimeZone('Africa/Lagos')) ;			
			$ticket['date_time'] = date_format($date_object,"Y/m/d H:i:s");
			$this->tickets_model->add_ticket($ticket);
			$this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Ticket <bold>'.$ticket['code'].'</bold> createdcred Successfully </div>');
			redirect(site_url("ticket/create_ticket"));
			// $datetime2 = new DateTime();
			//  $difference = $datetime1->diff(new DateTime()); 
  
			// Getting the difference between two 
			// given DateTime objects 
			//echo $difference->format('%R%h '); 

			
			
			// $this->location_model->add_country($data);
			// $this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Country Added Successfully </div>
			// ');
			// redirect(site_url('location/addcountry'));	
		}
	}

	function next_ticket_auto_increament(){
		$query = $this->db->query( 'SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = "amd_engrs" AND TABLE_NAME = "tickets"');   
		return $query->row()->AUTO_INCREMENT;
	}


	public function add_action($ticket)
		
	{   
		pageProtect();	
		$this->form_validation->set_rules('start_date', 'Start Date', 'required');
		$this->form_validation->set_rules('start_time', 'Start Time', 'required');
		$this->form_validation->set_rules('end_date', 'End Date', 'required');
		$this->form_validation->set_rules('end_time', 'End Time', 'required');
		$this->form_validation->set_rules('action', 'Action', 'required');
		// $this->form_validation->set_rules('comment', 'Clients Complains', 'required');
		$data["facility"] = $this->location_model->list_facility();
		$data["analysers"] = $this->analysers_model->list_analysers();
		 $data['ticket'] = $this->tickets_model->ticket_code_from_id($ticket);
		if($this->form_validation->run()== FALSE){
		$data['title'] = "Add action to ticket";
		
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('add_action_view', $data);
        $this->load->view('templates/admin/footer');
		}
		else{
			$action['start_date'] = $this->input->post('start_date');
			$action['start_time'] = $this->input->post('start_date');
			$action['end_date'] = $this->input->post('end_date');
			$action['end_time'] = $this->input->post('end_time');
			$action['action'] = $this->input->post('action');
			$action['over_time']= $this->input->post('over_time');
			$action['ticket_id']= $this->input->post('code');
			// $action['date_time'] = date('Y-m-d H:i:s');
			$this->tickets_model->add_action($action);
			$this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Action added to ticket Successfully </div>');
			redirect(site_url("ticket"));
			// $datetime2 = new DateTime();
			//  $difference = $datetime1->diff(new DateTime()); 
  
			// Getting the difference between two 
			// given DateTime objects 
			//echo $difference->format('%R%h '); 

			
			
			// $this->location_model->add_country($data);
			// $this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Country Added Successfully </div>
			// ');
			// redirect(site_url('location/addcountry'));	
		}
	}

}