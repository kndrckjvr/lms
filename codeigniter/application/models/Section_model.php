<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Section_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getSections($where = NULL)
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $query = $this->db->get("sectiontbl");
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function insertSection($data)
    {
        $this->db->insert("sectiontbl", $data);
        return $this->db->affected_rows();
    }

    public function getCurrentCode($where)
    {
        $query = $this->db->select("section_code_number, section_code")
            ->from("sectiontbl")
            ->where($where)
            ->limit(1);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getSectionByPages($start, $searchText = "")
    {
        $query = $this->db->limit(10, $start)
            ->like("section_name", $searchText, "both")
            ->or_like("section_code", $searchText, "both")
            ->get("sectiontbl");
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getSectionPages($searchText = "")
    {
        $query = $this->db->like("section_name", $searchText, "both")
            ->or_like("section_code", $searchText, "both")
            ->get("sectiontbl");
        return ceil($query->num_rows() / 10);
    }
}
