<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		error_reporting(0);
		cek_sesi();
	}
	function index()
	{
		$data['page'] = "Dashboard";
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$Prefix = $DeviceData['name'];
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$DeviceID = $DeviceData['deviceid'];
		$curl = curl_init();
		$url = ENDPOINT."/devices/".$DeviceID;
		curl_setopt_array($curl, [
			CURLOPT_URL => $url,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_POSTFIELDS => "",
			CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ".$UserToken
			],
		]);
		$response = curl_exec($curl);
		$showdata = json_decode($response,true);
		$data['phone'] = $showdata['phone'];
		$data['wa_name'] = $showdata['wa_name'];
		$data['manufacture'] = $showdata['manufacture'];
		$data['battery'] = $showdata['battery'];
		$this->load->view('home',$data);
	}
} ?>