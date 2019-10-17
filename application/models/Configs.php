<?php
/**
 * Description of Configs
 *
 * The configuration model class
 *
 * @author Johannes Ramothale <johannes@star-x.co.za>
 * @since 15 Oct 2019, 7:05:58 AM
 */
class Configs extends BaseModel {

    /**
     * default constructor:
     * init the table name for the model
     */
    public function __construct() {
        parent::__construct("configs");
    }   
}