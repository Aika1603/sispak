<?php
class crud_model extends CI_Model{

  function get_data($table = NULL, $where = "", $order = NULL, $limit = NULL)
	{
    $this->db->select('*');
		$this->db->from($table);
    $this->db->order_by($order);
    if($where != ""){
      $this->db->where($where);
    }
    $this->db->limit($limit);
		return $this->db->get();
	}

  function get_data_max($table = NULL, $max = NULL)
	{
    $this->db->select('MAX(kode_kasus) as max');
		$this->db->from($table);
		return $this->db->get();
	}

  function get_data_join($table = NULL,$table2 = NULL, $join = NULL, $where = "", $order = NULL, $limit = NULL)
	{
    $this->db->select('*');
		$this->db->from($table);
    $this->db->join($table2, $join, 'left');
    $this->db->order_by($order);
    if($where != ""){
      $this->db->where($where);
    }
    $this->db->limit($limit);
		return $this->db->get();
	}

  function update_data($where,$data,$table)
	{
		$this->db->where($where);
		return $this->db->update($table,$data);
	}

	function delete_data($where,$table)
	{
		$this->db->where($where);
		return $this->db->delete($table);
	}

  function input_data($table,$data)
	{
		return $this->db->insert($table,$data);
	}

}
