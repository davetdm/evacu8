<?php

/**
 * Description of GroupConfig
 *
 * The group_config model class: Configurations assigned to a group
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class GroupConfig extends BaseModel {

    public function __construct() {
        parent::__construct("group_config");
    }       
}