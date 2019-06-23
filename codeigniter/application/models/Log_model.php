<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Log_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getLogs($where = array())
    {
        $query = $this->db->where($where)->get("logtbl");
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getLogsByPages($where = array(), $start = 0)
    {
        $query = $this->db->limit(10, $start)->where($where)->get("logtbl");
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getLogPages($where = array())
    {
        $query = $this->db->where($where)->get("logtbl");
        return ceil($query->num_rows() / 10);
    }

    public function createLog($data)
    {
        $this->db->insert("logtbl", $data);
        return $this->db->insert_id();
    }
}
