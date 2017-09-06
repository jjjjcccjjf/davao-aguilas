<?php

class Search extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Search_model', 'model');

  }

  public function index($keyword = '')
  {
    $res['fixtures'] = [];
    $res['news'] = [];

    header('Content-Type: application/json');
    $team_ids = $this->model->getTeamIdByTeamName($keyword);


    $fixtures = [];

    # Search each row on fixtures table if they have the certain fixture_id
    foreach($team_ids as $id){
      $fixtures[] = $this->model->checkFixture($id);

    }
    $fixtures[] = $this->model->checkOthers($keyword);

    $merged_fixtures = array_replace(...$fixtures);

    foreach($merged_fixtures as $key => $val){
      $res['fixtures'][] = ['id' => $key, 'title' => $val];
    }

    $res['news'] = $this->model->getNewsIdsByTitle($keyword);
    echo json_encode($res); die();

  }

}
