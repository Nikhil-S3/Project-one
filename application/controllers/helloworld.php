<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Helloworld extends CI_Controller {

	public function index()
	{
		// echo "<h1>You're looking good today</h1>";
		$this->load->view('hello');
	}
}
