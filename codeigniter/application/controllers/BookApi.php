<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BookApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library(array("user_agent", "form_validation"));
        if ($this->agent->is_mobile()) {
            if (empty($this->session->post("token"))) show_404();
        } else {
            return;
        }
    }

    public function create()
    {
        if ($this->agent->is_browser()) {
            if ($this->session->userdata("user_type") != 1) show_404();
        }

        $json_response = array("response" => 1);

        $this->form_validation->set_rules('book_name', 'Book Name', 'trim|required|is_unique[booktbl.book_name]');
        $this->form_validation->set_rules('book_author', 'Book Author', 'trim|required');
        $this->form_validation->set_rules('book_quantity', 'Book Quantity', 'trim|required|numeric');
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'trim|required');

        if (!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/", $this->input->post("publish_date"))) {
            $json_response["publish_date"] = "The Publish Date field is not in the correct format.";
        }

        if ($this->form_validation->run() == FALSE) {
            $json_response["response"] = 0;
            foreach ($this->form_validation->error_array() as $key => $value) {
                $json_response[$key] = $value;
            }
        } else {
            if (!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/", $this->input->post("publish_date"))) {
                $json_response["response"] = 0;
                echo json_encode($json_response);
                return;
            }

            $data = array(
                "book_name" => $this->input->post("book_name"),
                "book_image" => "",
                "section_id" => $this->input->post("book_section"),
                "publish_date" => strtotime($this->input->post("publish_date"))
            );

            $authors = explode(",", $this->input->post("book_author"));

            $this->load->library('upload');

            if ($this->upload->do_upload('book_image_file')) {
                $data["book_image"] = $this->upload->data('file_name');

                $config2['image_library']   = 'gd2';
                $config2['source_image']    = './images/' . $data["book_image"];
                $config2['create_thumb']    = FALSE;
                $config2['maintain_ratio']  = TRUE;
                $config2['width']           = 200;
                $config2['height']          = 200;

                $this->load->library('image_lib', $config2);

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                } else {
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                }
            }

            if ($bookId = $this->Book_model->insertBook($data)) {
                $data = array(
                    "book_id" => $bookId,
                    "book_code" => "",
                    "status" => 1,
                    "created_at" => strtotime("now")
                );

                // Populate authorbooktbl
                foreach ($authors as $value) {
                    if (!$this->Author_model->setBookAuthor(array("author_id" => $value, "book_id" => $bookId))) {
                        $json_response["response"] = 0;
                        $json_response["error"]["author"] = "Unable to insert author_id: " . $value . ".";
                    }
                }

                // Populate itembooktbl
                for ($i = 0; $i < $this->input->post("book_quantity"); $i++) {
                    $data["book_code"] = sprintf("%'.03d", $this->Section_model->getCurrentCode(array("section_id" => $this->input->post("book_section")))[0]->section_code_number);
                    if ($this->Book_model->insertBookItem($data)) {
                        if (!$this->Section_model->updateSection(array("section_code_number" => ($this->Section_model->getCurrentCode(array("section_id" => $this->input->post("book_section")))[0]->section_code_number + 1)), array("section_id" => $this->input->post("book_section")))) {
                            $json_response["response"] = 0;
                            $json_response["error"]["section"] = "Error Updating Section Code Number.";
                        }
                    } else {
                        $json_response["response"] = 0;
                        $json_response["error"]["itembook"] = "Error Inserting Item Book: " . $data["book_code"] . ".";
                    }
                }
            }
        }

        echo json_encode($json_response);
    }

    public function getBooks()
    {
        $json_response = array();
        $json_response["response"] = 1;
        $json_response["book_name"] = $this->Book_model->getBooks("booktbl", array("book_id" => $this->input->post("book_id")))[0]->book_name;
        $json_response["books"] = $this->Book_model->getBookItems($this->input->post("book_id"));
        echo json_encode($json_response);
    }

    public function getSpecificBook()
    {
        if ($this->agent->is_browser()) {
            if ($this->session->userdata("user_type") != 1) show_404();
        }
        $json_response = array();
        $json_response["response"] = 1;
        $json_response["book"] = $this->Book_model->getSpecificBook(array("itb.itembook_id" => $this->input->post("itembook_id")))[0];
        switch ($json_response["book"]->status) {
            case 1:
                $json_response["remarks"] = "Available";
                break;
            case 2:
                $json_response["remarks"] = "Reserved by "
                    . $this->User_model->getUsers(array("user_id" => $this->Transaction_model->getTransactionsByBook(array("itembooktbl.itembook_id" => $this->input->post("itembook_id")))[0]->user_id))[0]->username;
                break;
            case 3:
                $json_response["remarks"] = "Borrowed by "
                    . $this->User_model->getUsers(array("user_id" => $this->Transaction_model->getTransactionsByBook(array("itembooktbl.itembook_id" => $this->input->post("itembook_id")))[0]->user_id))[0]->username;
                break;
            case 4:
                $json_response["remarks"] = "Disabled by "
                    . $this->User_model->getUsers(array("user_id" => $this->Transaction_model->getTransactionsByBook(array("itembooktbl.itembook_id" => $this->input->post("itembook_id")))[0]->user_id))[0]->username;
                break;
        }
        echo json_encode($json_response);
    }

    public function update()
    {
        if ($this->agent->is_browser()) {
            if ($this->session->userdata("user_type") != 1) show_404();
        }

        $json_response = array("response" => 1);

        $currentQuantity = $this->Book_model->getSpecificBook(array("b.book_id" => $this->input->post("book_id")))[0]->book_qty;

        $this->form_validation->set_rules('book_name', 'Book Name', 'trim|required');
        $this->form_validation->set_rules('book_author', 'Book Author', 'trim|required');
        $this->form_validation->set_rules('book_quantity', 'Book Quantity', 'trim|required|numeric|greater_than_equal_to[' . $currentQuantity . ']');
        $this->form_validation->set_rules('publish_date', 'Publish Date', 'trim|required');

        if (!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/", $this->input->post("publish_date"))) {
            $json_response["publish_date"] = "The Publish Date field is not in the correct format.";
        }

        if ($this->form_validation->run() == FALSE) {
            $json_response["response"] = 0;
            foreach ($this->form_validation->error_array() as $key => $value) {
                $json_response[$key] = $value;
            }
        } else {
            if (!preg_match("/^(0[1-9]|1[0-2])\/(0[1-9]|[1-2][0-9]|3[0-1])\/[0-9]{4}$/", $this->input->post("publish_date"))) {
                $json_response["response"] = 0;
                echo json_encode($json_response);
                return;
            }

            $data = array(
                "book_name" => $this->input->post("book_name"),
                "section_id" => $this->input->post("book_section"),
                "publish_date" => strtotime($this->input->post("publish_date"))
            );

            $authors = explode(",", $this->input->post("book_author"));

            $this->load->library('upload');

            $bookImage = "";

            if ($this->upload->do_upload('book_image_file')) {
                $bookImage = $this->upload->data('file_name');

                $config2['image_library']   = 'gd2';
                $config2['source_image']    = './images/' . $bookImage;
                $config2['create_thumb']    = FALSE;
                $config2['maintain_ratio']  = TRUE;
                $config2['width']           = 200;
                $config2['height']          = 200;

                $this->load->library('image_lib', $config2);

                if (!$this->image_lib->resize()) {
                    echo $this->image_lib->display_errors();
                } else {
                    $this->image_lib->initialize($config2);
                    $this->image_lib->resize();
                }
                
                $data["book_image"] = $bookImage;
            }

            $this->Book_model->updateBook("booktbl", $data, array("book_id" => $this->input->post("book_id")));

            $data = array(
                "book_id" => $this->input->post("book_id"),
                "book_code" => "",
                "status" => 1,
                "created_at" => strtotime("now")
            );

            // Remove Authors and Book
            $this->Book_model->updateBook("authorbooktbl", array("status" => "0"), array("book_id" => $this->input->post("book_id")));

            // Populate authorbooktbl
            foreach ($authors as $value) {
                if (!$this->Author_model->setBookAuthor(array("author_id" => $value, "book_id" => $this->input->post("book_id")))) {
                    $json_response["response"] = 0;
                    $json_response["error"]["author"] = "Unable to insert author_id: " . $value . ".";
                }
            }

            $newQuantity = $this->input->post("book_quantity") - $currentQuantity;

            // Populate itembooktbl
            for ($i = 0; $i < $newQuantity; $i++) {
                $data["book_code"] = sprintf("%'.03d", $this->Section_model->getCurrentCode(array("section_id" => $this->input->post("book_section")))[0]->section_code_number);
                if ($this->Book_model->insertBookItem($data)) {
                    if (!$this->Section_model->updateSection(array("section_code_number" => ($this->Section_model->getCurrentCode(array("section_id" => $this->input->post("book_section")))[0]->section_code_number + 1)), array("section_id" => $this->input->post("book_section")))) {
                        $json_response["response"] = 0;
                        $json_response["error"]["section"] = "Error Updating Section Code Number.";
                    }
                } else {
                    $json_response["response"] = 0;
                    $json_response["error"]["itembook"] = "Error Inserting Item Book: " . $data["book_code"] . ".";
                }
            }
        }

        echo json_encode($json_response);
    }

    public function searchBook()
    {
        $json_response = array(
            "books" => $this->Book_model->getBook($this->input->post("book_name"), 0),
            "pages" => $this->Book_model->getBookPages($this->input->post("book_name"))
        );
        echo json_encode($json_response);
    }

    public function pageChange()
    {
        $json_response = array(
            "response" => 1,
            "currentPage" => $this->input->post("page"),
            "pages" => $this->Book_model->getBookPages($this->input->post("book_name")),
            "bookData" => $this->Book_model->getBook($this->input->post("book_name"), ($this->input->post("page") - 1) * 10)
        );

        echo json_encode($json_response);
    }

    public function getBookEditor()
    {
        $json_response["response"] = 1;
        $json_response["book"] = $this->Book_model->getSpecificBook(array("b.book_id" => $this->input->post("book_id")))[0];

        $authorId = array_map("trim", explode(",", $json_response["book"]->book_author_id));
        $authorName = array_map("trim", explode(",", $json_response["book"]->book_author));
        $authorSname = array_map("trim", explode(",", $json_response["book"]->book_author_sname));
        $keys = array("author_id", "author_name", "author_sname");
        $authorArray = array_map(null, $authorId, $authorName, $authorSname);
        $json_response["book"]->author_value = array_map(function ($e) use ($keys) {
            return array_combine($keys, $e);
        }, $authorArray);

        // print_r($json_response);
        echo json_encode($json_response);
    }
}
