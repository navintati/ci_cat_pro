<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {

	public function __construct(){
		
		parent::__construct();
		
	}

	public function putDatas($table, $data)
	{
		
		$data = $this->db->insert($table, $data);
        return $this->db->insert_id();
	}

	public function fetchDatas($table)
	{
		$query = $this->db->get($table);
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "Records Found !!!";
		}
	}

	public function fetchCates()
	{

		// $this->db->select('*');
		// $this->db->from('product');
		// $this->db->join('category', 'cat_id = cat_id');
		// $query = $this->db->get();

		$query = $this->db->select('p.prod_name, p.prod_desc, p.prod_quentity, p.status, p.created_at, c.category_name, c.status')
			     ->from('product as p')
			     ->join('category as c', 'p.cat_id = c.cat_id', 'RIGHT')
			     ->get();

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return "Records Found !!!";
		}

		// $query = $this->db->get($table);
		// if ($query->num_rows() > 0) {
		// 	return $query->result();
		// } else {
		// 	return "Records Found !!!";
		// }
	}

}

