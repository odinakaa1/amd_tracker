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

if ( ! function_exists('user_name_from_id'))
{
	function user_name_from_id($id)
	{
		$CI = get_instance();
		$query = $CI->db->get_where('users', array('id'=>$id));
		$fname = $query->row()->fname;
		$lname = $query->row()->lname;
		return array($fname, $lname);
	}	
}

if ( ! function_exists('facility_name_from_code'))
{	function facility_name_from_code($code)
	{
	$CI = get_instance();
	$query= $CI->db->get_where('facility', array('facility_code'=>$code));
	return $query->row()->facility_name;
	
	}
}

if ( ! function_exists('date_difference'))
{	function date_difference($id)
	{
	$CI = get_instance();
	$query= $CI->db->get_where('tickets', array('id'=>$id));
	$date_object = date_create("", new DateTimeZone('Africa/Lagos')) ;
	$datetime1 = new DateTime($query->row()->date_time);
	$datetime2 = new DateTime();
	$interval = $datetime1->diff($datetime2);
	echo $interval->format('%m Month(s), %d Day(s) %H Hours, %i Minute(s), %s Second(s)');
	   //$datetime2 = date_format($datetime2,"Y/m/d H:i:s");
		//$difference = $date1->diff($datetime2); 
  
			//echo $difference->format('%R%h '); 
	
	
	}
}

if ( ! function_exists('action_remarks'))
{	function action_remarks($action_id)
	{
	$CI = get_instance();
	return $query= $CI->db->get_where('action_remarks', array('action_id'=>$action_id));
	   //$datetime2 = date_format($datetime2,"Y/m/d H:i:s");
		//$difference = $date1->diff($datetime2); 
  
			//echo $difference->format('%R%h '); 	
	}
}

