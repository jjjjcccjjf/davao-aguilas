<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {

	public $dynamic_table = false;
	public $time_picker = false;
	public $multiple_select = false;

	public function __construct()
	{
		parent::__construct();

		$includes['dynamic_table'] = $this->dynamic_table;
 		$includes['time_picker'] = $this->time_picker;
 		$includes['multiple_select'] = $this->multiple_select;
	}

	public function index()
	{



		$this->load->view('partials/header', $includes);
		$this->load->view('partials/footer', $includes);
	}
}
