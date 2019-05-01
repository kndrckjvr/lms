<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
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

    public function hasValidCredentials($username, $password)
    {
        $this->db
            ->from('usertbl')
            ->where(array(
                'username' => $username,
                'password' => sha1($password)
            ));
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }
}
