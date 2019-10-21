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
        
    }
    //this function will add person data.
    public function add_person(){
        
        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            echo "<pre/>";
            $this->db->trans_begin();
            $data = array(
                'id'=>strip_tags($this->input->post('id')),
                'type'=>strip_tags($this->input->post('type')),
                'first_name'=>strip_tags($this->input->post('first_name')),
                'last_name'=>strip_tags($this->input->post('last_name')),
                'id_passport'=>strip_tags($this->input->post('id_passport')), 
                'email' =>strip_tags($this->input->post('email')), 
                'mobile' =>strip_tags($this->input->post('mobile')), 
                'date_added' =>date('Y-m-d',strtotime(utils::getDate()))              
                );
            $result = $this->Persons->add_person($data);
            // $this->Configs->insert([
            //     "name" => "name",
            //     "description" => "description",
            //     "date_added" => strtotime(utils::getDate()),
            // ]);
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
    public function update_person()
    {
        $data = [
            'title' => "Person",
        ];
        $this->load->view("update_person", $data); 

        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            echo "<pre/>";
            $this->db->trans_begin();
            $data = array(
                'id'=>strip_tags($this->input->post('id')),
                'type'=>strip_tags($this->input->post('type')),
                'first_name'=>strip_tags($this->input->post('first_name')),
                'last_name'=>strip_tags($this->input->post('last_name')),
                'id_passport'=>strip_tags($this->input->post('id_passport')), 
                'email' =>strip_tags($this->input->post('email')), 
                'mobile' =>strip_tags($this->input->post('mobile')), 
                'date_added' =>date('Y-m-d',strtotime(utils::getDate()))              
                );
            $result = $this->Persons->update_person($data);

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
            print_r($e->getMessage());
            // log_message('Error: ', $e->getMessage());
            echo utils::response("Could not register this time. Please try again later!", "error");
            return false;
        }  
        
        
    }

    public function delete_person()
    {

    }

}