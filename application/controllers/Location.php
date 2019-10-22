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
		// pageProtect();
		// $this->load->view('templates/admin/header');
		// $this->load->view('templates/admin/nav');
		// $this->load->view('admin_home_view');
		$data['title'] = " All Locations";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_tickets_view');
        $this->load->view('templates/admin/footer');
	}
	
	public function all_country()
		
	{   
		pageProtect();
		$data['title'] = " All Country";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_country_view');
        $this->load->view('templates/admin/footer');
	}

	public function all_state()
		
	{   
		pageProtect();
		$data['title'] = " All state";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_state_view');
        $this->load->view('templates/admin/footer');
	}

	public function all_lga()
		
	{   
		pageProtect();
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
	public function list_countries(){
		return $countries = $this->location_model->list_countries();
		
	}
}