<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TransactionApi extends CI_Controller
{
    
    public function create()
    {
        echo json_encode(array("response" => 1));
    }
}
