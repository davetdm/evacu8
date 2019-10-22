<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tags extends CI_Controller{

    public function __construct(){
        parent::__construct();
       
    }

    public function index()
    {
        $data = [
            'title' => "Evacu8",
        ];
       $this->load->view("tags", $data);  
    }

    public function add(){

    }

    public function assign(){

    }

    public function view(){

    }

    public function addTag(){

    }

    public function assignTag(){

    }

    public function updateTag(){

    }

    public function deleteTag(){

    }

    public function restoreConfigs(){
        
    }

}