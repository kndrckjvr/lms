<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaction_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getTransactions($where = NULL)
    {
        if ($where !== NULL) {
            $this->db->where($where);
        }
        $query = $this->db->limit(1)->order_by('id', "DESC")->get("transactionstbl");
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getTransactionsByBook($data)
    {
        $this->db->select("user_id, transactiontbl.status, transaction_id, transaction_date")
            ->from("transactiontbl")
            ->join("itembooktbl", "transactiontbl.itembook_id = itembooktbl.itembook_id", "LEFT OUTER")
            ->where($data)
            ->limit(1)
            ->order_by('transaction_id', "DESC");
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function createTransaction($data)
    {
        $this->db->insert("transactiontbl", $data);
        return $this->db->affected_rows();
    }

    public function getTransaction($start, $where = array(), $searchText = "")
    {
        $this->db->select("username, user_type, transactiontbl.status, transaction_id, transaction_date")
            ->from("transactiontbl")
            ->join("itembooktbl", "transactiontbl.itembook_id = itembooktbl.itembook_id", "LEFT OUTER")
            ->join("usertbl", "usertbl.user_id = transactiontbl.user_id", "LEFT OUTER")
            ->where($where)
            ->like("username", $searchText, "both")
            ->limit(10, $start)
            ->order_by('transaction_id', "DESC");
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }

    public function getTransactionPages($where = array(), $searchText = "")
    {
        $query = $this->db->select("*")
            ->join("itembooktbl", "transactiontbl.itembook_id = itembooktbl.itembook_id", "LEFT OUTER")
            ->join("usertbl", "usertbl.user_id = transactiontbl.user_id", "LEFT OUTER")
            ->where($where)
            ->like("username", $searchText, "both")
            ->get('transactiontbl');
        return ceil($query->num_rows() / 10);
    }

    public function getUserPenalties($where) {
        $query = $this->db->select("SUM(amount_paid) as penalty")->where($where)->get('transactiontbl');
        return $query->num_rows() > 0 ? $query->result()[0]->penalty : 0;
    }

    public function getUserPaid($where) {
        $query = $this->db->select("SUM(amount_paid) as paid")->where($where)->get('transactiontbl');
        return $query->num_rows() > 0 ? $query->result()[0]->paid : 0;
    }
}
