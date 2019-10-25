<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller{

    public function __construct(){
        parent::__construct();
       
    }

    public function index()
    {
        $data = [
            'title' => "Evacu8",
        ];
       $this->load->view("tags", $data);  
    }

    public function add(){
        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            echo "<pre/>";
            $this->db->trans_begin();
            $data = array(
                'id'=>strip_tags($this->input->post('id')),
                'date_added' =>date('Y-m-d',strtotime(utils::getDate()))              
                );
            $result = $this->TagsModel->add_tag($data);
            
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
            echo utils::response("Could not register this time. Please try again later!", "error");
            return false;
        }
    }

    public function assign(){

    }

    public function view(){

    }

    public function addTag(){

    }

    public function assignTag(){

    }

    public function updateTag(){

    }

    public function deleteTag(){

    }

    public function restoreConfigs(){
        
    }

}