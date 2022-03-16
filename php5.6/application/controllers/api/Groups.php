<?php 
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . '/libraries/REST_Controller.php';
class Groups extends REST_Controller
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
		if ($type == 1) {
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => ENDPOINT."/groups",
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
					"Authorization: Bearer ".$UserToken,
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
		}elseif($type == 2){
			$group_id = $this->get('group_id');
			$curl = curl_init();
			curl_setopt_array($curl, [
				CURLOPT_URL => ENDPOINT."/groups/".$group_id,
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
					"Authorization: Bearer ".$UserToken,
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
				'1' => "View All Group",
				'2' => "View Spesific Groups",
			);
			$this->response(array('status' => 'error','message' => 'Wrong Type','Type' => $data));
		}
	}
} ?>