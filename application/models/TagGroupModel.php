<?php

/**
 * Description of TagGroup
 *
 * The tag_group model class: This classifies a tag into a certain group
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */

class TagGroupModel extends BaseModel {

    public function __construct() {
        parent::__construct("tag_group");
    }       
}