<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Location extends CI_Controller {

	
	/* Users Page Controller
	*
	* This class handles user Admin  related functionality
	* @author		Isaac Odinaka FRanklin
	* @email		isaacodinakafranklinlin@gmail.com
	*/

	// public function __contstruct()
	// {
	// 	parent::__construct();
		
	// }
	public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger col-lg-12"> ', '</div>');
		
		$this->load->model('location_model');
	}
	public function index()
		
	{   
		pageProtect();
		$data['title'] = " All Locations";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_tickets_view');
        $this->load->view('templates/admin/footer');
	}
	
	public function all_country()
		
	{   
		pageProtect();
		$data["countries"] = $this->list_countries();
		$data['title'] = " All Country";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_country_view', $data);
        $this->load->view('templates/admin/footer');
	}

	public function all_state()
		
	{   
		pageProtect();
		$data["states"] = $this->list_states();
		$data['title'] = " All state";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_state_view');
        $this->load->view('templates/admin/footer');
	}

	public function all_lga()
		
	{   
		
		pageProtect();
		$data["lga"] = $this->list_lga();
		$data['title'] = " All LGA";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_lga_view');
        $this->load->view('templates/admin/footer');
	}
	public function addcountry()
		
	{   
		pageProtect();
		$this->form_validation->set_rules('country_name', 'Country Name', 'required|callback_country_exist', array('country_exist'=>'Ooops! Country already Exist'));
		
		if($this->form_validation->run()== FALSE){
		$data['title'] = " Add Country";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('addcountry');
        $this->load->view('templates/admin/footer');
		}
		else{
			$data['country_name'] = $this->input->post('country_name');
			
			$this->location_model->add_country($data);
			$this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Country Added Successfully </div>
			');
			redirect(site_url('location/addcountry'));
		}
	}

	public function add_state()
		
	{ 
	pageProtect();
	$data["countries"] = $this->location_model->list_countries();
	$this->form_validation->set_rules('state', 'State', 'required|is_unique[state.state_name]', array('is_unique'=>'State already Exist'));  
	$this->form_validation->set_rules('country', 'Country', 'required');
	if($this->form_validation->run()== FALSE)
	{
		
		$data['title'] = " Add state";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('add_state_view', $data);
        $this->load->view('templates/admin/footer');
	}
		else{
			$state['state_name'] = $this->input->post('state');
			$state['country_id'] = $this->input->post('country');
			$this->location_model->add_state($state);
			$this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Country Added Successfully </div>
			');
			redirect(site_url('location/add_state'));
		}
	}

	  function country_exist($country_name)
	  {
		 $this->location_model->country_exist($country_name);
		 if($this->location_model->country_exist($country_name)>0){
			
			// $this->form_validation->set_message('country_exist', 'Oops, Country already exist');
			return  FALSE;
			}else{
				return TRUE;
			}
		// echo country_exist($country_name);
	}
	function list_countries(){
		return $this->location_model->list_countries();
		
	}
	
	function list_states(){
		return $this->location_model->list_states();
	}

	function list_lga(){
		return $this->location_model->list_lga();
	}

	public function add_lga(){

		$this->form_validation->set_rules('lga', 'LGA', 'required|is_unique[lga.lga_name]', array('is_unique'=>'LGA already Exist'));  
		$this->form_validation->set_rules('state', 'state', 'required'); 
		$this->form_validation->set_rules('country', 'country', 'required');  

		$data["countries"] = $this->location_model->list_countries();
		$data["states"] = $this->location_model->list_states();
		if($this->form_validation->run()==FALSE){
		$data["countries"] = $this->location_model->list_countries();
		$data["states"] = $this->location_model->list_states();
		$data['title'] = " Add LGA";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('add_lga_view', $data);
        $this->load->view('templates/admin/footer');
		}else{
			 $lga["lga_name"] = $this->input->post('lga');
			 $lga["state_id"] = $this->input->post('state');
			 $lga["country_id"] = $this->input->post('country');
			$this->location_model->add_lga($lga);
			$this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Country Added Successfully </div>
			');
			redirect(site_url('location/add_lga'));
		}
	}

	public function add_facility(){

		$this->form_validation->set_rules('lga', 'LGA', 'required');  
		$this->form_validation->set_rules('facility_name', 'facility name', 'required');  
		$this->form_validation->set_rules('state', 'state', 'required'); 
		$this->form_validation->set_rules('country', 'country', 'required');
		$this->form_validation->set_rules('contact_person_name', 'Contact Person Phone', 'required');
		$this->form_validation->set_rules('facility_prefix', 'Contact Person Prefix', 'required'); 

		$this->form_validation->set_rules('address', 'Facility Address and house number', 'required'); 

		
		if($this->form_validation->run()==FALSE){
			
		$data["lga"] = $this->location_model->list_lga();
		$data["countries"] = $this->location_model->list_countries();
		$data["states"] = $this->location_model->list_states();
		$data['title'] = " All Facilities";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('add_facility_view', $data);
        $this->load->view('templates/admin/footer');
		}else{
			 $add_facility["lga_id"] = $this->input->post('lga');
			 $add_facility["facility_name"] = $this->input->post('facility_name');
			 $add_facility["state_id"] = $this->input->post('state');
			 $add_facility["country_id"] = $this->input->post('country');
			 $add_facility["contact_person"] = $this->input->post('contact_person_name');
			 $add_facility["contact_email"] = $this->input->post('contact_person_email');
			 $add_facility["contact_phone"] = $this->input->post('contact_person_phone');
			 $add_facility["address"] = $this->input->post('address');
			 $add_facility["facility_code"] = strtoupper($this->input->post('facility_prefix')."/".$this->create_facility_code());
			$this->location_model->add_facility($add_facility);
			$this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Facility Added Successfully </div>
			');
			redirect(site_url('location/add_facility'));
		}
	}

	public function all_facilities(){
		
		$data["facility"] = $this->location_model->list_facility();
		
		$data['title'] = " All Facilities";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_facility_view', $data);
        $this->load->view('templates/admin/footer');
	}

	 function create_facility_code(){
		return $this->location_model->next_facility_auto_increament();
	}
}