<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BookApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
        if ($this->agent->is_browser()) {
            if ($this->session->userdata("user_type") != 1) show_404();
        } elseif ($this->agent->is_mobile()) {
            if (empty($this->session->post("token"))) show_404();
        } else {
            return;
        }
    }

    public function create()
    {
        $json_response = array();

        $this->form_validation->set_rules('book_name', 'Book Name', 'trim|required');
        $this->form_validation->set_rules('book_author', 'Book Author', 'trim|required');
        $this->form_validation->set_rules('book_code', 'Book Code', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $json_response = array("response" => 0);
            if(form_error("book_name")) {
                $json_response["book_name"] = form_error("book_name");
            }

            if(form_error("book_author")) {
                $json_response["book_author"] = form_error("book_author");
            }
            
            if(form_error("book_code")) {
                $json_response["book_code"] = form_error("book_code");
            }
        } else {
            $data = array(
                "book_name" => $this->input->post("book_name"),
                "book_author" => $this->input->post("book_author"),
                "section_id" => $this->input->post("book_section")
            );
            if($bookData = $this->Book_model->bookAvailable($data)) {
                $data = array(
                    "book_id" => $bookData[0]->book_id,
                    "book_code" => $this->input->post("book_code")
                );
                if($this->Book_model->isBookCodeUnique($data)) {
                    $data = array("book_id" => $bookData[0]->book_id, "book_code" => $this->input->post("book_code"), 
                        "status" => 1, "created_at" => strtotime("now"));
                    if($this->Book_model->insertBookItem($data)) {
                        $json_response = array("response" => 1);
                    } else {
                        $json_response = array("response" => 0, "message" => "Error Found");
                    }
                } else {
                    $json_response = array("response" => 0, "book_code" => "The Book Code field must contain a unique value.");
                }
            } else {
                if($bookId = $this->Book_model->insertBook($data)) {
                    $data = array("book_id" => $bookId, "book_code" => $this->input->post("book_code"), 
                    "status" => 1, "created_at" => strtotime("now"));
                    if($this->Book_model->insertBookItem($data)) {
                        $json_response = array("response" => 1);
                    } else {
                        $json_response = array("response" => 0, "message" => "Error Found");
                    }
                }
            }
        }
        echo json_encode($json_response);
    }

    public function getBooks() {
        $json_response = array();
        $json_response["response"] = 1;
        $json_response["book_name"] = $this->Book_model->getInfo("booktbl", array("book_id" => $this->input->post("book_id")))[0]->book_name;
        $json_response["books"] = $this->Book_model->getInfo("itembooktbl", array("book_id" => $this->input->post("book_id")));
        echo json_encode($json_response);
    }

    public function getSpecificBook() {
        $json_response = array();
        $json_response["response"] = 1;
        $json_response["book"] = $this->Book_model->getSpecificBook(array("book_code" => $this->input->post("book_code"), "sectiontbl.status" => 1))[0];
        echo json_encode($json_response);
    }
}
