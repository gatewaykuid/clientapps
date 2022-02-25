<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}
	function index()
	{
		cek_sesi_login();
		$data['page'] = 'Login';
		$this->load->view('auth/login',$data);
	}
	function gologin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$hash = base64_encode(md5($password));
		$cek_login	= $this->m_account->auth($username,$hash);
		if ($cek_login->num_rows() == 1) {
			$row = $cek_login->row();
			$this->session->set_userdata(array(
				'logged'	=> 'true',
				'userid'    => $row->id,
				'fullname'  => $row->fullname,
				'role'     	=> $row->role,
				'agent'    	=> $this->agent->browser().' '.$this->agent->version()
			));
			$url = base_url().'home';
			echo $this->session->set_flashdata('success','Welcome '.$row->fullname);
			redirect($url);
		}else{
			$url = base_url().'login';
			echo $this->session->set_flashdata('error','email or password invalid');
			redirect($url);
		}
	}
	function logout()
	{
		$this->session->unset_userdata('userid');
		$this->session->sess_destroy();
		$url = base_url().'login';
		echo $this->session->set_flashdata('success','Logout Success');
		redirect($url);
	}
} ?>