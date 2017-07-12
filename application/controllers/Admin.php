<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	* array for our enabled modules
	* @var array
	*/
	public $includes = [];

	public function __construct()
	{
		parent::__construct();

		$this->includes['dynamic_table'] = false;
		$this->includes['time_picker'] = false;
		$this->includes['multi_select'] = false;
	}

	public function index()
	{
		if (isset($this->session->userdata['logged_in'])) {
			#			$this->products();
		} else {
			$this->load->view('login');
		}
	}

	/**
	* our wrapper function so we code dry
	* @param  name of view to load                          $body     'products', 'users', etc
	* @param  associative array to be passed in our view    $data      [description]
	* @return void
	*/
	public function wrapper($body, $data = null)
	{
		if (isset($this->session->userdata['is_logged_in'])) {
			$this->load->view('partials/header', $this->includes);
			$this->load->view('partials/left-sidebar');
			$this->load->view($body, $data);
			// $this->load->view('partials/right-sidebar'); # uncomment if you're using a right sidebar
			$this->load->view('partials/footer', $this->includes);
		}
		else {
			redirect(base_url());
		}
	}

	public function login()
	{
		$this->session->set_userdata('is_logged_in', 1);
		redirect('admin/news');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}

	public function news()
	{
		$this->wrapper('news');
	}

	public function videos()
	{
		$this->wrapper('videos');
	}

	public function partners()
	{
		$this->wrapper('partners');
	}

}
