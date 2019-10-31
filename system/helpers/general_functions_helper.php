<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if ( ! function_exists('loggedIn'))
{
	function loggedIn()
	{
		//added on version 1.9
		$CI = get_instance();
		if(isset($CI->session->user_id)){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}	

if ( ! function_exists('admin_protect'))
{
	function admin_protect()
	{
		//added on version 1.9
		$CI = get_instance();
		if($CI->session->user_id){
			return TRUE;
		}else{
			return FALSE;
		}
	}
}	
if ( ! function_exists('pageProtect'))
{
	function pageProtect()
	{
		if(!loggedIn()){
			redirect("users");
		}	
		
	}

	 function logout(){
		session_destroy();
		redirect("users");
	}
}

if ( ! function_exists('country_name_from_id'))
{
	function country_name_from_id($id)
	{
		$CI = get_instance();
		$query = $CI->db->get_where('country', array('id'=>$id));
		return $query->row()->country_name;
	}

	
}

if ( ! function_exists('state_name_from_id'))
{
	function state_name_from_id($id)
	{
		$CI = get_instance();
		$query = $CI->db->get_where('state', array('id'=>$id));
		return $query->row()->state_name;
	}

	
}

if ( ! function_exists('lga_name_from_id'))
{
	function lga_name_from_id($id)
	{
		$CI = get_instance();
		$query = $CI->db->get_where('lga', array('id'=>$id));
		return $query->row()->lga_name;
	}

	
}
