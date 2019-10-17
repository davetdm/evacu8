<?php

/**
 * Description of TagConfig
 *
 * The tag_config model class: This defines all the configurations assigned to a tag
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class TagConfig extends BaseModel {

    public function __construct() {
        parent::__construct("tag_config");
    }       
}