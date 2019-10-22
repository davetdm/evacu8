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
   public function view_person()
   {
    $data = [
        'title' => "View Person",
    ];
    $data['persons'] = $this->Persons->get_person(); 
    $this->load->view("view_person", $data);
   }

   public function edit_person()
   {
    $data = [
        'title' => "Edit Person",
    ];
  
    $this->load->view("edit_person", $data);
   }
   public function delete_data()
   {
    $id = $this->input->get('id');
      $person= $this->Persons->single_person($id);
      $data = [
        "title" => "delete Person",
        "assets" => $this->config->item('assets'),
        "page"=> "delete_person",
        "person" => $person
      ];   
     $this->load->view("delete_person", $data);
   }
   

   public function add_person()
   {
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
   public function update_person()
   {

   }
   public function delete_person($id)
   {
        //start the transaction
        $this->db->trans_begin();
        //delete person
        $id=$this->input->get('id');
	    $this->Persons->delete($id);
        //make transaction complete
        $this->db->trans_complete();
        //check if transaction status TRUE or FALSE
        if ($this->db->trans_status() === FALSE) {
            //if something went wrong, rollback everything
            $this->db->trans_rollback();
        return FALSE;
        } else {
            //if everything went right, delete the data from the database
            $this->db->trans_commit();
            return TRUE;
        }
    }
}