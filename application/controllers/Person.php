<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller{

    public function __construct(){
        parent::__construct();
       
    }

    public function index()
    {
        $data = [
            'title' => "Person",
        ];
       $this->load->view("person", $data);  
    }

    public function view_person(){
        echo "here";
    }

    public function add_person(){
        // This is an example method
        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            echo "<pre/>";
            $this->db->trans_begin();
            $this->Configs->insert([
                "name" => "name",
                "description" => "description",
                "date_added" => strtotime(utils::getDate()),
            ]);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo utils::response("Operation failed!", "error");
                return false;
            } else {
                $this->db->trans_commit();
                echo utils::response("Operation successful", "ok");
                return true;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            // log_message('Error: ', $e->getMessage());
            echo utils::response("Could not register this time. Please try again later!", "error");
            return false;
        }
    }

    public function update_person(){

    }

    public function delete_person(){

    }

}