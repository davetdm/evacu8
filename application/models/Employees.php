<?php

/**
 * Description of Eployees
 *
 * The employee(person) model class
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class Employees extends BaseModel {

    public function __construct() {
        parent::__construct("employees");
    }       
}