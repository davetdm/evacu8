<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movement extends CI_Controller{

    public function __construct(){
        parent::__construct();
       
    }

    public function index()
    {
        $data = [
            'title' => "Evacu8",
        ];
       $this->load->view("movement", $data);  
    }

}