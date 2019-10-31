<?php
class Analysers extends CI_Controller {
	/* UseAnalysersrs Page Controller
	*
	* This class handles user Analysers  related functionality
	* @author		Isaac Odinaka Franklin
	* @email		isaacodinakafranklinlin@gmail.com
    */
    public function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->helper(array('form'));
        $this->load->library('form_validation');
        
        $this->load->model('location_model');
        
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger col-xs-12"> ', '</div>');
		
        $this->load->model('analysers_model');
        $this->load->model('user_model');
	}
    function index(){
        pageProtect();
        $data['title'] = " All Analysers";
        $data["analysers"] = $this->analysers_model->list_analysers();
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_analysers_view', $data);
        $this->load->view('templates/admin/footer');
    }
    
    public function add_brand(){
        pageProtect();
        $this->form_validation->set_rules('brand_name', ' Brand Name', 'required');
        // $this->form_validation->set_rules('contact_name', ' Contact Name', 'required');
        // $this->form_validation->set_rules('contact_email', ' Contact email', 'required');
        // $this->form_validation->set_rules('brand_supervisor', ' Brand Supervisor', 'required');
        if($this->form_validation->run()==FALSE)
        {
        $data['title'] = " Add A Brand";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('add_brand_view');
        $this->load->view('templates/admin/footer');
        }
        else{
        $analysers["brand_name"] = $this->input->post('brand_name');
        $analysers["contact_name"] = $this->input->post('contact_name');
        $analysers["contact_email"] = $this->input->post('contact_email');
        $analysers["contact_phone"] = $this->input->post('contact_phone');
        $analysers["brand_supervisor"] = $this->input->post('brand_supervisor');
    
        $analysers["website"] = $this->input->post('website');
        $this->analysers_model->add_brand($analysers);
        $this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Brand Added Successfully </div');
        redirect('analysers/add_brand');
        }
    }

    function all_brands(){
        pageProtect();
        $data['brands'] = $this->analysers_model->get_brands();
		$data['title'] = " All Brands";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_brands_view');
        $this->load->view('templates/admin/footer');
    }

    function add_analyser(){
        pageProtect();
        
        $this->form_validation->set_rules('facility', 'Facility Code', 'required');
        $this->form_validation->set_rules('model', 'Model Code', 'required');
        $this->form_validation->set_rules('date', 'Install Date', 'required');
        $this->form_validation->set_rules('serial', 'Serial Number', 'required');
        $this->form_validation->set_rules('installer', 'Person who installed it', 'required');
        if($this->form_validation->run()==FALSE){
        $data['title'] = " All Brands";
        $data['facility'] = $this->location_model->list_facility();
        $data['brands'] = $this->analysers_model->get_brands();
        $data['models'] = $this->analysers_model->list_models();
        $data['users'] = $this->user_model->list_users();
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('add_analyser_view',$data);
        $this->load->view('templates/admin/footer');
        }else{
            $analyser["facility_code"] = $this->input->post("facility");
            $analyser["brand_name"] = $this->input->post("brands");
            $analyser["model_number"] = $this->input->post("model");
            $analyser["serial"] = $this->input->post("serial");
            $analyser["mac_addr"] = $this->input->post("mac");
            $analyser["install_date"] = $this->input->post("date");
            $analyser["installer"] = $this->input->post("installer");
            $analyser["comment"] = $this->input->post("comment");
            $this->analysers_model->add_analyser($analyser);
            $this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Brand model succesfully added </div>');
            redirect("analysers/add_analyser");
        }
    }
    
    function models(){
        pageProtect();
        // $data['brands'] = $this->analysers_model->get_brands();
		$data['title'] = " All Models";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('all_models_view');
        $this->load->view('templates/admin/footer');
    }

    
    function add_model(){
        pageProtect();
        $this->form_validation->set_rules('brand', 'Brand', 'required');
        $this->form_validation->set_rules('model', 'Model', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
       if ($this->form_validation->run()==FALSE)
       {
        $data['brands'] = $this->analysers_model->get_brands();
		$data['title'] = " All Models";
        $this->load->view('templates/admin/header', $data);
		$this->load->view('templates/admin/nav');
        $this->load->view('add_analyser_model_view', $data);
        $this->load->view('templates/admin/footer');
       }else
        {
            $model["brand_name"] = $this->input->post("brand");
            $model["model_name"] = $this->input->post("model");
            $model["category"] = $this->input->post("category");
            $this->analysers_model->add_model($model);
            $this->session->set_flashdata('msg', '<div class="alert alert-success col-xs-3"> Brand model succesfully added </div>');
            redirect(site_url("analysers/add_model"));
        }
    }
}