<?php 
/**
  * 
  */
class M_account extends CI_Model
{
	function auth($username,$hash)
	{
		$result = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$hash' LIMIT 1");
		return $result;
	}
	function get()
	{
		$result = $this->db->query("SELECT * FROM users");
		return $result;
	}
	function getcontact()
	{
		$result = $this->db->query("SELECT * FROM contact");
		return $result;
	}
} ?>