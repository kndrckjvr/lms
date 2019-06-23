<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Populate extends CI_Controller
{
    public function index()
    {
        $data = array(
            "username" => "",
            "password" => "",
            "user_type" => 0,
            "email" => "",
            "status" => 1,
            "password_code" => "",
            "created_at" => strtotime("now")
        );

        for ($i = 0; $i < 50; $i++) {
            $data["username"] = "user" . ($i + 1);
            $data["password"] = sha1("123456");
            $data["user_type"] = 0;
            $this->User_model->createUser($data);
        }

        $data["username"] = "admin";
        $data["password"] = sha1("kencosca");
        $data["user_type"] = 1;
        $this->User_model->createUser($data);

        for ($i = 1; $i <= 50; $i++) {
            $data["username"] = "admin" . ($i + 1);
            $data["password"] = sha1("123456");
            $data["user_type"] = 1;
            $this->User_model->createUser($data);
        }

        redirect("populate/books");
    }

    public function books()
    {

        for ($i = 0; $i < 101; $i++) {

            $dataBook = array(
                "book_name" => "Book ",
                "book_image" => "",
                "book_description" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusantium, nam repudiandae quae id quo asperiores, voluptatem repellat repellendus odio amet perspiciatis alias suscipit maiores quos nesciunt vero autem, deserunt eius?",
                "publish_date" => strtotime("-30 days"),
                "section_id" => rand(1, 30)
            );

            $book_qty = 4;

            $authors = array(rand(1, 100), rand(1, 100));

            $dataBook["book_name"] = $dataBook["book_name"] . ($i + 1);

            if ($bookId = $this->Book_model->insertBook($dataBook)) {
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
                for ($j = 0; $j < $book_qty; $j++) {
                    // Setup Book Code
                    $data["book_code"] = sprintf("%'.03d", $this->Section_model->getCurrentCode(array("section_id" => $dataBook["section_id"]))[0]->section_code_number);
                    // Insert Item Book
                    if ($this->Book_model->insertBookItem($data)) {
                        // Update Section Code Numer
                        if (!$this->Section_model->updateSection(array("section_code_number" => ($this->Section_model->getCurrentCode(array("section_id" => $dataBook["section_id"]))[0]->section_code_number + 1)), array("section_id" => $dataBook["section_id"]))) {
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
        redirect("populate/authors");
    }

    public function authors()
    {
        for ($i = 0; $i < 50; $i++) {
            $data = array(
                "author_fname" => strtolower(random_string("alpha", 10)),
                "author_lname" => "Dela Cruz"
            );

            $dataAuthor = array(
                "author_name" => ucwords(($data["author_fname"] . " " . $data["author_lname"])),
                "author_fname" => ucwords($data["author_fname"]),
                "author_lname" => ucwords($data["author_lname"]),
                "author_sname" => strtoupper($data["author_fname"][0]) . ". " . ucwords($data["author_lname"])
            );

            $this->Author_model->createAuthor($dataAuthor);
        }

        for ($i = 0; $i < 50; $i++) {
            $data = array(
                "author_fname" => strtolower(random_string("alpha", 10)),
                "author_lname" => "Dela Cruz"
            );

            $dataAuthor = array(
                "author_name" => ucwords($data["author_fname"] . " " . $data["author_lname"]),
                "author_fname" => ucwords($data["author_fname"]),
                "author_lname" => ucwords($data["author_lname"]),
                "author_sname" => strtoupper($data["author_fname"][0]) . ". " . ucwords($data["author_lname"])
            );

            $this->Author_model->createAuthor($dataAuthor);
        }
        redirect("populate/transactions");
    }

    public function transactions()
    {
        $transactionData = array(
            "transaction_date" => "",
            "return_date" => 0,
            "amount_paid" => 0,
            "status" => 2,
            "itembook_id" => rand(1, 100),
            "user_id" => rand(1, 50)
        );

        for ($i = 0; $i < 100; $i++) {
            if (($i + 1) % 2 == 0) {
                $transactionData["status"] = 3;
                $transactionData["transaction_date"] = strtotime("now");
            } else {
                $transactionData["status"] = 2;
                $transactionData["transaction_date"] = strtotime("-" . rand(1, 20) . "days");
            }
            // Default Process Item Book Data
            $itemBookData = array(
                "itembook_id" => $transactionData["itembook_id"]
            );

            switch ($transactionData["status"]) {
                case "2":
                    $transactionData["return_date"] = 0;
                    $itemBookData["status"] = 3;
                    break;
                case "3":
                    if ($lastTransactionData = $this->Transaction_model->getTransactionsByBook(array("transactiontbl.itembook_id" => $transactionData["itembook_id"]))) {
                        $transactionData["user_id"] = $lastTransactionData[0]->user_id;
                    }
                    $penalty = $this->Penalty_model->getPenalty($lastTransactionData[0]->transaction_date);

                    $transactionData["return_date"] = strtotime("now");
                    if (strtotime("now") > strtotime("+" . $penalty[0]->penalty_day . " day", $lastTransactionData[0]->transaction_date)) {
                        $transactionData["amount_paid"] = $penalty[0]->penalty_amount * ceil((strtotime("now") - strtotime("+" . $penalty[0]->penalty_day . " day", $lastTransactionData[0]->transaction_date)) / 86400);
                    }

                    $itemBookData["status"] = 1;
                    break;
            }
            
            $this->Transaction_model->createTransaction($transactionData);
            $this->Book_model->updateBook("itembooktbl", array("status" => $itemBookData["status"]), array("itembook_id" => $itemBookData["itembook_id"]));

            if (($i + 1) % 2 == 0) {
                $transactionData["itembook_id"] = rand(1, 100);
                $transactionData["user_id"] = rand(1, 50);
            }
        }
        redirect("");
    }
}
