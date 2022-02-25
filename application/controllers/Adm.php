<?php 
/**
  * 
  */
class Adm extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		cek_sesi();
		error_reporting(0);
	}
	function users()
	{
		$data['page'] = "Users";
		$data['usersdata'] = $this->m_account->get();
		$this->load->view('adm/users',$data);
	}
	function type()
	{
		$data['page'] = "FileType";
		$data['type'] = $this->m_filetype->get();
		$this->load->view('adm/type',$data);
	}
	function server()
	{
		$data['page'] = "Server";
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
		$data['usertoken'] = $UserToken;
		$data['devicekey'] = $DeviceKey;
		$data['deviceid'] = $DeviceID;
		$data['prefix'] = $Prefix;
		$this->load->view('adm/server',$data);
	}
	function saveserver()
	{
		$prefix = $this->input->post("prefix");
		$usertoken = $this->input->post("usertoken");
		$devicekey = $this->input->post("devicekey");
		$deviceid = $this->input->post("deviceid");
		$this->db->set('name', $prefix);
		$this->db->set('usertoken', $usertoken);
		$this->db->set('devicekey', $devicekey);
		$this->db->set('deviceid', $deviceid);
		$this->db->where('id', 1);
		$this->db->update('devices');
		$url = base_url().'adm/server';
		echo $this->session->set_flashdata('success','Configurations Successfully Edited');
		redirect($url);
	}
	function addusers()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$DeviceID = $DeviceData['deviceid'];
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$appname = strtolower($DeviceData['name']);
		$fullname = $this->input->post("fullname");
		$phone = $this->input->post("phone");
		$role = $this->input->post("role");
		$password = time();
		$hash = base64_encode(md5($password));
		$username = $appname."_".time();
		$query=$this->db->get_where('users', array('phone' => $phone));
		if ($query->num_rows()>0) {
			$url = base_url().'adm/users';
			echo $this->session->set_flashdata('error','Phone Number Already Use');
			redirect($url);
		}else{
			$orderdata = [
				'fullname' => $fullname,
				'phone' => $phone,
				'username' => $username,
				'password' => $hash,
				'role' => $role
			];
			$this->db->insert('users', $orderdata);
			$msg = "```Your Account Detail\n\nUsername : $username\nPassword : $password\n\nThank Your For Using $appname```";
			$sendarr = [
				"to" => $id,
				"message" => $msg
			];
			$sendrest = json_encode($sendarr, true);
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => ENDPOINT."/messages/send-text",
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_ENCODING => "",
				CURLOPT_MAXREDIRS => 10,
				CURLOPT_TIMEOUT => 30,
				CURLOPT_SSL_VERIFYHOST => false,
				CURLOPT_SSL_VERIFYPEER => false,
				CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
				CURLOPT_CUSTOMREQUEST => "POST",
				CURLOPT_POSTFIELDS => $sendrest,
				CURLOPT_HTTPHEADER => [
					"Authorization: Bearer ".$UserToken,
					"Content-Type: application/json",
					"device-key: ".$DeviceKey
				],
			]);

			$response = curl_exec($curl);
			$url = base_url().'adm/users';
			echo $this->session->set_flashdata('success','New Users '.$fullname.' Successfully Added');
			redirect($url);
		}
	}
	function addext()
	{
		$ext = $this->input->post('ext');
		$type = $this->input->post('type');
		$query=$this->db->get_where('filetype', array('ext' => $ext));
		if ($query->num_rows()>0) {
			$url = base_url().'adm/type';
			echo $this->session->set_flashdata('error','Extension Available On Database');
			redirect($url);
		}else{
			$data = [
				'ext' => $ext,
				'filetype' => $type
			];
			$this->db->insert('filetype', $data);
			$url = base_url().'adm/type';
			echo $this->session->set_flashdata('success','Extension '.$ext.' Successfully Added');
			redirect($url);
		}
	}
} ?>