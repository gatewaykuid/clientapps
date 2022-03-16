<?php 
/**
  * 
  */
class Contact extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}
	function api()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => ENDPOINT."/contacts?limit=999999999",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_POSTFIELDS => $sendrest,
			CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ".$UserToken,
				"Content-Type: application/json",
				"device-key: ".$DeviceKey
			],
		]);

		$response = curl_exec($curl);
		$contactapi = json_decode($response,true)['data'];
		$data['page'] = "API Contact";
		$data['result'] = $contactapi;
		$this->load->view('contact/api',$data);
	}
	function local()
	{
		$data['page'] = "Local Contact";
		$data['localcontact'] = $this->m_account->getcontact();
		$this->load->view('contact/local',$data);
	}
	function sync()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => ENDPOINT."/contacts?limit=999999999",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "GET",
			CURLOPT_POSTFIELDS => $sendrest,
			CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ".$UserToken,
				"Content-Type: application/json",
				"device-key: ".$DeviceKey
			],
		]);

		$response = curl_exec($curl);
		$contactapi = json_decode($response,true)['data'];
		foreach($contactapi as $get){
			$query=$this->db->get_where('contact', array('phone' => $get['phone']));
			if ($query->num_rows() == 0) {
				if (empty($get['name'])) {
					$name =".";
				}else{
					$name = $get['name'];
				}
				$data = [
					'name' => $name,
					'phone' => $get['phone']
				];
				$this->db->insert('contact', $data);
			}
		}
		$url = base_url().'contact/api';
		echo $this->session->set_flashdata('success','Sync complete');
		redirect($url);
	}
	function disable()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$dataarr = [
			"sync_contact" => false
		];
		$sendrest = json_encode($dataarr, true);
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => ENDPOINT."/setting",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "PATCH",
			CURLOPT_POSTFIELDS => $sendrest,
			CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ".$UserToken,
				"Content-Type: application/json",
				"device-key: ".$DeviceKey
			],
		]);
		$response = curl_exec($curl);
		$url = base_url().'contact/api';
		echo $this->session->set_flashdata('success','Sync Contact Disable');
		redirect($url);
	}
	function enable()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$dataarr = [
			"sync_contact" => true
		];
		$sendrest = json_encode($dataarr, true);
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => ENDPOINT."/setting",
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => "",
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 30,
			CURLOPT_SSL_VERIFYHOST => false,
			CURLOPT_SSL_VERIFYPEER => false,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => "PATCH",
			CURLOPT_POSTFIELDS => $sendrest,
			CURLOPT_HTTPHEADER => [
				"Authorization: Bearer ".$UserToken,
				"Content-Type: application/json",
				"device-key: ".$DeviceKey
			],
		]);
		$response = curl_exec($curl);
		$url = base_url().'contact/api';
		echo $this->session->set_flashdata('success','Sync Contact Enable');
		redirect($url);
	}
} ?>