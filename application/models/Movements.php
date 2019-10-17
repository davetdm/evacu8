<?php


/**
 * Description of Movements
 *
 * The movements model class: tracks the movement of a tag
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class Movements extends BaseModel {

    public function __construct() {
        parent::__construct("movements");
    }       
}