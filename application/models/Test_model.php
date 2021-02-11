<?php
class Test_model extends CI_Model {

	public function returnAllData()	{
		//retorna todo o valor desta tabela do banco de dados pré selecionado na pasta config
		$this->db->select('*');
		$this->db->from('test');
		$this->db->order_by("id", "asc");
		return $this->db->get()->result_array();
	}
}