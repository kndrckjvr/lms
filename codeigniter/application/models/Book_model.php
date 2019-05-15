<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getBooks($table, $where = NULL)
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
            ->join("sectiontbl", "booktbl.section_id = sectiontbl.section_id", "LEFT OUTER")
            ->where(array("sectiontbl.status" => 1));
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getSpecificBook($data) {
        $this->db->select("itembook_id, book_name, book_author, book_code, sectiontbl.section_id, itembooktbl.status")
        ->from("booktbl")
        ->join("sectiontbl", "booktbl.section_id = sectiontbl.section_id", "LEFT OUTER")
        ->join("itembooktbl", "booktbl.book_id = itembooktbl.book_id", "LEFT OUTER")
        ->where($data);
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

    public function updateBook($table, $data, $where = NULL) {
        if($where != NULL) {
            $this->db->where($where);
        }
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }
}
