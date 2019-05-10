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
        $query = $this->db->limit(1)->order_by('id',"DESC")->get("transactionstbl");
        return $query->num_rows() > 0 ? $query->result() : false;
    }
    
    public function getTransactionsByBook($data) {
        $this->db->select("user_id, transactiontbl.status, transaction_id")
            ->from("transactiontbl")
            ->join("itembooktbl", "transactiontbl.itembook_id = itembooktbl.itembook_id", "LEFT OUTER")
            ->where($data)
            ->limit(1)
            ->order_by('transaction_id',"DESC");
        $query = $this->db->get();
        return $query->num_rows() > 0 ? $query->result() : false;
    }
}
