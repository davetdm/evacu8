<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Person extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }
    
    public function index() {
        $data = [
            'title' => "Person",
            "page" => "person",
            "persons" => $this->PersonModel->select(),
        ];
        $this->load->view("person", $data);
    }

    public function add(){
        $data = [
            'title' => "Person",
            "page" => "person",
            "groups" => $this->GroupsModel->select(),
        ];
        $this->load->view("person_add", $data);
    }

    public function view() {
        $data = [
            'title' => "View Person",
            "page" => "person",
            "groups" => $this->GroupsModel->select(),
            "person" => $this->PersonModel->select($this->input->get("id")),
        ];
        $this->load->view("person_view", $data);
    }

    public function delete(){
        $data = [
            'title' => "Delete Person",
            "page" => "person",
            "person" => $this->PersonModel->select($this->input->get("id")),
        ];
        $this->load->view("person_delete", $data);
    }

    //this function will add person data.
    public function add_person(){
        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            $this->db->trans_begin();
<<<<<<< HEAD
=======
            // there is no need to define another method to add: check base_model
            // $result = $this->PersonModel->add_person($data);
>>>>>>> 22a110995fd28d5b125ea364f445a32c6ab75b37
            $this->PersonModel->insert([
                'type'=> strip_tags($this->input->post('type')),
                'first_name'=> strip_tags($this->input->post('first_name')),
                'last_name'=> strip_tags($this->input->post('last_name')),
                'id_passport'=> strip_tags($this->input->post('id_passport')), 
                'email' => strip_tags($this->input->post('email')), 
                'mobile' => strip_tags($this->input->post('mobile')), 
                'date_added' => strtotime(utils::getDate())
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

    //this function will update the person data
    public function save_person(){
        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            $this->db->trans_begin();

            $result = $this->PersonModel->update([
                'id' => strip_tags($this->input->post('id')),
                'type'=>strip_tags($this->input->post('type')),
                'first_name'=>strip_tags($this->input->post('first_name')),
                'last_name'=>strip_tags($this->input->post('last_name')),
                'id_passport'=>strip_tags($this->input->post('id_passport')), 
                'email' =>strip_tags($this->input->post('email')), 
                'mobile' =>strip_tags($this->input->post('mobile')), 
                'date_added' =>strtotime(utils::getDate()) 
            ]);

            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo utils::response("Update failed!", "error");
                return false;
            } else {
                $this->db->trans_commit();
                echo utils::response("Update successful", "ok");
                return true;
            }
        } catch (Exception $e) {
            log_message('Error: ', $e->getMessage());
            echo utils::response("Could not register this time. Please try again later!", "error");
            return false;
        }         
    }
   
    public function delete_person()
    {
        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            $this->db->trans_begin();
            $id = strip_tags($this->input->post('id'));
            $result = $this->PersonModel->delete($id);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
<<<<<<< HEAD
                echo utils::response("delete failed!", "error");
=======
                echo utils::response("Update failed!", "error");
>>>>>>> 22a110995fd28d5b125ea364f445a32c6ab75b37
                return false;
            } else {
                $this->db->trans_commit();
                echo utils::response(base_url() . "person", "ok");
                return true;
            }
        } catch (Exception $e) {
            log_message('Error: ', $e->getMessage());
<<<<<<< HEAD
            echo utils::response("Could not delete this time. Please try again later!", "error");
=======
            echo utils::response("Could not register this time. Please try again later!", "error");
>>>>>>> 22a110995fd28d5b125ea364f445a32c6ab75b37
            return false;
        }         
    }

}
