<?php

/**
 * Description of PersonTag
 *
 * The person_tag model class: provides a tag assigned to a person
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class PersonTag extends BaseModel {

    public function __construct() {
        parent::__construct("person_tag");
    }       
}