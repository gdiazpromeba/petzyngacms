<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function get_news($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('DOG_BREEDS');
			return $query->result_array();
		}

		$query = $this->db->get_where('DOG_BREEDS', array('DOG_BREED_NAME' => $slug));
		return $query->row_array();
	}
}