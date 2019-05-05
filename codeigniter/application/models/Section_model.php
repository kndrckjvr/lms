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

    public function insertSection($data) {
        $this->db->insert("sectiontbl", $data);
        return $this->db->affected_rows();
    }
}
