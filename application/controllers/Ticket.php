<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ticket extends CI_Controller {

	
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
	public function index()
		
	{   
		// pageProtect();
		// $this->load->view('templates/admin/header');
		// $this->load->view('templates/admin/nav');
        // $this->load->view('admin_home_view');
        $this->load->view('templates/admin/header');
		$this->load->view('templates/admin/nav');
        $this->load->view('all_tickets_view');
        $this->load->view('templates/admin/footer');
	}
	
	function tickets_more_info($code=1){
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/nav');
        $this->load->view('tickets_more_info_view');
        $this->load->view('templates/admin/footer');

	}
	function comment_ticket($code=1){
		$this->load->view('templates/admin/header');
		$this->load->view('templates/admin/nav');
        $this->load->view('comment_ticket_view');
        $this->load->view('templates/admin/footer');

	}
}