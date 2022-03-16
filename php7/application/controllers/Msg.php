<?php 
/**
  * 
  */
class Msg extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		error_reporting(0);
		cek_sesi();
	}
	function text()
	{
		$data['page'] = "Text Message";
		$this->load->view('msg/text',$data);
	}
	function media()
	{
		$data['page'] = "Media Message";
		$this->load->view('msg/media',$data);
	}
	function button()
	{
		$data['page'] = "Button Message";
		$this->load->view('msg/btn',$data);
	}
	function locations()
	{
		$data['page'] = "Locations Message";
		$this->load->view('msg/locations',$data);
	}
	function sticker()
	{
		$data['page'] = "Sticker Message";
		$this->load->view('msg/sticker',$data);
	}
	function contact()
	{
		$data['page'] = "Contact Message";
		$data['localcontact'] = $this->m_account->getcontact();
		$this->load->view('msg/contact',$data);
	}
	function SendSticker()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$config['upload_path'] = 'sticker/';
		$config['allowed_types'] = 'png|gif|jpeg|jpg';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if (!empty($_FILES['media']['name'])) {
			if ($this->upload->do_upload('media')) {
				$file = $this->upload->data();
				$filename = $file['file_name'];
				$fileup = base_url() . "sticker/" .$filename;
				$phone = $this->input->post('phone');
				$dataarr = [
					"to" => $phone,
					"media" => $fileup
				];
				$sendrest = json_encode($dataarr, true);
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
				$data = json_decode($response.true);
				$url = base_url().'msg/sticker';
				echo $this->session->set_flashdata('success', $data->message);
				redirect($url);
			}else{
				$url = base_url().'msg/sticker';
				echo $this->session->set_flashdata('warning','Upload File Failed');
				redirect($url);
			}
		}
	}
	function SendButton()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$phone = $this->input->post('phone');
		$msg = $this->input->post('msg');
		$button1 = $this->input->post('button1');
		$button2 = $this->input->post('button2');
		$button3 = $this->input->post('button3');
		$button4 = $this->input->post('button4');
		$respons1 = $this->input->post('respons1');
		$respons2 = $this->input->post('respons2');
		$respons3 = $this->input->post('respons3');
		$respons4 = $this->input->post('respons4');
		$footer = $this->input->post('footer');
		if ($button1 != NULL) {
			if ($button2 != NULL) {
				if ($button3 != NULL) {
					if ($button4 != NULL) {
						$sendarr = [
							"to" => $phone,
							"message" => $msg,
							"footer" => $footer,
							"buttons" => [
								$button1,$button2,$button3,$button4
							],
							"replies" => [
								$respons1,$respons2,$respons3,$respons4
							]
						];
					}else{
						$sendarr = [
							"to" => $phone,
							"message" => $msg,
							"footer" => $footer,
							"buttons" => [
								$button1,$button2,$button3
							],
							"replies" => [
								$respons1,$respons2,$respons3
							]
						];
					}
				}else{
					$sendarr = [
						"to" => $phone,
						"message" => $msg,
						"footer" => $footer,
						"buttons" => [
							$button1,$button2
						],
						"replies" => [
							$respons1,$respons2
						]
					];
				}
			}else{
				$sendarr = [
					"to" => $phone,
					"message" => $msg,
					"footer" => $footer,
					"buttons" => [
						$button1
					],
					"replies" => [
						$respons1
					]
				];
			}
		}
	}
	function SendMedia()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$config['upload_path'] = 'media/';
		$config['allowed_types'] = '*';
		$config['encrypt_name'] = TRUE;
		$this->upload->initialize($config);
		if (!empty($_FILES['media']['name'])) {
			if ($this->upload->do_upload('media')) {
				$file = $this->upload->data();
				$filename = $file['file_name'];
				$fileup = base_url() . "media/" .$filename;
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$query = $this->db->get_where('filetype', array('ext' => $ext));
				$phone = $this->input->post('phone');
				$pesan = $this->input->post('msg');
				if($query->num_rows() > 0){
					$row = $query->row_array();
					$typeupload = $row['filetype'];
				}else{
					$typeupload = "document";
				}
				$dataarr = [
					"to" => $phone,
					"message" => $pesan,
					"media_url" => $fileup,
					"type" => $typeupload
				];
				$sendrest = json_encode($dataarr, true);
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
				$data = json_decode($response.true);
				$url = base_url().'msg/media';
				echo $this->session->set_flashdata('success', $data->id.' Media messages are in progress');
				redirect($url);
			}else{
				$url = base_url().'msg/media';
				echo $this->session->set_flashdata('warning','Upload File Failed');
				redirect($url);
			}
		}
	}
	function manualcontact()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$recipient = $this->input->post('recipient');
		$phone = $this->input->post('phone');
		$name = $this->input->post('name');
		$org = $this->input->post('org');
		if (!empty($org)) {
			$dataarr = [
				"to" => $recipient,
				"name" => $name,
				"org" => $org,
				"contact" => $phone
			];
		}else{
			$dataarr = [
				"to" => $recipient,
				"name" => $name,
				"contact" => $phone
			];
		}
		$sendrest = json_encode($dataarr, true);
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
		echo $response;
	}
	function dbcontact()
	{
		$DeviceData = $this->db->get_where('devices', ['id' => 1])->row_array();
		$UserToken = $DeviceData['usertoken'];
		$DeviceKey = $DeviceData['devicekey'];
		$recipient = $this->input->post('recipient');
		$contact = $this->input->post('contact');
		$GetContact = $this->db->get_where('contact', ['id' => $contact])->row_array();
		$name = $GetContact['name'];
		$org = $GetContact['org'];
		$phone = $GetContact['phone'];
		if (!empty($org)) {
			$dataarr = [
				"to" => $recipient,
				"name" => $name,
				"org" => $org,
				"contact" => $phone
			];
		}else{
			$dataarr = [
				"to" => $recipient,
				"name" => $name,
				"contact" => $phone
			];
		}
		$sendrest = json_encode($dataarr, true);
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
		echo $response;
	}
}
?>