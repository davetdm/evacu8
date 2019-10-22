<?php

/**
 * Description of Movements
 *
 * The movements model class: tracks the movement of a tag
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class Persons extends BaseModel {

    public function __construct() {
        parent::__construct("person");
    }   
    public function add_person($data){
          
        $this->db->insert('person', $data);
        return true;

        $this->load->view('person');
      }   

    function get_person()
      {
          $this->db->select("id,type,first_name,last_name, id_passport,email,mobile,date_added,date_deleted"); 
          $this->db->from('person');
          $query = $this->db->get();
          return $query->result();
       }  

    public function single_person($id){

        $this->db->select("id,type,first_name,last_name, id_passport,email,mobile,date_added,date_deleted"); 
        $this->db->from('person');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->result()[0];
    } 
    public function delete($id) 
    {
      $this->db->query("delete  from person where id='".$id."'");
    } 
}