<?php

/**
 * Description of Tags
 *
 * The tags model class: tags been tracked and assigned to persons based on classification
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class TagsModel extends BaseModel {

    public function __construct() {
        parent::__construct("tags");
    }  
    public function add_tag()
    {
      $this->db->insert('tags', $data);
      return true;
    }     
}