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

    public function getBook($bookName, $start)
    {
        $this->db
            ->select("
                    b.book_id,
                    b.book_name,
                    GROUP_CONCAT(a.author_name ORDER BY ab.authorbook_id SEPARATOR ', ') AS book_author,
                    b.book_image,
                    section_name,
                    (SELECT COUNT(itembook_id) FROM itembooktbl WHERE book_id = b.book_id AND itembooktbl.status = 1) as book_qty
                ")
            ->from("authorbooktbl as ab, authortbl as a, booktbl as b, sectiontbl as s")
            ->where("ab.book_id = b.book_id AND ab.author_id = a.author_id AND b.section_id = s.section_id")
            ->having("book_qty > 0")
            ->like("b.book_name", $bookName, "both")
            ->group_by("b.book_id")
            ->limit(10, $start);
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getBookItems($where, $start = 0)
    {
        $this->db
            ->select("
                itembook_id, 
                book_name, 
                GROUP_CONCAT(a.author_name ORDER BY ab.authorbook_id SEPARATOR ', ') AS book_author, 
                book_code, 
                itb.status, 
                section_code, 
                itb.created_at
            ")
            ->from("authorbooktbl as ab, authortbl as a, booktbl as b, sectiontbl as s")
            ->join("itembooktbl as itb", "b.book_id = itb.book_id", "INNER JOIN")
            ->where("ab.book_id = b.book_id AND ab.author_id = a.author_id AND b.section_id = s.section_id AND b.book_id = " . $where)
            ->group_by("itb.itembook_id")
            ->limit(10, $start); // changing book manager to a more user friendly
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getSpecificBook($data)
    {
        $this->db
            ->select("
                b.book_id,
                itembook_id,
                book_name,
                GROUP_CONCAT(a.author_name ORDER BY ab.authorbook_id SEPARATOR ', ') AS book_author, 
                GROUP_CONCAT(a.author_id ORDER BY ab.authorbook_id SEPARATOR ', ') AS book_author_id, 
                GROUP_CONCAT(a.author_sname ORDER BY ab.authorbook_id SEPARATOR ', ') AS book_author_sname, 
                book_code, 
                s.section_id, 
                itb.status, 
                section_code,
                publish_date,
                book_image,
                (SELECT COUNT(itembook_id) FROM itembooktbl WHERE book_id = b.book_id AND itembooktbl.status = 1) as book_qty
            ")
            ->from("authorbooktbl as ab, authortbl as a, booktbl as b, sectiontbl as s")
            ->join("itembooktbl as itb", "b.book_id = itb.book_id", "INNER JOIN")
            ->where("ab.book_id = b.book_id AND ab.author_id = a.author_id AND b.section_id = s.section_id")
            ->where($data)
            ->group_by("itb.itembook_id");
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function insertBookItem($data)
    {
        $this->db->insert("itembooktbl", $data);
        return $this->db->affected_rows();
    }

    public function insertBook($data)
    {
        $this->db->insert("booktbl", $data);
        return $this->db->insert_id();
    }

    public function updateBook($table, $data, $where = NULL)
    {
        if ($where != NULL) {
            $this->db->where($where);
        }
        $this->db->update($table, $data);
        return $this->db->affected_rows();
    }

    public function getBookPages($bookName)
    {
        $this->db
            ->select("*")
            ->from("authorbooktbl as ab, authortbl as a, booktbl as b, sectiontbl as s")
            ->where("ab.book_id = b.book_id AND ab.author_id = a.author_id AND b.section_id = s.section_id")
            ->like("b.book_name", $bookName, "both")
            // ->or_like("book_author", $bookName, "both")
            ->or_like("section_name", $bookName, "both")
            ->group_by("ab.book_id")
            ->order_by("b.book_id");
        $query = $this->db->get();
        return ceil($query->num_rows() / 10);
    }
}
