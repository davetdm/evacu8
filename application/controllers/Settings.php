<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller{

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        redirect("/settings/configs");
    }

    public function configs(){
        $data = [
            'title' => "Configs | Settings",
            'page' => "settings",
            "configs" => $this->ConfigsModel->select(),
        ];
        $this->load->view("settings_configs", $data);  
    }

    public function addConfig(){
        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            $this->db->trans_begin();
            $name = $this->input->post("name");
            $row = $this->ConfigsModel->getByName($name);
            if($row){
                $this->db->trans_commit();
                echo utils::response("Operation failed: Config exist.", "ok");
                return false;
            }
            $this->ConfigsModel->insert([
                "name" => strip_tags($this->input->post("name")),
                "date_added" => strtotime(utils::getDate()),
            ]);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo utils::response("Operation failed!", "error");
                return false;
            } else {
                $this->db->trans_commit();
                echo utils::response("Operation successful", "ok");
                return true;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            echo utils::response("Could not register this time. Please try again later!", "error");
            return false;
        }
    }

    public function groups(){
        $data = [
            'title' => "Groups | Settings",
            'page' => "settings",
            "configs" => $this->ConfigsModel->select(),
            "groups" => $this->GroupsModel->select(),
        ];
        $this->load->view("settings_groups", $data);  
    }

    public function addConfigToGroup(){
        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            $this->db->trans_begin();
            $group_id = $this->input->post("group_id");
            $config_id = $this->input->post("config_id");
            $row = $this->GroupConfigModel->getByGroupConfig($group_id, $config_id);
            if(!$row){
                $this->GroupConfigModel->insert([
                    "group_id" => strip_tags($this->input->post("group_id")),
                    "config_id" => strip_tags($this->input->post("config_id")),
                    "date_added" => strtotime(utils::getDate()),
                ]);
            }
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo utils::response("Operation failed!", "error");
                return false;
            } else {
                $this->db->trans_commit();
                echo utils::response("Operation successful", "ok");
                return true;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            echo utils::response("Could not register this time. Please try again later!", "error");
            return false;
        }
    }

    public function anchors(){
        $data = [
            'title' => "Anchors | Settings",
            'page' => "settings",
            "anchors" => $this->AnchorsModel->select(),
            "configs" => $this->ConfigsModel->select(),
        ];
        $this->load->view("settings_anchors", $data);  
    }

    public function addAnchor(){
        if ($this->input->method() != "post"){
            echo utils::response("Invalid request method", "error");
            return false;
        }
        try {
            $this->db->trans_begin();
            $anchor_id = $this->input->post("anchor_id");
            $row = $this->AnchorsModel->getByAnchorId($anchor_id);
            if($row){
                $this->db->trans_commit();
                echo utils::response("Operation failed: Anchor exist.", "ok");
                return false;
            }
            $this->AnchorsModel->insert([
                "config_id" => strip_tags($this->input->post("config_id")),
                "anchor_id" => strip_tags($this->input->post("anchor_id")),
                "location" => strip_tags($this->input->post("location")),
                "date_added" => strtotime(utils::getDate()),
            ]);
            if ($this->db->trans_status() === FALSE) {
                $this->db->trans_rollback();
                echo utils::response("Operation failed!", "error");
                return false;
            } else {
                $this->db->trans_commit();
                echo utils::response("Operation successful", "ok");
                return true;
            }
        } catch (Exception $e) {
            print_r($e->getMessage());
            echo utils::response("Could not register this time. Please try again later!", "error");
            return false;
        }
    }

}