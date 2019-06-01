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

    public function getBook($bookName, $start) {
        $this->db->select("booktbl.book_id, book_name, book_author, section_name, (SELECT COUNT(itembook_id) FROM itembooktbl WHERE book_id = booktbl.book_id AND itembooktbl.status = 1) as book_qty")
            ->from("booktbl")
            ->join("sectiontbl", "booktbl.section_id = sectiontbl.section_id", "LEFT OUTER")
            //->join("itembooktbl", "booktbl.book_id = itembooktbl.book_id", "LEFT OUTER")
            ->like("book_name", $bookName, "both")
            ->or_like("book_author", $bookName, "both")
            ->or_like("section_name", $bookName, "both")
            ->limit(10, $start)
            ->where(array("sectiontbl.status" => 1));
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getBookItems($where) {
        $this->db->select("itembook_id, book_name, book_author, book_code, itembooktbl.status, section_code, itembooktbl.created_at")
        ->from("booktbl")
        ->join("itembooktbl", "booktbl.book_id = itembooktbl.book_id", "LEFT OUTER")
        ->join("sectiontbl", "booktbl.section_id = sectiontbl.section_id", "LEFT OUTER")
        ->where($where);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getSpecificBook($data) {
        $this->db->select("booktbl.book_id, itembook_id, book_name, book_author, book_code, sectiontbl.section_id, itembooktbl.status, section_code")
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

    public function getBookByPage($where, $start) {
        $this->db->select("*")
            ->from("booktbl")
            ->join("itembooktbl", "booktbl.book_id = itembooktbl.book_id", "LEFT OUTER")
            ->where($where)
            ->limit(10, $start)
            ->order_by('book_id',"DESC");
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getBookPages($bookName)
    {
        $this->db->select("booktbl.book_id, book_name, book_author, section_name, (SELECT COUNT(itembook_id) FROM itembooktbl WHERE book_id = booktbl.book_id AND itembooktbl.status = 1) as book_qty")
            ->from("booktbl")
            ->join("sectiontbl", "booktbl.section_id = sectiontbl.section_id", "LEFT OUTER")
            //->join("itembooktbl", "booktbl.book_id = itembooktbl.book_id", "LEFT OUTER")
            ->like("book_name", $bookName, "both")
            ->or_like("book_author", $bookName, "both")
            ->or_like("section_name", $bookName, "both")
            ->where(array("sectiontbl.status" => 1));
        $query = $this->db->get();
        return ceil($query->num_rows() / 10);
    }
}
