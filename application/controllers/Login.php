<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Manila");

		// check admin is already login
		$this->VotingModel->is_admin_login();
	}

	public function index() {
		$this->load->view("login/index.php");
	}
}
