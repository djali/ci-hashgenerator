<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH.'libraries/phpass-0.1/PasswordHash.php');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
	
	public function generate()
	{
		$hasher = new PasswordHash(8,false);
		$password = $this->input->post('password',TRUE);
		$hashed_password = $hasher->HashPassword($password);
		$data['password'] = $password;
		$data['hash_password'] = $hashed_password;
		$this->load->view('welcome_message',$data);
	}
}
