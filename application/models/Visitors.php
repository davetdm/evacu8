<?php

/**
 * Description of Visitors
 *
 * The visitors(person) model class
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class Visitors extends BaseModel {

    public function __construct() {
        parent::__construct("visitors");
    }       
}