<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Populate extends CI_Controller
{
    public function users () {
        $data = array(
            "username" => "",
            "password" => "",
            "user_type" => 0,
            "email" => "",
            "status" => 1,
            "password_code" => "",
            "created_at" => strtotime("now")
        );

        for($i = 0; $i < 50; $i++) {
            $data["username"] = "user" . ($i + 1);
            $data["password"] = sha1("123456");
            $data["user_type"] = 0;
            $this->User_model->createUser($data);   
        }

        for($i = 0; $i < 50; $i++) {
            $data["username"] = "admin" . ($i + 1);
            $data["password"] = sha1("123456");
            $data["user_type"] = 1;
            $this->User_model->createUser($data);   
        }
    }

    public function books () {

        for($i = 0; $i < 25; $i++) {

            $dataBook = array(
                "book_name" => "Book ",
                "book_image" => "",
                "publish_date" => strtotime("-30 days"),
                "section_id" => 1
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
    }

    public function authors () {
        for($i = 0; $i < 50; $i++) {
            $data = array(
                "author_fname" => "Author " . ($i + 1),
                "author_lname" => "Dela Cruz"
            );

            $dataAuthor = array(
                "author_name" => ucwords($data["author_fname"] . " " . $data["author_lname"]),
                "author_fname" => ucwords($data["author_fname"]),
                "author_lname" => ucwords($data["author_lname"]),
                "author_sname" => strtoupper($data["author_fname"][0]) . ". " . ucwords($data["author_lname"])
            );

            // if the data is inserted return the new author_id
            // send 0 if the data is not inserted it means there is an error 
            // while inserting the author's data
            if ($authorId = $this->Author_model->createAuthor($dataAuthor)) {
                $json_response["author_id"] = $authorId;
            } else {
                $json_response["response"] = 0;
            }
        }

        for($i = 51; $i < 25; $i++) {
            $data = array(
                "author_fname" => "Author " . ($i + 1),
                "author_lname" => "Dela Cruz"
            );

            $dataAuthor = array(
                "author_name" => ucwords($data["author_fname"] . " " . $data["author_lname"]),
                "author_fname" => ucwords($data["author_fname"]),
                "author_lname" => ucwords($data["author_lname"]),
                "author_sname" => strtoupper($data["author_fname"][0]) . ". " . ucwords($data["author_lname"])
            );

            // if the data is inserted return the new author_id
            // send 0 if the data is not inserted it means there is an error 
            // while inserting the author's data
            if ($authorId = $this->Author_model->createAuthor($dataAuthor)) {
                $json_response["author_id"] = $authorId;
            } else {
                $json_response["response"] = 0;
            }
        }
    }

    public function transactions () {
        $transactionData = array(
            "transaction_date" => strtotime("now"),
            "return_date" => 0,
            "amount_paid" => 0,
            "status" => 2,
            "itembook_id" => rand(1, 100),
            "user_id" => rand(1, 100)
        );

        for($i = 0; $i < 90; $i++) {
            if(($i + 1) % 2 == 0) {
                $transactionData["status"] = 3;
            } else {
                $transactionData["status"] = 2;
            }
            // Default Process Item Book Data
            $itemBookData = array(
                "itembook_id" => $transactionData["itembook_id"]
            );

            switch ($transactionData["status"]) {
                case "2":
                    // Change the status of the Item Book to borrowed
                    $transactionData["return_date"] = 0;
                    $itemBookData["status"] = 3;
                    break;
                case "3":
                    // Check for the last Transaction where the book was borrowed
                    if ($lastTransactionData = $this->Transaction_model->getTransactionsByBook(array("transactiontbl.itembook_id" => $transactionData["itembook_id"]))) {
                        $transactionData["user_id"] = $lastTransactionData[0]->user_id;
                    }

                    // Get the penalty for the date of the last transaction
                    $penalty = $this->Penalty_model->getPenalty($lastTransactionData[0]->transaction_date);

                    // Get the current date and time
                    $transactionData["return_date"] = strtotime("now");

                    // Check if the penalty is going to be applied
                    if (strtotime("now") > strtotime("+" . $penalty[0]->penalty_day . " day", $lastTransactionData[0]->transaction_date)) {
                        // Apply penalty based on the number of days exceeded
                        $transactionData["amount_paid"] = $penalty[0]->penalty_amount * ceil((strtotime("now") - strtotime("+" . $penalty[0]->penalty_day . " day", $lastTransactionData[0]->transaction_date)) / 86400);
                    }

                    // Change the status of the Item Book to available
                    $itemBookData["status"] = 1;
                    break;
            }

            if ($this->Transaction_model->createTransaction($transactionData)) {
                if ($this->Book_model->updateBook("itembooktbl", array("status" => $itemBookData["status"]), array("itembook_id" => $itemBookData["itembook_id"]))) {

                }
            }


            if(($i + 1) % 2 == 0) {
                $transactionData["itembook_id"] = rand(1, 100);
                $transactionData["user_id"] = rand(1, 100); 
            }
        }
    }

    public function section () {
        for($i = 0; $i < 25; $i++) {
            $this->Author_model->setBookAuthor(array("author_id" => rand(1, 100), "book_id" => rand(1, 25)));
        }
        // for($i = 51; $i < 100; $i++) {
        //     $this->Author_model->setBookAuthor(array("author_id" => $i, "book_id" => $i));
        // }
    }
}