<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Author_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getAuthors($where = array())
    {
        $query = $this->db->where($where)->get("authortbl");
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getAuthorsByPages($start = 0, $searchText = "")
    {
        $query = $this->db->limit(5, $start)
        ->like("author_name", $searchText, "both")
        ->or_like("author_sname", $searchText, "both")
        ->or_like("author_fname", $searchText, "both")
        ->or_like("author_lname", $searchText, "both")
            ->get("authortbl");
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getAuthorPages($searchText = "")
    {
        $query = $this->db
        ->like("author_name", $searchText, "both")
        ->or_like("author_sname", $searchText, "both")
        ->or_like("author_fname", $searchText, "both")
        ->or_like("author_lname", $searchText, "both")
        ->get("authortbl");
        return ceil($query->num_rows() / 5);
    }

    public function setBookAuthor($data)
    {
        $this->db->insert("authorbooktbl", $data);
        return $this->db->affected_rows();
    }
}
