<?php

/**
 * Description of Groups
 *
 * The groups model class: classification of configurations and persons within the application
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class GroupsModel extends BaseModel {

    public function __construct() {
        parent::__construct("groups");
    }       
}