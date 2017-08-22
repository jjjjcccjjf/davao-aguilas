<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	* array for our enabled modules
	* @var array
	*/
	public $includes = [];

	/**
	 * GuzzleHttp Client
	 * @var object
	 */
	public $client;

	public function __construct()
	{
		parent::__construct();

		$this->includes['dynamic_table'] = false;
		$this->includes['time_picker'] = false;
		$this->includes['multi_select'] = false;

		$this->client = new GuzzleHttp\Client();
	}

	public function index()
	{
		if (!isset($this->session->userdata['logged_in'])) {
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
		$u = $this->input->post('username');
		$p = sha1($this->input->post('password'));

		$this->db->where('username', $u);
		$admin = $this->db->get('admin')->result()[0];

		if($admin->password == $p){
			$this->session->set_userdata('is_logged_in', 1);
			$this->session->set_userdata('username', $admin->username);
			redirect('admin/news');
		}
		else{
			$this->session->set_flashdata('login_error', 'Incorrect username or password');
			redirect(base_url());
		}

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

	public function members()
	{
		$this->wrapper('members');
	}

	public function videos()
	{
		$this->wrapper('videos');
	}

	public function partners()
	{
		$this->wrapper('partners');
	}

	public function players()
	{

		$res = $this->client->request('GET', base_url() . 'api/teams');
		$data['teams'] = json_decode($res->getBody());

		$this->wrapper('players', $data);
	}

	public function teams()
	{
		$this->wrapper('teams');
	}

	public function leagues()
	{
		$this->wrapper('leagues');
	}

	public function team_stats()
	{
		$this->wrapper('team_stats');
	}

	public function player_stats()
	{
		$res = $this->client->request('GET', base_url() . 'api/players');
		$data['players'] = json_decode($res->getBody());

		$this->wrapper('player_stats', $data);
	}

	public function ladders()
	{

		$res = $this->client->request('GET', base_url() . 'api/teams');
		$data['teams'] = json_decode($res->getBody());

		$res = $this->client->request('GET', base_url() . 'api/leagues');
		$data['leagues'] = json_decode($res->getBody());

		$this->wrapper('ladders', $data);
	}

	public function fixtures()
	{
		$res = $this->client->request('GET', base_url() . 'api/teams');
		$data['teams'] = json_decode($res->getBody());

		$res = $this->client->request('GET', base_url() . 'api/leagues');
		$data['leagues'] = json_decode($res->getBody());

		$res = $this->client->request('GET', base_url() . 'api/players');
		$data['players'] = json_decode($res->getBody());

		$res = $this->client->request('GET', base_url() . 'api/teams/default/id');
		$data['default_team_id'] = json_decode($res->getBody());

		$this->wrapper('fixtures', $data);
	}

}
