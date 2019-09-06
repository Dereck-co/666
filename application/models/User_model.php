<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    public $title;
    public $content;
    public $date;
public function __construct()
{
        parent::__construct();
}
public function get_last_ten_entries()
{
       $this->load->database();
      
        /*$query = $this->db->get('name', 10);
        return $query->result();*/

        $sql = "SELECT `name`,`tel` FROM friends;";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row)
        {
            echo $row->name;
            echo $row->tel;
        }

       $query->free_result();
       return $query->result();
    }
}