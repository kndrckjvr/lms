<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getInfo($table, $where = NULL)
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $query = $this->db->get($table);
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getBook($page) {
        $this->db->select("book_id, book_name, book_author, section_name, (SELECT COUNT(itembook_id) FROM itembooktbl WHERE book_id = booktbl.book_id) as book_qty")
            ->from("booktbl")
            ->join("sectiontbl", "booktbl.section_id = sectiontbl.section_id", "LEFT OUTER");
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function isBookCodeUnique($data) {
        $this->db->where($data);
        $query = $this->db->get("itembooktbl");
        return ($query->num_rows() == 0);
    }

    public function bookAvailable($data) {
        $this->db->where($data);
        $query = $this->db->get("booktbl");
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function insertBookItem($data) {
        $this->db->insert("itembooktbl", $data);
        return $this->db->affected_rows();
    }

    public function insertBook($data) {
        $this->db->insert("booktbl", $data);
        return $this->db->insert_id();
    }
}
