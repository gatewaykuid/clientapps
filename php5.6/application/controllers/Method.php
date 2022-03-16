<?php 
/**
  * 
  */
class Method extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}
	function list()
	{
		$data['page'] = "Method GET";
		$this->load->view('method/list',$data);
	}
} ?>