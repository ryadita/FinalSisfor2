<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_customer extends CI_Model
{
	public function tampil()
	{
		$query = $this->db->get('customer');
		return $query;
	}

	public function save($data){
		$this->db->insert('customer', $data);
	}

	public function edit($ID){
		$query = $this->db->get_where('customer', array('ID' => $ID));
		return $query;
	}

	public function update($id, $data){
		$this->db->update('customer', $data, array('ID' => $id));
	}

	public function delete($ID){
		$this->db->where('ID', $ID);
		$query = $this->db->delete('customer');
	}
}