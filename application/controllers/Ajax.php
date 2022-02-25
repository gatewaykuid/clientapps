<?php 
/**
  * 
  */
class Ajax extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}
	function CheckContacts()
	{
		$id = $_POST['id'];
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$sendarr = [
			"phone" => $id
		];
		$sendrest = json_encode($sendarr, true);
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => ENDPOINT."/contacts/verify",
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
		$data = json_decode($response);
		if ($data->valid == false) { 
			if ($data->is_business == true) {
				$type = "Business";
			}elseif ($data->is_business == false) {
				$type = "Personal";
			}
			?>
			<center><span style="color: green;"><?=$data->phone?> Registered On <?=$type?> Whatsapp</span></center>
		<?php }
		if ($data->valid == true) { ?>
			<center><span style="color: red;">Phone Not Registered On Whatsapp</span></center>
		<?php }
	}
	function showbuttons()
	{
		$id = $_POST['id'];
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$sendarr = [
			"phone" => $id
		];
		$sendrest = json_encode($sendarr, true);
		$curl = curl_init();
		curl_setopt_array($curl, [
			CURLOPT_URL => ENDPOINT."/contacts/verify",
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
		$data = json_decode($response);
		if ($data->valid == false) { ?>
			<button type="submit" class="btn btn-primary mr-2">Submit</button>
		<?php }
	}
	function ScanQR()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$DeviceID = $DeviceData['deviceid'];
		$curl = curl_init();
		$url = ENDPOINT."/devices/".$DeviceID."/pair";
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
		$metadata = json_decode($response,true);
		?>
		<img src="<?=$metadata['qr_code']?>"><br>
		<?php if ($metadata['status'] == "PAIRED"): ?>
			<h3>Connected</h3>
		<?php endif ?>
		<?php if ($metadata['status'] == "PAIRING"): ?>
			<h3>Waiting Scan</h3>
		<?php endif ?>
		<?php if ($metadata['status'] == "IDLE"): ?>
			<h3>Offline</h3>
		<?php endif ?>
		<?php
	}
	function SendText()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$DeviceID = $DeviceData['deviceid'];
		$phone = $_POST['phone'];
		$msg = $_POST['msg'];
		$sendarr = [
			"to" => $phone,
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
		$data = json_decode($response);
		?>
		<p>MessageID <code> <?=$data->id?></code></p>
		<p>To <code> <?=$data->to?></code></p>
		<p>From <code> <?=$data->from?></code></p>
		<p>GroupMessage <code> <?=$data->from_group?></code></p>
		<p>Message <code> <?=$data->message?></code></p>
		<p>Status <code> <?=$data->status?></code></p>
		<p>Failed Reason <code> <?=$data->failed_reason?></code></p>
		<?php
	}
	function numberbutn()
	{
		$jml = $_POST('id');
		echo $jml;
	}
} ?>