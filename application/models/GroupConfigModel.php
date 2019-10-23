<?php

/**
 * Description of GroupConfig
 *
 * The group_config model class: Configurations assigned to a group
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class GroupConfigModel extends BaseModel {

    public function __construct() {
        parent::__construct("group_config");
    }      
    
    public function getByGroupConfig($group_id, $config_id){
        $this->db->select('*');
        $query = $this->db->get_where($this->table, ["group_id" => $group_id, "config_id" => $config_id]);
        return $query->row();
    }

    public function getByGrouId($group_id){
        $this->db->select('*');
        $query = $this->db->get_where($this->table, ["group_id" => $group_id]);
        return $query->result();
    }
}