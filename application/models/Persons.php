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
        $this->db->trans_start();
        $this->db->insert('person', $data);
      return true;
    } 
    public function update_person($id, $data)
    {
        $data = array(
            $id =>strip_tags($this->input->post('id')),
            'type'=>strip_tags($this->input->post('type')),
            'first_name'=>strip_tags($this->input->post('first_name')),
            'last_name'=>strip_tags($this->input->post('last_name')),
            'id_passport'=>strip_tags($this->input->post('id_passport')), 
            'email' =>strip_tags($this->input->post('email')), 
            'mobile' =>strip_tags($this->input->post('mobile')), 
            'date_added' =>date('Y-m-d',strtotime(utils::getDate()))       
            );

          if($id==0){
            return $this->db->insert('person',$data);
          }else{
            $this->db->where('id',$id);
            return $this->db->update('person',$data);
          }        
    
    }   
}