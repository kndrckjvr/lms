<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penalty_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getPenalty($where = NULL)
    {
        $this->db->from("penaltytbl")
            ->where("penalty_date <", $where)
            ->limit(1)
            ->order_by('penalty_id',"DESC");
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }
}
