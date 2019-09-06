<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function index()
	{
		$this->load->view('home_index');
	}
	public function abouts()
	{
		$this->load->view('home_abouts');
	}
	public function createtbl()
	{
		$this->load->database();
		$sql = '
		CREATE TABLE `friends` (
			`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
			`name` varchar(20) DEFAULT NULL,
			`tel` varchar(20) DEFAULT NULL,
			PRIMARY KEY (`id`)
		  ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
		  ';
		  $this->db->query($sql);
		  echo 'ok';
	}
	public function adddata(){
		$this->load->database();
		$sql = "
			INSERT INTO friends(`name`, `tel`) VALUES('小明', '0911222333');
			INSERT INTO friends(`name`, `tel`) VALUES('小王', '0966666666');
			INSERT INTO friends(`name`, `tel`) VALUES('小德', '0911555533');
		";
		$this->db->query($sql);
		  echo 'ok';
	}
	public function showdata(){
		$this->load->database();
		$sql = "SELECT `name`,`tel` FROM friends;";
		$query = $this->db->query($sql);
		foreach ($query->result() as $row)
        {
            echo $row->name;
            echo $row->tel;
        }

        $query->free_result();
	}
	public function User_model(){
		$this->load->model('User_model');
		/*$this->User_model->method();*/
		$data['query'] = $this->User_model->get_last_ten_entries();
		$this->load->view('User_model', $data);
	}
}
