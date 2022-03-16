<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Send extends REST_Controller
{

	function __construct()
	{
		parent::__construct();
		error_reporting(0);
	}

	function index_get()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$type = $this->get('type');
		$to = $this->get('to');
		if ($type == 1) {
			$msg = $this->get('msg');
			$sendarr = [
				"to" => $to,
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
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
			}
		}elseif ($type == 2) {
			$url = $this->get('url');
			$msg = $this->get('msg');
			$ext = pathinfo($url, PATHINFO_EXTENSION);
			$query = $this->db->get_where('filetype', array('ext' => $ext));
			$pesan = $this->input->post('msg');
			if($query->num_rows() > 0){
				$row = $query->row_array();
				$typeupload = $row['filetype'];
			}else{
				$typeupload = "document";
			}
			$sendarr = [
				"to" => $to,
				"message" => $msg,
				"media_url" => $url,
				"type" => $typeupload
			];
			$sendrest = json_encode($sendarr, true);
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => ENDPOINT."/messages/send-media",
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
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
			}
		}elseif ($type == 3) {
			$msg = $this->get('msg');
			$button = $this->get('button');
			$reply = $this->get('reply');
			$footer = $this->get('footer');
			$buttons = explode(",",$button);
			$replys = explode(",",$reply);
			$jumlah = count($buttons);
			if ($jumlah == 1) {
				$sendarr = [
					"to" => $to,
					"message" => $msg,
					"footer" => $footer,
					"buttons" => [
						$buttons[0]
					],
					"replies" => [
						$replys[0]
					]
				];
			}elseif ($jumlah == 2) {
				$sendarr = [
					"to" => $to,
					"message" => $msg,
					"footer" => $footer,
					"buttons" => [
						$buttons[0],$buttons[1]
					],
					"replies" => [
						$replys[0],$replys[1]
					]
				];
			}elseif ($jumlah == 3) {
				$sendarr = [
					"to" => $to,
					"message" => $msg,
					"footer" => $footer,
					"buttons" => [
						$buttons[0],$buttons[1],$buttons[2]
					],
					"replies" => [
						$replys[0],$replys[1],$replys[2]
					]
				];
			}elseif ($jumlah == 4) {
				$sendarr = [
					"to" => $to,
					"message" => $msg,
					"footer" => $footer,
					"buttons" => [
						$buttons[0],$buttons[1],$buttons[2],$buttons[3]
					],
					"replies" => [
						$replys[0],$replys[1],$replys[2],$replys[3]
					]
				];
			}
			$sendrest = json_encode($sendarr, true);
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => ENDPOINT."/messages/send-buttons",
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
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
			}
		}elseif ($type == 4) {
			$url = $this->get('url');
			$sendarr = [
				"to" => $to,
				"media" => $url
			];
			$sendrest = json_encode($sendarr, true);
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => ENDPOINT."/messages/send-sticker",
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
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
			}
		}elseif ($type == 5) {
			$org = $this->get('org');
			$name = $this->get('name');
			$phone = $this->get('phone');
			if (empty($org)) {
				$sendarr = [
					"to" => $to,
					"name" => $name,
					"contact" => $phone
				];
			}else{
				$sendarr = [
					"to" => $to,
					"name" => $name,
					"org" => $org,
					"contact" => $phone
				];
			}
			$sendrest = json_encode($sendarr, true);
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => ENDPOINT."/messages/send-contact",
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
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
			}
		}elseif ($type == 6) {
			$coor = $this->get('coor');
			$locations = explode(",",$coor);
			$sendarr = [
				"to" => $to,
				"latitude" => $locations[0],
				"longitude" => $locations[1]
			];
			$sendrest = json_encode($sendarr, true);
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => ENDPOINT."/messages/send-location",
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
			$err = curl_error($curl);

			curl_close($curl);

			if ($err) {
				echo "cURL Error #:" . $err;
			} else {
				echo $response;
			}
		}else{
			$data = array(
				'1' => "Text Message",
				'2' => "Media Message",
				'3' => "Buttons Message",
				'4' => "Sticker Message",
				'5' => "vCard Message",
				'6' => "Locations Message",
			);
			$this->response(array('status' => 'error','message' => 'Wrong Type','Type' => $data));
		}
	}
} ?>