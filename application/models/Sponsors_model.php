<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sponsors_model extends CI_Model {

	function __construct()
    {
        parent::__construct();
    }

    public function get($id = null)
	{
		if($id)
		{
			$category	=	$this->db->where("id",$id)->get("sponsors")->row();	
			if(!$category)
			{
				return tableObject("sponsors");
			}
			return $category;
		}else{
			return tableObject("sponsors");
		}
	}

    public function insert($data)
	{
		$this->db->insert("sponsors",$data);
		return $this->db->insert_id();
	}

	public function update($data)
	{
		$id 	=	$data["id"];
		unset($data["id"]);
		$this->db->where("id",$id)->update("sponsors",$data);
		return $this->db->affected_rows();
	}

    public function getItems()
	{
		$start 		= 	(int)$this->input->post("start");
		$length 	= 	(int)$this->input->post("length");
		
		$length		=	($length)?$length:10;
		
		$columns		=	$this->input->post("columns");
		$order			=	$this->input->post("order");
		$order_by		=	(isset($columns[$order[0]["column"]]))?$columns[$order[0]["column"]]['data']:"id";
		$direction		=	(isset($order[0]["dir"]))?$order[0]["dir"]:"desc";
		
		$this->db->select("*")->from("sponsors");
		$search			=	$this->input->post("search");
		if(isset($search["value"]) && !empty($search["value"]))
		{
			$this->db->group_start();
			$this->db->or_like(["name"=>$search["value"]]);
			$this->db->or_like(["email"=>$search["value"]]);
			$this->db->group_end();
		}
		
		$this->db->order_by($order_by." ".$direction);
		$this->db->limit($length,$start);
		
		$records 	=	$this->db->get()->result_array();
		return $records;
	}
	
	public function get_total_records()
	{
		$this->db->select("COUNT(id) AS TotalRecord");
		$this->db->from("sponsors");
        $search			=	$this->input->post("search");
		if(isset($search["value"]) && !empty($search["value"]))
		{
			$this->db->group_start();
			$this->db->or_like(["name"=>$search["value"]]);
			$this->db->or_like(["email"=>$search["value"]]);
			$this->db->group_end();
		}

		$total_record 	=	$this->db->get()->row();
		if($total_record)
		{
			return $total_record->TotalRecord;
		}else{
			return 0;
		}
	}

	public function delete($id)
	{
		$this->db->where("id",$id)->delete("sponsors");
		return $this->db->affected_rows();
	}
}
