<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	
	/* Users Page Controller
	*
	* This class handles user Admin  related functionality
	* @author		Isaac Odinaka FRanklin
	* @email		isaacodinakafranklinlin@gmail.com
    */
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form'));
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<div class="alert alert-danger" role="alert">', '</div>');
        //$this->load->library('session');
    }
	public function index()
	{   
        $password = $this->input->post('password');
        $this->form_validation->set_rules('email', 'User Name', 'callback_username_check['.$password.']', array('username_check'=>'We are sorry, that username or password combinations is not correct.') );
        $this->form_validation->set_rules('password', 'Password', 'required');
        
        if ($this->form_validation->run() == FALSE)
        {  $data['title'] = " Login Page";
			$this->load->view('templates/admin/header', $data);
			$this->load->view('templates/admin/nav');
            $this->load->view('login');
			$this->load->view('templates/admin/footer');
            
        }
        else
        {
                //$this->load->view('admin');
                redirect('admin');
        }
        
       
    }
    
    public function username_check($email, $password){ 
        $query = $this->db->get_where('users', array('user_name' => $email));
        if(($query->num_rows()==1))
        {
            $dbPass = $query->row()->password;
            if(password_verify($password, $dbPass))
            {
            $this->session->user_id = $query->row()->id;
            return TRUE;
            die();
            }
            else{
                return FALSE;
            }
        }
           
        

    
    }

    public function enc(){
       echo pageProtect();
    //    session_destroy();
    }

    public function logout(){
		session_destroy();
		redirect("users");
	}
}