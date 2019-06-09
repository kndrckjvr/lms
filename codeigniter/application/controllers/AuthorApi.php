<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthorApi extends CI_Controller
{
    public function search()
    {
        $json_response = array(
            "pages" => $this->Author_model->getAuthorPages($this->input->post("search_text")),
            "authorData" => $this->Author_model->getAuthorsByPages(0, $this->input->post("search_text"))
        );
        echo json_encode($json_response);
    }

    public function pageChange()
    {
        $json_response = array(
            "response" => 1,
            "currentPage" => $this->input->post("page"),
            "pages" => $this->Author_model->getAuthorPages($this->input->post("search_text")),
            "authorData" => $this->Author_model->getAuthorsByPages(($this->input->post("page") - 1) * 10, $this->input->post("search_text"))
        );

        echo json_encode($json_response);
    }
}
