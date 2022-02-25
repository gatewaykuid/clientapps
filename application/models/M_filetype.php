<?php 
/**
  * 
  */
class M_filetype extends CI_Model
{
	function get()
	{
		$result = $this->db->query("SELECT * FROM filetype");
		return $result;
	}
} ?>